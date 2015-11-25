<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>角色管理</title>
<link rel="stylesheet" type="text/css" href="/smartcms/Public/css/admin.css" />
</head>
<body>

<div class="title">
	<a class="selected" href="<?php echo U('Index/role');?>">角色列表</a>
	<a class="a" href="<?php echo U('Index/addRole');?>">新增角色</a>
</div>

<table class="table auto">
<tr><th>编号</th><th>角色名称</th><th>权限</th><th>创建时间</th><th>操作</th></tr>
<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	<td><?php echo ($key+1); ?></td>
	<td><?php echo ($vo['name']); ?></td>
	<td style="text-align:left;">
	<?php if(is_array($vo['permission'])): $i = 0; $__LIST__ = $vo['permission'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><label class="permission"><?php echo ($sub[0]['name']); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
	</td>
	<td><?php echo ($vo['createtime']); ?></td>
	<td>
	<a class="a" href="<?php echo U('Index/modRole');?>?id=<?php echo ($vo['id']); ?>">修改</a>
	|
	<a class="a" href="<?php echo U('Index/delRole');?>?id=<?php echo ($vo['id']); ?>">删除</a>
	</td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>


</body>
</html>