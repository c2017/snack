$(window).ready(function(){
    var url=$(".con a").prop("href");
    var nub=3;
    var t=setInterval(function(){
        nub--;
        if(nub==0){
            location.href=url;
        }else{
            $("span").html(nub);
        }
    },1000)
});
