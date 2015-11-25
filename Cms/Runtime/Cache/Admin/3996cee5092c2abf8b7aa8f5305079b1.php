<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>sidebar</title>
<link rel="stylesheet" type="text/css" href="/smartcms/Public/css/admin.css" />
<script type="text/javascript" src="/smartcms/Public/js/jquery-1.4a2.min.js"></script>
<script type="text/javascript" src="/smartcms/Public/js/sidebar_content_click.js"></script>
</head>
<body class="sidebar_content">
<dl>
	<dt>内容管理</dt>
	<?php if(is_array($columns)): $i = 0; $__LIST__ = $columns;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd <?php if($vo["count"] == 0): ?>style="font-weight: bold;"<?php endif; ?> onclick="sidebar_content_click($(this).index())" class="sidebar-content">
		<?php if($vo["count"] != 0): ?><span style="font-size:12px;color:#CCCCCC;padding-left: <?php echo ($vo['count']*8); ?>px;">|-</span><?php endif; ?><a <?php if($vo["class"] == 2): ?>href="<?php echo U('Content/page');?>?id=<?php echo ($vo["id"]); ?>"<?php else: ?>href="<?php echo U('Content/news');?>?id=<?php echo ($vo["id"]); ?>"<?php endif; ?> target="main">
		<?php echo ($vo["name"]); ?>
		</a>
		</dd><?php endforeach; endif; else: echo "" ;endif; ?>
</dl>

</body>
</html>