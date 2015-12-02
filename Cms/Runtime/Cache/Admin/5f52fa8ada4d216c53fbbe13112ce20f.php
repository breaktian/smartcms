<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>新增管理员</title>
<link rel="stylesheet" type="text/css" href="/smartcms/Public/css/admin.css" />
</head>
<body id="addadmin">

<div class="title">
	<a class="a" href="<?php echo U('Index/column');?>">栏目列表</a>
	<a class="selected" href="<?php echo U('Index/addColumn');?>">新增栏目</a>
</div>

<form action="<?php echo U('Index/addColumnPost');?>" method="post" class="form auto">
	<dl>
		<dd><label>栏目名称：</label><input type="text" name="name" placeholder="输入栏目名称"/></dd>
		<dd><label>父级栏目：</label>
			<select name="parentid">
				<option value ="0">- -</option>
				<?php if(is_array($columns)): $k = 0; $__LIST__ = $columns;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><option value ="<?php echo ($vo["id"]); ?>"><?php $__FOR_START_27909__=0;$__FOR_END_27909__=$vo["count"];for($i=$__FOR_START_27909__;$i < $__FOR_END_27909__;$i+=1){ ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</dd>
		<dd><label>栏目种类：</label>
			<select name="class">
				<?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value ="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</dd>
		<dd><label>栏目排序：</label><input type="number" name="sort" placeholder="输入排序"/></dd>
		<input type="submit" value="新增栏目" class="submit" onclick=""/>
	</dl>

</form>


</body>
</html>