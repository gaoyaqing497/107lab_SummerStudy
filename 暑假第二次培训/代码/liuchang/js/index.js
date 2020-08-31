$(function(){
	//导航栏鼠标进出文字颜色，背景颜色变化
	$('.active>a').mouseover(function(){
        $(this).css({"background":"white","color":"#b6124a"});
    });
	$('.active>a').mouseout(function(){
        $(this).css({"background":"#b6124a","color":"#ffffff","border-radius":"5px"});
    });
	$('.dropdown-toggle').click(function(){
        $(this).css({"background":"#ffffff"});
    });
	$('.dropdown-menu>li>a').mouseover(function(){
        $(this).css({"background":"rgba(225,225,225,0.1)","color":"#ffffff"});
    });
	$('.dropdown-menu>li>a').mouseout(function(){
        $(this).css({"background":"","color":""});
    });

    //主体1中文字颜色变化
	$('.content .content-1 a').mouseover(function(){
        $(this).css({"color":"#428bca"});
    });
	$('.content .content-1 a').mouseout(function(){
        $(this).css({"color":""});
    });

    //主体2中文字颜色变化
	$('.main a').mouseover(function(){
        $(this).css({"color":"#b6124a"});
    });
	$('.main a').mouseout(function(){
        $(this).css({"color":""});
    });

    //主体3中文字颜色和背景颜色变化
	$('.picture .row .picture-1 a').mouseover(function(){
        $(this).css({"color":"#428bca"});
    });
	$('.picture .row .picture-1 a').mouseout(function(){
        $(this).css({"color":""});
    });
	$('.picture-2').mouseover(function(){
      	$(this).css({"background":"#777777"});
    });
	$('.picture-2').mouseout(function(){
        $(this).css({"background":""});
    });

    //底部图标变化
	$('.fa').mouseover(function(){
        $(this).css({"color":"#b6124a"});
    });
	$('.fa').mouseout(function(){
        $(this).css({"color":""});
    });

    //底部文字颜色变化
	$('.footer-2 a').mouseover(function(){
        $(this).css({"color":"#ffffff"});
    });
	$('.footer-2 a').mouseout(function(){
        $(this).css({"color":""});
    });
});