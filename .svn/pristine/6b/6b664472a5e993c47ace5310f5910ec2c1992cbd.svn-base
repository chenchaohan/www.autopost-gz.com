<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','admin');
?>
<script type="text/javascript">
<!--
	$(function(){
	$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, function(){this.close();$(obj).focus();})}});
	$("#type_name").formValidator({onshow:"<?php echo L("input").L('type_name')?>",onfocus:"<?php echo L("input").L('type_name')?>"}).inputValidator({min:1,onerror:"<?php echo L("input").L('type_name')?>"}).ajaxValidator({type : "get",url : "",data :"m=link&c=link&a=public_check_name&typeid=<?php echo $typeid;?>",datatype : "html",async:'false',success : function(data){	if( data == "1" ){return true;}else{return false;}},buttons: $("#dosubmit"),onerror : "<?php echo L('type_name').L('exists')?>",onwait : "<?php echo L('connecting')?>"}).defaultPassed(); 
	 
	})
//-->
</script>
				<div class="pad-lr-10">
				<p><span style="padding-right:6px;">请选择表单:</span>
                	<a style="color:#004499; padding-right:6px;" href="index.php?m=form&c=admin_form&a=yuyue&lan=1"><?php echo L('caigou'); ?></a>
                	<a style="color:#004499; padding-right:6px;" href="index.php?m=form&c=admin_form&a=caigoum"><?php echo L('caigoum'); ?></a>
                	<a style="color:#004499; padding-right:6px;" href="index.php?m=form&c=admin_form&a=canzhan"><?php echo L('canzhan'); ?></a>
                	<a style="color:#004499; padding-right:6px;" href="index.php?m=form&c=admin_form&a=tezhuang"><?php echo L('tezhuang'); ?></a>
					<a style="color:#004499; padding-right:6px;" href="index.php?m=form&c=admin_form&a=yuyue&lan=2"><?php echo L('采购表-英文'); ?></a>
                </p><br/>
            <h2 style="text-align:center"><?php echo L('caigou'); ?></h2>
			<form name="myform" action="?m=form&c=admin_form&a=listorder" method="post">
				<div class="table-list">
					<table width="100%" cellspacing="0">
						<thead>
							<tr>
								<th width="75" align="left"><label for="check_box"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></label></th>
								<th align="left"><?php echo L('姓名'); ?></th>
								<th align="left"><?php echo L('职务'); ?></th>
								<th align="left"><?php echo L('邮件'); ?></th>
								<th align="left"><?php echo L('手机'); ?></th>
								<th align="left"><?php echo L('公司名称'); ?></th>
								<th align="left"><?php echo L('国家'); ?></th>
								<th align="left"><?php echo L('电话'); ?></th>
								<th align="left"><?php echo L('传真'); ?></th>
								<th align="left"><?php echo L('性别'); ?></th>
								<th align="left"><?php echo L('地址'); ?></th>
								<th align="left"><?php echo L('邮编'); ?></th>
								<th align="left"><?php echo L('网址'); ?></th>
								<th align="left"><?php echo L('LED展的建议'); ?></th>
                                <th align="left"><?php echo L('购买意向'); ?></th>
								<th align="left"><?php echo L('想采购LED产品'); ?></th>
								<th align="left"><?php echo L('留言'); ?></th>
								<th align="left"><?php echo L('随机码'); ?></th>
								<th align="left"><?php echo L('添加时间'); ?></th>
								<!--<th align="left"><?php echo L('submit_date'); ?></th>
								<th align="left"><?php echo L('operations_manage'); ?></th>-->
							</tr>
						</thead>
					<tbody>
					<?php
					if(is_array($data)) {
						foreach($data as $form) {
					?>
						<tr>
							<td align="left">
								<label for="check_box_<?php echo $form['id']; ?>"><input type="checkbox" name="id[]" value="<?php echo $form['id']; ?>" id="check_box_<?php echo $form['id']; ?>"></label>
							</td>
							<td align="left"><?php echo $form['name']; ?></td>
							<td align="left"><?php echo $form['position']; ?></td>
							<td align="left"><?php echo $form['email']; ?></td>
							<td align="left"><?php echo $form['mobile']; ?></td>
							<td align="left"><?php echo $form['company_name']; ?></td>
							<td align="left"><?php echo $form['country']; ?></td>
							<td align="left"><?php echo $form['tel']; ?></td>
							<td align="left"><?php echo $form['fax']; ?></td>
							<td align="left"><?php echo $form['sex']; ?></td>
							<td align="left"><?php echo $form['address']; ?></td>
							<td align="left"><?php echo $form['zip']; ?></td>
							<td align="left"><?php echo $form['website']; ?></td>
							<td align="left"><?php echo $form['about_isle']; ?></td>
							<td align="left"><?php echo $form['sign_product']; ?></td>
							<td align="left"><?php echo $form['led_product']; ?></td>
							<td align="left"><?php echo $form['suggestion']; ?></td>
                            <td align="left"><?php echo $form['suijima']; ?></td>
							<td align="left"><?php if($form['create_time'])echo date('Y-m-d H:i:s', $form['create_time']); ?></td>
							<!--<td align="left"><?php echo date('Y-m-d H:i:s', $form['dateline']); ?></td>
								<td align="left">
								<a href="?m=form&c=index&a=show&id=<?php echo $form['id']; ?>" title="<?php echo L('view'); ?>" target="_blank"><?php echo L('view'); ?></a></a>
							</td>-->
						</tr>
					<?php
						}
					}
					?>
				</tbody>
					</table>
					<!--<div class="btn">
						<label for="check_box" style="margin: 0 10px 0 0;"><?php echo L('selected_all'); ?>/<?php echo L('cancel'); ?></label>
						<input name="submit" type="submit" class="button" value="<?php echo L('remove_all_selected'); ?>" onClick="document.myform.action='?m=form&c=admin_form&a=delete';return confirm('<?php echo L('affirm_delete'); ?>');">
					</div>-->
				</div>
				<div id="pages"><?php echo $this->db->pages; ?></div>
			</form>
		</div>
	</body>
</html>