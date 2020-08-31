$(function(){
	$(".navbar-inverse .navbar-nav>li[class!='dropdown']").click(function(){
        $(this).addClass('active').siblings().removeClass('active');
        });
});