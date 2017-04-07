<?php

/**
 * 在线咨询专区
 * 2015/10/13
 */

defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_func('global');
pc_base::load_sys_class('form', '', 0);

class index{
	private $db;

	function __construct() {
		$this->db = pc_base::load_model('consult_model');
		$this->exdb = pc_base::load_model('exhibition_form_model');
		session_start();//
	}
	
	//版块列表首页
	public function init() {
		
		

	}

	//咨询增加
	function visitorregister() {	
		$CATEGORYS = getcache('category_content_1','commons'); 
		$catid = intval($_REQUEST['catid']);
		
		$catid = $CATEGORYS[$catid]['parentid'];
		if($_POST['dosubmit']){
			$mobile = trim($_POST['mobile']);
			if(empty($_SESSION['ver_code_'.$mobile]) || $_SESSION['ver_code_'.$mobile] != $_POST['ver_code']){//该手机号码的验证码存在
				$lang_msg = $_REQUEST['lang']==1?L('手机验证码不正确，请核实！'):L('Phone verification code is not correct, please check!');
				showmessage($lang_msg,HTTP_REFERER);
				exit;
			}
			$data['company_name']   = new_addslashes($_POST['company_name']);
			$data['address']		= new_addslashes($_POST['address']);
			$data['name']		= new_addslashes($_POST['name']);//产品数据
			$data['position']			= new_addslashes($_POST['position']);
			$data['email']			= new_addslashes($_POST['email']);
			$data['mobile']			= trim($_POST['mobile']);
			$data['pro']			= implode(',',$_POST['pro']);
			$data['lang'] = $_REQUEST['lang'];
			$data['create_time']	= SYS_TIME;
			$data['status'] = 1;
			$ret_id = $this->db->insert($data,true);
			if($_REQUEST['lang']==1){
				showmessage(L('operation_success'),HTTP_REFERER);
			}else{
				showmessage(L('operation success'),HTTP_REFERER);
			}
			
		}else{
			if($_GET['lang']!=1){
				include template('consult', 'visitorregister_en');
			}else{
				include template('consult', 'visitorregister');
			}
		}
	}

	//采购登陆增加
	function exhibition_form() {	
		$CATEGORYS = getcache('category_content_1','commons'); 
		$catid = intval($_REQUEST['catid']);
		$catid = $CATEGORYS[$catid]['parentid'];
		$type = intval($_REQUEST['type'])?intval($_REQUEST['type']):1;//1:采购登记，2:专题展会参展登记,3:展会媒体登记
		if($_POST['dosubmit']){
			
			$data['product_type']   = intval($_POST['product_type']);
			$data['company_name']   = new_addslashes($_POST['company_name']);
			$data['company_addr']	= new_addslashes($_POST['company_addr']);
			$data['linkman']		= new_addslashes($_POST['linkman']);//产品数据
			$data['tel']			= new_addslashes($_POST['tel']);
			$data['email']			= new_addslashes($_POST['email']);
			$data['mobile']			= trim($_POST['mobile']);
			$data['area']			= $_POST['area'];
			$data['content']		= new_addslashes($_POST['content']);
			$data['lang'] = $_REQUEST['lang'];
			$data['create_time']	= SYS_TIME;
			$data['status'] = 1;
			$ret_id = $this->exdb->insert($data,true);

			if($_REQUEST['lang']==1){
				showmessage(L('operation_success'),HTTP_REFERER);
			}else{
				showmessage(L('operation success'),HTTP_REFERER);
			}
		}else{
			if($_GET['lang']!=1){
				include template('consult', 'exhibition_form_en');
			}else{
				include template('consult', 'exhibition_form');
			}
			
		}
	}

	//获取手机验证码
	function get_mobile_code(){
		$mobile = trim($_REQUEST['mobile']);
		$ver_code = rand(100000,999999);
		$ret = $this->send_sms($mobile,$ver_code);
		//var_dump($ret);exit;
		if($ret['code']==0){
			$_SESSION['ver_code_'.$mobile] = $ver_code;
			echo json_encode(array('status'=>1,'msg'=>$ret['msg']));
		}else{
			echo json_encode(array('status'=>0,'msg'=>$ret['msg']));
		}
	}

	//接口发送云片短信
	function send_sms($mobile,$ver_code,$lang=1){
		$ch = curl_init();
		// 必要参数
		$apikey = "a20ffedbcf9dbacefe54095b14d44adb"; 
		$text="【对外贸易广州展览】您的验证码是{$ver_code}";
		// 发送短信
		$data=array('text'=>$text,'apikey'=>$apikey,'mobile'=>$mobile);
		$url =  'http://sms.yunpian.com/v2/sms/single_send.json';//发送单个短信

		//$data=array('tpl_id'=>'1590414','tpl_value'=>('#code#').'='.urlencode('1234'),'apikey'=>$apikey,'mobile'=>$mobile);
		//$url = 'http://sms.yunpian.com/v2/sms/tpl_single_send.json';
		curl_setopt ($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		$json_data = curl_exec($ch);
		$error = curl_errno($ch);
		//解析返回结果（json格式字符串）
		return json_decode($json_data,true);
	}



}