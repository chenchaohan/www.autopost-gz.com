<?php

defined('IN_PHPCMS') or exit('No permission resources.');
//数据处理app
class consult {
	private $product_db;

	public function __construct() {
		$this->consult_db = pc_base::load_model('consult_model');
	}

	/**
	 * 列表方法
	 * @param array $data 传递过来的参数
	 * @param return array 数据库中取出的数据数组
	 */
	public function lists($where) {
		return $this->consult_db->select($where,'*','', 'id ASC');
	}



}