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
			<th width="80" align="center"><?php echo L('公司地址')?></th>
			<th width="80" align="center"><?php echo L('展会名称')?></th>
			<th width="80" align="center"><?php echo L('公司簡介')?></th>
			<th width="80" align="center"><?php echo L('公司網址')?></th>
			<th width="80" align="center"><?php echo L('電子郵箱')?></th>
			<th width="80" align="center"><?php echo L('參展産品')?></th>
			<th width="80" align="center"><?php echo L('产品类别')?></th>
			<th width="80" align="center"><?php echo L('業務性質')?></th>
			<th width="80" align="center"><?php echo L('品牌')?></th>
			<th width="80" align="center"><?php echo L('負責人')?></th>
			<th width="80" align="center"><?php echo L('手機')?></th>
			<th width="80" align="center"><?php echo L('電話')?></th>
			<th width="80" align="center"><?php echo L('傳真')?></th>
			<th width="12%" align="center"><?php echo L('産品特色')?></th>
			<th width="12%" align="center"><?php echo L('添加时间')?></th>
		</tr>
	</thead>
<tbody>
	<?php 
		foreach((array)$list as $item){?>
		<tr>
			<td align="center" width="35"><input type="checkbox" name="id[]" value="<?php echo $item['id']?>"></td>
			<td width="80"><?=$item['company_name'];?></td>
			<td width="80"><?=$item['company_addr'];?></td>
			<td width="80"><?=$item['exhibition_name'];?></td>
			<td width="80"><?=$item['company_des'];?></td>
			<td width="80"><?=$item['company_weburl'];?></td>
			<td width="80"><?=$item['email'];?></td>
			<td width="80"><?=$item['product'];?></td>
			<td width="80"><?=$item['pro_type'];?></td>
			<td width="80"><?=$item['business'];?></td>
			<td width="80"><?=$item['brand'];?></td>
			<td width="80"><?=$item['linkman'];?></td>
			<td width="80"><?=$item['mobile'];?></td>
			<td width="80"><?=$item['tel'];?></td>
			<td width="80"><?=$item['fax'];?></td>
			<td width="12%"><?=$item['pro_feature'];?></td>
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
