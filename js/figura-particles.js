var FiguraParticles = (function () {
  var canvas, ctx, containerRef;
  var particles = [];
  var dims = { W: 0, H: 0 };
  var mouse = { x: -99999, y: -99999, active: false };
  var prevMouse = { x: -99999, y: -99999 };
  var mouseSpeed = 0;
  var smoothMouse = { x: -99999, y: -99999 };
  var animState = "active";
  var animStartTime = 0;
  var animTimer = null;
  var roamFadeStart = 0;
  var roamFadeFrom = 1;
  var roamFadeTo = 1;
  var animFrame = null;
  var ro = null;
  var visible = true;

  var config = {
    particleCount: 50, particleSize: 6, particleShape: "circle",
    particleColor: "single", singleColor: "#ffffff",
    hoverEnabled: true, hoverType: "roam",
    roamWidth: 0, roamHeight: 0, roamShape: "rectangle", roamOpacity: 0.5,
    transitionDuration: 0.8, transitionEase: "easeInOut",
    repulsionEnabled: true, repulsionMode: "outside",
    repulsionForce: 10, repulsionRadius: 50, imageUrl: ""
  };

  var EASE = {
    easeOut: function(t) { return 1 - (1-t)*(1-t); },
    easeInOut: function(t) { return t < 0.5 ? 2*t*t : 1 - 2*(1-t)*(1-t); },
    easeIn: function(t) { return t*t; },
    circOut: function(t) { return Math.sqrt(1 - (t-1)*(t-1)); },
    linear: function(t) { return t; }
  };

  function containRect(iW, iH, cW, cH) {
    var a = iW/iH, b = cW/cH;
    return a > b
      ? { x:0, y:Math.round((cH-cW/a)/2), w:cW, h:Math.round(cW/a) }
      : { x:Math.round((cW-cH*a)/2), y:0, w:Math.round(cH*a), h:cH };
  }

  function parseColor(c) {
    if (!c) return {r:200,g:200,b:200,a:255};
    var h = c.replace("#","");
    if (h.length >= 6) return {
      r:parseInt(h.slice(0,2),16), g:parseInt(h.slice(2,4),16),
      b:parseInt(h.slice(4,6),16), a:h.length===8?parseInt(h.slice(6,8),16):255
    };
    return {r:200,g:200,b:200,a:255};
  }

  function shuffle(a) {
    for (var i=a.length-1; i>0; i--) {
      var j=Math.floor(Math.random()*(i+1));
      var t=a[i]; a[i]=a[j]; a[j]=t;
    }
  }

  function randomInShape(shape, bx, by, bw, bh) {
    var cx=bx+bw/2, cy=by+bh/2;
    if (shape==="circle") {
      var r=bw/2, ang=Math.random()*Math.PI*2, d=Math.sqrt(Math.random())*r;
      return [cx+Math.cos(ang)*d, cy+Math.sin(ang)*d];
    }
    if (shape==="oval") {
      var rx=bw/2, ry=bh/2, ang2=Math.random()*Math.PI*2, d2=Math.sqrt(Math.random());
      return [cx+d2*rx*Math.cos(ang2), cy+d2*ry*Math.sin(ang2)];
    }
    return [bx+Math.random()*bw, by+Math.random()*bh];
  }

  function getTransitionParams() {
    return {
      easeFn: EASE[config.transitionEase] || EASE.easeOut,
      durMs: (config.transitionDuration || 0.8) * 1000
    };
  }

  function mkParticle(src, x, y, idleX, idleY) {
    return {
      x:x, y:y, vx:0, vy:0, startX:x, startY:y, repX:0, repY:0,
      homeX:src.homeX, homeY:src.homeY, idleX:idleX, idleY:idleY,
      r:src.r, g:src.g, b:src.b, a:src.a, inZone:false,
      roamTargetX:0, roamTargetY:0, repTargetX:0, repTargetY:0
    };
  }

  function startAnim(newState) {
    var W=dims.W, H=dims.H;
    var ht=config.hoverType, rw=config.roamWidth, rh=config.roamHeight, rs=config.roamShape, rOp=config.roamOpacity;
    var tp=getTransitionParams(), durMs=tp.durMs;
    var bw=Math.max(80,rw||W), bh=Math.max(80,rh||H);
    var bx=(W-bw)/2, by=(H-bh)/2;

    for (var i=0; i<particles.length; i++) {
      var p=particles[i];
      p.startX=p.x; p.startY=p.y;
      if (newState==="scattering" && ht==="roam") {
        var coords=randomInShape(rs,bx,by,bw,bh);
        p.roamTargetX=coords[0]; p.roamTargetY=coords[1];
        p.idleX=coords[0]; p.idleY=coords[1];
      }
    }

    var _rOp = rOp != null ? rOp : 0.5;
    if (ht==="roam") {
      if (newState==="scattering") { roamFadeStart=Date.now(); roamFadeFrom=1; roamFadeTo=_rOp; }
      else if (newState==="assembling") { roamFadeStart=Date.now(); roamFadeFrom=_rOp; roamFadeTo=1; }
    }

    if (newState==="scattering" && ht==="roam") { clearTimeout(animTimer); animState="idle"; return; }
    animStartTime=Date.now(); animState=newState; clearTimeout(animTimer);
    var next = newState==="assembling" ? "active" : "idle";
    animTimer = setTimeout(function() { if (animState===newState) animState=next; }, durMs);
  }

  function initParticles() {
    var W=dims.W, H=dims.H;
    if (!config.imageUrl || !W || !H || !canvas) return;
    clearTimeout(animTimer);
    var isMobile = W < 480;
    var pCount = isMobile ? 35 : config.particleCount;
    config.particleSize = isMobile ? 8 : 6;
    var gap = Math.max(2, Math.round(150 / Math.max(1, pCount)));
    var dpr = window.devicePixelRatio || 1;
    canvas.width = Math.round(W*dpr); canvas.height = Math.round(H*dpr);
    mouse = {x:-99999,y:-99999,active:false}; particles = [];

    var tryLoad = function(cors) {
      var img = new Image();
      if (cors) img.crossOrigin = "anonymous";
      img.onerror = function() { if (cors) tryLoad(false); };
      img.onload = function() {
        var base = containRect(img.naturalWidth||img.width, img.naturalHeight||img.height, W, H);
        var f = Math.max(1, Math.min(20, 10)) / 10;
        var w=base.w*f, h=base.h*f;
        var rect = {x:(W-w)/2, y:(H-h)/2, w:w, h:h};
        var off = document.createElement("canvas"); off.width=W; off.height=H;
        var oc = off.getContext("2d");
        oc.drawImage(img, rect.x, rect.y, rect.w, rect.h);
        var px; try { px = oc.getImageData(0,0,W,H).data; } catch(_) { return; }
        var src = [];
        for (var y=0; y<H; y+=gap) {
          for (var x=0; x<W; x+=gap) {
            var idx=(y*W+x)*4;
            if (px[idx+3]>=20) {
              var gray=Math.max(px[idx],px[idx+1],px[idx+2]);
              src.push({homeX:x,homeY:y,r:gray,g:gray,b:gray,a:255});
            }
          }
        }
        shuffle(src);
        var ht=config.hoverType, rw=config.roamWidth, rh=config.roamHeight, rs=config.roamShape;
        var bw=Math.max(80,rw||W), bh=Math.max(80,rh||H);
        var bx=(W-bw)/2, by=(H-bh)/2;
        particles = src.map(function(p) {
          var start=randomInShape(rs,bx,by,bw,bh);
          var pt=mkParticle(p,start[0],start[1],start[0],start[1]);
          var target=randomInShape(rs,bx,by,bw,bh);
          pt.roamTargetX=target[0]; pt.roamTargetY=target[1];
          pt.vx=(Math.random()-0.5)*1.2; pt.vy=(Math.random()-0.5)*1.2;
          return pt;
        });
        animState="idle";
      };
      img.src = config.imageUrl;
    };
    tryLoad(true);
  }
function draw() {
    animFrame = requestAnimationFrame(draw);
    if (!visible) return;
    var PW=canvas.width, PH=canvas.height;
    if (!PW || !PH) return;
    var dpr = window.devicePixelRatio || 1;
    if (!particles.length) return;

    if (!ctx._idata || PW!==ctx._bW || PH!==ctx._bH) {
      ctx._idata = ctx.createImageData(PW, PH);
      ctx._bW=PW; ctx._bH=PH;
    }
    var idata=ctx._idata; idata.data.fill(0);
    var buf=idata.data;

    var ht=config.hoverType, rw=config.roamWidth, rh=config.roamHeight, rOp=config.roamOpacity, rs=config.roamShape;
    var repOn=config.repulsionEnabled, rF=config.repulsionForce, rR=config.repulsionRadius, rMode=config.repulsionMode;
    var pSz=config.particleSize, pShape=config.particleShape, pColor=config.particleColor, scColor=config.singleColor;
    var state=animState;
    var rawMx=mouse.x, rawMy=mouse.y, active=mouse.active;
    var hitSpeed=mouseSpeed; mouseSpeed*=0.88;

    var sm=smoothMouse;
    if (active) {
      var lf=Math.max(0.08, 0.3 - hitSpeed*0.006);
      if (sm.x<-9000) { sm.x=rawMx; sm.y=rawMy; }
      else { sm.x+=(rawMx-sm.x)*lf; sm.y+=(rawMy-sm.y)*lf; }
    } else { sm.x=-99999; sm.y=-99999; }

    var mx=sm.x, my=sm.y;
    var ps=Math.max(1, Math.ceil((pSz/4)*dpr));
    var tp=getTransitionParams(), easeFn=tp.easeFn, durMs=tp.durMs;
    var elapsed=Date.now()-animStartTime;
    var animT=easeFn(Math.min(1, elapsed/durMs));
    var DW=dims.W, DH=dims.H;
    var bw=Math.max(80,rw||DW), bh=Math.max(80,rh||DH);
    var bx=(DW-bw)/2, by=(DH-bh)/2;
    var half=ps/2;

    var drawParticle = function(cx,cy,r,g,b,a,isCircle) {
      var px0=Math.round(cx)-(ps>>1), py0=Math.round(cy)-(ps>>1);
      for (var dy=0;dy<ps;dy++) {
        var iy=py0+dy; if (iy<0||iy>=PH) continue;
        var row=iy*PW;
        for (var dx=0;dx<ps;dx++) {
          if (isCircle) {
            var ddx=dx-half+0.5, ddy=dy-half+0.5;
            if (ddx*ddx+ddy*ddy>half*half) continue;
          }
          var ix=px0+dx; if (ix<0||ix>=PW) continue;
          var i=(row+ix)*4;
          buf[i]=r; buf[i+1]=g; buf[i+2]=b; buf[i+3]=a;
        }
      }
    };

    var repCutoff=Math.max(1,rR), repCutoffSq=repCutoff*repCutoff;
    var pIdx=0;

    for (var pi=0; pi<particles.length; pi++) {
      var p=particles[pi];
      var isCircle = pShape==="circle" || (pShape==="both" && pIdx%2===1);
      pIdx++;

      var baseX=p.x, baseY=p.y;
      if (state==="assembling") {
        baseX=p.startX+(p.homeX-p.startX)*animT;
        baseY=p.startY+(p.homeY-p.startY)*animT;
      } else if (state==="scattering") {
        baseX=p.startX+(p.idleX-p.startX)*animT;
        baseY=p.startY+(p.idleY-p.startY)*animT;
      } else if (state==="active") {
        baseX=p.homeX; baseY=p.homeY;
      } else if (state==="idle") {
        if (ht==="roam") {
          var dtx=p.roamTargetX-p.x, dty=p.roamTargetY-p.y;
          if (Math.sqrt(dtx*dtx+dty*dty)<3) {
            var tgt=randomInShape(rs,bx,by,bw,bh);
            p.roamTargetX=tgt[0]; p.roamTargetY=tgt[1];
          }
          p.vx=(p.vx||0)*0.98+(p.roamTargetX-p.x)*0.003;
          p.vy=(p.vy||0)*0.98+(p.roamTargetY-p.y)*0.003;
          var sp2=Math.sqrt(p.vx*p.vx+p.vy*p.vy);
          if (sp2>1.5) { p.vx=(p.vx/sp2)*1.5; p.vy=(p.vy/sp2)*1.5; }
          p.x+=p.vx; p.y+=p.vy;
          baseX=p.x; baseY=p.y;
        } else { baseX=p.idleX; baseY=p.idleY; }
      }

      if (repOn) {
        if (rMode==="random") {
          var dxR=baseX-rawMx, dyR=baseY-rawMy;
          var distR=Math.sqrt(dxR*dxR+dyR*dyR);
          if (distR<repCutoff) {
            if (!p.inZone) {
              var ang=Math.random()*Math.PI*2, dd=Math.random()*rF*5;
              p.repTargetX=Math.cos(ang)*dd; p.repTargetY=Math.sin(ang)*dd;
              p.inZone=true;
            }
            p.repX+=(p.repTargetX-p.repX)*0.15; p.repY+=(p.repTargetY-p.repY)*0.15;
          } else { p.inZone=false; }
        } else {
          if (active) {
            var dx=baseX-mx, dy=baseY-my;
            var distSq=dx*dx+dy*dy;
            if (distSq>0 && distSq<repCutoffSq) {
              var dist=Math.sqrt(distSq);
              var nx=dx/dist, ny=dy/dist;
              var falloff=1-dist/repCutoff;
              var push=falloff*hitSpeed*rF*0.05;
              p.repX+=nx*push; p.repY+=ny*push;
              var tRX=nx*(repCutoff-dist), tRY=ny*(repCutoff-dist);
              p.repX+=(tRX-p.repX)*0.06; p.repY+=(tRY-p.repY)*0.06;
              p.inZone=true;
            } else { p.inZone=false; }
          } else { p.inZone=false; }
        }
      } else { p.inZone=false; }

      if (!p.inZone) { p.repX*=0.97; p.repY*=0.97; }
      p.x=baseX+p.repX; p.y=baseY+p.repY;

      var dr,dg,db,da;
      if (state==="active") { dr=p.r; dg=p.g; db=p.b; da=p.a; }
      else if (ht==="roam" && config.hoverEnabled) {
        var alphaMul;
        if (roamFadeStart===0) { alphaMul=rOp!=null?rOp:0.5; }
        else {
          var fe=Date.now()-roamFadeStart;
          var ft=Math.min(1,Math.max(0,fe/durMs));
          alphaMul=roamFadeFrom+(roamFadeTo-roamFadeFrom)*easeFn(ft);
        }
        dr=p.r; dg=p.g; db=p.b; da=Math.round(p.a*alphaMul);
      } else { dr=p.r; dg=p.g; db=p.b; da=p.a; }
      if (da<1) continue;

      if (pColor==="single") {
        var sc=parseColor(scColor); dr=sc.r; dg=sc.g; db=sc.b;
      }
      drawParticle(p.x*dpr, p.y*dpr, dr, dg, db, da, isCircle);
    }
    ctx.putImageData(idata, 0, 0);
  }
function onMouseMove(e) {
    if (!canvas) return;
    var rect=canvas.getBoundingClientRect();
    var scaleX=rect.width>0?dims.W/rect.width:1, scaleY=rect.height>0?dims.H/rect.height:1;
    var mx=(e.clientX-rect.left)*scaleX, my=(e.clientY-rect.top)*scaleY;
    if (prevMouse.x>-9999) { var ddx=mx-prevMouse.x, ddy=my-prevMouse.y; mouseSpeed=Math.sqrt(ddx*ddx+ddy*ddy); }
    prevMouse={x:mx,y:my}; mouse={x:mx,y:my,active:true};
    if (config.hoverEnabled) { var s=animState; if (s==="idle"||s==="scattering") startAnim("assembling"); }
  }

  function onMouseLeave() {
    mouse={x:-99999,y:-99999,active:false};
    if (config.hoverEnabled) { var s=animState; if (s==="assembling"||s==="active") startAnim("scattering"); }
  }

  function onTouchMove(e) {
    if (!canvas||!e.touches.length) return;
    var rect=canvas.getBoundingClientRect();
    var scaleX=rect.width>0?dims.W/rect.width:1, scaleY=rect.height>0?dims.H/rect.height:1;
    var touch=e.touches[0];
    var mx=(touch.clientX-rect.left)*scaleX, my=(touch.clientY-rect.top)*scaleY;
    if (prevMouse.x>-9999) { var ddx=mx-prevMouse.x, ddy=my-prevMouse.y; mouseSpeed=Math.sqrt(ddx*ddx+ddy*ddy); }
    prevMouse={x:mx,y:my}; mouse={x:mx,y:my,active:true};
    if (config.hoverEnabled) { var s=animState; if (s==="idle"||s==="scattering") startAnim("assembling"); }
  }

  function onTouchEnd() {
    mouse={x:-99999,y:-99999,active:false};
    if (config.hoverEnabled) { var s=animState; if (s==="assembling"||s==="active") startAnim("scattering"); }
  }

  function destroy() {
    if (animFrame) cancelAnimationFrame(animFrame);
    if (animTimer) clearTimeout(animTimer);
    if (ro) ro.disconnect();
    if (canvas) {
      canvas.removeEventListener("mousemove", onMouseMove);
      canvas.removeEventListener("mouseleave", onMouseLeave);
      canvas.removeEventListener("touchstart", onTouchMove);
      canvas.removeEventListener("touchmove", onTouchMove);
      canvas.removeEventListener("touchend", onTouchEnd);
      canvas.removeEventListener("touchcancel", onTouchEnd);
      if (canvas.parentNode) canvas.parentNode.removeChild(canvas);
    }
    canvas=null; ctx=null; containerRef=null; particles=[];
  }

  function init(container, opts) {
    destroy();
    if (!container) return;
    if (opts) { for (var k in opts) { if (opts.hasOwnProperty(k)) config[k]=opts[k]; } }
    containerRef=container;
    canvas=document.createElement("canvas");
    container.appendChild(canvas);
    ctx=canvas.getContext("2d");

    canvas.addEventListener("mousemove", onMouseMove);
    canvas.addEventListener("mouseleave", onMouseLeave);
    canvas.addEventListener("touchstart", onTouchMove, {passive:true});
    canvas.addEventListener("touchmove", onTouchMove, {passive:true});
    canvas.addEventListener("touchend", onTouchEnd, {passive:true});
    canvas.addEventListener("touchcancel", onTouchEnd, {passive:true});

    ro = new ResizeObserver(function(entries) {
      var r=entries[0]?entries[0].contentRect:null;
      if (!r) return;
      var W=Math.round(r.width), H=Math.round(r.height);
      if (!W||!H) return;
      dims={W:W,H:H}; initParticles();
    });
    ro.observe(containerRef);

    var io = new IntersectionObserver(function(entries) {
      visible = entries[0] ? entries[0].isIntersecting : true;
    }, {threshold:0.1});
    io.observe(containerRef);

    draw();
  }

  function setTheme(imageUrl, singleColor) {
    config.imageUrl=imageUrl;
    config.singleColor=singleColor;
    if (containerRef) initParticles();
  }

  return {init:init, setTheme:setTheme, destroy:destroy};
})();
