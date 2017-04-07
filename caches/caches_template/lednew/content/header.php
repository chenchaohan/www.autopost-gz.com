<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","config"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--[if lte IE 8]>
<!DOCTYPE html>
<html lang="en">
<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta content="telephone=no" name="format-detection">
<title> <?php echo $id = $languageId == 1 ? '广州国际汽车用品、零配件及售后服务展览会' : 'Guangzhou International Exhibition of Automotive Products, Auto Parts & Post-market Services';?></title>
<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
<meta name="description" content="<?php echo $SEO['description'];?>">
<meta name="baidu-site-verification" content="u51hUCB5cG" />

<?php if($languageId != 1) { ?>
<link href="<?php echo LED_PATH;?>css/style.css?v=11" rel="stylesheet" />
<link href="<?php echo LED_PATH;?>css/style_en.css?v=11" rel="stylesheet" />
<?php } else { ?>
<!--cn-->
<link href="<?php echo LED_PATH;?>css/style.css?v=11" rel="stylesheet" />
<?php } ?>
<script src="<?php echo LED_PATH;?>js/jquery-1.8.3.min.js"></script>
<script src="<?php echo LED_PATH;?>js/marquee.js"></script>
<script src="<?php echo LED_PATH;?>js/tips.js"></script>
<script type="text/javascript">
	var G = {
		SITE_URL: '<?php echo APP_PATH;?>',
		LANGUAGE_ID: <?php echo $languageId;?>,
		IMG_PATH: '<?php echo IMG_PATH;?>',
		CSS_PATH: '<?php echo CSS_PATH;?>',
		JS_PATH: '<?php echo JS_PATH;?>'
	};
	//ck mobile
	//获取url中的参数
	function getUrlParam(name) {
		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
		var r = window.location.search.substr(1).match(reg);  //匹配目标参数
		if (r != null) return unescape(r[2]); return null; //返回参数值
	}
	//ck mobile
	function browserRedirect() {
		var is_jump = getUrlParam('type');
		if(!is_jump || is_jump==''){
			var sUserAgent = navigator.userAgent.toLowerCase();
			var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
			var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
			var bIsMidp = sUserAgent.match(/midp/i) == "midp";
			var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
			var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
			var bIsAndroid = sUserAgent.match(/android/i) == "android";
			var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
			var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
			if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
			window.location.href="http://wx2.intexh.com/index.php?g=Wap&a=index&token=zobyef1411957121&diymenu=1";
			}
		}else{
			//alert();
		}
	}
	//browserRedirect();
</script>
<?php if(!$catid || $_GET['m']=='public_index' || in_array($catid,array(9,10,102,103))) { ?>
	<script type="text/javascript">
		//首页判断
		//browserRedirect();
	</script>
<?php } ?>

</head>
<?php $userid= param::get_cookie('_userid');?>

<body>


<!-- 头部 -->
<header>
	<div class="header">
		<div class="head_member">

			<div class="fr" style="display: none;">
				<ul>
					<?php if(empty($userid)) { ?>
						<li id="login"><a href="javascript:;" class="j-login"><?php echo $_LANG['LOGIN'][$languageId];?></a></li>
						<li id="register"><a href="javascript:;" class="j-register"><?php echo $_LANG['REGISTER'][$languageId];?></a></li>
					<?php } else { ?>
						<li id="login"><a href="javascript:;"><?php echo str_replace(array('(',')'),'',get_nickname());?></a></li>
						<li id="register"><a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=logout&siteid=<?php echo $siteid;?>">
						<?php echo $languageId==1?'退出':'Logout'?></a></li>
					<?php } ?>
					<li>
					<?php if($languageId == 1) { ?>
						<a href="<?php echo $CATEGORYS['16']['url'];?>" switch-language="1"><?php echo $_LANG['LANGUAGE_ENGLISH'];?></a>
					<?php } else { ?>
						<a href="<?php echo siteurl($siteid);?>" switch-language="1"><?php echo $_LANG['LANGUAGE_CHINESE'];?></a>
						
					<?php } ?>
					</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>

		<div class="head_top">
			<div class="head_logo fl">
				<h1>
				<?php if($languageId == 1) { ?>
					<a href="<?php echo siteurl($siteid);?>/"><img src="<?php echo LED_PATH;?>images/head_logo.png" /></a>
				<?php } else { ?>
					<a href="<?php echo $CATEGORYS['16']['url'];?>"><img src="<?php echo LED_PATH;?>images/head_logo.png" /></a>
				<?php } ?>
				</h1>
			</div>
			<div class="fr">
                <dl >
                	<dd class="lang">
                	<?php if($languageId == 1) { ?>
						<a href="<?php echo $CATEGORYS['16']['url'];?>" switch-language="1"><?php echo $_LANG['LANGUAGE_ENGLISH'];?></a>
					<?php } else { ?>
						<a href="<?php echo siteurl($siteid);?>" switch-language="1"><?php echo $_LANG['LANGUAGE_CHINESE'];?></a>
						
					<?php } ?>
					</dd>
                    
                </dl>
                <!--<p class="headsearch">
                    <input type="text" placeholder="请输入关键字" class="txtKeyword" style="line-height: 20px;"><a href="javascript:void(0);" class="btnSerch"><?php echo $_LANG['SEARCH'][$languageId];?></a>
                </p>-->
            </div>
		</div>

	

	</div>
</header>
<!-- 头部end -->


<!-- 导航 -->
<div class="navs">
	<ul class="nav" id="menu">
		<li class="nav_fgx">
		<span>
		<?php if($languageId == 1) { ?>
			<a href="<?php echo siteurl($siteid);?>">
		<?php } else { ?>
			<a href="<?php echo $CATEGORYS['16']['url'];?>">
		<?php } ?>
		<?php echo $id = $languageId == 1 ? '首页' : 'Home';?></a></span>
		</li>
		<?php $id = $languageId == 1 ? 15 : 16;$key=1;$sub_catid=$languageId == 1 ? 35 : 73;?>

		<!--分类导航-->
		<?php $id = $_GET['catid']==$sub_catid?$_GET['catid']:$id;?>
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=3530229ce266d4df58e33718445ba7b3&sql=SELECT+parentid+FROM+phpcms_category+WHERE+catid+%3D+%24catid+LIMIT+0%2C+1--&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT parentid FROM phpcms_category WHERE catid = $catid LIMIT 0, 1-- LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
			<?php $getCategory = $data[0];?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		<?php if($getCategory['parentid'] == $sub_catid) { ?>
			<?php $id = $getCategory['parentid'];?>
		<?php } ?>
		<?php if($id==$sub_catid) { ?>
			<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=6f6a0a72828d823dd6af3fc30b49490a&sql=SELECT+catid%2C+catname%2C+url%2Cdescription+FROM+phpcms_category+WHERE+parentid+%3D+%24id+ORDER+BY+listorder+ASC&num=7&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT catid, catname, url,description FROM phpcms_category WHERE parentid = $id ORDER BY listorder ASC LIMIT 7");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
		<?php } else { ?>
			<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=66d1b71de376845aad54998e218bf2dd&action=category&siteid=1&catid=%24id&num=7\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('siteid'=>'1','catid'=>$id,'limit'=>'7',));}?>
		<?php } ?>
            <?php $n=1; if(is_array($data)) foreach($data AS $k => $r) { ?>
				<!-- 一级菜单-->
				<li <?php if($key!=6) { ?>class="item nav_fgx"<?php } else { ?>class="item"<?php } ?>><a <?php if($r['description']) { ?>href="<?php echo APP_PATH;?><?php echo $r['description'];?>"<?php } else { ?>href="<?php echo $r['url'];?>"<?php } ?> id="menu_<?php echo $key;?>" <?php if($_GET['nu']==$key) { ?>class="m-hover"<?php } ?>><?php echo $r['catname'];?></a>
					
				</li>
			<?php $key++;?>
			<?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?><!-- 一级菜单 end -->
		<div class="clear"></div>
	</ul>
</div>

<script type="text/javascript">
var urlstr = location.href;　　　　//获取浏览器的url
var urlstatus=false;　　　　　　　　//标记
　//遍历导航div
/*$("#menu a").each(function () {
	if ((urlstr + '/').indexOf($(this).attr('ref')) > -1&&$(this).attr('ref')!='') {
		var m_flag= $(this).attr('m_flag'); //alert('#menu_'+m_flag);
		$('#menu_'+m_flag).addClass('m-hover'); urlstatus = true;
	} else {
		$(this).removeClass('m-hover');
	}
});

//当前样式保持
  if (!urlstatus) {$("#menu a").eq(0).addClass('m-hover'); }
  */
</script>

<!-- 导航end -->
<!-- 登录弹窗 -->
<div class="reg_box register-box">
		<form action="<?php echo APP_PATH;?>index.php?m=member&c=index&a=register&siteid=<?php echo $siteid;?>" method="post" name="myform">
			<p class="tips" style="color: red; height: 18px; text-align: center;"></p>
			<p><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_LANG['USER_NAME'][$languageId];?>：</span><input type="text" name="username" id="register-username" /></p>
			<p><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_LANG['MAIL'][$languageId];?>：</span><input type="text" name="email" id="email" /></p>
			<p><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_LANG['PASSWORD'][$languageId];?>：</span><input type="password" name="password" id="password" /></p>
            <p><span><?php echo $_LANG['CONFIRM_PASSWORD'][$languageId];?>：</span><input type="password" name="pwdconfirm" id="repassword" /></p>
			<p><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_LANG['VERIFY_CODE'][$languageId];?>：</span><input type="text" name="code" size="8" id="register-code" class="input-text"></p>
			<p style="padding-bottom: 0; padding-left: 120px;margin: 10px 0;"><img id='code_img' onclick='this.src=this.src+"&"+Math.random()' src='<?php echo APP_PATH;?>api.php?op=checkcode&code_len=5&font_size=14&width=120&height=26&font_color=&background='></p>
			<input type="hidden" name="siteid" value="<?php echo $siteid;?>" />
			<input type="hidden" name="modelid" value="10" />
			<input type="hidden" name="dosubmit" value="同意注册协议，提交注册" />
            <button type="submit" class="reg_btn j-submit-register" /><?php echo $_LANG['IMMEDIATELY_REGISTER'][$languageId];?></button>
            <p class="reg_login">
            	<?php echo $id = $languageId == 1 ? '我有账号' : 'No account';?>&nbsp;&nbsp;
            	<a href="javascript:;" class="j-login-switch"><?php echo $_LANG['IMMEDIATELY_LOGIN'][$languageId];?></a>
            </p>
        </form>
    </div>
    <div class="reg_box login-box">
		<form action="<?php echo APP_PATH;?>index.php?m=member&c=index&a=login" method="post" name="myform">
			<p class="tips" style="color: red; height: 18px; text-align: center;"></p>
			<p><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_LANG['USER_NAME'][$languageId];?>：</span><input type="text" name="username" id="login-username" /></p>
			<p><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $_LANG['PASSWORD'][$languageId];?>：</span><input type="password" name="password" id="login-password" /></p>
			<p><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_LANG['VERIFY_CODE'][$languageId];?>：</span><input type="text" name="code" size="8" id="login-code" class="input-text"></p>
			<p style="padding-bottom: 0; padding-left: 120px;margin: 10px 0;"><img id='code_img' onclick='this.src=this.src+"&"+Math.random()' src='<?php echo APP_PATH;?>api.php?op=checkcode&code_len=5&font_size=14&width=120&height=26&font_color=&background='></p>
			<input type="hidden" name="dosubmit" value="<?php echo $_LANG['IMMEDIATELY_LOGIN'][$languageId];?>" />
            <button type="submit" class="reg_btn j-submit-login" /><?php echo $_LANG['IMMEDIATELY_LOGIN'][$languageId];?></button>
            <p class="reg_login">
            	<?php echo $id = $languageId == 1 ? '还没账号' : 'There are accounts';?>&nbsp;&nbsp;
            	<a href="javascript:;" class="j-register-switch"><?php echo $_LANG['IMMEDIATELY_REGISTER'][$languageId];?></a>
            </p>
        </form>
    </div>

<div class="mask"></div>

<script type="text/javascript">
//菜单hover
$('#menu_1').tips({relation: '#sub_menu_1',tgClass: 'm-hover'});
$('#menu_2').tips({relation: '#sub_menu_2',tgClass: 'm-hover'});
$('#menu_3').tips({relation: '#sub_menu_3',tgClass: 'm-hover'});
$('#menu_4').tips({relation: '#sub_menu_4',tgClass: 'm-hover'});
$('#menu_5').tips({relation: '#sub_menu_5',tgClass: 'm-hover'});


	$(document).ready(function() {

		$('.navs li').hover(function() {
			$(this).find('dd').css('display', 'block');
		}, function() {
			$(this).find('dd').css('display', 'none');
		});
	//登录注册按钮
		$('.j-register').live('click',function() {
			$('.register-box').css('display', 'block');
			$(".mask").css("display","block");
			$(".mask-click").css("display","block");
			$(".login-box").css("display","none");
			return false;
		});

		$('.j-login').live('click',function() {
			$('.login-box').css('display', 'block');
			$(".mask").css("display","block");
			$(".mask-click").css("display","block");
			$(".register-box").css("display","none");
			return false;
		});
//表单验证注册
		$('.j-submit-register').click(function() {
			var tip = $('.tips');
			var username = $('#register-username');
			var email = $('#email');
			var password = $('#password');
			var repassword = $('#repassword');
			var code = $('#register-code');

			if(username.val() == '') {
				username.focus();
				tip.html('<?php echo $_LANG['VERIFICATION_ENTER_USERNAME'][$languageId];?>').fadeIn();
				return false;
			} else if(username.val().length < 3 || username.val().length > 16) {
				username.focus();
				tip.html('<?php echo $_LANG['USERNAME_LENGTH'][$languageId];?>').fadeIn();
				return false;
			} else if(email.val() == '') {
				email.focus();
				tip.html('<?php echo $_LANG['VERIFICATION_ENTER_MAIL'][$languageId];?>').fadeIn();
				return false;
			} else if(!/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/.test(email.val())) {
				email.focus();
				tip.html('<?php echo $_LANG['VERIFICATION_MAIL_WRONG_FORMAT'][$languageId];?>').fadeIn();
				return false;
			} else if(password.val() == '') {
				password.focus();
				tip.html('<?php echo $_LANG['VERIFICATION_ENTER_PASSWORD'][$languageId];?>').fadeIn();
				return false;
			} else if(!/^[^\s]{6,16}$/.test(password.val())) {
				password.focus();
				tip.html('<?php echo $_LANG['VERIFICATION_PASSWORD_WRONG_FORMAT2'][$languageId];?>').fadeIn();
				return false;
			} else if(repassword.val() == '') {
				repassword.focus();
				tip.html('<?php echo $_LANG['VERIFICATION_PASSWORDS_DO_NOT_MATCH'][$languageId];?>').fadeIn();
				return false;
			} else if(password.val() != repassword.val()) {
				repassword.focus();
				tip.html('<?php echo $_LANG['VERIFICATION_PASSWORDS_DO_NOT_MATCH'][$languageId];?>').fadeIn();
				return false;
			} else if(code.val() == '') {
				code.focus();
				tip.html('<?php echo $_LANG['VERIFICATION_ENTER_CODE'][$languageId];?>').fadeIn();
				return false;
			} else if(code.val().length != 5) {
				code.focus();
				tip.html('<?php echo $id = $languageId == 1 ? '验证码长度只能为5位' : 'Verification code length only for five';?>').fadeIn();
				return false;
			}

			tip.fadeOut();
		});
//表单验证登录
		$('.j-submit-login').click(function() {
			var tip = $('.tips');
			var username = $('#username');
			var password = $('#login-password');
			var code = $('#login-code');

			if(username.val() == '') {
				username.focus();
				tip.html('<?php echo $_LANG['VERIFICATION_ENTER_USERNAME'][$languageId];?>').fadeIn();
				return false;
			} else if(password.val() == '') {
				password.focus();
				tip.html('<?php echo $_LANG['VERIFICATION_ENTER_PASSWORD'][$languageId];?>').fadeIn();
				return false;
			} else if(!/^[^\s]{6,16}$/.test(password.val())) {
				password.focus();
				tip.html('<?php echo $_LANG['VERIFICATION_PASSWORD_WRONG_FORMAT2'][$languageId];?>').fadeIn();
				return false;
			} else if(code.val() == '') {
				code.focus();
				tip.html('<?php echo $_LANG['VERIFICATION_ENTER_CODE'][$languageId];?>').fadeIn();
				return false;
			} else if(code.val().length != 5) {
				code.focus();
				tip.html('<?php echo $id = $languageId == 1 ? '验证码长度只能为5位' : 'Verification code length only for five';?>').fadeIn();
				return false;
			}

			tip.fadeOut();
		});

		$('.j-login-switch').click(function(){
			$(".register-box").css("display","none");
			$(".login-box").css("display","block");
		});

		$('.j-register-switch').click(function(){
			$(".login-box").css("display","none");
			$(".register-box").css("display","block");
		});

		$('.mask-click').click(function(){
			$(".register-box").css("display","none");
			$(".login-box").css("display","none");
			$(".mask").css("display","none");
			$(".mask-click").css("display","none");
		});
		$('.mask').click(function(){
			$(".register-box").css("display","none");
			$(".login-box").css("display","none");
			$(".mask").css("display","none");
			$(".mask-click").css("display","none");
		});
	});

$(function(){
	//倒计时 1
	var timedate= new Date("2017/02/15"); 
	var now = new Date(); 
	var date = timedate.getTime() - now.getTime(); 
	var time = Math.floor(date / (1000 * 60 * 60 * 24)); 
	var myH=Math.floor(date / (1000*60*60)) % 24;
	var flag = false;
	if(time>= 0){
		var time = time;
	}else if(time<=-1 && time>=-3){
		var time =  "进行中";
		flag = true;
	}else{
		var time =  "已结束";
		flag = true;
	}
	if(flag){//2016/2/15
		$('.shijian').css({'font-size':'23px','line-height':'30px'});
		$('.day').css({'margin-top':'0px'});
		$('.show_date .title').hide();
		$('.day_txt').hide();
	}
    $(".shijian").html(time);

	
	//倒计时 2
	var timedate= new Date("2016/07/01"); 
	var now = new Date(); 
	var date = timedate.getTime() - now.getTime(); 
	var time = Math.floor(date / (1000 * 60 * 60 * 24)); 
	var myH=Math.floor(date / (1000*60*60)) % 24;
	var flag = false;
	if(time>= 0){
		var time = time;
	}else if(time<=-1 && time>=-2){
		var time =  "进行中";
		flag = true;
	}else{
		var time =  "已结束";
		flag = true;
	}
	if(flag){//2016/2/15
		$('.show_date_r .shijian').css({'font-size':'23px','line-height':'30px'});
		$('.show_date_r .day').css({'margin-top':'0px'});
		$('.show_date_r .title').hide();
		$('.show_date_r .day_txt').hide();
	}
    $(".show_date_r .shijian").html(time);

});
//检测IE浏览器版本是否过低
//var b_name = navigator.appName;
//var b_version = navigator.appVersion;
//var version = b_version.split(";");
//var trim_version = version[1].replace(/[ ]/g, "");
//if (b_name == "Microsoft Internet Explorer") {
	///*如果是IE6或者IE7,MSIE8.0*/
	//if (trim_version == "MSIE8.0" || trim_version == "MSIE7.0" || trim_version == "MSIE6.0") {
		//alert("您IE浏览器版本过低，请使用IE9以上的浏览器更佳");
	//}
//}
</script>

<!-- banner -->

<!-- banner end -->