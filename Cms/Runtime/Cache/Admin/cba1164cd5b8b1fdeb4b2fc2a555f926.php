<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>smartcms内容管理系统后台操作</title>
</head>
<frameset rows="80px,*" border="0">
	<frame src="<?php echo U('Index/top');?>" noresize="true" scrolling="no" />
	<frameset cols="180px,*" border="0">
		<frame src="<?php echo U('Index/sidebar');?>" name="sidebar" noresize="true" scrolling="no" />
		<frame src="<?php echo U('Index/main');?>" name="main" noresize="true" />
	</frameset>
</frameset>
</html>