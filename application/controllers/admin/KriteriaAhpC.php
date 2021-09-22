<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'core/MyCore.php');

class KriteriaAhpC extends MyCore
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin/KriteriaAhpM", "kriteria_ahp");
	}

	public function index()
	{
		$this->loadMenu('Admin Page | Kriteria AHP', 'admin/sidebar.php');
		$data = array();
		$data["kriteria_ahp"] = $this->kriteria_ahp->tampil_data();
		$this->loadContent('admin/kriteria_ahp.php', $data);
		$this->loadMenu(null, 'admin/navbar.php');
	}

	public function tambah_data()
	{
		$result = $this->kriteria_ahp->tambah_dataM($_POST);
		redirect("admin/KriteriaAhpC");
	}

	public function hapus_data($id_kriteria)
	{
		$result = $this->kriteria_ahp->hapus_data($id_kriteria);
		redirect("admin/KriteriaAhpC");
	}

	public function edit_data($id_kriteria_ahp)
	{
		$data = array(
			"nama_kriteria" => $_POST["nama_kriteria"]
		);
		// var_dump($data);
		// die;
		$result = $this->kriteria_ahp->edit_data($id_kriteria_ahp, $data);
		redirect("admin/KriteriaAhpC");
	}
}
