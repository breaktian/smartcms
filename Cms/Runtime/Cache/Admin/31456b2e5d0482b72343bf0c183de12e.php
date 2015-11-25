<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>单页</title>
<link rel="stylesheet" type="text/css" href="/smartcms/Public/css/admin.css" />

</head>
<body id="addadmin">

<div class="title">
	<a class="selected" href="<?php echo U('Content/page');?>?id=<?php echo ($column["id"]); ?>"><?php echo ($column["name"]); ?></a>
</div>

<form action="<?php echo U('Content/pagePost');?>" method="post" class="form auto">
	<dl>
		<dd><label>标<span style="color:#FFFFFF;">标</span>题：</label><input type="text" name="title" <?php if(!empty($content)): ?>value="<?php echo ($content["title"]); ?>"<?php endif; ?> placeholder="输入标题" style="width:420px;"/></dd>
		<dd><label>关键词：</label><input type="text" name="keywords" placeholder="关键词用逗号隔开" <?php if(!empty($content)): ?>value="<?php echo ($content["keywords"]); ?>"<?php endif; ?> style="width:420px;"/></dd>
		<dd><label>内<span style="color:#FFFFFF;">内</span>容：</label>
		
<script type="text/javascript" charset="utf-8" src="/smartcms/Public/UEditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/smartcms/Public/UEditor/ueditor.all.js"></script>
<script type="text/plain" id="info" name="content" style=""><?php if(!empty($content)): echo (stripslashes(htmlspecialchars_decode($content["content"]))); endif; ?></script>
<script type="text/javascript">var ue_info = UE.getEditor("info");</script>

		</dd>
		<dd><label>状态：</label>
		<input type="radio" name="isshow" value="1" <?php if(!empty($content)): if($content["isshow"] == 1): ?>checked="checked"<?php endif; endif; ?> />发布
		<input type="radio" name="isshow" value="0"  <?php if(!empty($content)): if($content["isshow"] == 0): ?>checked="checked"<?php endif; endif; ?>/>不发布
		</dd>
		<dd><label>日期：</label><input type="date" name="issuedate" <?php if(!empty($content)): ?>value="<?php echo ($content["issuedate"]); ?>"<?php endif; ?>/>  <input type="time" name="issuetime" <?php if(!empty($content)): ?>value="<?php echo ($content["issuetime"]); ?>"<?php endif; ?>/></dd>
		
		<input type="hidden" name="columnid" value="<?php echo ($column["id"]); ?>"/>
		<input type="submit" value="保存内容" class="submit" onclick=""/>
	</dl>

</form>

</body>
</html>