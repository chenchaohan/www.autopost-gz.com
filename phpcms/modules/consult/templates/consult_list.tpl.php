<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_dialog = 1;
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-lr-10">
<form name="myform" id="myform" action="" method="post" >
<div class="table-list">
<table width="100%" cellspacing="0">
	<thead>
		<tr>
			<th width="35" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
			<th width="80" align="center"><?php echo L('公司名')?></th>
			<th width="80" align="center"><?php echo L('联系人')?></th>
			<th width="80" align="center"><?php echo L('电话')?></th>
			<th width="80" align="center"><?php echo L('邮箱')?></th>
			<th width="80" align="center"><?php echo L('标题')?></th>
			<th width="12%" align="center"><?php echo L('内容')?></th>
			<th width="12%" align="center"><?php echo L('添加时间')?></th>
		</tr>
	</thead>
<tbody>
	<?php 
		foreach((array)$list as $item){?>
		<tr>
			<td align="center" width="35"><input type="checkbox" name="id[]" value="<?php echo $item['id']?>"></td>
			<td width="80"><?=$item['company_name'];?></td>
			<td width="80"><?=$item['linkman'];?></td>
			<td width="80"><?=$item['tel'];?></td>
			<td width="80"><?=$item['email'];?></td>
			<td width="80"><?=$item['title'];?></td>
			<td width="80"><?=$item['content'];?></td>
			<td width="12%" align="center"><?=date('Y-m-d H:i:s',$item['create_time']);?></td>
		</tr>
	<?php } ?>
</tbody>
</table>
</div>
<div id="pages"><?php echo $pages?></div>
</form>
</div>
</body>
</html>
