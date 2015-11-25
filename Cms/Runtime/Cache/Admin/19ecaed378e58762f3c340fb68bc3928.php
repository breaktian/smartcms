<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="/smartcms/Public/css/admin.css" />
<script type="text/javascript" src="/smartcms/Public/js/jquery-1.4a2.min.js"></script>
<script type="text/javascript" src="/smartcms/Public/js/admin_top_nav.js"></script>
</head>
<body id="top">

<h1>LOGO</h1>

<ul>
	<li style="display:block;" onclick="admin_top_nav($(this).index())" class="nav select"><a href="<?php echo U('Index/sidebar');?>"  target="sidebar">首页</a></li>
	<?php if($data['content'] == 1): ?><li style="display:block;" onclick="admin_top_nav($(this).index())" class="nav"><a href="<?php echo U('Content/sidebar');?>" target="sidebar">内容</a></li><?php endif; ?>
</ul>

<p>
	您好，<strong><?php echo ($name); ?></strong> [ <a href="/smartcms/index.php" target="_blank" style="color:#FFFFFF;">去首页</a> ] [ <a href="<?php echo U('Index/logout');?>" target="_parent" class="a" style="color:red;font-weight:bold;">注销</a> ]
</p>

</body>
</html>