<?php if (!defined('THINK_PATH')) exit();?>	<table class="table auto">
	<tr><th>编号</th><th>标题</th><th>关键字</th><th>状态</th><th>发布日期</th><th>添加时间</th><th>操作</th></tr>
	<?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		<td><?php echo ($key+1); ?></td>
		<td><?php echo ($vo['title']); ?></td>
		<td><?php echo ($vo['keywords']); ?></td>
		<td><?php if($vo["isshow"] == 1): ?>发布<?php else: ?>未发布<?php endif; ?></td>
		<td><?php echo ($vo['issuedate']); ?> <?php echo ($vo['issuetime']); ?></td>
		<td><?php echo ($vo['addtime']); ?></td>
		<td>
		<a class="a" href="<?php echo U('Content/modNews');?>?id=<?php echo ($vo['id']); ?>">修改</a>
		|
		<a class="a" href="<?php echo U('Content/delNews');?>?id=<?php echo ($vo['id']); ?>">删除</a>
		</td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	
	
	<div class="auto page" style="margin-top:10px;text-align: center;">
		<?php echo ($page); ?>
	</div>