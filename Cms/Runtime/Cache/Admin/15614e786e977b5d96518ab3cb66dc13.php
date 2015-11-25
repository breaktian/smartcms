<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>栏目管理</title>
<link rel="stylesheet" type="text/css" href="/smartcms/Public/css/admin.css" />
</head>
<body>

<div class="title">
	<a class="selected" href="<?php echo U('Index/column');?>">栏目列表</a>
	<a class="a" href="<?php echo U('Index/addColumn');?>">新增栏目</a>
</div>

<table class="table auto">
<tr><th>编号</th><th>栏目名称</th><th>栏目种类</th><th>排序</th><th>创建时间</th><th>操作</th></tr>
<?php if(is_array($columns)): $i = 0; $__LIST__ = $columns;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		<td><?php echo ($key+1); ?></td>
		<td style="text-align:left;padding-left:50px;text-indent: <?php echo ($vo['count']*30); ?>px;"><?php if($vo["parentid"] != 0): ?><span style="color:#D0D0D0;">|-- </span><?php endif; echo ($vo["name"]); ?></td>
		<td><?php echo ($vo['class']['name']); ?></td>
		<td><?php echo ($vo['sort']); ?></td>
		<td><?php echo ($vo['createtime']); ?></td>
		<td>
		<a class="a" href="<?php echo U('Index/modColumn');?>?id=<?php echo ($vo['id']); ?>">修改</a>
		|
		<a class="a" href="<?php echo U('Index/delColumn');?>?id=<?php echo ($vo['id']); ?>">删除</a>
		</td>
	</tr><?php endforeach; endif; else: echo "" ;endif; ?>	
	
</table>




</body>
</html>