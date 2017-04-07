/*公共js*/


$(function(){
	$.ajax({
		type:'GET',
		url:G.SITE_URL+'api.php?op=user',
		dataType:'json',
		success:function(data){
			var login_name = '';
			var	logout_name = '';
			var	register_name='';
			if(G.LANGUAGE_ID==1){
				logout_name = '退出';
				login_name = '登录';
				register_name = '注册';
			}else{
				logout_name = 'Logout';
				login_name = 'Login';
				register_name = 'Register';
			}
			if(data.islogin){
				$('#login').html('<a href="javascript:;">'+data.username+'</a>');
				$('#register').html('<a href="'+G.SITE_URL+'index.php?m=member&c=index&a=logout&siteid=1">'+logout_name+'</a>');
			}else{
				$('#login').html('<a href="javascript:;" class="j-login">'+login_name+'</a>');
				$('#register').html('<a href="javascript:;" class="j-register">'+register_name+'</a>');
			}
		}
	});
});


//获取url中的参数
function getUrlParam(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
	var r = window.location.search.substr(1).match(reg);  //匹配目标参数
	if (r != null) return unescape(r[2]); return null; //返回参数值
}
//ck mobile
function browserRedirect() {
	var is_mobile = getUrlParam('type');
	if(is_mobile){
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