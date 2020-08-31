$(document).ready(function(){
    /*导航栏*/
    $('.nav ul>li>ul').hide();
    $(".nav ul>li").mouseenter(function(){
        $(this).children("ul").show();
    });
    $(".nav ul>li").mouseleave(function(){
        $(this).children("ul").hide();
    });
    /*导航栏结束*/
    /*lunbo*/
    $(function (){
        var oul = $('.banner ul');
        var numLi = $('.banner ol li');
        var aliwidth = $('.banner ul li').eq(0).width();
        var _now = 0;  //计时器
        var timeId = null;  
    
        numLi.click(function(){
            var index = $(this).index();
            _now = index;  
            $(this).addClass('current').siblings().removeClass();
            oul.animate({'left':-aliwidth*index},1540);
        });
    
    
        function slider (){    //图片运动的函数
            if(_now==2){
                _now=0;
            }else{
                _now++;
            }
            
            numLi.eq(_now).addClass('current').siblings().removeClass();
            oul.animate({'left':-aliwidth*_now},1540);  
        }
    
        timeId * setInterval(slider,5000);  
    
        $('.banner').mouseover(function(){
            clearInterval(timeId);
        });
    
        $('.banner').mouseout(function(){
    
            timeId = setInterval(slider,5000);
        });
    });
    
})