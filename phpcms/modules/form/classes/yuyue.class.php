<?php

defined('IN_PHPCMS') or exit('No permission resources.');

class yuyue {
	private $db;

	public function __construct() {
		//isle02、isle03、isle06
		//密码：GZisle111222333
		//isle@cantonfairad.com //Cantonfairad12
		$email_list = array(
			array('email_username'=>'isle-guest@cantonfairad.com','email_passowd'=>'20161129isle','email_from'=>'isle-guest@cantonfairad.com'),
		);
		$email_key = array_rand($email_list,1);//随机抽取1个企业邮箱
		//var_dump($email_list[$email_key]);exit;
		$this->email_username = $email_list[$email_key]['email_username'];// 邮局用户名(请填写完整的email地址)
		$this->email_passowd = $email_list[$email_key]['email_passowd'];// 邮局密码
		$this->email_from = $email_list[$email_key]['email_from'];//邮件发送者email地址
	}

	//邮件发送
	function send_email($info,$lan=1){
		$email = $info['email'];
		$name  = $info['name'];
		$suijima = $info['suijima'];
		//引入邮件模板文件
		require_once('email_tpl.php');
		$email_tpl = $info['interest_zh']?$EMAIL_TPL[$info['interest_zh']]:$EMAIL_TPL[1];//2016/5/31
//var_dump($info['interest_zh']);exit;
		//邮件接口
		header("content-Type: text/html; charset=Utf-8");
		$SoapClient = new SoapClient("http://app.focussend.com/webservice/FocusSendWebService.asmx?WSDL",array('trace' => 1));
		$FocusUser   = new StdClass;
		$FocusUser->Email=$this->email_username;
		$FocusUser->Password=sha1($this->email_passowd);

		$FocusEmail=new StdClass;
		$FocusEmail->Body='';
		$FocusEmail->IsBodyHtml=true;

		$FocusTask=new StdClass;
		$taskname = date('Y-m-d H:i:s',time()).mt_rand(1111111111,9999999999);//随机数
		$FocusTask->TaskName="观众网上预登记确认函(".$taskname.")";
		$FocusTask->Subject="观众网上预登记确认函Visitor Online Pre-Registration Confirmation";
		$FocusTask->SenderName="ISLE广州国际广告标识及LED展览会";
		$FocusTask->SenderEmail=$this->email_from; //邮件发送者email地址;
		$FocusTask->SendDate=date("Y-m-d\TH:m:s");    
		//邮件内容
		$FocusEmail->Body =<<<BEGIN
$email_tpl
BEGIN;
//var_dump($FocusEmail->Body);exit;
		//邮件多人发送
		$user1=new StdClass;
		$user1->Email=$email;//收件人
		//  $user2=new StdClass;
		//  $user2->Email="zouxiangzhao@sina.com";
		//  
		$FocusReceivers = array($user1);
		$result= $SoapClient->BatchSend(array("user"=>$FocusUser,"email"=>$FocusEmail,"task"=>$FocusTask,"receivers"=>$FocusReceivers));
		if(is_object($result)){//返回数组对象
			$result = json_encode($result);
			$result = json_decode($result,true);
		}
		//var_dump($email,$result);exit;
		if($result['BatchSendResult']!=='success'){//失败
			//echo "邮件发送失败. <p>";
			return array('status'=>false,'body'=>$FocusEmail->Body,'errmsg'=>$result['BatchSendResult']);
		}else{//成功
			return array('status'=>true,'body'=>'','errmsg'=>'');
		}
	}





}