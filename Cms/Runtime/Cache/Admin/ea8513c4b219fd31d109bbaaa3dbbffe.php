<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>登录后台</title>
<link rel="stylesheet" type="text/css" href="/smartcms/Public/css/admin.css" />
</head>
<body>



<form action="<?php echo U('Login/login');?>" method="post" id="login">
	<fieldset>
	<legend>登录smartcms1.0后台系统</legend>
		<label>用户名：<input type="text" name="name" placeholder="请输入用户名"/></label>
		<label>密<span class="passplace">密</span>码：<input type="password" name="pass" placeholder="请输入密码"/></label>
		<label>验证码：<input type="text" name="verify" class="verify" placeholder="请输入验证码"/><img src="<?php echo U('Login/verify');?>" class="verify" onClick="this.src=this.src+'?'+Math.random()"/></label>
		<input type="submit" value="登录后台" class="submit" onclick=""/>
	</fieldset>
</form>




</body>
</html>