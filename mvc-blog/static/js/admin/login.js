$(window).ready(function(){

    var btn=$("input[type=submit]");

    $("input[name=code]").blur(function(){
        var code=$(this).val();
        that=$(this);
        $.ajax({
            url:"index.php?m=admin&f=index&a=checkCode",
            data:{code:code},
            success:function(e){
                if(e=="ok"){
                    that.attr("use","yes");
                    $(".codes").css({background:"green"});
                    btn.removeAttr("disabled");
                }else{
                    console.log(e);
                    $(".codes").css({background:'red'});
                    btn.attr("disabled","disabled");
                }
            }
        })

    })
})