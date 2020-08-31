$(".nav-item").click(function(){
    $(this).find("a").css("color","#999");
})

$(function () {
    // $(".toTop").hide();
    $(function () {
        $(window).scroll(function () {
            if ($(window).scrollTop() > 200) {
                $(".toTop").fadeIn(500);
            } else {
                $(".toTop").fadeOut(500);
            }
        });
        $(".toTop").click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
        });
    });
});

$(".toTop img").hover(function(){
    $(this).stop(true,true);
    $(this).animate({top:"-50px"},250);
},function(){
    $(this).stop(true,true);
    $(this).animate({top:"0px"},250);
})

$("#news img").hover(function(){
    $(this).stop(true,true);
    $(this).animate({width:"120%"},300);
},function(){
    $(this).stop(true,true);
    $(this).animate({width:"100%"},300);
})
