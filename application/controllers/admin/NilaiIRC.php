<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'core/MyCore.php');

class NilaiIRC extends MyCore
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin/NilaiIrM", "nilai_ir");
	}

	public function index()
	{
		$this->loadMenu('Admin Page | Nilai IR', 'admin/sidebar.php');
		$data = array();
		$data["nilai_ir"] = $this->nilai_ir->tampil_data();
		$this->loadContent('admin/nilai_ir.php', $data);
		$this->loadMenu(null, 'admin/navbar.php');
	}

	public function tambah_data()
	{
		$result = $this->nilai_ir->tambah_dataM($_POST);
		redirect("admin/NilaiIRC");
	}

	public function hapus_data($id_ir)
	{
		$result = $this->nilai_ir->hapus_data($id_ir);
		redirect("admin/NilaiIRC");
	}

	public function edit_data($id_ir)
	{
		$data = array(
			"ukuran_matrik" => $_POST["ukuran_matrik"],
			"nilai" => $_POST["nilai"]
		);
		// var_dump($data);
		// die;
		$result = $this->nilai_ir->edit_data($id_ir, $data);
		redirect("admin/NilaiIRC");
	}
}
