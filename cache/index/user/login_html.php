<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Internship Sign In & Sign Up Form a Responsive Widget Template :: w3layouts</title>
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
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">-->

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
<a href="?m=index&c=user&a=login"  class="active">登录</a><a href="?m=index&c=user&a=register">注册</a>
</div>
<h1>王昱翰个人博客
</h1>
<div class="main-agileits">
<!--form-stars-here-->
		<div class="form-w3-agile">
			<h2 class="sub-agileits-w3layouts">登录</h2>
			<form action="?m=index&c=user&a=dologin" method="post">
					<input type="text" name="username" placeholder="用户" required="请填写账号" />
					<input type="password" name="password" placeholder="密码" required="请输入密码" />
					<input type="text" class="" name="code" placeholder="填写右侧的验证码" data-validate="required:请填写右侧的验证码" />
                    <img src="?m=index&c=user&a=yzm" alt="" width="100" height="32" class="passcode" style="height:43px;cursor:pointer;" onclick="show();" id='yzm'>  
                   <script>
                        function show()
                        {
                            var obj = document.getElementById('yzm');
                            obj.src = "?m=index&c=user&a=yzm&"+Math.random();
                        }
                   </script>  
					<a href="#" class="forgot-w3layouts">忘记密码 ?</a>
				<div class="submit-w3l">
					<input type="submit" value="登录">
				</div>
				<p class="p-bottom-w3ls"><a href="?m=index&c=user&a=register">点击注册</a>如果你没有一个帐户。
.</p>
			</form>
		</div>
		</div>
<!--//form-ends-here-->
<!-- copyright -->
	<div class="copyright w3-agile">
		<p> © 2017</a></p>
	</div>
	<!-- //copyright --> 
	<script type="text/javascript" src="public/index/js/loginjquery-2.1.4.min.js"></script>

</body>
</html>