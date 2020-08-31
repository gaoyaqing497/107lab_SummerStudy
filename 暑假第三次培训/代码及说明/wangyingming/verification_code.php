<?php
session_start();
//验证码思路:产生一块图片，在图片中生成干扰元素，将内容(生成无规律内容，服务端保存用于校验)
//画到底图上，生成验证码，用户输入，对比校验
//1.生成底图()
//2.生成验证内容
//3.生成验证码图片
//4.校验验证内容
//1
//画面资源
$image = imagecreatetruecolor(100, 30);
$bgcolor = imagecolorallocate( $image , 255 , 255 , 255 );
imagefill($image,0,0,$bgcolor);//生成的颜色绘制到生成的图片上面
//生成随机数字
// for($i=0;$i<4;$i++)
// {
//   $fontsize = 6 ;
//   $fontcolor = imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
//   $fontcontent = rand(0,9);

//   $x = ($i*100/4) + rand(5,10);
//   $y = rand(5,10);

//   imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
// }
// 字母
$verification_code="";
for($i=0;$i<4;$i++)
{
  $fontsize = 6 ;//设置字体大小
  $fontcolor = imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));//对字体进行作色
  $data='abcdefghijkmnpqrstuvwsy3456789';//验证码从这里随机选择数字
  $fontcontent = substr($data,rand(0,strlen($data)),1);//从$data中分个出一个字母或则数字
  $verification_code.= $fontcontent ;
  $x = ($i*100/4) + rand(5,10);//开始绘制坐标
  $y = rand(5,10);

  imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
}

 $_SESSION['verification_code']=$verification_code;

//干扰点
for($i=0;$i<200;$i++)
{
  $pointercolor = imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
  imagesetpixel($image,rand(1,99),rand(1,29),$pointercolor);
}
//干扰线
for($i=0;$i<3;$i++){
  $linecolor = imagecolorallocate($image,rand(80,220),rand(80,220),rand(80,220));
  imageline($image,rand(1,99),rand(1,99),rand(1,99),rand(1,99),$linecolor);
}
header('content-type:image/png');
imagepng( $image );
imagedestroy( $image );

?>