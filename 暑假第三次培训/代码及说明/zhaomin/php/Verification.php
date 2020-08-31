<?php
      session_start();
      $im=imagecreatetruecolor(100,30);
      $bg=imagecolorallocate($im,255,255,255);//背景
      
      imagefill($im,0,0,$bg);
      
       for($i=0;$i<6;$i++){
         $c =imagecolorallocate($im,rand(50,255),rand(50,255),rand(50,255));
         imageline($im,rand(0,100),rand(0,30),rand(0,100),rand(0,30),$c);
       }
     
      for($i=0;$i<200;$i++){
        $c =imagecolorallocate($im,rand(50,255),rand(50,255),rand(50,255));
        imagesetpixel($im,rand(1,99),rand(1,99),$c);
    }
    
    
    $captch_code='';
    for($i=0;$i<4;$i++){
       $fontsize=6;
       $fontcolor=imagecolorallocate($im,rand(0,120),rand(0,120),rand(0,120));
       $data='abcdefghijklmnopqrstuvwxyz1234567890';
       $fontcontent=substr($data,rand(0,strlen($data)),1);
       $captch_code.= $fontcontent;
      $x=($i*100/4)+rand(5,10);
      $y=rand(5,10);
      
      imagestring($im,$fontsize,$x,$y,$fontcontent,$fontcolor);
     }
     
     $_SESSION['authcode']=$captch_code;
     
     header('content-type:image/png');
     imagepng($im);
?>
