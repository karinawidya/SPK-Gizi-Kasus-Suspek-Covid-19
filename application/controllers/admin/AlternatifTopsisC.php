<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'core/MyCore.php');

class AlternatifTopsisC extends MyCore
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin/AlternatifTopsisM", "alternatif_topsis");
	}

	public function index()
	{

		$this->loadMenu('Admin Page | Alternatif Topsis', 'admin/sidebar.php');
		$data = array();
		$data["alternatif_topsis"] = $this->alternatif_topsis->tampil_data();
		$this->loadContent('admin/alternatif_topsis.php', $data);
		$this->loadMenu(null, 'admin/navbar.php');
	}

	public function tambah_data()
	{
		$result = $this->alternatif_topsis->tambah_dataM($_POST);
		redirect("admin/AlternatifTopsisC");
	}

	public function hapus_data($id_alternatif)
	{
		$result = $this->alternatif_topsis->hapus_data($id_alternatif);
		redirect("admin/AlternatifTopsisC");
	}

	public function edit_data($id_alternatif)
	{
		$data = array(
			"nama_alternatif" => $_POST["nama_alternatif"],
			"pagi" => $_POST["pagi"],
			"siang" => $_POST["siang"],
			"sore" => $_POST["sore"],
		);
		// var_dump($data);
		// die;
		$result = $this->alternatif_topsis->edit_data($id_alternatif, $data);
		redirect("admin/AlternatifTopsisC");
	}
}
