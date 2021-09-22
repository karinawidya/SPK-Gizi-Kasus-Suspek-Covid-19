<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'core/MyCore.php');

class PenilaianKriteriaC extends MyCore
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin/KriteriaPasienM", "kriteria_pasien");
		$this->load->model("admin/KriteriaAhpM", "kriteria_ahp");
		$this->load->model("admin/PenilaianKriteriaM", "penilaian_kriteria");
		$this->load->model("admin/NilaiIrM", "nilai_ir");
	}

	public function index()
	{
		$data = array();
		$this->loadMenu('Admin Page | Penilaian Kriteria', 'admin/sidebar.php');
		$data["kriteria_pasien"] = $this->kriteria_pasien->tampil_data();
		$data["kriteria_ahp"] = $this->kriteria_ahp->tampil_data();
		$data["penilaian_kriteria"] = $this->penilaian_kriteria->tampil_data();

		// //Menampilkan data sesuai dengan parameter id_kriteria_pasien
		// $matriks = [];
		// $matriks_total = [];
		// $matriks_normalisasi = [];
		// $eigenAhp = [];
		// $konsistensiAhp = [];
		// $preferensiAhp = [];
		// $total_preferensi = 0;

		// $data["penilaian_kriteria_matriks"] = $this->penilaian_kriteria->tampil_data_inParameter(9);
		// $countKriteriaPasien = count($this->kriteria_pasien->tampil_data());
		// $countKriteriaAhp = count($this->kriteria_ahp->tampil_data());

		// $number_ri = $this->nilai_ir->tampil_data_nilai($countKriteriaAhp);
		// $number_ri = $number_ri["nilai"];

		// // Matriks Paiwaise Comparison

		// $w = 0;
		// for($x = 0; $x < $countKriteriaAhp; $x++){
		// 	for($y = 0; $y < $countKriteriaAhp; $y++){
		// 		$matriks[$x][$y] = $data["penilaian_kriteria_matriks"][$w++]["nilai"];				
		// 	}
		// }

		// for($a = 0; $a < $countKriteriaAhp; $a++){
		// 	$matriks_total[$a] = 0;
		// 	for($b = 0; $b < $countKriteriaAhp; $b++){
		// 		$matriks_total[$a] = floatval($matriks_total[$a]) + floatval($matriks[$b][$a]);
		// 	}
		// }

		// // Normalisasi Matriks

		// for($x = 0; $x < $countKriteriaAhp; $x++){
		// 	for($y = 0; $y < $countKriteriaAhp; $y++){
		// 		$count_data = $matriks[$x][$y]/$matriks_total[$y];
		// 		$matriks_normalisasi[$x][$y] = $count_data;
		// 	}
		// }

		// //Nilai Eigen

		// for($c = 0; $c < $countKriteriaAhp; $c++){
		// 	$eigenAhp[$c] = 0;
		// 	for($d = 0; $d < $countKriteriaAhp; $d++){
		// 		$eigenAhp[$c] = floatval($eigenAhp[$c]) + floatval($matriks_normalisasi[$c][$d]);
		// 	}
		// 	$eigenAhp[$c] = floatval($eigenAhp[$c])/$countKriteriaAhp;
		// }

		// //Nilai konsistensi
		// for($e = 0; $e < $countKriteriaAhp; $e++){
		// 	$konsistensiAhp[$e] = 0;

		// 	for($f = 0; $f < $countKriteriaAhp; $f++){
		// 		$konsistensiAhp[$e] = floatval($konsistensiAhp[$e]) + (floatval($matriks_normalisasi[$e][$f]) * floatval($eigenAhp[$f]));
		// 	}
		// }

		// //Nilai Preferensi
		// for($g = 0; $g < $countKriteriaAhp; $g++){
		// 	$preferensiAhp[$g] = floatval($konsistensiAhp[$g]) / floatval($eigenAhp[$g]);
		// }


		// //Nilai Lamda max
		// for($h = 0; $h < $countKriteriaAhp; $h++){
		// 	$total_preferensi = floatval($total_preferensi) + floatval($preferensiAhp[$h]);
		// }

		// $lambdaMax = floatval($total_preferensi) / floatval($countKriteriaAhp);

		// //Hasil Nilai CI
		// $number_ci = (floatval($lambdaMax) - $countKriteriaAhp) / ($countKriteriaAhp - 1);
		// //Hasil Nilai CR
		// $number_cr = (floatval($number_ci) / floatval($number_ri));


		
		// var_dump($data["penilaian_kriteria"]);
		// die;
		$this->loadContent('admin/penilaian_kriteria.php', $data);
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
		$result = $this->penilaian_kriteria->update_kriteria($where[0]);
		// var_dump($result);
		// die;
		if ($result["count"] == 0) {
			$result = $this->penilaian_kriteria->tambah_dataM($_POST);
		} else {
			$id_pasangan_kriteria = $result["hasil"]["id_pasangan_kriteria"];
			$result = $this->penilaian_kriteria->edit_data($id_pasangan_kriteria, $_POST);
		}

		redirect("admin/PenilaianKriteriaC");
	}
	public function hapus_data($id_pasangan_kriteria)
	{
		$result = $this->penilaian_kriteria->hapus_data($id_pasangan_kriteria);
		redirect("admin/PenilaianKriteriaC");
	}

	public function edit_data($id_pasangan_kriteria)
	{
		$data = $_POST;
		var_dump($_POST);
		$result = $this->penilaian_kriteria->edit_data($id_pasangan_kriteria, $data);
		redirect("admin/PenilaianKriteriaC");
	}
}
