<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>sidebar</title>
<link rel="stylesheet" type="text/css" href="/smartcms/Public/css/admin.css" />
<script type="text/javascript" src="/smartcms/Public/js/jquery-1.4a2.min.js"></script>
<script type="text/javascript" src="/smartcms/Public/js/sidebar_index_click.js"></script>

</head>
<body class="sidebar">
<dl>
	<dt>管理首页</dt>
	<dd onclick="sidebar_index_click($(this).index())" class="sidebar-index"><a href="<?php echo U('Index/main');?>" target="main"><span>></span> 后台首页</a></dd>
	<?php if($data['admin'] == 1): ?><dd onclick="sidebar_index_click($(this).index())" class="sidebar-index"><a href="<?php echo U('Index/admin');?>" target="main"><span>></span> 管理员管理</a></dd><?php endif; ?>
	<?php if($data['role'] == 1): ?><dd onclick="sidebar_index_click($(this).index())" class="sidebar-index"><a href="<?php echo U('Index/role');?>" target="main"><span>></span> 角色管理</a></dd><?php endif; ?>
	<?php if($data['column'] == 1): ?><dd onclick="sidebar_index_click($(this).index())" class="sidebar-index"><a href="<?php echo U('Index/column');?>" target="main"><span>></span> 栏目管理</a></dd><?php endif; ?>

</dl>

</body>
</html>