<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('content', 'header'); ?>
<link href="<?php echo CSS_PATH;?>table_form.css" rel="stylesheet" type="text/css" />
<link href="<?php echo LED_PATH;?>css/news.css?v=1" rel="stylesheet" />

<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>formvalidator.js" charset="UTF-8"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>formvalidatorregex.js" charset="UTF-8"></script>

<style type="text/css">


</style>
<script type="text/javascript">
<!--
	$(function(){
	$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){}});

	$("#company_name").formValidator({onshow:"<?php echo L("input").L('公司名称')?>",onfocus:"<?php echo L("input").L('公司名称')?>"}).inputValidator({min:1,onerror:"<?php echo L("input").L('公司名称')?>"});

	$("#company_addr").formValidator({onshow:"<?php echo L("input").L('公司地址')?>",onfocus:"<?php echo L("input").L('公司地址')?>"}).inputValidator({min:1,onerror:"<?php echo L("input").L('公司地址')?>"});

	$("#linkman").formValidator({onshow:"<?php echo L("input").L('联系人')?>",onfocus:"<?php echo L("input").L('联系人')?>"}).inputValidator({min:1,onerror:"<?php echo L("input").L('联系人')?>"});
	
	$("#mobile").formValidator({onshow:"<?php echo L("input").L('手机号码')?>",onfocus:"<?php echo L("input").L('手机号码')?>"}).inputValidator({min:1,onerror:"<?php echo L("input").L('手机号码')?>"})

 	$("#tel").formValidator({onshow:"<?php echo L("input").L('电话')?>",onfocus:"<?php echo L("input").L('电话')?>"}).inputValidator({min:1,onerror:"<?php echo L("input").L('电话')?>"})

	$("#email2").formValidator({onshow:"<?php echo L("input").L('邮箱')?>",onfocus:"<?php echo L("input").L('邮箱')?>"}).inputValidator({min:1,onerror:"<?php echo L("input").L('邮箱')?>"})

	$("#area").formValidator({onshow:"<?php echo L("input").L('申请展位面积')?>",onfocus:"<?php echo L("input").L('申请展位面积')?>"}).inputValidator({min:1,onerror:"<?php echo L("input").L('申请展位面积')?>"})
	
	});
//-->
</script>
<!-- main start  -->
   <div class="container comm">
     <div class="lt">
		<?php include template("content","left_box"); ?>
	</div>

      <div class="w_prd_right_content">

         <form id="myform" name="myform" action="" method="post">
           <table class="w_prd_purchase" cellpadding="0" cellspacing="0">
			<tr>
               <td class="name">选择你产品的属性：</td>
			   <td colspan="" style="  color: #3c3c3c; font-weight: bold;font-size: 14px;">
					<input type="radio" name="product_type" checked value="1">汽车用品
					&nbsp;&nbsp;&nbsp;
					<input type="radio" name="product_type" value="2">汽车配件及售后服务
				</td>
             </tr>
             <tr>
               <td class="name">公司名称：</td><td colspan="3">
			   <input type="text" class="ipbox_full" name="company_name" id="company_name"></td>
             </tr>
             <tr>
               <td class="name">公司地址：</td><td colspan="3">
			   <input type="text" class="ipbox_full" name="company_addr" id="company_addr"></td>
             </tr>
             <tr>
               <td class="name">联系人：</td><td colspan="3">
			   <input type="text" class="ipbox_full" name="linkman" id="linkman"></td>
             </tr>
             <tr>
               <td class="name">手机：</td><td colspan="3">
			   <input type="text" class="ipbox" name="mobile" id="mobile"></td>
             </tr>
             <tr>
               <td class="name">电话：</td><td>
			   <input type="text" class="ipbox" name="tel" id="tel" placeholder="格式：020-5568855"></td>
             </tr>
             <tr>
               <td class="name">邮箱：</td><td>
			   <input type="text" class="ipbox" name="email" id="email2"></td>
             </tr>
             <tr>
               <td class="name">申请展位面积：</td><td>
			   <input type="text" class="ipbox" name="area" id="area">/㎡</td>
             </tr>
             <tr>
               <td class="name">展品内容：</td><td>
			   <textarea name="content" id="content"></textarea></td>
             </tr>

           </table>
           <input type="submit" name="dosubmit" class="w_prd_purchase_config" value="提交">

         <form>

      </div>


   </div>


  <?php include template('content', 'footer'); ?>