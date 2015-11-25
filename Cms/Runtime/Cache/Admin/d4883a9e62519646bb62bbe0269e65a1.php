<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>管理员管理</title>
<link rel="stylesheet" type="text/css" href="/smartcms/Public/css/admin.css" />
</head>
<body>

<div class="title">
	<a class="selected" href="<?php echo U('Index/admin');?>">管理员列表</a>
	<a class="a" href="<?php echo U('Index/addAdmin');?>">新增管理员</a>
</div>

<table class="table auto">
<tr><th>编号</th><th>管理员名称</th><th>角色</th><th>最近登录时间</th><th>登录次数</th><th>创建时间</th><th>操作</th></tr>
<?php if(is_array($admins)): $i = 0; $__LIST__ = $admins;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	<td><?php echo ($key+1); ?></td>
	<td><?php echo ($vo['username']); ?></td>
	<td><?php echo ($vo['role']['name']); ?></td>
	<td><?php echo ($vo['logintime']); ?></td>
	<td><?php echo ($vo['logincount']); ?></td>
	<td><?php echo ($vo['createtime']); ?></td>
	<td>
	<a class="a" href="<?php echo U('Index/modAdmin');?>?id=<?php echo ($vo['id']); ?>">修改</a>
	|
	<a class="a" href="<?php echo U('Index/delAdmin');?>?id=<?php echo ($vo['id']); ?>">删除</a>
	</td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>




</body>
</html>