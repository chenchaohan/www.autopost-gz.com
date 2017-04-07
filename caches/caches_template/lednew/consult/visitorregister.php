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


	$("#company_name").formValidator({onshow:"",onfocus:"<?php echo L('公司名称')?>"}).inputValidator({min:1,onerror:"<?php echo L('公司名称')?>"})
	$("#address").formValidator({onshow:"",onfocus:"<?php echo L('公司地址')?>"}).inputValidator({min:1,onerror:"<?php echo L("address").L('公司地址')?>"})
	$("#name").formValidator({onshow:"",onfocus:"<?php echo L('姓名')?>"}).inputValidator({min:1,onerror:"<?php echo L('姓名')?>"})
	$("#mobile").formValidator({onshow:"",onfocus:"<?php echo L('手机号')?>"}).inputValidator({min:1,onerror:"<?php echo  L('手机号')?>"})
	$("#ver_code").formValidator({onshow:"",onfocus:"<?php echo L('验证码')?>"}).inputValidator({min:1,onerror:"<?php echo  L('验证码')?>"})
	$("#email2").formValidator({onshow:"",onfocus:"<?php echo L('邮箱')?>"}).inputValidator({min:1,onerror:"<?php echo  L('邮箱')?>"})
	$(":checkbox[name='pro']").formValidator({onshow:"",onfocus:"<?php echo L('选择您感兴趣的产品类别')?>"}).inputValidator({min:1,onerror:"<?php echo L('选择您感兴趣的产品类别')?>"})





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
               <td class="name"><span>*</span>公司名称：</td><td>
			   <input type="text" class="ipbox" name="company_name" id="company_name"></td>
               <td class="name"><span>*</span>公司地址：</td><td class="req">
			   <input type="text" class="ipbox" name="address" id="address"></td>
             </tr>
			 <tr>
               <td class="name"><span>*</span>姓名：</td><td>
			   <input type="text" class="ipbox" name="name" id="name"></td>
               <td class="name">职位：</td><td class="req">
			   <input type="text" class="ipbox" name="position" id="position"></td>
             </tr>
			 <tr>
               <td class="name"><span>*</span>手机号：</td><td>
			   <input type="text" class="ipbox" name="mobile" id="mobile" ></td>
               <td class="name"><span>*</span>验证码：</td><td>
			   <input type="text" class="ipbox" name="ver_code" id="ver_code" style="  width: 120px;">
				<button type="button"  class="phone_code" onclick="get_mobile();">发送验证码</button>
			   </td>
             </tr>
             <tr>
               <td class="name"><span>*</span>邮箱：</td><td>
			   <input type="text" class="ipbox" name="email" id="email2"></td>
             </tr>
			  <tr>
				<td class=" ck_name" colspan="4"></td>
			  </tr>
			 <tr>
				<td class=" ck_name" colspan="4">帮其他人申请展会请填写以下信息：（填写内容同上）</td>
			  </tr>
			  <tr>
				<td class=" ck_name" colspan="4"></td>
			  </tr>
             <tr>
				<td class="cz_title ck_name" colspan="4"><span>*</span>您感兴趣的产品类别：</td>
			  </tr>
			<tr>
               <td class="ck_name" colspan="2">
				<input type="checkbox" class="ipbox checkbox" name="pro[]"  value="汽车用品">汽车用品
			   </td>

                <td class="ck_name" colspan="2">
				<input type="checkbox" class="ipbox checkbox" name="pro[]"  value="汽车电子">汽车电子
			   </td>
             </tr>
			 <tr>
               <td class="ck_name" colspan="2">
				<input type="checkbox" class="ipbox checkbox" name="pro[]"  value="汽车美容养护">汽车美容养护
			   </td>

                <td class="ck_name" colspan="2">
				<input type="checkbox" class="ipbox checkbox" name="pro[]"  value="连锁洗车">连锁洗车
			   </td>
             </tr>
			 <tr>
               <td class="ck_name" colspan="2">
				<input type="checkbox" class="ipbox checkbox" name="pro[]"  value="汽保设备">汽保设备
			   </td>

                <td class="ck_name" colspan="2">
				<input type="checkbox" class="ipbox checkbox" name="pro[]"  value="汽车改装">汽车改装
			   </td>
             </tr>
			 <tr>
               <td class="ck_name" colspan="4">
				<input type="checkbox" class="ipbox checkbox" name="pro[]"  value="易损件">易损件
			   </td>

             </tr>

			 
             
           </table>
           <input type="submit" name="dosubmit" class="w_prd_purchase_config" value="提交">
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
		alert('手机号不能为空');
		return false;
	}
    // 发送验证码
    var i = 60;
    var time_;
    if (i != 60) {
        return;
    }
    i = 60;
    $(".phone_code").attr("onclick", "");
    time_ = window.setInterval(function() {
        i--;
        $(".phone_code").text(i + "s重发");
        if (i == 0) {
            $(".phone_code").text("重试");
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
					alert('验证码已发送,请留意！');
				}else{
					$(".phone_code").attr("onclick", "mobile_verify("+stype+","+mobile+")");
					$(".phone_code").text('发送验证码');
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
		alert('手机号码不能为空');
	}

    return;

}
//-->
</script>

<?php include template('content', 'footer'); ?>