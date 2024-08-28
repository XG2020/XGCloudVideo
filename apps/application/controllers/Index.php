<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	function __construct(){
	    parent::__construct();
	    $this->load->database();
	    $this->load->model('User');
	    $this->User->Login();
	}

	//后台首页
	public function index(){
		$ip = '/' == DIRECTORY_SEPARATOR ? $_SERVER['SERVER_ADDR'] : gethostbyname($_SERVER['SERVER_NAME']);
		//判断字段
		$table = CS_SqlPrefix.'video';
		if(!$this->db->field_exists('pic',$table)){
			$this->db->query("ALTER TABLE ".$table." ADD pic varchar(255) DEFAULT '' COMMENT '图片保存路径'");
			$this->db->query("ALTER TABLE ".$table." ADD m3u8 varchar(255) DEFAULT '' COMMENT '图片保存路径'");
		}
		$this->load->view('index.html');
	}

	public function main(){
		$data['ver'] = file_get_contents(FCPATH.'libraries/ver.txt');
		$this->load->view('main.html',$data);
	}

	//在线更新
	// public function update(){
		
	// }
}
