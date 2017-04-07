<?php
/**
 * 异步检查用户状态
 */
defined('IN_PHPCMS') or exit('No permission resources.'); 

$uid = param::get_cookie('_userid');//intval($_REQUEST['uid']);
$user_info['islogin']=0;

if($uid){
	$user_info = get_memberinfo($uid);
	if(!empty($user_info))$user_info['islogin']=1;
}
$data = array(
	'userid'=>$user_info['userid'],
	'username'=>$user_info['username'],
	'islogin'=>$user_info['islogin']
);
echo json_encode($data);









