<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>后台首页</title>
<link rel="stylesheet" type="text/css" href="/smartcms/Public/css/admin.css" />
</head>
<body>

	<dl class="box main">
		<dt>我的个人信息</dt>
		<dd>角色：<?php echo ($data['role']); ?></dd>
		<dd>登录时间：<?php echo ($data['logintime']); ?></dd>
		<dd>登陆次数：<?php echo ($data['logincount']); ?></dd>
		<dd><a href="<?php echo U('Index/modPass');?>">修改密码</a></dd>
	</dl>
	<dl class="box main">
		<dt>系统信息</dt>
		<dd>操作系统：<?php echo ($data['php_os']); ?></dd>
		<dd>ip地址：<?php echo ($data['remote_addr']); ?></dd>
		<dd>服务器信息：<?php echo ($data['server_software']); ?></dd>
		<dd>mysql版本：<?php echo ($data['sql_version']); ?></dd>
	</dl>	
	<dl class="box main">
		<dt>开发团队</dt>
		<dd>UI设计：张二狗</dd>
		<dd>主程序：breaktian</dd>
		<dd>公司：<a href="http://www.hbounty.com" class="a" target="_blank">赏金网络科技工作室</a></dd>
		<dd>联系方式：1124920783(QQ)、15010259907(电话)</dd>
	</dl>	

</body>
</html>