<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyCore extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// var_dump(password_hash('admin', PASSWORD_DEFAULT));
		$this->load->helper('url');
	}

	public function loadMenu($title, $url)
	{
		if ($title == null) {
			$this->load->view($url);
		} else {
			$data['title'] = $title;
			$this->load->view($url, $data);
		}
	}

	public function loadContent($url, $data)
	{
		$this->load->view($url, $data);
	}

	public function db_selectW($tabel, $data)
	{
		$query = $this->db->get_where($tabel, $data);
		return array('data' => $query->result_array(), 'row' => $query->num_rows());//mengembalikan data array pada database disimpan pd variabel data, dan jumlah data yg ditemukan di var row
	}
}
