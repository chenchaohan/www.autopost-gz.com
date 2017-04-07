<?php



defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('foreground');
pc_base::load_sys_class('format', '', 0);
pc_base::load_sys_class('form', '', 0);

class index {
	private $db;

	function __construct() {
		$this->db = pc_base::load_model('form_model');
		$this->db_canzhan = pc_base::load_model('form_canzhan_model');
        $this->db_tezhuang = pc_base::load_model('form_tezhuang_model');
        $this->db_caigoum = pc_base::load_model('form_caigoum_model');
		$this->db_caigou_en = pc_base::load_model('form_caigou_en_model');
		$this->db_yuyue = pc_base::load_model('form_yuyue_model');
		$this->db_email_record = pc_base::load_model('email_record_model');

		//2016/1/12

		//isle02、isle03、isle06
		//密码：GZisle111222333
		//isle@cantonfairad.com //Cantonfairad12
		$email_list = array(
			array('email_username'=>'isle@cantonfairad.com','email_passowd'=>'Cantonfairad12','email_from'=>'isle@cantonfairad.com'),
			array('email_username'=>'isle02@cantonfairad.com','email_passowd'=>'GZisle111222333','email_from'=>'isle02@cantonfairad.com'),
			array('email_username'=>'isle03@cantonfairad.com','email_passowd'=>'GZisle111222333','email_from'=>'isle03@cantonfairad.com'),
			array('email_username'=>'isle06@cantonfairad.com','email_passowd'=>'GZisle111222333','email_from'=>'isle06@cantonfairad.com'),
		);
		$email_key = array_rand($email_list,1);//随机抽取1个企业邮箱
		//var_dump($email_list[$email_key]);exit;
		$this->email_username = $email_list[$email_key]['email_username'];// 邮局用户名(请填写完整的email地址)
		$this->email_passowd = $email_list[$email_key]['email_passowd'];// 邮局密码
		$this->email_from = $email_list[$email_key]['email_from'];//邮件发送者email地址
	}

	public function init() {
        $lists=$this->obj->listinfo();
        var_dump($lists);
        include template('form','form');
		//exit('init');
	}


	public function caigou() {
        pc_base::load_sys_class('form', '', 0);
		include template('form', 'caigou');
	}
    public function canzhan() {
        pc_base::load_sys_class('form', '', 0);
        include template('form', 'canzhan');
    }
    public function tezhuang() {
        pc_base::load_sys_class('form', '', 0);
        include template('form', 'tezhuang');
    }
    public function caigouM() {
        pc_base::load_sys_class('form', '', 0);
        include template('form', 'caigouM');
    }
    private function _session_start() {
        $session_storage = 'session_'.pc_base::load_config('system','session_storage');
        pc_base::load_sys_class($session_storage);
    }
    /*采购意向发布*/
    public function post_caigoum() {
        $this->_session_start();
        $content= $_POST['content'];
        $_POST['dosubmit']=1;
       if(isset($_POST['dosubmit'])) {
                if ((empty($_SESSION['connectid']) && $_SESSION['code'] != strtolower($_POST['code']) && $_POST['code']!==NULL) || empty($_SESSION['code'])) {
                    showmessage(L('code_error'));
                } else {
                    $_SESSION['code'] = '';
                }
        }
            /*插入到数据库*/
            $this->db_caigoum->insert(array(
            'content' => $content,
        ));
		
         showmessage('提交成功','index.php');
    }
     /*采购*/
	public function post() {
        $this->_session_start();
		$name= $_POST['name'];
		$address= $_POST['address'];
		$agency= $_POST['agency'];
		$industry= $_POST['industry'];
		$show_ad =$_POST['checkbox'];
		$show_ad=implode('-',$show_ad);
		$show_led =$_POST['checkbox2'];
		$show_led=implode('-',$show_led);
		$diaocha=$_POST['checkbox3'];
		$diaocha=implode('-',$diaocha);
		$item= $_POST['item'];
		$leader= $_POST['leader'];
		$sex= $_POST['sex'];
		$duty= $_POST['duty'];
		$phone= $_POST['phone'];
		$email= $_POST['email'];
		$suijima=rand(000001,800000);
		$cunzai=$this->db->select(array(
			'suijima' => $suijima,));
		if($cunzai){
			$suijima=rand(800000,900000);
			}
		$cunzai1=$this->db->select(array(
			'suijima' => $suijima,));
		if($cunzai1){
			$suijima=rand(900000,999999);
			}
       /* if(isset($_POST['dosubmit'])) {
                if ((empty($_SESSION['connectid']) && $_SESSION['code'] != strtolower($_POST['code']) && $_POST['code']!==NULL) || empty($_SESSION['code'])) {
                    showmessage(L('code_error'));
                } else {
                    $_SESSION['code'] = '';
                }
        }*/
		    /*插入到数据库*/
	    	$this->db->insert(array(
			'name' => $name,
			'address' => $address,
			'agency' => $agency,
			'industry' => $industry,
			'show_ad' => $show_ad,
			'show_led' => $show_led,
	    	'diaocha' => $diaocha,
			'item' => $item,
			'leader' => $leader,
			'sex' => $sex,
			'duty' => $duty,
			'phone' => $phone,
			'email' => $email,
			'suijima' => $suijima,
			'create_time'=>time()

		));
	    if ($email){
		include PHPCMS_PATH.'/phpcms/modules/form/classes/PHPMailer.class.php'; //下载的文件必须放在该文件所在目录
		$mail = new PHPMailer(); //建立邮件发送类
		$addemail =$email;
		$mail->CharSet = 'UTF-8';
		$mail->IsSMTP(); // 使用SMTP方式发送
		$mail->Host = "smtp.qiye.163.com"; // 您的企业邮局域名
		$mail->SMTPAuth = true; // 启用SMTP验证功能
		$mail->Username = $this->email_username; // 邮局用户名(请填写完整的email地址)
		$mail->Password = $this->email_passowd; // 邮局密码
		$mail->Port=25;
		$mail->From = $this->email_from; //邮件发送者email地址
		$mail->FromName = "广州国际智能广告及LED展
";
		$mail->AddAddress("$addemail", "a");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
		//$mail->AddReplyTo("", "");
		 
		//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
		$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
		 
		$mail->Subject = "观众网上预登记确认函
"; //邮件标题
		$mail->Body =<<<BEGIN
	<style type="text/css">
		body{font-family:Arial;margin:0;padding:0;font-size:14px;}
		p{margin:0;padding:0;}
		.content{width:610px;margin:0 auto;}
		.center{text-align:center;}
		table.coll {width:425px;border-collapse: collapse;border-color:#000;}
		table.coll td{border-color:#000;padding:10px;}
		table.date td{padding:2px 25px;padding-left:0px;}

	</style>
	<div class="wrapper">
		<div class="content">
			<div class="center">
				<img src="http://www.isle.org.cn/statics/led/images/header_logo.png"  />	
			</div>
			<br>
			<div class="center">
				<p><b>观众网上预登记确认函</b></p>
				<b style="line-height: 20px;">Visitor Online Pre-registration Confirmation</b>
			</div>
			<p>
			尊敬的客户：感谢您预登记参加2016广州国际广告标识及LED展览会，请保留网上预登记确认函并持纸质打印件参观。
			</p>
			<p style="margin-bottom:20px;line-height: 20px;">
			Dear Valuable Clients：Thank you for pre-registering to attend ISLE 2016，please keep the online pre-registration confirmation and visit the show with the confirmation paper.
			</p>
			<div style="margin-bottom:20px;">
				<table class="coll center" border="1">
				<tr>
					<td width="180">姓名<br><b>Name</b></td>
					<td>$leader</td>
				</tr>
				<tr>
					<td>预登记号<br><b>Pre-registration Number</b></td>
					<td>$suijima</td>
				</tr>
				</table>
			</div>
			<p>展会时间 Exhibition Dates：</p>
			<table class="date">
				<tr>
					<td><b>二月 February 24 – 26, 2016</b></td>
					<td><b>9:30am—5:30pm</b></td>
				</tr>
				<tr>
					<td><b>二月 February 27，2016</b></td>
					<td><b>9:30am—2:00pm</b></td>
				</tr>
			</table>
			<div style="margin-top:20px;margin-bottom:50px;">
			展会地点 Exhibition Venue：
			<p><b>中国广州市海珠区阅江中路382号广交会展馆B区</b></p>
			<p><b>Area B, Canton Fair Complex,No. 382,Yuejiang Zhong Road,Guangzhou,China</b></p>
			</div>
			<p>开年盛会，与您相约广州！</p>
			<p>Hope to meet you in the grand ISLE at Guangzhou！</p>
			<div class="center" style="margin-top:70px;margin-bottom:30px;">
			<p>For more details please visit</p>
			<a href="http://www.isle.org.cn" target="_blank">www.isle.org.cn</a>
			</div>
      
			<div class="center" style="margin-bottom:70px;">
				<img src="http://www.isle.org.cn/statics/led/images/footer_logo.png"  />	
			</div>
		</div>
	</div>
BEGIN;

		//"; //邮件内容
		//$mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略
		 
		if(!$mail->Send())
		{
		echo "邮件发送失败. <p>";
		echo "错误原因: " . $mail->ErrorInfo;
		exit;
		}
		}
		
	     showmessage('提交成功','index.php');
	}

	/*采购英文 2015/11/20*/
	public function post_en() {
		$this->_session_start();

		$name = $_POST['name'];
		$position = $_POST['position'];
		$email = $_POST['email'];
		$sex = $_POST['sex'];
		$phone_country = $_POST['phone_country'];
		$phone_area = $_POST['phone_area'];
		$phone_number = $_POST['phone_number'];
		$company_name = $_POST['company_name'];
		$country = $_POST['country'];
		$tel_country = $_POST['tel_country'];
		$tel_area = $_POST['tel_area'];
		$tel_number = $_POST['tel_number'];
		$fax_country = $_POST['fax_country'];
		$fax_area = $_POST['fax_area'];
		$fax_number = $_POST['fax_number'];
		$address = $_POST['address'];
		$zip = $_POST['zip'];
		$website = $_POST['website'];
		$about_isle = $_POST['about_isle'];
		$sign_product = implode('，',$_POST['sign_product']);
		$led_product = implode('，',$_POST['led_product']);

		$about_isle_Other = $_POST['about_isle_Other'];
		$sign_product_other = $_POST['sign_product_other'];
		$led_product_other = $_POST['led_product_other'];
		$suggestion = $_POST['suggestion'];
        
		$suijima=rand(000001,800000);
		$cunzai=$this->db_caigou_en->select(array('suijima' => $suijima,));
		if($cunzai){$suijima=rand(800000,900000);}
		$cunzai1=$this->db_caigou_en->select(array('suijima' => $suijima,));
		if($cunzai1){$suijima=rand(900000,999999);}

		$data = array(
			'name' =>$name,
			'position' =>$position,
			'email' =>$email,
			'sex' =>$sex,
			'mobile' =>$phone_country.'-'.$phone_area.'-'.$phone_number,
			'company_name' =>$company_name,
			'country' =>$country,
			'tel' =>$tel_country.'-'.$tel_area.'-'.$tel_number,
			'fax' =>$fax_country.'-'.$fax_area.'-'.$fax_number,
			'address' =>$address,
			'zip' =>$zip,
			'website' =>$website,
			'about_isle' =>(!empty($about_isle)&&empty($about_isle_other)) ? $about_isle : $about_isle_other,
			'sign_product' =>(!empty($sign_product)&&empty($sign_product_other)) ? $sign_product : $sign_product_other,
			'led_product' =>(!empty($led_product)&&empty($led_product_other)) ? $led_product : $led_product_other,
			'suggestion' =>$suggestion,
			'suijima' => $suijima,
			'create_time'=>time()
		);
		//var_dump($data);exit;
		/*插入到数据库*/
		$this->db_caigou_en->insert($data);
	    if ($email){
		include PHPCMS_PATH.'/phpcms/modules/form/classes/PHPMailer.class.php'; //下载的文件必须放在该文件所在目录
		$mail = new PHPMailer(); //建立邮件发送类
		$addemail =$email;
		$mail->CharSet = 'UTF-8';
		$mail->IsSMTP(); // 使用SMTP方式发送
		$mail->Host = "smtp.qiye.163.com"; // 您的企业邮局域名
		$mail->SMTPAuth = true; // 启用SMTP验证功能
		$mail->Username = $this->email_username; // 邮局用户名(请填写完整的email地址)
		$mail->Password = $this->email_passowd; // 邮局密码
		$mail->Port=25;
		$mail->From = $this->email_from; //邮件发送者email地址
		$mail->FromName = "广州国际智能广告及LED展
";
		$mail->AddAddress("$addemail", "a");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
		//$mail->AddReplyTo("", "");
		 
		//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
		$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
		 
		$mail->Subject = "观众网上预登记确认函
"; //邮件标题
		$mail->Body =<<<BEGIN
	<style type="text/css">
		body{font-family:Arial;margin:0;padding:0;font-size:14px;}
		p{margin:0;padding:0;}
		.content{width:610px;margin:0 auto;}
		.center{text-align:center;}
		table.coll {width:425px;border-collapse: collapse;border-color:#000;}
		table.coll td{border-color:#000;padding:10px;}
		table.date td{padding:2px 25px;padding-left:0px;}

	</style>
	<div class="wrapper">
		<div class="content">
			<div class="center">
				<img src="http://www.isle.org.cn/statics/led/images/header_logo.png"  />	
			</div>
			<br>
			<div class="center">
				<p><b>观众网上预登记确认函</b></p>
				<b style="line-height: 20px;">Visitor Online Pre-registration Confirmation</b>
			</div>
			<p>
			尊敬的客户：感谢您预登记参加2016广州国际广告标识及LED展览会，请保留网上预登记确认函并持纸质打印件参观。
			</p>
			<p style="margin-bottom:20px;line-height: 20px;">
			Dear Valuable Clients：Thank you for pre-registering to attend ISLE 2016，please keep the online pre-registration confirmation and visit the show with the confirmation paper.
			</p>
			<div style="margin-bottom:20px;">
				<table class="coll center" border="1">
				<tr>
					<td width="180">姓名<br><b>Name</b></td>
					<td>$name</td>
				</tr>
				<tr>
					<td>预登记号<br><b>Pre-registration Number</b></td>
					<td>$suijima</td>
				</tr>
				</table>
			</div>
			<p>展会时间 Exhibition Dates：</p>
			<table class="date">
				<tr>
					<td><b>二月 February 24 – 26, 2016</b></td>
					<td><b>9:30am—5:30pm</b></td>
				</tr>
				<tr>
					<td><b>二月 February 27，2016</b></td>
					<td><b>9:30am—2:00pm</b></td>
				</tr>
			</table>
			<div style="margin-top:20px;margin-bottom:50px;">
			展会地点 Exhibition Venue：
			<p><b>中国广州市海珠区阅江中路382号广交会展馆B区</b></p>
			<p><b>Area B, Canton Fair Complex,No. 382,Yuejiang Zhong Road,Guangzhou,China</b></p>
			</div>
			<p>开年盛会，与您相约广州！</p>
			<p>Hope to meet you in the grand ISLE at Guangzhou！</p>
			<div class="center" style="margin-top:70px;margin-bottom:30px;">
			<p>For more details please visit</p>
			<a href="http://www.isle.org.cn" target="_blank">www.isle.org.cn</a>
			</div>
      
			<div class="center" style="margin-bottom:70px;">
				<img src="http://www.isle.org.cn/statics/led/images/footer_logo.png"  />	
			</div>
		</div>
	</div>
BEGIN;

		//"; //邮件内容
		//$mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略
		 
		if(!$mail->Send())
		{
		echo "邮件发送失败. <p>";
		echo "错误原因: " . $mail->ErrorInfo;
		exit;
		}
		}
		
	     showmessage('提交成功','index.php');
	}

/*采购英文 2015/11/28*/
	public function caigou_cn() {
		if(!$_POST){
			showmessage('Forbidden!');
			exit;
		}
		$title = $_POST['title'];
		$name = $_POST['name'];
		$tel = $_POST['tel'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$company_name = $_POST['company_name'];
		$position = $_POST['position'];
		$address = $_POST['address'];
		$interest_product = implode('，',$_POST['interest_product']);
		
		$learn_isle = $_POST['learn_isle'];
		$czs_rec = $_POST['czs_rec'];
		$other = $_POST['other'];
		$suggestion = $_POST['suggestion'];
		$lan = intval($_POST['lan']);

		$is_firend = $_POST['is_firend'];
		if($is_firend){
			$f_title = $_POST['f_title'];
			$f_name = $_POST['f_name'];
			$f_tel = $_POST['f_tel'];
			$f_mobile = $_POST['f_mobile'];
			$f_email = $_POST['f_email'];
			$f_company_name = $_POST['f_company_name'];
			$f_position = $_POST['f_position'];
		}
        
//		$suijima=rand(000001,800000);
//		$cunzai=$this->db_yuyue->select(array('suijima' => $suijima,));
//		if($cunzai){$suijima=rand(800000,900000);}
//		$cunzai1=$this->db_yuyue->select(array('suijima' => $suijima,));
//		if($cunzai1){$suijima=rand(900000,999999);}

		$data = array(
			'title' =>$title,
			'name' =>$name,
			'tel' =>$tel,
			'mobile' =>$mobile,
			'email' =>$email,
			'company_name' =>$company_name,
			'position' =>$position,
			'address' =>$address,
			'interest_product' =>$interest_product,
			'learn_isle' =>(!empty($czs_rec)&&$learn_isle==1) ? $czs_rec : ((!empty($other)&&$learn_isle==2) ? $other : $learn_isle),
			'suggestion' =>$suggestion,
			//
			'f_title' =>$f_title,
			'f_name' =>$f_name,
			'f_tel' =>$f_tel,
			'f_mobile' =>$f_mobile,
			'f_email' =>$f_email,
			'f_company_name' =>$f_company_name,
			'f_position' =>$f_position,
			'f_suijima' => ($is_firend)?$this->rand_number(8):'',
			'suijima' => $this->rand_number(8),
			'lan' => $lan,
			'create_time'=>time()
		);
		//var_dump($data);exit;
		/*插入到数据库*/
		$ret_id = $this->db_yuyue->insert($data,true);
	    if($email){
			include PHPCMS_PATH.'/phpcms/modules/form/classes/PHPMailer.class.php'; //下载的文件必须放在该文件所在目录
			$sendto_arr = array(
				0=>array('email'=>$email,'name'=>$name,'suijima'=>$data['suijima']),
				1=>array('email'=>$f_email,'name'=>$f_name,'suijima'=>$data['f_suijima']),
			);
			$pattern="/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
			for($i=0;$i<count($sendto_arr);$i++){//发送多人
				if(!empty($sendto_arr[$i]['email']) && preg_match($pattern,$email)){
					$ret_data = $this->send_email($sendto_arr[$i],$lan);// 收件人邮箱地址
					if($ret_data !== true){//邮件失败
						$edata = $sendto_arr[$i];
						$edata['id'] = $ret_id;
						$edata['body'] = addslashes($ret_data);//邮件内容
						$edata['create_time'] = $data['create_time'];
						$this->db_email_record->insert($edata);
						//var_dump($edata);exit;
						if($lan==2){
							showmessage('Successfully Submitted!Send Mail failed','/en/');
						}else{
							showmessage('提交成功,邮件发送失败','index.php');
						}
					}
				}
			}
		}
		if($lan==2){
			showmessage('Successfully Submitted!','/en/');
		}else{
			showmessage('提交成功','index.php');
		}
	}
	
	//产生随机数
	function rand_number($n=6){
		$num_str = '';
		for($i=1;$i<=$n;$i++){
			$num = rand(0,9);
			if($i==1 && $num==0){//第一位是0
				$num=rand(1,9);
			}
			$num_str .= $num;
		}
		return $num_str;
	}

	//邮件发送
	function send_email($info,$lan=1){
		$email = $info['email'];
		$name  = $info['name'];
		$suijima = $info['suijima'];
		$mail = new PHPMailer(); //建立邮件发送类
		$mail->CharSet = 'UTF-8';
		$mail->IsSMTP(); // 使用SMTP方式发送
		$mail->Host = "smtp.qiye.163.com"; // 您的企业邮局域名
		$mail->SMTPAuth = true; // 启用SMTP验证功能
		$mail->Username = $this->email_username; // 邮局用户名(请填写完整的email地址)
		$mail->Password = $this->email_passowd; // 邮局密码
		$mail->Port=25;
		$mail->From = $this->email_from; //邮件发送者email地址
		$mail->FromName = "广州国际智能广告及LED展
";
		$mail->AddAddress($email, "a");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
		//$mail->AddReplyTo("", "");
		 
		//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
		$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
		 
		$mail->Subject = "观众网上预登记确认函
"; //邮件标题
		$mail->Body =<<<BEGIN
	<style type="text/css">
		body{font-family:Arial;margin:0;padding:0;font-size:14px;}
		p{margin:0;padding:0;}
		.content{width:610px;margin:0 auto;}
		.center{text-align:center;}
		table.coll {width:425px;border-collapse: collapse;border-color:#000;}
		table.coll td{border-color:#000;padding:10px;}
		table.date td{padding:2px 25px;padding-left:0px;}

	</style>
	<div class="wrapper">
		<div class="content">
			<div class="center">
				<img src="http://www.isle.org.cn/statics/led/images/header_logo.png"  />	
			</div>
			<br>
			<div class="center">
				<p><b>观众网上预登记确认函</b></p>
				<b style="line-height: 20px;">Visitor Online Pre-registration Confirmation</b>
			</div>
			<p>
			尊敬的客户：感谢您预登记参加2016广州国际广告标识及LED展览会，请保留网上预登记确认函并持纸质打印件参观。
			</p>
			<p style="margin-bottom:20px;line-height: 20px;">
			Dear Valuable Clients：Thank you for pre-registering to attend ISLE 2016，please keep the online pre-registration confirmation and visit the show with the confirmation paper.
			</p>
			<div style="margin-bottom:20px;">
				<table class="coll center" border="1">
				<tr>
					<td width="180">姓名<br><b>Name</b></td>
					<td>$name</td>
				</tr>
				<tr>
					<td>预登记号<br><b>Pre-registration Number</b></td>
					<td>$suijima</td>
				</tr>
				</table>
			</div>
			<p>展会时间 Exhibition Dates：</p>
			<table class="date">
				<tr>
					<td><b>二月 February 24 – 26, 2016</b></td>
					<td><b>9:30am—5:30pm</b></td>
				</tr>
				<tr>
					<td><b>二月 February 27，2016</b></td>
					<td><b>9:30am—2:00pm</b></td>
				</tr>
			</table>
			<div style="margin-top:20px;margin-bottom:50px;">
			展会地点 Exhibition Venue：
			<p><b>中国广州市海珠区阅江中路382号广交会展馆B区</b></p>
			<p><b>Area B, Canton Fair Complex,No. 382,Yuejiang Zhong Road,Guangzhou,China</b></p>
			</div>
			<p>开年盛会，与您相约广州！</p>
			<p>如需了解更多详情，请发至isle@cantonfairad.com</p>
			<p>If you have any inquiry about ISLE 2016, please email to us: isle@cantonfairad.com</p>
			<p>Hope to meet you in the grand ISLE at Guangzhou！</p>
			<div class="center" style="margin-top:70px;margin-bottom:30px;">
			<p>For more details please visit</p>
			<a href="http://www.isle.org.cn" target="_blank">www.isle.org.cn</a>
			</div>
      
			<div class="center" style="margin-bottom:70px;">
				<img src="http://www.isle.org.cn/statics/led/images/footer_logo.png"  />	
			</div>
		</div>
	</div>
BEGIN;

		//"; //邮件内容
		//$mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略
		if(!$mail->Send()){//
			//echo "邮件发送失败. <p>";
			//echo "错误原因: " . $mail->ErrorInfo;
			//exit;
			return $mail->Body;

		}else{
			return true;
		}
	}


    /*特装网上申请表*/
    public function post_tezhuang() {
        $this->_session_start();
        $name= $_POST['name'];
        $address= $_POST['address'];
        $order= $_POST['order'];
        $standard= $_POST['standard'];
        $raw= $_POST['raw'];
        $gg= $_POST['checkbox'];
        $gg=implode('-',$gg);
        $led= $_POST['checkbox2'];
        $led=implode('-',$led);
        $zhuying =$_POST['zhuying'];
        $string="";
        $comma = '';
        foreach($zhuying as $key=>$value){
                if($value) {
                    $string .= $comma.$value;
                    $comma = '-';
                }
        }
        
        $introduction= $_POST['introduction'];
        $leader= $_POST['leader'];
        $sex= $_POST['sex'];
        $duty= $_POST['duty'];
        $phone= $_POST['phone'];
        $email= $_POST['email'];

        if(isset($_POST['dosubmit'])) {
                if ((empty($_SESSION['connectid']) && $_SESSION['code'] != strtolower($_POST['code']) && $_POST['code']!==NULL) || empty($_SESSION['code'])) {
                    showmessage(L('code_error'));
                } else {
                    $_SESSION['code'] = '';
                }
        }
            /*插入到数据库*/
            $this->db_tezhuang->insert(array(
            'name' => $name,
            'address' => $address,
            'order' => $order,
            'gg' => $gg,
            'led' => $led,
            'zhuying' => $string,
            'introduction' => $introduction,
            'leader' => $leader,
            'sex' => $sex,
            'duty' => $duty,
            'phone' => $phone,
            'email' => $email
        ));
		if ($email){
		include PHPCMS_PATH.'/phpcms/modules/form/classes/PHPMailer.class.php'; //下载的文件必须放在该文件所在目录
		$mail = new PHPMailer(); //建立邮件发送类
		$addemail =$email;
		$mail->CharSet = 'UTF-8';
		$mail->IsSMTP(); // 使用SMTP方式发送
		$mail->Host = "smtp.qiye.163.com"; // 您的企业邮局域名
		$mail->SMTPAuth = true; // 启用SMTP验证功能
		$mail->Username = $this->email_username; // 邮局用户名(请填写完整的email地址)
		$mail->Password = $this->email_passowd; // 邮局密码
		$mail->Port=25;
		$mail->From = $this->email_from; //邮件发送者email地址
		$mail->FromName = "广州国际智能广告及LED展

";
		$mail->AddAddress("$addemail", "a");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
		//$mail->AddReplyTo("", "");
		 
		//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
		//$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
		 
		$mail->Subject = "您好！您的信息已经登记成功。

"; //邮件标题
		$mail->Body = "
您好！您的信息已经登记成功，稍后会有工作人员跟您联系。谢谢！

		"; //邮件内容
		//$mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略
		 
		if(!$mail->Send())
		{
		echo "邮件发送失败. <p>";
		echo "错误原因: " . $mail->ErrorInfo;
		exit;
		}
		}
         showmessage('提交成功','index.php');
    }

	public function post_canzhan() {
        $this->_session_start();
		$name= $_POST['name'];
		$address= $_POST['address'];
		$weburl= $_POST['weburl'];
		$standard= $_POST['standard'];
		$raw= $_POST['raw'];
		$gg= $_POST['checkbox'];
		$gg=implode('-',$gg);
		$led= $_POST['checkbox2'];
		$led=implode('-',$led);
		$zhuying =$_POST['zhuying'];
		$string="";
		$comma = '';
		foreach($zhuying as $key=>$value){
				if($value) {
					$string .= $comma.$value;
					$comma = '-';
				}
		}
		
		$introduction= $_POST['introduction'];
		$leader= $_POST['leader'];
		$sex= $_POST['sex'];
		$duty= $_POST['duty'];
		$phone= $_POST['phone'];
        $email= $_POST['email'];
        if(isset($_POST['dosubmit'])) {
                if ((empty($_SESSION['connectid']) && $_SESSION['code'] != strtolower($_POST['code']) && $_POST['code']!==NULL) || empty($_SESSION['code'])) {
                    showmessage(L('code_error'));
                } else {
                    $_SESSION['code'] = '';
                }
        }
/****************************************************************************** 
 
参数说明: 
$max_file_size  : 上传文件大小限制, 单位BYTE 
$destination_folder : 上传文件路径 
$watermark   : 是否附加水印(1为加水印,其他为不加水印); 
 
使用说明: 
1. 将PHP.INI文件里面的"extension=php_gd2.dll"一行前面的;号去掉,因为我们要用到GD库; 
2. 将extension_dir =改为你的php_gd2.dll所在目录; 
******************************************************************************/  
  
//上传文件类型列表  
if (is_uploaded_file($_FILES["upfile"][tmp_name])) { 
$uptypes=array(  
    'image/jpg',  
    'image/jpeg',  
    'image/png',  
    'image/pjpeg',  
    'image/gif',  
    'image/bmp',  
    'image/x-png'  
);  
  
$max_file_size=2000000;     //上传文件大小限制, 单位BYTE  
$destination_folder="uploadfile/zhizhao/"; //上传文件路径  
$watermark=0;      //是否附加水印(1为加水印,其他为不加水印);  
$watertype=1;      //水印类型(1为文字,2为图片)  
$waterposition=1;     //水印位置(1为左下角,2为右下角,3为左上角,4为右上角,5为居中);  
$waterstring="";  //水印字符串  
$waterimg="";    //水印图片  
$imgpreview=1;      //是否生成预览图(1为生成,其他为不生成);  
$imgpreviewsize=1/2;    //缩略图比例 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    if (!is_uploaded_file($_FILES["upfile"][tmp_name]))  
    //是否存在文件  
    {  
          
         exit;  
    }  
  
    $file = $_FILES["upfile"];  
    if($max_file_size < $file["size"])  
    //检查文件大小  
    {  
        echo "文件太大!";  
        exit;  
    }  
  
    if(!in_array($file["type"], $uptypes))  
    //检查文件类型  
    {  
        echo "文件类型不符!".$file["type"];  
        exit;  
    }  
  
    if(!file_exists($destination_folder))  
    {  
        mkdir($destination_folder);  
    }  
  
    $filename=$file["tmp_name"];  
    $image_size = getimagesize($filename);  
    $pinfo=pathinfo($file["name"]);  
    $ftype=$pinfo['extension'];  
    $destination = $destination_folder.time().".".$ftype;  
    if (file_exists($destination) && $overwrite != true)  
    {  
        echo "同名文件已经存在了";  
        exit;  
    }  
  
    if(!move_uploaded_file ($filename, $destination))  
    {  
        echo "移动文件出错";  
        exit;  
    }  
  
    $pinfo=pathinfo($destination);  
    $fname=$pinfo[basename];
    /*echo " <font color=red>已经成功上传</font><br>文件名:  <font color=blue>".$destination_folder.$fname."</font><br>";  
    echo " 宽度:".$image_size[0];  
    echo " 长度:".$image_size[1];  
    echo "<br> 大小:".$file["size"]." bytes";*/  
    if($watermark==1)  
    {  
        $iinfo=getimagesize($destination,$iinfo);  
        $nimage=imagecreatetruecolor($image_size[0],$image_size[1]);  
        $white=imagecolorallocate($nimage,255,255,255);  
        $black=imagecolorallocate($nimage,0,0,0);  
        $red=imagecolorallocate($nimage,255,0,0);  
        imagefill($nimage,0,0,$white);  
        switch ($iinfo[2])  
        {  
            case 1:  
            $simage =imagecreatefromgif($destination);  
            break;  
            case 2:  
            $simage =imagecreatefromjpeg($destination);  
            break;  
            case 3:  
            $simage =imagecreatefrompng($destination);  
            break;  
            case 6:  
            $simage =imagecreatefromwbmp($destination);  
            break;  
            default:  
            die("不支持的文件类型");  
            exit;  
        }  
  
        imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]);  
        imagefilledrectangle($nimage,1,$image_size[1]-15,80,$image_size[1],$white);  
  
        switch($watertype)  
        {  
            case 1:   //加水印字符串  
            imagestring($nimage,2,3,$image_size[1]-15,$waterstring,$black);  
            break;  
            case 2:   //加水印图片  
            $simage1 =imagecreatefromgif("xplore.gif");  
            imagecopy($nimage,$simage1,0,0,0,0,85,15);  
            imagedestroy($simage1);  
            break;  
        }  
  
        switch ($iinfo[2])  
        {  
            case 1:  
            //imagegif($nimage, $destination);  
            imagejpeg($nimage, $destination);  
            break;  
            case 2:  
            imagejpeg($nimage, $destination);  
            break;  
            case 3:  
            imagepng($nimage, $destination);  
            break;  
            case 6:  
            imagewbmp($nimage, $destination);  
            //imagejpeg($nimage, $destination);  
            break;  
        }  
  
        //覆盖原上传文件  
        imagedestroy($nimage);  
        imagedestroy($simage);  
    }  
		
    
    /*if($imgpreview==1)  
    {  
    echo "<br>图片预览:<br>";  
    echo "<img src=\"".$destination."\" width=".($image_size[0]*$imgpreviewsize)." height=".($image_size[1]*$imgpreviewsize);  
    echo " alt=\"图片预览:\r文件名:".$destination."\r上传时间:\">";  

    }*/
    }
}

	       $this->db_canzhan->insert(array(
            'name' => $name,
            'address' => $address,
            'weburl' => $weburl,
            'standard' => $standard,
            'raw' => $raw,
            'gg' => $gg,
            'led' => $led,
            'zhuying' => $string,
            'introduction' => $introduction,
            'leader' => $leader,
            'sex' => $sex,
            'duty' => $duty,
            'phone' => $phone,
            'email' => $email,
            'uploadimg' => ($destination_folder.$fname ? $destination_folder.$fname :'')

    ));
if ($email){
		include PHPCMS_PATH.'/phpcms/modules/form/classes/PHPMailer.class.php'; //下载的文件必须放在该文件所在目录
		$mail = new PHPMailer(); //建立邮件发送类
		$addemail =$email;
		
		$mail->IsSMTP(); // 使用SMTP方式发送
		$mail->Host = "smtp.qiye.163.com"; // 您的企业邮局域名
		$mail->SMTPAuth = true; // 启用SMTP验证功能
		$mail->Username = $this->email_username; // 邮局用户名(请填写完整的email地址)
		$mail->Password = $this->email_passowd; // 邮局密码
		$mail->Port=25;
		$mail->From = $this->email_from; //邮件发送者email地址
		$mail->FromName = "广州国际智能广告及LED展";
		$mail->AddAddress("$addemail", "a");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
		//$mail->AddReplyTo("", "");
		 
		//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
		//$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
		 
		$mail->Subject = "您好！您的信息已经登记成功。
"; //邮件标题
		$mail->Body = "
您好！您的信息已经登记成功，稍后会有工作人员跟您联系。谢谢！

		"; //邮件内容
		//$mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略
		 
		if(!$mail->Send())
		{
		echo "邮件发送失败. <p>";
		echo "错误原因: " . $mail->ErrorInfo;
		exit;
		}
		}

    showmessage('提交成功','index.php');

	}

	public function success() {
		include template('form', __FUNCTION__);
	}
}