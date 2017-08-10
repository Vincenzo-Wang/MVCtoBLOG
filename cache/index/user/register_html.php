<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Internship Sign In & 黑 聪哥之路 在此开启</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Internship Sign In & Sign Up Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="public/index/css/loginfont-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="public/index/css/loginsnow.css" rel="stylesheet" type="text/css" media="all" />
<link href="public/index/css/loginstyle.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<!--<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
-->
<!-- //web font -->
</head>
<body>
<div class="snow-container">
			  <div class="snow foreground"></div>
			  <div class="snow foreground layered"></div>
			  <div class="snow middleground"></div>
			  <div class="snow middleground layered"></div>
			  <div class="snow background"></div>
			  <div class="snow background layered"></div>
			</div>

<div class="top-buttons-agileinfo">
<a href="?m=index&c=user&a=login">登录</a><a href="m=index&c=user&a=register" class="active">注册</a>
</div>
<h1>黑 聪哥之路 在此开启</h1>
<div class="main-agileits">
<!--form-stars-here-->
	
	
		<div class="form-w3-agile">
			<h2 class="sub-agileits-w3layouts">加入</h2>
			<form action="?m=index&c=user&a=doregister" method="post">
					<input type="text" name="username" placeholder="昵称"  required="required" />
					<input type="password" name="password" placeholder="密码" />
					<input type="password" name="confirm" placeholder="确认密码"  />
					<input type="Email" name="email" placeholder="请输入您的邮箱" />
					<input type="text" name="phone" placeholder="手机号" id='mobile' width="150px"> 

					<button id='sendmsg' height="50px" width="100px">获取验证码</button>
					<input type="text" name="code" class='code' placeholder="验证码">
                	
				<div class="submit-w3l">
					<input type="submit" value="Sign up">
				</div>
			</form>
		</div>
		</div>
<!--//form-ends-here-->
<!-- copyright -->
	<div class="copyright w3-agile">
		<p> © 2017 Internship Sign In & Sign Up Form . All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
	</div>
	<!-- //copyright --> 
	<script type="text/javascript" src="public/index/js/loginjquery-2.1.4.min.js"></script>

</body>
<script type="text/javascript">
    //验证手机号
    $("#mobile").blur(function(){
        var value = $(this).val();
        //console.log(value,typeof value);
        if ( 0 == value.lenght || "" == value) {
            //alert("手机号不能为空！")
            $(this).focus();
        } else {
            // $.post('index.php?c=user&a=sendSMS',{phone:value},function(data){
            //     if (data) {
            //         alert("手机号重复！");
            //     }
            // });
        }
         
    });
 
    var InterValObj; //timer变量，控制时间
    var count = 60; //间隔函数，1秒执行
    var curCount;//当前剩余秒数
    var code = ""; //验证码
    var codeLength = 6;//验证码长度
 
    $('#sendmsg').click(function () {
        var phone = $("#mobile").val();
        console.log(phone);
        $.post('index.php?c=user&a=sendSMS',{mobile:phone},function(data){
            if(data){
                        console.log(data);
                        curCount = count;
                       //设置button效果，开始计时
                       $("#sendmsg").css("background-color", "LightSkyBlue");
                       $("#sendmsg").attr("disabled", "true");
                       $("#sendmsg").html("获取" + curCount + "秒");
                       InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
                      // alert("验证码发送成功，请查收!");
                  }
        });
       
        return false;
    })
 
    function SetRemainTime() {
        if (curCount == 0) {
            window.clearInterval(InterValObj);//停止计时器
            $("#sendmsg").removeAttr("disabled");//启用按钮
            $("#sendmsg").css("background-color", "");
            $("#sendmsg").html("重发验证码");
            code = ""; //清除验证码。如果不清除，过时间后，输入收到的验证码依然有效
        }
        else {
            curCount--;
            $("#sendmsg").html("获取" + curCount + "秒");
        }
    }
</script>

</html>