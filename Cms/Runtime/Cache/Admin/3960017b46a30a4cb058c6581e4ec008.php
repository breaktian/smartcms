<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>新增管理员</title>
<link rel="stylesheet" type="text/css" href="/smartcms/Public/css/admin.css" />
</head>
<body id="addadmin">

<div class="title">
	<a class="a" href="<?php echo U('Index/admin');?>">管理员列表</a>
	<a class="selected" href="<?php echo U('Index/addAdmin');?>">新增管理员</a>
</div>

<form action="<?php echo U('Index/addAdminPost');?>" method="post" class="form auto">
	<dl>
		<dd><label>账号：</label><input type="text" name="username" placeholder="输入账号"/></dd>
		<dd><label>密码：</label><input type="password" name="password" placeholder="密码"/></dd>
		<dd><label>角色：</label>
			<select name="roleid">
				<?php if(is_array($roles)): $k = 0; $__LIST__ = $roles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><option value ="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</dd>
		<input type="submit" value="新增管理员" class="submit" onclick=""/>
	</dl>

</form>


</body>
</html>