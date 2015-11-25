<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>角色管理</title>
<link rel="stylesheet" type="text/css" href="/smartcms/Public/css/admin.css" />
</head>
<body>

<div class="title">
	<a class="a" href="<?php echo U('Index/role');?>">角色列表</a>
	<a class="selected" href="<?php echo U('Index/addRole');?>">新增角色</a>
</div>

<form action="<?php echo U('Index/addRolePost');?>" method="post" class="form auto">
	<dl>
		<dd><label>角色：</label><input type="text" name="rolename" placeholder="输入角色名称"/></dd>
		<dd><label>赋权：</label>
			<div class="checkbox">
			<?php if(is_array($permission)): $i = 0; $__LIST__ = $permission;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label ><input type="checkbox" name="<?php echo ($vo["enname"]); ?>" value="<?php echo ($vo["id"]); ?>"/><?php echo ($vo["name"]); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</dd>
		<input type="submit" value="新增角色" class="submit" onclick=""/>
	</dl>

</form>


</body>
</html>