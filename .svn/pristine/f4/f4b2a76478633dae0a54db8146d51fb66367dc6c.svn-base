<?php



defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('foreground');
pc_base::load_sys_class('format', '', 0);
pc_base::load_sys_class('form', '', 0);
pc_base::load_app_class('yuyue', '', 0);

class index extends yuyue{
	private $db;

	function __construct() {
		parent::__construct();
		$this->db = pc_base::load_model('form_model');
		$this->db_canzhan = pc_base::load_model('form_canzhan_model');
        $this->db_tezhuang = pc_base::load_model('form_tezhuang_model');
        $this->db_caigoum = pc_base::load_model('form_caigoum_model');
		//$this->db_caigou_en = pc_base::load_model('form_caigou_en_model');
		$this->db_yuyue = pc_base::load_model('form_yuyue_model');
		$this->db_email_record = pc_base::load_model('email_record_model');
		//2016/1/12
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
        $content= addslashes($_POST['content']);
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
			'time'=>date('Y-m-d H:i:s',time())
        ));
		
         showmessage('提交成功','index.php');
    }

	/*采购英文 2015/11/28*/
	//lan=3为接口提交
	public function caigou_cn() {
		$this->_session_start();
		//file_put_contents('/home/wwwroot/www.isle.org.cn/phpcms/modules/form/test.php',"<?php \nreturn " . stripslashes(var_export($_POST, true)) . ";",FILE_APPEND);
		if (!$_POST){
			exit('Forbidden!');
		}
		$title = $_POST['title'];
		$name = $_POST['name'];
		$country = $_POST['country'];
		$tel = $_POST['tel'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$company_name = $_POST['company_name'];
		$position = $_POST['position'];
		$address = $_POST['address'];
		$interest_product = is_array($_POST['interest_product'])?implode('，',$_POST['interest_product']):$_POST['interest_product'];
		
		$learn_isle = $_POST['learn_isle'];
		$czs_rec = $_POST['czs_rec'];
		$other = $_POST['other'];
		$suggestion = $_POST['suggestion'];
		$lan = intval($_POST['lan']);
		$area = intval($_POST['area']);
		$interest_zh = intval($_POST['interest_zh']);
		

		$is_friend = $_POST['is_friend'];
		if($is_friend){
			$f_title = $_POST['f_title'];
			$f_name = $_POST['f_name'];
			$f_tel = $_POST['f_tel'];
			$f_mobile = $_POST['f_mobile'];
			$f_email = $_POST['f_email'];
			$f_company_name = $_POST['f_company_name'];
			$f_position = $_POST['f_position'];
		}
        if($lan!=3){//接口
			$learn_isle = (!empty($czs_rec)&&$learn_isle==1) ? $czs_rec : ((!empty($other)&&$learn_isle==2) ? $other : $learn_isle);
		}
		$data = array(
			'title' =>$title,
			'name' =>$name,
			//'country' =>$country,
			'tel' =>$tel,
			'mobile' =>$mobile,
			'email' =>$email,
			'company_name' =>$company_name,
			'position' =>$position,
			'address' =>$address,
			'interest_product' =>$interest_product,
			'learn_isle' =>$learn_isle,
			'suggestion' =>$suggestion,
			
			//
			'f_title' =>$f_title,
			'f_name' =>$f_name,
			'f_tel' =>$f_tel,
			'f_mobile' =>$f_mobile,
			'f_email' =>$f_email,
			'f_company_name' =>$f_company_name,
			'f_position' =>$f_position,
			'f_suijima' => ($is_friend)?$this->rand_number(8):'',
			'suijima' => $this->rand_number(8),
			'lan' => $lan,
			'create_time'=>time()
		);
		if($area)$data['area'] =$area;//2016/5/26 地区
		if($interest_zh)$data['interest_zh'] =$interest_zh;

		//var_dump($data);exit;
		/*插入到数据库*/
		$ret_id = $this->db_yuyue->insert($data,true);
	    if($email && $ret_id){
			$sendto_arr = array(
				0=>array('email'=>$email,'name'=>$name,'suijima'=>$data['suijima'],'interest_zh'=>$data['interest_zh']),
				1=>array('email'=>$f_email,'name'=>$f_name,'suijima'=>$data['f_suijima'],'interest_zh'=>$data['interest_zh']),
			);
			
			$pattern="/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
			for($i=0;$i<count($sendto_arr);$i++){//发送多人
				if(!empty($sendto_arr[$i]['email']) && preg_match($pattern,$email)){
					$ret_data = $this->send_email($sendto_arr[$i],$lan);// 收件人邮箱地址
					if($ret_data['status'] !== true){//邮件失败
						$edata = $sendto_arr[$i];
						$edata['id'] = $ret_id;
						$edata['body'] = addslashes($ret_data['body']);//邮件内容
						$edata['create_time'] = $data['create_time'];
						$edata['status'] = -1;
						unset($edata['interest_zh']);//
						$this->db_email_record->insert($edata);
						$status = -1;
						
						//var_dump($edata);exit;
						showmessage($sendto_arr[$i]['email'].'数据提交成功,邮件发送失败<br/>'.$ret_data['errmsg'],HTTP_REFERER);
					}else{
						$_SESSION['send_email_info'][] = $sendto_arr[$i];//记录成功邮件session
						$_SESSION['interest_zh'] = $interest_zh;

						$status=1;
					}//
					$rdata = array('status'=>$status);
					$this->db_yuyue->update($rdata, array('id'=>$ret_id));
				}else{
				//
				}
			}
		}else{
			if($lan==2){
				showmessage('Fail Submitted!','/en/');
			}else if($lan==3){//俄文接口错误返回
				exit(json_encode(array('status'=>0,'error_code'=>'0001','msg'=>'Fail Submitted')));
			}else{
				showmessage('提交失败!','index.php');
			}
		}
		if($lan==2){
			showmessage("Successfully Submitted!<script>!function(w,d,e){
var _orderno=10*Math.random();  //替换此处!;
var b=location.href,c=d.referrer,f,s,g=d.cookie,h=g.match(/(^|;)\s*ipycookie=([^;]*)/),i=g.match(/(^|;)\s*ipysession=([^;]*)/);if (w.parent!=w){f=b;b=c;c=f;};u='//stats.ipinyou.com/cvt?a='+e('Ges.XLs.8syrhkk4M4L2w9lakuaAzP')+'&c='+e(h?h[2]:'')+'&s='+e(i?i[2].match(/jump\%3D(\d+)/)[1]:'')+'&u='+e(b)+'&r='+e(c)+'&rd='+(new Date()).getTime()+'&OrderNo='+e(_orderno)+'&e=';
function _(){if(!d.body){setTimeout(_(),100);}else{s= d.createElement('script');s.src = u;d.body.insertBefore(s,d.body.firstChild);}}_();
}(window,document,encodeURIComponent);
</script>",'/index.php?m=form&c=index&a=show_email&id='.$ret_id.'&vcode='.$data['create_time']);
		}else if($lan==3){//俄文接口成功返回
			exit(json_encode(array('status'=>1,'error_code'=>'','msg'=>'')));
		}else{
			showmessage("提交成功<script>!function(w,d,e){
var _orderno=10*Math.random();  //替换此处!;
var b=location.href,c=d.referrer,f,s,g=d.cookie,h=g.match(/(^|;)\s*ipycookie=([^;]*)/),i=g.match(/(^|;)\s*ipysession=([^;]*)/);if (w.parent!=w){f=b;b=c;c=f;};u='//stats.ipinyou.com/cvt?a='+e('Ges.XLs.8syrhkk4M4L2w9lakuaAzP')+'&c='+e(h?h[2]:'')+'&s='+e(i?i[2].match(/jump\%3D(\d+)/)[1]:'')+'&u='+e(b)+'&r='+e(c)+'&rd='+(new Date()).getTime()+'&OrderNo='+e(_orderno)+'&e=';
function _(){if(!d.body){setTimeout(_(),100);}else{s= d.createElement('script');s.src = u;d.body.insertBefore(s,d.body.firstChild);}}_();
}(window,document,encodeURIComponent);
</script>",'/index.php?m=form&c=index&a=show_email&id='.$ret_id.'&vcode='.$data['create_time']);

		}
	}

	//显示邮件模板
	function show_email(){
		$vcode = trim($_GET['vcode']);
		$id = trim($_GET['id']);
		if(empty($vcode) && !$id){
			showmessage("缺少参数",'/index.php');
			exit;
		}
		$where = " id='$id' AND create_time='{$vcode}'  ";//发送邮件
		$ret_data = $this->db_yuyue->get_one($where, '*');

		if(!empty($ret_data) && $ret_data['status']==1){
		$sendto_arr = array(
				0=>array('email'=>$ret_data['email'],'name'=>$ret_data['name'],'suijima'=>$ret_data['suijima'],'interest_zh'=>$ret_data['interest_zh']),
				1=>array('email'=>$ret_data['f_email'],'name'=>$ret_data['f_name'],'suijima'=>$ret_data['f_suijima'],'interest_zh'=>$ret_data['interest_zh']),
			);

//var_dump($ret_data['interest_zh']);exit;

		$email_tpl = '';
		for($i=0;$i<count($sendto_arr);$i++){//发送多人
			if(!empty($sendto_arr[$i]['email'])){
				$email = $sendto_arr[$i]['email'];
				$name  = $sendto_arr[$i]['name'];
				$suijima = $sendto_arr[$i]['suijima'];
				//引入邮件模板文件
				require(PHPCMS_PATH.'/phpcms/modules/form/classes/email_tpl.php');

				$email_tpl .= $ret_data['interest_zh']?$EMAIL_TPL[$ret_data['interest_zh']]:$EMAIL_TPL[1];//2016/5/31
				$email_tpl .= '<style>.rest_btn{display:block;}</style>';
				
			}
		}
		//$_SESSION['email_tpl'] = $email_tpl;
		echo $email_tpl;exit;
		//include template('form', 'show_email');
		}else{
			showmessage("数据有误！",'/index.php');
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
			$FocusTask->TaskName="特装网上申请(".date('Y-m-d H:i:s',time()).")";
			$FocusTask->Subject="您好！您的信息已经登记成功。";
			$FocusTask->SenderName="ISLE广州国际广告标识及LED展览会";
			$FocusTask->SenderEmail=$this->email_from; //邮件发送者email地址;
			$FocusTask->SendDate=date("Y-m-d\TH:m:s");    
			//邮件内容
			$FocusEmail->Body ='您好！您的信息已经登记成功，稍后会有工作人员跟您联系。谢谢!';
			

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
			if($result['BatchSendResult']!=='success'){//
				echo "邮件发送失败. <p>";exit;
			}
		}

        showmessage('提交成功','index.php');
    }

	//参展商登记 
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
		$interest_zh= $_POST['interest_zh'];
		
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


		$data =array(
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
			    'interest_zh' => $interest_zh,
				'uploadimg' => ($destination_folder.$fname ? $destination_folder.$fname :'')

		);
		if($interest_zh)$data['interest_zh'] = $interest_zh;//感兴趣展会2016/5/26

	      $this->db_canzhan->insert($data);
		if ($email){
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
			$FocusTask->TaskName="参展商网上预登记(".date('Y-m-d H:i:s',time()).")";
			$FocusTask->Subject="您好！您的信息已经登记成功。";
			$FocusTask->SenderName="ISLE广州国际广告标识及LED展览会";
			$FocusTask->SenderEmail=$this->email_from; //邮件发送者email地址;
			$FocusTask->SendDate=date("Y-m-d\TH:m:s");    
			//邮件内容
			$FocusEmail->Body ='您好！您的信息已经登记成功，稍后会有工作人员跟您联系。谢谢!';
			

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
			if($result['BatchSendResult']!=='success'){//
				echo "邮件发送失败. <p>";exit;
			}
		}

		showmessage('提交成功','index.php');

	}


	//参展商登记 接口2016/4/26
	public function add_canzhan() {
		//file_put_contents('/home/wwwroot/www.isle.org.cn/phpcms/modules/form/test.php',"<?php \nreturn " . stripslashes(var_export($_POST, true)) . ";",FILE_APPEND);
		if (!$_POST){
			exit('Forbidden!');
		}
		$name= $_POST['name'];
		$address= $_POST['address'];
		$weburl= $_POST['weburl'];
		$standard= $_POST['standard'];
		$raw= $_POST['raw'];
		$gg= $_POST['exhibition'];
		$zhuying =$_POST['main_products'];
		$introduction= $_POST['introduction'];
		$leader= $_POST['leader'];
		$sex= $_POST['sex'];
		$duty= $_POST['duty'];
		$phone= $_POST['phone'];
        $email= $_POST['email'];
		$lan = intval($_POST['lan']);
		if(!empty($_POST['uploadimg'])){//保存图片
			$_POST['uploadimg'] = preg_replace("/\s/",'+',$_POST['uploadimg']);
			$img_path = $this->save_pic($_POST['uploadimg']);
		}
	    $ret_id = $this->db_canzhan->insert(array(
			'name' => $name,
			'address' => $address,
			'weburl' => $weburl,
			'standard' => $standard,
			'raw' => $raw,
			'gg' => $gg,
			'zhuying' => $zhuying,
			'introduction' => $introduction,
			'leader' => $leader,
			'sex' => $sex,
			'duty' => $duty,
			'phone' => $phone,
			'email' => $email,
			'uploadimg' =>$img_path //营业执照 base64

		),true);
		if ($email && $ret_id){
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
			$FocusTask->TaskName="参展商网上预登记(".date('Y-m-d H:i:s',time()).")";
			$FocusTask->Subject="您好！您的信息已经登记成功。";
			$FocusTask->SenderName="ISLE广州国际广告标识及LED展览会";
			$FocusTask->SenderEmail=$this->email_from; //邮件发送者email地址;
			$FocusTask->SendDate=date("Y-m-d\TH:m:s");    
			//邮件内容
			$FocusEmail->Body ='您好！您的信息已经登记成功，稍后会有工作人员跟您联系。谢谢!';
			

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
			if($result['BatchSendResult']!=='success'){//
				exit(json_encode(array('status'=>0,'error_code'=>'20001','msg'=>'')));
			}
		}else{
			exit(json_encode(array('status'=>0,'error_code'=>'20002','msg'=>'')));
		}
		//俄文接口成功返回
		exit(json_encode(array('status'=>1,'error_code'=>'','msg'=>'')));

	}

	/*采购意向发布 接口*/
    public function add_caigoum() {
        if (!$_POST){
			exit('Forbidden!');
		}
        $content= addslashes($_POST['content']);
		/*插入到数据库*/
		$ret_id = $this->db_caigoum->insert(array(
			'content' => $content,
			'time'=>date('Y-m-d H:i:s',time())
        ),true);
		if($ret_id){
			exit(json_encode(array('status'=>1,'error_code'=>'','msg'=>'')));
		}else{
			exit(json_encode(array('status'=>0,'error_code'=>'30001','msg'=>'')));
		}
    }


	/*特装网上申请表*/
    public function add_tezhuang() {
		if (!$_POST){
			exit('Forbidden!');
		}
        $name= $_POST['name'];
        $address= $_POST['address'];
        $area= $_POST['area'];
        $gg= $_POST['exhibition'];
		$zhuying =$_POST['main_products'];
        $introduction= $_POST['introduction'];
        $leader= $_POST['leader'];
        $sex= $_POST['sex'];
        $duty= $_POST['duty'];
        $phone= $_POST['phone'];
        $email= $_POST['email'];
		$lan= intval($_POST['lan']);

        /*插入到数据库*/
        $ret_id = $this->db_tezhuang->insert(array(
            'name' => $name,
            'address' => $address,
            'order' => $area,
            'gg' => $gg,
            'zhuying' => $zhuying,
            'introduction' => $introduction,
            'leader' => $leader,
            'sex' => $sex,
            'duty' => $duty,
            'phone' => $phone,
            'email' => $email,
			'lan' => $lan

        ),true);
		if ($email && $ret_id){
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
			$FocusTask->TaskName="特装网上申请(".date('Y-m-d H:i:s',time()).")";
			$FocusTask->Subject="您好！您的信息已经登记成功。";
			$FocusTask->SenderName="ISLE广州国际广告标识及LED展览会";
			$FocusTask->SenderEmail=$this->email_from; //邮件发送者email地址;
			$FocusTask->SendDate=date("Y-m-d\TH:m:s");    
			//邮件内容
			$FocusEmail->Body ='您好！您的信息已经登记成功，稍后会有工作人员跟您联系。谢谢!';
			

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
			if($result['BatchSendResult']!=='success'){//
				exit(json_encode(array('status'=>0,'error_code'=>'40001','msg'=>'')));
			}
		}else{
			exit(json_encode(array('status'=>0,'error_code'=>'40002','msg'=>'')));
		}
		//俄文接口成功返回
		exit(json_encode(array('status'=>1,'error_code'=>'','msg'=>'')));
    }



	//生成base64图片
	public function save_pic($imgbase64_content){
    	//$imgbase64_content =  $GLOBALS['HTTP_RAW_POST_DATA'];
    	//if(empty($imgbase64_content)) $imgbase64_content = file_get_contents('php://input');
    	//var_dump($xmlstr);exit;
		$file = PHPCMS_PATH.'uploadfile/zhizhao/' .$filename;//打开文件准备写入
		if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $imgbase64_content, $result)){
		  $type = $result[2];
		  $filename = time().".{$type}";//要生成的图片名字
		  if (file_put_contents($file.$filename,base64_decode(str_replace($result[1], '', $imgbase64_content)))){//打开文件准备写入
			return 'uploadfile/zhizhao/' .$filename;
		  }else{
			return false;
		  }
		}else{
			return false;
		}
    }

	public function success() {
		include template('form', __FUNCTION__);
	}
}