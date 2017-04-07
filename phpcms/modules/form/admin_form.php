<?php

defined('IN_PHPCMS') or exit('No permission resources.');

pc_base::load_app_class('admin', 'admin', 0);
pc_base::load_app_class('yuyue', '', 0);

class admin_form extends admin {
	public $username;
	private $db;
	private $db_list;

	public function __construct() {
		parent::__construct();
		$this->db = pc_base::load_model('form_model');
		$this->db_caigoum = pc_base::load_model('form_caigoum_model');
		$this->db_tezhuang = pc_base::load_model('form_tezhuang_model');
		$this->db_canzhan = pc_base::load_model('form_canzhan_model');
		//if(!module_exists(ROUTE_M)) showmessage(L('module_not_exists'));
		$this->username = param::get_cookie('admin_username');
		//$this->db_caigou_en = pc_base::load_model('form_caigou_en_model');
		$this->db_yuyue = pc_base::load_model('form_yuyue_model');

	}

	/* 列表 */
	public function init() {
		include $this->admin_tpl('form_list');
	}


		/*采购表*/
		public function caigou() {
		$this->db = pc_base::load_model('form_model');
			//补全主表数据
		if($_GET['update'] == 99999999) {
			exit('非法操作');
			$sql1 = "`name`=''";
			$query1 = $this->db->select($sql1, '*', '', '`id` ASC');
			//var_dump($query1);
			//exit;
			$list = array(
				0 => 'name',
				1 => 'address',
				2 => 'agency',
				3 => 'industry',
				4 => 'show_ad',
				5 => 'show_led',
				6 => 'diaocha',
				7 => 'item',
				8 => 'leader',
				9 => 'sex',
				10 => 'duty',
				11 => 'phone',
				12 => 'email',
				13 => 'suijima'
				
			);
			foreach($query1 as $key => $value) {
				if(!$value['name']) {
					$data = array();
					$sql2 = '`id` IN ('.$value['id'].')';
					$query2 = $this->db_list->select($sql2, 'content', 6, '`id` ASC');
					foreach($query2 as $k => $v) {
						$data[$list[$k]] = $v['content'];
					}
					if(!empty($data)) {
						$this->db->update($data, array('id' => $value['id']));
					}
					//var_dump($data);
					//break;
				}
			}
			//exit('ok');
		}

		$sql = '1';
		$page = max(intval($_GET['page']), 1);
		$data = $this->db->listinfo($sql, '`id` DESC', $page);

		//$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=form&c=admin_form&a=add\', title:\''.L('form_add').'\', width:\'700\', height:\'500\', lock:true}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('form_add'));

			include $this->admin_tpl('caigou');
		
	}


		/*采购意向发布*/
		public function caigoum() {
		$this->db = pc_base::load_model('form_caigoum_model');
			//补全主表数据
		if($_GET['update'] == 99999999) {
			exit('非法操作');
			$sql1 = "`content`=''";
			$query1 = $this->db->select($sql1, '*', '', '`id` ASC');
			//var_dump($query1);
			//exit;
			$list = array(
				0 => 'content',
				1 => 'time'
			);
			foreach($query1 as $key => $value) {
				if(!$value['content']) {
					$data = array();
					$sql2 = '`id` IN ('.$value['id'].')';
					$query2 = $this->db_list->select($sql2, 'content', 6, '`id` ASC');
					foreach($query2 as $k => $v) {
						$data[$list[$k]] = $v['content'];
					}
					if(!empty($data)) {
						$this->db->update($data, array('id' => $value['id']));
					}
					//var_dump($data);
					//break;
				}
			}
			//exit('ok');
		}

		$sql = '1';
		$page = max(intval($_GET['page']), 1);
		$data = $this->db->listinfo($sql, '`id` DESC', $page);

		//$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=form&c=admin_form&a=add\', title:\''.L('form_add').'\', width:\'700\', height:\'500\', lock:true}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('form_add'));

			include $this->admin_tpl('caigoum');
	}


		/*特装表*/
		public function tezhuang() {
		$this->db = pc_base::load_model('form_tezhuang_model');
			//补全主表数据
		if($_GET['update'] == 99999999) {
			exit('非法操作');
			$sql1 = "`name`=''";
			$query1 = $this->db->select($sql1, '*', '', '`id` ASC');
			//var_dump($query1);
			//exit;
			$list = array(
				0 => 'name',
				1 => 'address',
				2 => 'order',
				3 => 'gg',
				4 => 'led',
				5 => 'zhuying',
				6 => 'introduction',
				7 => 'leader',
				8 => 'sex',
				9 => 'duty',
				10 => 'phone',
				11 => 'email'
			);
			foreach($query1 as $key => $value) {
				if(!$value['name']) {
					$data = array();
					$sql2 = '`id` IN ('.$value['id'].')';
					$query2 = $this->db_list->select($sql2, 'content', 6, '`id` ASC');
					foreach($query2 as $k => $v) {
						$data[$list[$k]] = $v['content'];
					}
					if(!empty($data)) {
						$this->db->update($data, array('id' => $value['id']));
					}
					//var_dump($data);
					//break;
				}
			}
			//exit('ok');
		}

		$sql = '1';
		$page = max(intval($_GET['page']), 1);
		$data = $this->db->listinfo($sql, '`id` DESC', $page);

		//$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=form&c=admin_form&a=add\', title:\''.L('form_add').'\', width:\'700\', height:\'500\', lock:true}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('form_add'));

			include $this->admin_tpl('tezhuang');
		}

	
		/*参展表*/
		public function canzhan() {
		$this->db = pc_base::load_model('form_canzhan_model');
			//补全主表数据
		if($_GET['update'] == 99999999) {
			exit('非法操作');
			$sql1 = "`name`=''";
			$query1 = $this->db->select($sql1, '*', '', '`id` ASC');
			//var_dump($query1);
			//exit;
			$list = array(
				0 => 'name',
				1 => 'address',
				2 => 'weburl',
				3 => 'standard',
				4 => 'raw',
				5 => 'gg',
				6 => 'led',
				7 => 'zhuying',
				8 => 'introduction',
				9 => 'leader',
				10 => 'sex',
				11 => 'duty',
				12 => 'phone',
				13 => 'email'
			);
			foreach($query1 as $key => $value) {
				if(!$value['name']) {
					$data = array();
					$sql2 = '`id` IN ('.$value['id'].')';
					$query2 = $this->db_list->select($sql2, 'content', 6, '`id` ASC');
					foreach($query2 as $k => $v) {
						$data[$list[$k]] = $v['content'];
					}
					if(!empty($data)) {
						$this->db->update($data, array('id' => $value['id']));
					}
					//var_dump($data);
					//break;
				}
			}
			//exit('ok');
		}

		$sql = '1';
		$page = max(intval($_GET['page']), 1);
		$data = $this->db->listinfo($sql, '`id` DESC', $page);

		//$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=form&c=admin_form&a=add\', title:\''.L('form_add').'\', width:\'700\', height:\'500\', lock:true}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('form_add'));

			include $this->admin_tpl('canzhan');
		}

	//采购英文
	public function caigou_en() {
		$where = " 1=1 ";//基本条件
		$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
		//echo $sql;exit;
		$data  = $this->db_caigou_en->listinfo($where,'id DESC',$page);
		//var_dump($data);exit;
		$pages = $this->db_caigou_en->pages; //分页
		
		include $this->admin_tpl('caigou_en');
	}

	//预登记中英文2015/11/30
	public function yuyue() {
		$where = " 1=1 ";//基本条件
		$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
		$lan = intval($_GET['lan']) ? intval($_GET['lan']) : 1;
		$interest_zh = intval($_GET['interest_zh']) ? intval($_GET['interest_zh']) : '';
		$startdate = trim($_GET['startdate']) ? strtotime($_GET['startdate']) : '';
		$enddate = trim($_GET['enddate']) ? strtotime($_GET['enddate']) : '';
		$email = trim($_GET['email']) ? trim($_GET['email']) : '';
		$mobile = trim($_GET['mobile']) ? trim($_GET['mobile']) : '';
		$name = trim($_GET['name']) ? trim($_GET['name']) : '';
		
		$status = intval($_GET['status']);
		if($status!='' || $status!=0 ){$where .=" AND status='$status' ";}
		if($interest_zh){$where .=" AND interest_zh='$interest_zh' ";}
		if($startdate){$where .=" AND create_time >= '$startdate' ";}
		if($enddate){$where .=" AND create_time <= '$enddate' ";}
		if($email){$where .=" AND email like '%$email%' ";}
		if($mobile){$where .=" AND mobile like '%$mobile%' ";}
		if($name){$where .=" AND name like '%$name%' ";}

		$where .= " AND lan={$lan} ";

		if($_GET['do_submit']){//导出
			$this->exp_excel($where);exit;
		}

		//echo $where;exit;
		$data  = $this->db_yuyue->listinfo($where,'id DESC',$page);
		//var_dump($data);exit;
		$pages = $this->db_yuyue->pages; //分页
		
		pc_base::load_sys_class('form', '', 0);
		include $this->admin_tpl('yuyue');
	}

	//
	public function exp_excel($where) {
		//echo $where;exit;
		$fields = 'interest_zh,title,name,area,tel,mobile,email,company_name,position,address,interest_product,learn_isle,suggestion,suijima,f_title,f_name,f_tel,f_mobile,f_email,f_company_name,f_position,f_suijima,status,create_time';

		$title = array('展会类型','称呼','姓名','地区','电话','手机','邮件','公司名称','职务','地址','意向产品','得知ISLE方式','建议','随机码','称呼2','姓名2','电话2','手机2','邮件2','公司名称2','职务2','随机码2','邮件状态','添加时间');

		$interest_arr = array('1'=>'春季展','2'=>'秋季展','3'=>'春季展及秋季展');
		$email_arr = array('1'=>'成功','-1'=>'失败','0'=>'未发送');

		$data  = $this->db_yuyue->select($where,$fields,'1000');
		foreach($data as $key=>$row){
			$data[$key]['interest_zh'] = $row['interest_zh'] ?$interest_arr[$row['interest_zh']]:'--';
			$data[$key]['area'] = isset($row['area']) ? get_linkage($row['area'],1):'--';
			$data[$key]['status'] = isset($row['status']) ? $email_arr[$row['status']]:'--';
			$data[$key]['create_time'] = $row['create_time'] ? date('Y-m-d H:i:s',$row['create_time']):'--';
		}
		//var_dump($data);exit;
		$this->exportexcel($data,$title,'采购数据'.date('Y/m/d',time()));

	}

	/* 批量删除 */
	public function delete($id = 0) {
		if((!isset($_POST['id']) || empty($_POST['id'])) && !$id) {
			showmessage('请选择需要删除的项目');
		} else {
			if(is_array($_POST['id']) && !$id) {
				array_map(array($this, 'delete'), $_POST['id']);
				showmessage(L('form_deleted'), HTTP_REFERER);
			} elseif($id) {
				$id = intval($id);
				$this->db->delete(array('id' => $id));
			}
		}
	}
	/* 批量删除 */
	public function delete_canzhan($id = 0) {
		if((!isset($_POST['id']) || empty($_POST['id'])) && !$id) {
			showmessage('请选择需要删除的项目');
		} else {
			if(is_array($_POST['id']) && !$id) {
				array_map(array($this, 'delete_canzhan'), $_POST['id']);
				showmessage(L('form_deleted'), HTTP_REFERER);
			} elseif($id) {
				$id = intval($id);
				$this->db_canzhan->delete(array('id' => $id));
			}
		}
	}
	/* 批量删除 */
	public function delete_caigoum($id = 0) {
		if((!isset($_POST['id']) || empty($_POST['id'])) && !$id) {
			showmessage('请选择需要删除的项目');
		} else {
			if(is_array($_POST['id']) && !$id) {
				array_map(array($this, 'delete_caigoum'), $_POST['id']);
				showmessage(L('form_deleted'), HTTP_REFERER);
			} elseif($id) {
				$id = intval($id);
				$this->db_caigoum->delete(array('id' => $id));
			}
		}
	}
	/* 批量删除 */
	public function delete_tezhuang($id = 0) {
		if((!isset($_POST['id']) || empty($_POST['id'])) && !$id) {
			showmessage('请选择需要删除的项目');
		} else {
			if(is_array($_POST['id']) && !$id) {
				array_map(array($this, 'delete_tezhuang'), $_POST['id']);
				showmessage(L('form_deleted'), HTTP_REFERER);
			} elseif($id) {
				$id = intval($id);
				$this->db_tezhuang->delete(array('id' => $id));
			}
		}
	}

	//发送邮件
	public function send_email() {
		$this->db_email_record = pc_base::load_model('email_record_model');
		$this->yuyue = new yuyue();
		if(is_array($_REQUEST['id'])){
			$id = implode(',',$_REQUEST['id']);
		}else{
			$id = intval($_REQUEST['id']);
		}
		if((!isset($id) || empty($id))) {
			showmessage('请选择要发送的记录');
		}else{
			$where = " id IN ($id) AND status= -1 ";//失败未发送邮件 id主表
			$sendto_arr = $this->db_email_record->select($where, 'id,fid,email,name,suijima');
			//var_dump($sendto_arr);exit;
			if(!empty($sendto_arr)){
				$pattern="/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
				for($i=0;$i<count($sendto_arr);$i++){//发送多人
					if(!empty($sendto_arr[$i]['email']) && preg_match($pattern,$sendto_arr[$i]['email'])){
						$ret_data = $this->yuyue->send_email($sendto_arr[$i],$lan);// 收件人邮箱地址
						//$ret_data=true;
						if($ret_data['status'] !== true){//邮件失败
							$status = -1;
							showmessage($sendto_arr[$i]['email'].'邮件发送失败<br/>'.$ret_data['errmsg'],HTTP_REFERER);
						}else{
							$status = 1;
							$data = array('status'=>$status);
							$this->db_email_record->update($data, array('fid'=>$sendto_arr[$i]['fid']));
						}
						$data = array('status'=>$status);
						$this->db_yuyue->update($data, array('id'=>$sendto_arr[$i]['id']));
					}
				}
			}else{
				showmessage('没有找到数据！',HTTP_REFERER);
			}
			showmessage('邮件发送操作成功！',HTTP_REFERER);
		}
	}

	//导出数据
	public function exportexcel($data = array(),$title=array(), $filename = 'report'){
        header('Content-type:application/octet-stream');
        header('Accept-Ranges:bytes');
        header('Content-type:application/vnd.ms-excel');
        header('Content-Disposition:attachment;filename=' . $filename . '.xls');
        header('Pragma: no-cache');
        header('Expires: 0');

		if(!empty($title)){
			foreach ($title as $k => $v) {
				$title[$k] = iconv('UTF-8', 'GB2312', $v);
			}
			$title = implode('	', $title);
			echo "{$title}\n";
		}
        if (!empty($data)) {
            foreach ($data as $key => $val) {
                foreach ($val as $ck => $cv) {
					if(is_numeric($cv) && strlen($cv)>=16){
						$cv = "'".$cv;
					}
                    $data[$key][$ck] = iconv('UTF-8', 'GB2312', $cv);
                }
                $data[$key] = implode('	', $data[$key]);
            }
            echo implode('
', $data);
        }
    }




}

?>