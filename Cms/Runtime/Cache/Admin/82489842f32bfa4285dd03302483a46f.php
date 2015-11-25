<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>新增管理员</title>
<link rel="stylesheet" type="text/css" href="/smartcms/Public/css/admin.css" />

</head>
<body id="addadmin">

<div class="title">
	<a class="a" href="<?php echo U('Content/news');?>?id=<?php echo ($column["id"]); ?>"><?php echo ($column["name"]); ?></a>
	<a class="a" href="<?php echo U('Content/addNews');?>?id=<?php echo ($column["id"]); ?>">新增</a>
	<a class="selected" href="<?php echo U('Content/modNews');?>?id=<?php echo ($content["id"]); ?>">修改</a>
</div>

<form action="<?php echo U('Content/modNewsPost');?>" method="post" class="form auto">
	<dl>
		<dd><label>标<span style="color:#FFFFFF;">标</span>题：</label><input type="text" name="title" placeholder="输入标题" value="<?php echo ($content["title"]); ?>" style="width:420px;"/></dd>
		<dd><label>关键词：</label><input type="text" name="keywords" placeholder="关键词用逗号隔开" value="<?php echo ($content["keywords"]); ?>" style="width:420px;"/></dd>
		<dd><label>内<span style="color:#FFFFFF;">内</span>容：</label>
		
<script type="text/javascript" charset="utf-8" src="/smartcms/Public/UEditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/smartcms/Public/UEditor/ueditor.all.js"></script>
<script type="text/plain" id="info" name="content" style=""><?php echo (stripslashes(htmlspecialchars_decode($content["content"]))); ?></script>
<script type="text/javascript">var ue_info = UE.getEditor("info");</script>

		</dd>
		<dd><label>状态：</label>
		<input type="radio" name="isshow" value="1" <?php if($content["isshow"] == 1): ?>checked="checked"<?php endif; ?> />发布
		<input type="radio" name="isshow" value="0"  <?php if($content["isshow"] == 0): ?>checked="checked"<?php endif; ?>/>不发布
		</dd>
		<dd><label>日期：</label><input type="date" name="issuedate" value="<?php echo ($content["issuedate"]); ?>"/>  <input type="time" name="issuetime" value="<?php echo ($content["issuetime"]); ?>"/></dd>
		
		<input type="hidden" name="id" value="<?php echo ($content["id"]); ?>"/>
		<input type="hidden" name="columnid" value="<?php echo ($column["id"]); ?>"/>
		<input type="submit" value="修改内容" class="submit" onclick=""/>
	</dl>

</form>

</body>
</html>