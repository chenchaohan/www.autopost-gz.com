<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('content', 'header'); ?>
<link href="<?php echo LED_PATH;?>css/news.css?v=1" rel="stylesheet" />
<link href="<?php echo CSS_PATH;?>table_form.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>formvalidator.js" charset="UTF-8"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>formvalidatorregex.js" charset="UTF-8"></script>
<style type="text/css">
	.w_prd_consult_form{width:auto;}
	.checkbox{width:auto !important;}
	.ck_name{  text-align: left;
  padding-left: 60px !important;  font-size: 14px;  color: #3c3c3c;}
  .cz_title{
	background: #ccc;
  }
   span{color:red;}
</style>
<!-- main start  -->

<script type="text/javascript">
<!--
	$(function(){
	$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){alert(msg);}});


	$("#company_name").formValidator({onshow:"",onfocus:"<?php echo L('Company Name cant be empty')?>"}).inputValidator({min:1,onerror:"<?php echo L('Company Name cant be empty')?>"})
	$("#address").formValidator({onshow:"",onfocus:"<?php echo L('Address cant be empty')?>"}).inputValidator({min:1,onerror:"<?php echo L("address").L('Address cant be empty')?>"})
	$("#name").formValidator({onshow:"",onfocus:"<?php echo L('Name cant be empty')?>"}).inputValidator({min:1,onerror:"<?php echo L('Name cant be empty')?>"})
	$("#mobile").formValidator({onshow:"",onfocus:"<?php echo L('Mobile cant be empty')?>"}).inputValidator({min:1,onerror:"<?php echo  L('Mobile cant be empty')?>"})
	$("#ver_code").formValidator({onshow:"",onfocus:"<?php echo L('Verification Code cant be empty')?>"}).inputValidator({min:1,onerror:"<?php echo  L('Verification Code cant be empty')?>"})
	$("#email2").formValidator({onshow:"",onfocus:"<?php echo L('Email cant be empty')?>"}).inputValidator({min:1,onerror:"<?php echo  L('Email cant be empty')?>"})
	$(":checkbox[name='pro']").formValidator({onshow:"",onfocus:"<?php echo L('Product Category You Are Interested in cant be empty')?>"}).inputValidator({min:1,onerror:"<?php echo L('Product Category You Are Interested in cant be empty')?>"})





	});
//-->
</script>
   <div class="container comm">
      <div class="lt">
           <?php include template('content', 'left_box'); ?>
      </div>

      <div class="w_prd_right_content">

         <form id="myform" name="myform" action="" method="post">
           <table class="w_prd_purchase" cellpadding="0" cellspacing="0">
             <tr>
               <td class="name"><span>*</span>Company Name：</td><td>
			   <input type="text" class="ipbox" name="company_name" id="company_name"></td>
               <td class="name"><span>*</span>Address：</td><td class="req">
			   <input type="text" class="ipbox" name="address" id="address"></td>
             </tr>
			 <tr>
               <td class="name"><span>*</span>Name：</td><td>
			   <input type="text" class="ipbox" name="name" id="name"></td>
               <td class="name">Position：</td><td class="req">
			   <input type="text" class="ipbox" name="position" id="position"></td>
             </tr>
			 <tr>
               <td class="name"><span>*</span>Mobile：</td><td>
			   <input type="text" class="ipbox" name="mobile" id="mobile" ></td>
               <td class="name"><span>*</span>Verification Code：</td><td>
			   <input type="text" class="ipbox" name="ver_code" id="ver_code" style="  width: 120px;">
				<button type="button"  class="phone_code" onclick="get_mobile();">Send</button>
			   </td>
             </tr>
             <tr>
               <td class="name"><span>*</span>Email：</td><td>
			   <input type="text" class="ipbox" name="email" id="email2"></td>
             </tr>
			  <tr>
				<td class=" ck_name" colspan="4"></td>
			  </tr>
			 <tr>
				<td class=" ck_name" colspan="4">For those who help others apply for the exhibition, please fill in the following information: (The content is the same as above)</td>
			  </tr>
			  <tr>
				<td class=" ck_name" colspan="4"></td>
			  </tr>
             <tr>
				<td class="cz_title ck_name" colspan="4"><span>*</span>Product Category You Are Interested in：</td>
			  </tr>
			<tr>
               <td class="ck_name" colspan="2">
				<input type="checkbox" class="ipbox checkbox" name="pro[]"  value="Auto Accessories">Auto Accessories
			   </td>

                <td class="ck_name" colspan="2">
				<input type="checkbox" class="ipbox checkbox" name="pro[]"  value="Auto Electronics">Auto Electronics
			   </td>
             </tr>
			 <tr>
               <td class="ck_name" colspan="2">
				<input type="checkbox" class="ipbox checkbox" name="pro[]"  value="Car Beauty & Care">Car Beauty & Care
			   </td>

                <td class="ck_name" colspan="2">
				<input type="checkbox" class="ipbox checkbox" name="pro[]"  value="Car Wash Chain">Car Wash Chain
			   </td>
             </tr>
			 <tr>
               <td class="ck_name" colspan="2">
				<input type="checkbox" class="ipbox checkbox" name="pro[]"  value="Car Care Equipment">Car Care Equipment
			   </td>

                <td class="ck_name" colspan="2">
				<input type="checkbox" class="ipbox checkbox" name="pro[]"  value="Car Modification">Car Modification
			   </td>
             </tr>
			 <tr>
               <td class="ck_name" colspan="4">
				<input type="checkbox" class="ipbox checkbox" name="pro[]"  value="Wearing Parts">Wearing Parts
			   </td>

             </tr>

			 
             
           </table>
           <input type="submit" name="dosubmit" class="w_prd_purchase_config" value="Submit">
		   <input type="hidden"  name="lang" value="<?php echo $_GET['lang'];?>">
         <form>
      </div>


   </div>
<script type="text/javascript">
<!--

function get_mobile(){
	var mobile = $('#mobile').val();
	mobile_verify(1,mobile);
}
	// 手机短信验证
function mobile_verify(stype,mobile,cb) {
	var _url = "<?php echo APP_PATH;?>index.php?m=consult&c=index&a=get_mobile_code"
	var cb = cb||"\'\'";
	if(!mobile){
		alert('Mobile cant be empty');
		return false;
	}
    // 发送Verification Code
    var i = 60;
    var time_;
    if (i != 60) {
        return;
    }
    i = 60;
    $(".phone_code").attr("onclick", "");
    time_ = window.setInterval(function() {
        i--;
        $(".phone_code").text(i + "s Retry");
        if (i == 0) {
            $(".phone_code").text("Retry");
            $(".phone_code").attr("onclick", "mobile_verify("+stype+","+mobile+","+cb+")");
            window.clearInterval(time_);
            return;
        }
    }, 1000);

	if(mobile){
		$.ajax({
			type:'POST',
			url:_url,
			data:{mobile:mobile,type:stype},
			dataType:'JSON',
			beforeSend:function(){
				
			},
			success: function (d) {
				//console.log(result);
				if(d.status == 1){//成功操作
					alert('Verification code has been sent!');
				}else{
					$(".phone_code").attr("onclick", "mobile_verify("+stype+","+mobile+")");
					$(".phone_code").text('Send');
					window.clearInterval(time_);
					console.log(typeof(cb));
					if(cb && typeof(cb) != 'string'){
						typeof cb=='function' && cb(d);
						return false;
					}else{
						alert(d.error);//
					}
				}
			}
		});
	}else{
		alert('Mobile cant be empty');
	}

    return;

}
//-->
</script>

<?php include template('content', 'footer'); ?>