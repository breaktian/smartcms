<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>sidebar</title>
<link rel="stylesheet" type="text/css" href="/smartcms/Public/css/admin.css" />
</head>
<body class="sidebar">
<dl>
	<dt>管理首页</dt>
	<dd><a href="<?php echo U('Index/main');?>" target="main">后台首页</a></dd>
	<?php if($data['admin'] == 1): ?><dd><a href="<?php echo U('Index/admin');?>" target="main">管理员管理</a></dd><?php endif; ?>
	<?php if($data['role'] == 1): ?><dd><a href="<?php echo U('Index/role');?>" target="main">角色管理</a></dd><?php endif; ?>
	<?php if($data['column'] == 1): ?><dd><a href="<?php echo U('Index/column');?>" target="main">栏目管理</a></dd><?php endif; ?>

</dl>

</body>
</html>