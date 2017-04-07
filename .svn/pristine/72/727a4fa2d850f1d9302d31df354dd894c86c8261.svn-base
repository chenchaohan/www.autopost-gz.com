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
					<a style="color:#004499; padding-right:6px;" href="index.php?m=form&c=admin_form&a=yuyue&lan=2"><?php echo L('采购表-英文'); ?></a>
                	<a style="color:#004499; padding-right:6px;" href="index.php?m=form&c=admin_form&a=caigoum"><?php echo L('caigoum'); ?></a>
                	<a style="color:#004499; padding-right:6px;" href="index.php?m=form&c=admin_form&a=canzhan"><?php echo L('canzhan'); ?></a>
                	<a style="color:#004499; padding-right:6px;" href="index.php?m=form&c=admin_form&a=tezhuang"><?php echo L('tezhuang'); ?></a>
					
                </p><br/>

				
				<form name="myform" action="" method="get">
					<input type="hidden" name="m" value="form">
					<input type="hidden" name="c" value="admin_form">
					<input type="hidden" name="a" value="yuyue">
					<input type="hidden" name="lan" value="<?=$_GET['lan'];?>">
					展会类型
					<select name="interest_zh">
						<option value="">--全部--</option>
						<option value="1" <?php if($_GET['interest_zh']==1){?> selected <?php } ?>>春季展</option>
						<option value="2" <?php if($_GET['interest_zh']==2){?> selected <?php } ?>>秋季展</option>
						<option value="3" <?php if($_GET['interest_zh']==3){?> selected <?php } ?>>春季展及秋季展</option>
					</select>
					邮件类型
					<select name="status">
						<option value="">--全部--</option>
						<option value="1" <?php if($_GET['status']==1){?> selected <?php } ?>>成功</option>
						<option value="-1" <?php if($_GET['status']==-1){?> selected <?php } ?>>失败</option>
					</select>
					邮箱
					<input type="text" name="email" value="<?=$_GET['email'];?>">
					手机
					<input type="text" name="mobile" value="<?=$_GET['mobile'];?>">
					姓名
					<input type="text" name="name" value="<?=$_GET['name'];?>">

					<?php echo form::date('startdate', $_GET['startdate']?$_GET['startdate']:date('Y-m-d', time()), 1)?>
				<?php echo form::date('enddate', $_GET['enddate']?$_GET['enddate']:date('Y-m-d', time()), 1)?>
					<input type="submit" name="do_search" value="查询">
					<input type="submit" name="do_submit" value="导出">
				</form>
            <h2 style="text-align:center"><?php echo L('caigou'); ?></h2>
			<form name="myform" action="?m=form&c=admin_form&a=send_email" method="post">
				<div class="table-list">
					<table width="100%" cellspacing="0">
						<thead>
							<tr>
								<th align="left"><label for="check_box"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></label></th>
								<th align="left"><?php echo L('展会类型'); ?></th>
								<th align="left"><?php echo L('称呼'); ?></th>
								<th align="left"><?php echo L('姓名'); ?></th>
								
								<?php
								if($_GET['lan']){?>
								<th align="left"><?php echo L('地区'); ?></th>
								<?php } ?>
								<th align="left"><?php echo L('电话'); ?></th>
								<th align="left"><?php echo L('手机'); ?></th>
								<th align="left"><?php echo L('邮件'); ?></th>
								<th align="left"><?php echo L('公司名称'); ?></th>
								<th align="left"><?php echo L('职务'); ?></th>
								<th align="left"><?php echo L('地址'); ?></th>
								<th align="left" style='width:250px;'><?php echo L('意向产品'); ?></th>
                                <th align="left"><?php echo L('得知ISLE方式'); ?></th>
								<th align="left"><?php echo L('建议'); ?></th>
								<th align="left"><?php echo L('随机码'); ?></th>

								<th align="left"><?php echo L('称呼2'); ?></th>
								<th align="left"><?php echo L('姓名2'); ?></th>
								<th align="left"><?php echo L('电话2'); ?></th>
								<th align="left"><?php echo L('手机2'); ?></th>
								<th align="left"><?php echo L('邮件2'); ?></th>
								<th align="left"><?php echo L('公司名称2'); ?></th>
								<th align="left"><?php echo L('职务2'); ?></th>
								<th align="left"><?php echo L('随机码2'); ?></th>
								<th align="left"><?php echo L('邮件状态'); ?></th>
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
							<?php 							
								$arr = array(1=>'春季展',2=>'秋季展',3=>'春季展及秋季展');
							?>
							<td align="left"><?php echo $arr[$form['interest_zh']]; ?></td>
							<td align="left"><?php echo $form['title']; ?></td>
							<td align="left"><?php echo $form['name']; ?></td>
							<?php
								if($_GET['lan']){?>
							<td align="left"><?php $area = get_linkage($form['area'],1);echo !empty($area) ? $area:''; ?></td>
							<?php } ?>
							<td align="left"><?php echo $form['tel']; ?></td>
							<td align="left"><?php echo $form['mobile']; ?></td>
							<td align="left"><?php echo $form['email']; ?></td>
							<td align="left"><?php echo $form['company_name']; ?></td>
							<td align="left"><?php echo $form['position']; ?></td>
							<td align="left"><?php echo $form['address']; ?></td>
							<td align="left"><?php echo $form['interest_product']; ?></td>
							<td align="left"><?php echo $form['learn_isle']; ?></td>
							<td align="left"><?php echo $form['suggestion']; ?></td>
                            <td align="left"><?php echo $form['suijima']; ?></td>

							<td align="left"><?php echo $form['f_title']; ?></td>
							<td align="left"><?php echo $form['f_name']; ?></td>
							<td align="left"><?php echo $form['f_tel']; ?></td>
							<td align="left"><?php echo $form['f_mobile']; ?></td>
							<td align="left"><?php echo $form['f_email']; ?></td>
							<td align="left"><?php echo $form['f_company_name']; ?></td>
							<td align="left"><?php echo $form['f_position']; ?></td>
							<td align="left"><?php echo $form['f_suijima']; ?></td>
							<?php 
								if($form['status']==1){?>
							<td align="left" style="color:green;">成功</td>
							<?php }else if($form['status']=='-1'){?>
							<td align="left" style="color:red;">失败</td>
							<?php }else{?>
							<td align="left" style="color:red;">未发送</td>
							<?php }?>
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
				<div class="btn"> 
				<input type="submit" class="button" name="dosubmit" onClick="document.myform.action='?m=form&c=admin_form&a=send_email'" value="<?php echo L('发送邮件')?>"/>	
</div>
				<div id="pages"><?php echo $this->db_yuyue->pages; ?></div>
			</form>
		</div>
	</body>
</html>
