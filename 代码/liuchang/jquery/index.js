$(function(){
	   
        //图片介绍    
            $(".content-4-1").hover(function (){
                $(".content-4-12>span").slideDown();
            },function (){
                $(".content-4-12>span").slideUp();
            });//鼠标进入文字滑出，鼠标出去文字消失
            $(".content-4-2").hover(function (){
                $(".content-4-22>span").slideDown();
            },function (){
                $(".content-4-22>span").slideUp();
            });//鼠标进入文字滑出，鼠标出去文字消失
            $(".content-4-3").hover(function (){
                $(".content-4-32>span").slideDown();
            },function (){
                $(".content-4-32>span").slideUp();
            });//鼠标进入文字滑出，鼠标出去文字消失

        //小轮播图
	        var oul=$('.picture ul');//获取ul
            var ali=$('.picture ul li');//获取ul的li
            var numli=$('.picture ol li');//获取ol的li
            var aliwidth=$('.picture ul li').eq(0).width();//获取宽度
            var _now=0;//数字样式计数器
            var _now1=0;//图片运动距离计数器
            var timeid=null;

            numli.click(function(){
             	var index=$(this).index();//索引
             	_now=index;//同步
             	_now1=index;//同步
             	$(this).addClass('current').siblings().removeClass();//称为current其他的去除
             	oul.animate({'left':-aliwidth*index},500);
            }); //点击让图片与数字一同变化
            function slider(){
             	if(_now==numli.size()-1){
             		ali.eq(0).css({'position':'relative','left':oul.width()
             	});//把第一张图片定位到最后一张，同时留有li的位置
             		_now=0;
             	}else{
             	_now++;//还原
                }
                _now1++;
             	numli.eq(_now).addClass('current').siblings().removeClass();
             	oul.animate({'left':-aliwidth*_now1},500,function(){
                  if(_now==0){
             		ali.eq(0).css({'position':'static'})//去掉relative属性
             		oul.css('left','0');//li还原回来
             		_now1=0;//还原
             	  }
             	});
             }
            timeid=setInterval(slider,1500);
            $('.picture').mouseover(function(){
             	clearInterval(timeid);
            });//鼠标移上去图片停止
            $('.picture').mouseout(function(){
             	timeid=setInterval(slider,1500);
             });//鼠标移出图片回复滚动


            //改变文字颜色
            $('.content-1-3,.content-2-2 ul li a,.content-3 ul li').mouseover(function(){
            	$(this).css("color","#1877b7")
            });
             $('.content-1-3,.content-2-2 ul li a,.content-3 ul li').mouseout(function(){
            	$(this).css("color","")
            });
       
});