<?php

defined('IN_PHPCMS') or exit('No permission resources.');

class form {
	private $db;

	public function __construct() {
		$this->db = pc_base::load_model('form_model');
	}

	public function count() {}

	/**
	 * 列表方法
	 * @param array $data 传递过来的参数
	 * @param return array 数据库中取出的数据数组
	 */
	public function lists($data) {
		$where = '1';
		return $this->db->select($where, '*', $data['limit'], 'qid DESC');
	}
}