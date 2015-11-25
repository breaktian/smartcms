<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>


<form action="<?php echo U('Register/reg');?>" method="post" id="register">
	<fieldset>
	<legend>注册</legend>
		<label>用户名：<input type="text" name="name" placeholder="请输入用户名"/></label>
		<label>密<span class="passplace">密</span>码：<input type="password" name="pass" placeholder="请输入密码"/></label>
		<label>验证码：<input type="text" name="verify" class="verify" placeholder="请输入验证码"/><img src="<?php echo U('Login/verify');?>" class="verify" onClick="this.src=this.src+'?'+Math.random()"/></label>
		<input type="submit" name="submit" value="登录后台" class="submit" onclick=""/>
		<span class="reg"><a href="<?php echo U('Login/forgetpass');?>" class="a">忘记密码</a>    |    <a href="<?php echo U('Register/index');?>" class="a">注册</a></span>
	</fieldset>
</form>


</body>
</html>