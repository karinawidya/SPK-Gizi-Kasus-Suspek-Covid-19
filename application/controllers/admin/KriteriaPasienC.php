<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'core/MyCore.php');

class KriteriaPasienC extends MyCore
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin/KriteriaPasienM", "kriteria_pasien");
	}

	public function index()
	{
		$this->loadMenu('Admin Page | Kriteria Pasien', 'admin/sidebar.php');
		$data = array();
		$data["kriteria_pasien"] = $this->kriteria_pasien->tampil_data();
		$this->loadContent('admin/kriteria_pasien.php', $data);
		$this->loadMenu(null, 'admin/navbar.php');
	}

	public function tambah_data()
	{
		$result = $this->kriteria_pasien->tambah_dataM($_POST);
		redirect("admin/KriteriaPasienC");
	}

	public function hapus_data($id_kriteria_pasien)
	{
		$result = $this->kriteria_pasien->hapus_data($id_kriteria_pasien);
		redirect("admin/KriteriaPasienC");
	}

	public function edit_data($id_kriteria_pasien)
	{
		$data = array(
			"nama_kriteria_pasien" => $_POST["nama_kriteria_pasien"]
		);
		// var_dump($data);
		// die;
		$result = $this->kriteria_pasien->edit_data($id_kriteria_pasien, $data);
		redirect("admin/KriteriaPasienC");
	}

}
