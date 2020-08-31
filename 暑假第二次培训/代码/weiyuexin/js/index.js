/*Javascript Document*/
$(function(){
	/*返回顶部*/
	$(".footer .goToTop").click(function(){
		$('html').animate({scrollTop: '0px'},500);
	});
	$(".footer .goToTop").fadeOut();
	$(window).scroll(function(){
		if($(window).scrollTop()>200){
			$(".footer .goToTop").fadeIn();
		}else{
			$(".footer .goToTop").fadeOut();
		}
	});
});