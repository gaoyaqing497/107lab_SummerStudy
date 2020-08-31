<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<section id="content">
    <div class="content-header clearfix">
        <a href="javascript:;" class="current">登录</a>
        <a href="javascript:;">注册</a>
    </div>
    <div class="content-body">
        <div class="dom" style="display: block;">
            <form action="doAction.php?act=login" method="post">
                <div class="s1">
                    <h4>用户名</h4>
                    <input name="username" id="" type="text" placeholder="请输入你的账号" required='required'>
                </div>
                <div class="s1">
                    <h4>密码</h4>
                    <input name="password" id="" type="password" placeholder="请输入密码" required='required'>
                </div>
                <div class="captcha s1" style="height: 65px;">
                    <h4>验证码</h4>
                    <input name="authcode" type="text" placeholder="请输入右图验证码" style="width: 200px; float:left" required='required'>
                    <div class="captimg" style="width: 200px;height:auto">
                        <img id="captcha_img" src="captcha.php?r=<?php echo rand();?>" alt="" height="40px" style="margin-top:0px ;float:left">
                        <a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='captcha.php?r='+Math.random()" style="display:block;float:left;font-size: 13px;margin-top:23px;">看不清？</a>
                    </div>

                </div>
                <div class="s2">
                    <input type="checkbox">
                    <span>记住密码</span>
                </div>
                <input type="submit" class="btn" value="登录&nbsp;">
                <p style="text-align:center"><a href="../index.html">返回首页</a></p>

            </form>

        </div>
        <div class="dom">
             <form action="doAction.php?act=addUser&in=1" method="post">
                <div class="s1">
                    <h4>用户名</h4>
                    <input name="username" id="" type="text" placeholder="请输入你的账号" required='required'>
                </div>
                <div class="s1">
                    <h4>密码</h4>
                    <input name="password1" id="" type="password" placeholder="请输入密码" required='required'>
                </div>
                <div class="s1">
                    <h4>确认密码</h4>
                    <input name="password2" id="" type="password" placeholder="请再次输入密码" required='required'>
                </div>
                <div class="captcha s1" style="height: 65px;">
                    <h4>验证码</h4>
                    <input name="authcode" type="text" placeholder="请输入右图验证码" style="width: 200px; float:left">
                    <div class="captimg" style="width: 200px;">
                        <img id="captcha_img2" src="captcha.php?r=<?php echo rand();?>" alt="" height="40px" style="margin-top:0px ;float:left">
                        <a href="javascript:void(0)" onclick="document.getElementById('captcha_img2').src='captcha.php?r='+Math.random()" style="font-size: 13px;display:block;float:left;margin-top:20px">看不清？</a>
                    </div>

                </div>
                <input type="submit" class="btn" value="注册&nbsp;">
            </form>
        </div>
    </div>
</section>

<script>
    window.onload = function () {
        let as = document.getElementsByClassName('content-header')[0].getElementsByTagName('a');
        let contents = document.getElementsByClassName('dom');

        for (let i = 0; i < as.length; i++) {
            let a = as[i];
            a.id = i;

            a.onclick = function () {
                for (let j = 0; j < as.length; j++) {
                    as[j].className = '';
                    contents[j].style.display = 'none';
                }

                this.className = 'current';
                contents[this.id].style.display = 'block';
            }

        }
    }
</script>
</body>
</html>