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

	$("#company_name").formValidator({onshow:"<?php echo L("please input").L('Company Name')?>",onfocus:"<?php echo L("please input").L('Company Name')?>"}).inputValidator({min:1,onerror:"<?php echo L("please input").L('Company Name')?>"});

	$("#company_addr").formValidator({onshow:"<?php echo L("please input").L('Address')?>",onfocus:"<?php echo L("please input").L('Address')?>"}).inputValidator({min:1,onerror:"<?php echo L("please input").L('Address')?>"});

	$("#linkman").formValidator({onshow:"<?php echo L("please input").L('Contact')?>",onfocus:"<?php echo L("please input").L('Contact')?>"}).inputValidator({min:1,onerror:"<?php echo L("please input").L('Contact')?>"});
	
	$("#mobile").formValidator({onshow:"<?php echo L("please input").L('Mobile Phone')?>",onfocus:"<?php echo L("please input").L('Mobile Phone')?>"}).inputValidator({min:1,onerror:"<?php echo L("please input").L('Mobile Phone')?>"})

 	$("#tel").formValidator({onshow:"<?php echo L("please input").L('Tel')?>",onfocus:"<?php echo L("please input").L('Tel')?>"}).inputValidator({min:1,onerror:"<?php echo L("please input").L('Tel')?>"})

	$("#email2").formValidator({onshow:"<?php echo L("please input").L('Email')?>",onfocus:"<?php echo L("please input").L('Email')?>"}).inputValidator({min:1,onerror:"<?php echo L("please input").L('Email')?>"})

	$("#area").formValidator({onshow:"<?php echo L("please input").L('Requested Booth Area')?>",onfocus:"<?php echo L("please input").L('Requested Booth Area')?>"}).inputValidator({min:1,onerror:"<?php echo L("please input").L('Requested Booth Area')?>"})
	
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
               <td class="name" colspan="2" style="text-align:left;">Please select the range of your product attributes：</td>
             </tr>
			<tr>
               <td class="name"></td>
			   <td colspan="2" style="  color: #3c3c3c; font-weight: bold;font-size: 14px;">
					<input type="radio" name="product_type" checked value="1">Auto Accessories
					&nbsp;&nbsp;&nbsp;
					<input type="radio" name="product_type" value="2">Auto Parts & After-sales Service
				</td>
             </tr>
             <tr>
               <td class="name">Company Name：</td><td colspan="3">
			   <input type="text" class="ipbox_full" name="company_name" id="company_name"></td>
             </tr>
             <tr>
               <td class="name">Address：</td><td colspan="3">
			   <input type="text" class="ipbox_full" name="company_addr" id="company_addr"></td>
             </tr>
             <tr>
               <td class="name">Contact：</td><td colspan="3">
			   <input type="text" class="ipbox_full" name="linkman" id="linkman"></td>
             </tr>
             <tr>
               <td class="name">mobile Phone：</td><td colspan="3">
			   <input type="text" class="ipbox" name="mobile" id="mobile"></td>
             </tr>
             <tr>
               <td class="name">Tel：</td><td>
			   <input type="text" class="ipbox" name="tel" id="tel" placeholder="格式：020-5568855"></td>
             </tr>
             <tr>
               <td class="name">Email：</td><td>
			   <input type="text" class="ipbox" name="email" id="email2"></td>
             </tr>
             <tr>
               <td class="name">Requested Booth Area：</td><td>
			   <input type="text" class="ipbox" name="area" id="area">/㎡</td>
             </tr>
             <tr>
               <td class="name">Exhibits：</td><td>
			   <textarea name="content" id="content"></textarea></td>
             </tr>

           </table>
           <input type="submit" name="dosubmit" class="w_prd_purchase_config" value="Submit">

         <form>

      </div>


   </div>


  <?php include template('content', 'footer'); ?>