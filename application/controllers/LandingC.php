<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'core/MyCore.php');

class LandingC extends MyCore
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->loadMenu('Login Page', 'landing/login.php');
	}

	public function prosesLogin()
	{
		$data = $this->input->post();
		$result = $this->db_selectW('tbl_login', array('username' => $data['username']));
		
		if ($result['row'] == "1") {
			
			$result = $result['data'][0];
			if (md5($data['password']) == $result['password']){
				if($result['status'] == "1"){
					redirect('admin/DashboardC');
				}else if($result['status'] == "0"){
					redirect('admin/DataAlternatifTopsisC');
				}
			} else {
				redirect($this->index());
			}
		} else {
			redirect($this->index());
		}
		// var_dump($result);
		// die;
	}

}
