$(function(){
	//头部
	$(".headconcent .settings span").click(function(){
		var spannth=$(this).index();
		if(0==spannth)
		{
			alert("浏览器不支持自动设为首页，请手动设置");
		}
		else if(2==spannth){
			alert("无法自动添加到收藏夹，请使用CTRL + D手动添加");
		}
	});
	$(".headconcent .searchbox").mouseenter(function(){
		$(this).removeClass("covercss");
	});
	$(".headconcent .searchbox").mouseleave(function(){
		$(this).addClass("covercss");
	});
	// 下拉菜单；
	$(".navfir>li").mouseenter(function() {
		$(this).children("ul").children("li").stop(); 
		$(this).children("ul").children("li").slideDown(300);
	});
	$(".navfir li").mouseleave(function(){
		$(this).children("ul").children("li").stop();
		$(this).children("ul").children("li").slideUp(80);
	});
	// 轮播
	var i=0;
	function circle(){
		$(".img li").eq(i).fadeIn().siblings().fadeOut();
	}
	function auto() {
		setInterval(function() {
			circle();
			i++;
			if (3 == i) {
				i = 0;
			}
		}, 2000);
	}
	auto();
	// 
	$(".fordown").click(function(){
		$(".down").hide();
	})
});