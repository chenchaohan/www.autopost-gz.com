<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $catid = $catid ? $catid : 0;?>
<?php $siteId = $siteid ? $siteid : 1;?>
<?php $siteUrl = siteurl($siteId);?>
<?php $siteDomain = str_replace('http://', '', $siteUrl);?>
<?php $pinNewSearchUrl = pc_base::load_config('system', 'pinnew_search_url');?>
<?php $isPinnewPage = in_array($catid, array(115, 116, 118, 119, 1160, 1161)) ? true : false;?>
<?php if(empty($CATEGORYS)) { ?>
	<?php $CATEGORYS = getcache('category_content_'.$siteid, 'commons');?>
<?php } ?>
<?php $parentIdArray = explode(',', $CATEGORYS[$catid]['arrparentid']);?>
<?php $languageId = intval($_GET['langs']) ? intval($_GET['langs']) : 1;?>
<?php if($catid && !$_GET['langs']) { ?>
	<?php if($catid == 16) { ?>
		<?php $languageId = $catid;?>
	<?php } elseif ($CATEGORYS[$catid]['arrparentid']) { ?>
		<?php $languageId = in_array(16, $parentIdArray) ? 16 : $languageId;?>
	<?php } ?>
<?php } ?>
<?php $languageName = $languageId == 1 ? 'cn' : 'en';?>
<?php $meta_title = $meta_title ? $meta_title : '';?>
<?php if(!$meta_title) { ?>
	<?php $meta_title .= $CATEGORYS[$catid]['catname'].($catid > 16 ? ' - ' : '');?>
	<?php if($_GET['debug'] == 'jiekii') { ?>
		<?php echo $meta_title.', '.$CATEGORYS[$catid]['catname'].', '.$catid;exit;?>
	<?php } ?>
	<?php if($catid && $CATEGORYS[$parentid]['catname'] && $CATEGORYS[$parentid]['catname'] != $CATEGORYS[$languageId]['catname']) { ?>
		<?php $meta_title .= $CATEGORYS[$parentid]['catname'].' - ';?>
	<?php } ?>
	<?php $meta_title = $meta_title.($meta_title != $CATEGORYS[$languageId]['catname'] ? $CATEGORYS[$languageId]['catname'] : '');?>
	<?php $meta_title = $meta_title ? $meta_title : $SEO['title'].$SEO['site_title'];?>
<?php } else { ?>
	<?php $sites = getcache('sitelist', 'commons');?>
	<?php $site = $sites[$siteId];?>
	<?php $meta_title = $meta_title.' - '.($site['site_title'] ? $site['site_title'] : $site['name']);?>
<?php } ?>
<?php $indexName = $languageId == 1 ? '首页' : 'Home';?>
<?php $indexName = preg_match('/php\?m=/', $_SERVER['REQUEST_URI']) ? $indexName : $CATEGORYS[$languageId]['description'];?>
<?php $indexUrl = $languageId ? $siteUrl.'/'.$languageName : $CATEGORYS[$languageId]['url'];?>
<?php $currentUrl = preg_replace('/&language=\d+/', '', $_SERVER['REQUEST_URI']);?>
<?php $_LANG = array();?>
<?php $_LANG['SET_HOME_PAGE'][1] = '设为首页';?>
<?php $_LANG['SET_HOME_PAGE'][16] = 'Set Home page';?>
<?php $_LANG['LOGIN'][1] = '登录';?>
<?php $_LANG['LOGIN'][16] = 'Login';?>
<?php $_LANG['REGISTER'][1] = '注册';?>
<?php $_LANG['REGISTER'][16] = 'Register';?>
<?php $_LANG['LANGUAGE_CHINESE'] = '中文简体';?>
<?php $_LANG['LANGUAGE_ENGLISH'] = 'English';?>
<?php $_LANG['LANGUAGE_RUSSIAN'] = 'RU';?>
<?php $_LANG['NEWS'][1] = '资讯';?>
<?php $_LANG['NEWS'][16] = 'News';?>
<?php $_LANG['SEARCH'][1] = '搜索';?>
<?php $_LANG['SEARCH'][16] = 'Search';?>
<?php $_LANG['PARTICIPANTS_MANUAL'][1] = '参展商手册';?>
<?php $_LANG['PARTICIPANTS_MANUAL'][16] = 'Participants manual';?>
<?php $_LANG['FORM_DOWNLOAD'][1] = '表格下载';?>
<?php $_LANG['FORM_DOWNLOAD'][16] = 'Form Download';?>

<?php $_LANG['LOADING'][1] = '加载中';?>
<?php $_LANG['LOADING'][16] = 'Loading';?>
<?php $_LANG['MAIL'][1] = '邮箱';?>
<?php $_LANG['MAIL'][16] = 'Mail';?>
<?php $_LANG['USER_NAME'][1] = '用户名';?>
<?php $_LANG['USER_NAME'][16] = 'User name';?>
<?php $_LANG['PASSWORD'][1] = '密码';?>
<?php $_LANG['PASSWORD'][16] = 'Password';?>
<?php $_LANG['CONFIRM_PASSWORD'][1] = '确认密码';?>
<?php $_LANG['CONFIRM_PASSWORD'][16] = 'Confirm password';?>
<?php $_LANG['NICK_NAME'][1] = '昵称';?>
<?php $_LANG['NICK_NAME'][16] = 'Nick name';?>
<?php $_LANG['COMPANY_NAME'][1] = '公司名称';?>
<?php $_LANG['COMPANY_NAME'][16] = 'Organizer';?>
<?php $_LANG['COMPANY_DESCRIPTION'][1] = '公司简介';?>
<?php $_LANG['COMPANY_DESCRIPTION'][16] = 'Company description';?>
<?php $_LANG['LINK_MAN'][1] = '联系人';?>
<?php $_LANG['LINK_MAN'][16] = 'Link man';?>
<?php $_LANG['VERIFY_CODE'][1] = '验证码';?>
<?php $_LANG['VERIFY_CODE'][16] = 'Verify code';?>
<?php $_LANG['FORGET_PASSWORD'][1] = '找回密码';?>
<?php $_LANG['FORGET_PASSWORD'][16] = 'Forget password';?>
<?php $_LANG['MEMBER_TYPE'][1] = '会员类型';?>
<?php $_LANG['MEMBER_TYPE'][16] = 'Member type';?>
<?php $_LANG['SUPPLIER'][1] = '供应商';?>
<?php $_LANG['SUPPLIER'][16] = 'Supplier';?>
<?php $_LANG['BUYERS'][1] = '采购商';?>
<?php $_LANG['BUYERS'][16] = 'Buyers';?>
<?php $_LANG['INDIVIDUAL_MEMBER'][1] = '个人会员';?>
<?php $_LANG['INDIVIDUAL_MEMBER'][16] = 'Individual member';?>
<?php $_LANG['IMMEDIATELY_REGISTER'][1] = '立即注册';?>
<?php $_LANG['IMMEDIATELY_REGISTER'][16] = 'Immediately register';?>
<?php $_LANG['IMMEDIATELY_LOGIN'][1] = '立即登录';?>
<?php $_LANG['IMMEDIATELY_LOGIN'][16] = 'Immediately login';?>
<?php $_LANG['NEXT_STEP'][1] = '下一步';?>
<?php $_LANG['NEXT_STEP'][16] = 'Next step';?>
<?php $_LANG['VERIFICATION_USERNAME_WRONG_FORMAT'][1] = '用户名格式不对';?>
<?php $_LANG['VERIFICATION_USERNAME_WRONG_FORMAT'][16] = 'User name format is wrong';?>
<?php $_LANG['VERIFICATION_ENTER_USERNAME'][1] = '请输入用户名';?>
<?php $_LANG['USERNAME_LENGTH'][1] = '用户名长度必须在3-16个字符之间';?>
<?php $_LANG['USERNAME_LENGTH'][16] = 'Username length must be between 3-16 characters';?>
<?php $_LANG['VERIFICATION_ENTER_USERNAME'][16] = 'Please enter the user name';?>
<?php $_LANG['VERIFICATION_MAIL_WRONG_FORMAT'][1] = '邮箱格式不对';?>
<?php $_LANG['VERIFICATION_MAIL_WRONG_FORMAT'][16] = 'Email format is wrong';?>
<?php $_LANG['VERIFICATION_ENTER_MAIL'][1] = '请输入邮箱';?>
<?php $_LANG['VERIFICATION_ENTER_MAIL'][16] = 'Please enter the mailbox';?>
<?php $_LANG['VERIFICATION_PASSWORD_WRONG_FORMAT'][1] = '密码格式不对';?>
<?php $_LANG['VERIFICATION_PASSWORD_WRONG_FORMAT'][16] = 'Password wrong format';?>
<?php $_LANG['VERIFICATION_PASSWORD_WRONG_FORMAT2'][1] = '密码区分大小写，由6-16个英文字母和数字组成';?>
<?php $_LANG['VERIFICATION_PASSWORD_WRONG_FORMAT2'][16] = 'The password differentiate big small letter，by 6-16 English letter and the numeral is composed';?>
<?php $_LANG['VERIFICATION_LENGTH_ERROR'][1] = '请输入6-165位长度';?>
<?php $_LANG['VERIFICATION_LENGTH_ERROR'][16] = 'Please enter 6-165 bit length';?>
<?php $_LANG['VERIFICATION_ENTER_PASSWORD'][1] = '请输入密码';?>
<?php $_LANG['VERIFICATION_ENTER_PASSWORD'][16] = 'Please enter the password';?>
<?php $_LANG['VERIFICATION_ENTER_CODE'][1] = '请输入验证码';?>
<?php $_LANG['VERIFICATION_ENTER_CODE'][16] = 'Please enter the verification code';?>
<?php $_LANG['VERIFICATION_PASSWORDS_DO_NOT_MATCH'][1] = '密码不一致';?>
<?php $_LANG['VERIFICATION_PASSWORDS_DO_NOT_MATCH'][16] = 'Passwords do not match';?>


<?php $_LANG['FROM_THE_ISLE_DATE'][1] = '2017年2月15—18日';?>
<?php $_LANG['FROM_THE_ISLE_DATE'][16] = 'FEBRUARY 15-18, 2017';?>

<?php $_LANG['FROM_THE_ISLE_QDATE'][1] = '2016年7月01—10日';?>
<?php $_LANG['FROM_THE_ISLE_QDATE'][16] = 'FEBRUARY 15-18, 2017';?>

<?php $_LANG['DAYS'][1]='天';?>
<?php $_LANG['DAYS'][16]='Days';?>
<?php $_LANG['EXHIBITION_TIME'][1]='参展时间';?>
<?php $_LANG['EXHIBITION_TIME'][16]='Exhibition Time';?>
<?php $_LANG['ADDR'][1]='地址'?>
<?php $_LANG['ADDR'][16]='Add'?>
<?php $_LANG['TEL'][1]='参观咨询：020-89128136'?>
<?php $_LANG['TEL'][16]='Tel：020-89128136'?>
<?php $_LANG['FAX'][1]='传真'?>
<?php $_LANG['FAX'][16]='Fax'?>
<?php $_LANG['TIMEVENUE'][1]='展会时间地点'?>
<?php $_LANG['TIMEVENUE'][16]='Time & Venue'?>
<?php $_LANG['TIME'][1]='时间';?>
<?php $_LANG['TIME'][16]='Time';?>

<?php $_LANG['MORE'][1] = '更多';?>
<?php $_LANG['MORE'][16] = 'more';?>
<?php $_LANG['COPYRIGHT'][1]='版权所有：中国对外贸易广州展览总公司、北京雅森国际展览有限公司'?>
<?php $_LANG['COPYRIGHT'][16]='All rights reserved: China Foreign Trade Guangzhou Exhibition General Corp.YASN Internation Exhibit Limited.'?>

<?php $_LANG['ADDRNAME'][1]='参展联系：020-89128198  010-57970888'?>
<?php $_LANG['ADDRNAME'][16]='Exhibitor Contact：020-89128198  010-57970888'?>

