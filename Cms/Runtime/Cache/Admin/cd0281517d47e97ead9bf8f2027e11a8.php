<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>修改密码</title>
<link rel="stylesheet" type="text/css" href="/smartcms/Public/css/admin.css" />
</head>
<body id="addadmin">

<div class="title">
	<a class="selected" href="<?php echo U('Index/modPass');?>">修改密码</a>
</div>

<form action="<?php echo U('Index/modPassPost');?>" method="post" class="form auto">
	<dl>
		<dd><label>原密码：</label><input type="password" name="oldpassword" placeholder="原密码"/></dd>
		<dd><label>新密码：</label><input type="password" name="newpassword" placeholder="新密码"/></dd>
		<input type="submit" value="修改密码" class="submit" onclick=""/>
	</dl>

</form>


</body>
</html>