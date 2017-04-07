<?php
defined('IN_PHPCMS') or exit('No permission resources.');

pc_base::load_app_class('admin','admin',0);
pc_base::load_sys_class('form','',0);
pc_base::load_sys_class('format','',0);

class consult extends admin {
	private $db;
	public function __construct() {
		parent::__construct();
		$this->db = pc_base::load_model('consult_model');
		$this->exdb = pc_base::load_model('exhibition_form_model');
	}
	
	public function init() {
		$where = " 1=1 ";//基本条件
		$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
		//echo $sql;exit;
		$list  = $this->db->listinfo($where,'id DESC',$page);
		//var_dump($ret_data);exit;
		$pages = $this->db->pages; //分页
		
		include $this->admin_tpl('consult_list');
	}

	public function exhibition_list() {
		$where = " 1=1 ";//基本条件
		$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
		//echo $sql;exit;
		$list  = $this->exdb->listinfo($where,'id DESC',$page);
		//var_dump($ret_data);exit;
		$pages = $this->exdb->pages; //分页
		
		include $this->admin_tpl('exhibition_list');
	}


}
?>