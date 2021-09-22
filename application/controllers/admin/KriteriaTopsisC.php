<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'core/MyCore.php');

class KriteriaTopsisC extends MyCore
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
		$this->loadMenu('Admin Page | Kriteria Topsis', 'admin/sidebar.php');
		$data["kriteria_pasien"] = $this->kriteria_pasien->tampil_data();
		$this->loadContent('admin/kriteria_topsis.php', $data);
		$this->loadMenu(null, 'admin/navbar.php');

		// var_dump($data);
		// die;
	}

	public function hitungEigen()
	{
		$operParameter = $_POST['kriteria_pasien'];
		$data["data_post"] = $operParameter;

		$data["kriteria_pasien"] = $this->kriteria_pasien->tampil_data();
		$data["kriteria_ahp"] = $this->kriteria_ahp->tampil_data();
		$data["penilaian_kriteria"] = $this->penilaian_kriteria->tampil_data();

		//Menampilkan data sesuai dengan parameter id_kriteria_pasien
		$matriks = [];
		$matriks_total = [];
		$matriks_normalisasi = [];
		$eigenAhp = [];
		$konsistensiAhp = [];
		$preferensiAhp = [];
		$total_preferensi = 0;

		$data["penilaian_kriteria_matriks"] = $this->penilaian_kriteria->tampil_data_inParameter($operParameter);
		$countKriteriaPasien = count($this->kriteria_pasien->tampil_data());
		$countKriteriaAhp = count($this->kriteria_ahp->tampil_data());

		$number_ri = $this->nilai_ir->tampil_data_nilai($countKriteriaAhp);
		$number_ri = $number_ri["nilai"];

		// Matriks Paiwaise Comparison

		$w = 0;
		for($x = 0; $x < $countKriteriaAhp; $x++){
			for($y = 0; $y < $countKriteriaAhp; $y++){
				$matriks[$x][$y] = $data["penilaian_kriteria_matriks"][$w++]["nilai"];				
			}
		}

		for($a = 0; $a < $countKriteriaAhp; $a++){
			$matriks_total[$a] = 0;
			for($b = 0; $b < $countKriteriaAhp; $b++){
				$matriks_total[$a] = floatval($matriks_total[$a]) + floatval($matriks[$b][$a]);
			}
		}


		// Normalisasi Matriks

		for($x = 0; $x < $countKriteriaAhp; $x++){
			for($y = 0; $y < $countKriteriaAhp; $y++){
				$count_data = $matriks[$x][$y]/$matriks_total[$y];
				$matriks_normalisasi[$x][$y] = $count_data;
			}
		}


		//Nilai Eigen

		for($c = 0; $c < $countKriteriaAhp; $c++){
			$eigenAhp[$c] = 0;
			for($d = 0; $d < $countKriteriaAhp; $d++){
				$eigenAhp[$c] = floatval($eigenAhp[$c]) + floatval($matriks_normalisasi[$c][$d]);
			}
			$eigenAhp[$c] = floatval($eigenAhp[$c])/$countKriteriaAhp;
		}

		//Nilai konsistensi
		for($e = 0; $e < $countKriteriaAhp; $e++){
			$konsistensiAhp[$e] = 0;

			for($f = 0; $f < $countKriteriaAhp; $f++){
				$konsistensiAhp[$e] = floatval($konsistensiAhp[$e]) + (floatval($matriks_normalisasi[$e][$f]) * floatval($eigenAhp[$f]));
			}
		}


		//Nilai Preferensi
		for($g = 0; $g < $countKriteriaAhp; $g++){
			$preferensiAhp[$g] = floatval($konsistensiAhp[$g]) / floatval($eigenAhp[$g]);
		}


		//Nilai Lamda max
		for($h = 0; $h < $countKriteriaAhp; $h++){
			$total_preferensi = floatval($total_preferensi) + floatval($preferensiAhp[$h]);
		}

		$lambdaMax = floatval($total_preferensi) / floatval($countKriteriaAhp);

		//Hasil Nilai CI
		$number_ci = (floatval($lambdaMax) - $countKriteriaAhp) / ($countKriteriaAhp - 1);
		//Hasil Nilai CR
		$number_cr = (floatval($number_ci) / floatval($number_ri));


		$data["matriks"] = $matriks;
		$data["matriks_total"] = $matriks_total;
		$data["matriks_normalisasi"] = $matriks_normalisasi;
		$data["eigenAhp"] = $eigenAhp;
		$data["konsistensiAhp"] = $konsistensiAhp;
		$data["preferensiAhp"] = $preferensiAhp;
		$data["total_preferensi"] = $total_preferensi;
		$data["lambdaMax"] = $lambdaMax;
		$data["number_ci"] = $number_ci;
		$data["number_cr"] = $number_cr;

		$this->loadMenu('Admin Page | Kriteria Topsis', 'admin/sidebar.php');
		$this->loadContent('admin/kriteria_topsis.php', $data);
		$this->loadMenu(null, 'admin/navbar.php');

	}

}
