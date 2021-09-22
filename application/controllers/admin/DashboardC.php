<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'core/MyCore.php');

class DashboardC extends MyCore
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->loadMenu('Admin Page | Dashboard', 'admin/sidebar.php');
		$this->loadMenu(null, 'admin/navbar.php');
		$data = array();
		$this->loadContent('admin/dashboard.php', $data);
		$this->loadMenu(null, 'admin/navbar.php');
	}

	public function logout()
	{
		redirect("/");
	}
}
