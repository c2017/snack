function rem(originw){
    var bili;
    var cw=document.documentElement.clientWidth;
    bili=parseInt(cw/originw*100)+"px";
    var root=document.querySelector(":root");
    root.style.fontSize=bili;
}
rem(750);
