<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'core/MyCore.php');

class PenilaianAlternatifTopsisC extends MyCore
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin/KriteriaPasienM", "kriteria_pasien");
		$this->load->model("admin/KriteriaAhpM", "kriteria_ahp");
		$this->load->model("admin/AlternatifTopsisM", "alternatif_topsis");
		$this->load->model("admin/PenilaianAlternatifM", "penilaian_alternatif");
		$this->load->model("admin/NilaiIrM", "nilai_ir");
	}

	public function index()
	{
		$data = array();
		$this->loadMenu('Admin Page | Penilaian Kriteria', 'admin/sidebar.php');
		$data["kriteria_pasien"] = $this->kriteria_pasien->tampil_data();
		$data["kriteria_ahp"] = $this->kriteria_ahp->tampil_data();
		$data["alternatif_topsis"] = $this->alternatif_topsis->tampil_data();
		$data["penilaian_alternatif"] = $this->penilaian_alternatif->tampil_data();

		$this->loadContent('admin/penilaian_alternatif.php', $data);
		$this->loadMenu(null, 'admin/navbar.php');
	}

	public function tambah_data()
	{
		$where = array(
			$_POST
		);
		unset($where[0]["nilai"]);
		// var_dump($where);
		// die;
		$result = $this->penilaian_alternatif->update_kriteria($where[0]);
		// var_dump($result);
		// die;
		if ($result["count"] == 0) {
			$result = $this->penilaian_alternatif->tambah_dataM($_POST);
		} else {
			$result = $result["hasil"][0];
			$id_alternatif_kriteria = $result["id_alternatif_kriteria"];
			$result = $this->penilaian_alternatif->edit_data($id_alternatif_kriteria, $_POST);
		}

		redirect("admin/PenilaianAlternatifTopsisC");
	}
	public function hapus_data($id_alternatif_kriteria)
	{
		$result = $this->penilaian_alternatif->hapus_data($id_alternatif_kriteria);
		redirect("admin/PenilaianAlternatifTopsisC");
	}

	public function edit_data($id_alternatif_kriteria)
	{
		$data = $_POST;
		var_dump($_POST);
		$result = $this->penilaian_alternatif->edit_data($id_alternatif_kriteria, $data);
		redirect("admin/PenilaianAlternatifTopsisC");
	}
}
