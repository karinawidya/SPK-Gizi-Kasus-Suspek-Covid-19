<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'core/MyCore.php');

class DataAlternatifTopsisC extends MyCore
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin/KriteriaPasienM", "kriteria_pasien");
		$this->load->model("admin/KriteriaAhpM", "kriteria_ahp");
		$this->load->model("admin/AlternatifTopsisM", "alternatif_topsis");
		$this->load->model("admin/PenilaianAlternatifM", "penilaian_alternatif");
		$this->load->model("admin/NilaiIrM", "nilai_ir");
		$this->load->model("admin/PenilaianKriteriaM", "penilaian_kriteria");
		$this->load->model("admin/RecordDataM", "record_data");
	}

	public function index()
	{
		// $operParameter = $_POST['kriteria_pasien'];
		// $data["data_post"] = $operParameter;

		$data["kriteria_pasien"] = $this->kriteria_pasien->tampil_data();
		$data["kriteria_ahp"] = $this->kriteria_ahp->tampil_data();
		$data["penilaian_kriteria"] = $this->penilaian_kriteria->tampil_data();

		$data["alternatif_topsis"] = $this->alternatif_topsis->tampil_data();
		$data["penilaian_alternatif"] = $this->penilaian_alternatif->tampil_data();

		$this->loadMenu('Admin Page | Data Alternatif TOPSIS', 'admin/sidebar.php');
		$this->loadContent('admin/data_alternatif_topsis.php', $data);
		$this->loadMenu(null, 'admin/navbar.php');
	}

	public function hitungTopsis()
	{
		if (isset($_POST['kriteria_pasien'])) {
			$operParameter = $_POST['kriteria_pasien'];
			$data["data_post"] = $operParameter;
		} else {
			redirect("admin/DataAlternatifTopsisC");
		}

		$data["kriteria_pasien"] = $this->kriteria_pasien->tampil_data();
		$data["kriteria_pasien_id"] = $this->kriteria_pasien->tampil_data_inParameter($operParameter);
		$data["kriteria_ahp"] = $this->kriteria_ahp->tampil_data();
		$data["penilaian_kriteria"] = $this->penilaian_kriteria->tampil_data_inParameter($operParameter);

		$data["alternatif_topsis"] = $this->alternatif_topsis->tampil_data();
		$data["penilaian_alternatif"] = $this->penilaian_alternatif->tampil_data();


		$data["report_message"] = " ";
		if (count($data["penilaian_kriteria"]) > 1) {

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
			$countAlternatifTopsis = count($this->alternatif_topsis->tampil_data());

			$number_ri = $this->nilai_ir->tampil_data_nilai($countKriteriaAhp);
			$number_ri = $number_ri["nilai"];

			// Matriks Paiwaise Comparison

			$w = 0;
			for ($x = 0; $x < $countKriteriaAhp; $x++) {
				for ($y = 0; $y < $countKriteriaAhp; $y++) {
					$matriks[$x][$y] = $data["penilaian_kriteria_matriks"][$w++]["nilai"];
				}
			}

			for ($a = 0; $a < $countKriteriaAhp; $a++) {
				$matriks_total[$a] = 0;
				for ($b = 0; $b < $countKriteriaAhp; $b++) {
					$matriks_total[$a] = floatval($matriks_total[$a]) + floatval($matriks[$b][$a]);
				}
			}


			// Normalisasi Matriks

			for ($x = 0; $x < $countKriteriaAhp; $x++) {
				for ($y = 0; $y < $countKriteriaAhp; $y++) {
					$count_data = $matriks[$x][$y] / $matriks_total[$y];
					$matriks_normalisasi[$x][$y] = $count_data;
				}
			}


			//Nilai Eigen

			for ($c = 0; $c < $countKriteriaAhp; $c++) {
				$eigenAhp[$c] = 0;
				for ($d = 0; $d < $countKriteriaAhp; $d++) {
					$eigenAhp[$c] = floatval($eigenAhp[$c]) + floatval($matriks_normalisasi[$c][$d]);
				}
				$eigenAhp[$c] = floatval($eigenAhp[$c]) / $countKriteriaAhp;
			}

			//Nilai konsistensi
			for ($e = 0; $e < $countKriteriaAhp; $e++) {
				$konsistensiAhp[$e] = 0;

				for ($f = 0; $f < $countKriteriaAhp; $f++) {
					$konsistensiAhp[$e] = floatval($konsistensiAhp[$e]) + (floatval($matriks_normalisasi[$e][$f]) * floatval($eigenAhp[$f]));
				}
			}


			//Nilai Preferensi
			for ($g = 0; $g < $countKriteriaAhp; $g++) {
				$preferensiAhp[$g] = floatval($konsistensiAhp[$g]) / floatval($eigenAhp[$g]);
			}


			//Nilai Lamda max
			for ($h = 0; $h < $countKriteriaAhp; $h++) {
				$total_preferensi = floatval($total_preferensi) + floatval($preferensiAhp[$h]);
			}

			$lambdaMax = floatval($total_preferensi) / floatval($countKriteriaAhp);

			//Hasil Nilai CI
			$number_ci = (floatval($lambdaMax) - $countKriteriaAhp) / ($countKriteriaAhp - 1);
			//Hasil Nilai CR
			$number_cr = (floatval($number_ci) / floatval($number_ri));



			// ------------------------------------------------------------------------------
			// Menhitung nilai TOPSIS -------------------------------------------------------
			// ------------------------------------------------------------------------------


			if ($number_cr < 0.1) {
				$matriks_keputusan = [];
				$matriks_ternormalisasi = [];
				$matriks_r = [];
				$matriks_terbobot = [];
				$bobot = $eigenAhp;

				$solusiPositif = [];
				$jarakSolusiPositif = [];
				$solusiNegatif = [];
				$jarakSolusiNegatif = [];

				$kedekatanAlternatif = [];

				$paketMakan = [];

				//Matriks Keputusan

				$w = 0;
				for ($x = 0; $x < $countAlternatifTopsis; $x++) {
					for ($y = 0; $y < $countKriteriaAhp; $y++) {
						$matriks_keputusan[$x][$y] = $data["penilaian_alternatif"][$w++]["nilai"];
					}
				}


				//Matriks Ternormalisasi

				for ($z = 0; $z < $countKriteriaAhp; $z++) {
					$count_perRow = 0;
					for ($z2 = 0; $z2 < $countAlternatifTopsis; $z2++) {
						$count_perRow = $count_perRow + pow(floatval($matriks_keputusan[$z2][$z]), 2);
					}
					$matriks_ternormalisasi[$z] = sqrt($count_perRow);
				}


				//Matriks R

				for ($a = 0; $a < $countAlternatifTopsis; $a++) {
					for ($b = 0; $b < $countKriteriaAhp; $b++) {
						$matriks_r[$a][$b] = floatval($matriks_keputusan[$a][$b]) / $matriks_ternormalisasi[$b];
					}
				}

				//Matriks Ternormalisasi Terbobot

				for ($c = 0; $c < $countAlternatifTopsis; $c++) {
					for ($d = 0; $d < $countKriteriaAhp; $d++) {
						$matriks_terbobot[$c][$d] = $matriks_r[$c][$d] * $bobot[$d];
					}
				}
				
				//die(print_r($matriks_terbobot));
				$e1 = 0;
				for ($e = 0; $e < $countKriteriaAhp; $e++) {
					$maxPerColoumn = $matriks_terbobot[0][$e1++];
					for ($f = 0; $f < $countAlternatifTopsis; $f++) {
						if ($maxPerColoumn < $matriks_terbobot[$f][$e]) {
							$maxPerColoumn = $matriks_terbobot[$f][$e];
						}
					}
					$solusiPositif[$e] = $maxPerColoumn;
				}

				$g1 = 0;
				for ($g = 0; $g < $countKriteriaAhp; $g++) {
					$minPerColoumn = $matriks_terbobot[0][$g1++];
					for ($h = 0; $h < $countAlternatifTopsis; $h++) {
						if ($minPerColoumn > $matriks_terbobot[$h][$g]) {
							$minPerColoumn = $matriks_terbobot[$h][$g];
						}
					}
					$solusiNegatif[$g] = $minPerColoumn;
				}


				// Jarak Anrara nilai terbobot terhadap solusi ideal positif


				for ($i = 0; $i < $countAlternatifTopsis; $i++) {
					$countPerRow1 = 0;
					for ($j = 0; $j < count($solusiPositif); $j++) {
						$count_math = $matriks_terbobot[$i][$j] - $solusiPositif[$j];
						$count_math = pow($count_math, 2);
						$countPerRow1 = floatval($countPerRow1) + floatval($count_math);
					}
					$jarakSolusiPositif[$i] = sqrt($countPerRow1);
				}
				

				// Jarak Anrara nilai terbobot terhadap solusi ideal negatif


				for ($k = 0; $k < $countAlternatifTopsis; $k++) {
					$countPerRow2 = 0;
					for ($l = 0; $l < count($solusiNegatif); $l++) {
						$count_math = $matriks_terbobot[$k][$l] - $solusiNegatif[$l];
						$count_math = pow($count_math, 2);
						$countPerRow2 = floatval($countPerRow2) + floatval($count_math);
					}
					$jarakSolusiNegatif[$k] = sqrt($countPerRow2);
				}


				// Kedekatan Tiap Alternatif Solusi

				for ($m = 0; $m < $countAlternatifTopsis; $m++) {
					$math_pn = $jarakSolusiNegatif[$m] + $jarakSolusiPositif[$m];
					$math_pn = $jarakSolusiNegatif[$m] / $math_pn;
					$kedekatanAlternatif[$m] = $math_pn;
				}

				//die(print_r($kedekatanAlternatif));

				$minim_kedekatan = $kedekatanAlternatif[0];
				$terpilihPM = "";
				for ($n = 0; $n < count($kedekatanAlternatif); $n++) {
					if ($minim_kedekatan <= $kedekatanAlternatif[$n]) {
						$minim_kedekatan = $kedekatanAlternatif[$n];
						$terpilihPM = $data["alternatif_topsis"][$n]["nama_alternatif"];
						$menuMakan = $data["alternatif_topsis"][$n];
					}
				}

				//die(print_r($kedekatanAlternatif));

				// Nama - Paket Makanan

				for ($p = 0; $p < count($data["alternatif_topsis"]); $p++) {
					$paketMakan[$p] = $data["alternatif_topsis"][$p]["nama_alternatif"];
				}

				//for untuk pengurutan dari yang terkecil ke yang besar
				$foundZeroOne = $kedekatanAlternatif;
				$urutanMenuMakan = $paketMakan;
				$sortingPM = [];
				$sortingKA = [];
				//die(print_r($kedekatanAlternatif));
				for ($zero = 0; $zero < count($kedekatanAlternatif); $zero++) {
					$sortingPM[$zero] = max($foundZeroOne);
					for ($one = 0; $one < count($foundZeroOne); $one++) {
						if (count($foundZeroOne) != 1) {
							if ($sortingPM[$zero] == $foundZeroOne[$one]) {
								$sortingPM[$zero] = $urutanMenuMakan[$one];
								$sortingKA[$zero] = $foundZeroOne[$one];
								$deleteNumber = $one;
							}
						} else {
							$sortingPM[$zero] = $urutanMenuMakan[$one];
							$deleteNumber = $one;
						}
					}
					unset($foundZeroOne[$deleteNumber]);
					unset($urutanMenuMakan[$deleteNumber]);
					$foundZeroOne = array_values($foundZeroOne);
					$urutanMenuMakan = array_values($urutanMenuMakan);
					//if($zero == 2){ die(print_r($foundZeroOne) . print_r($sortingKA) . count($foundZeroOne)); }

				}

				//die(print_r($sortingPM));

				$data["number_cr"] = $number_cr;
				$data["minim_kedekatan"] = $minim_kedekatan;
				$data["matriks_keputusan"] = $matriks_keputusan;
				$data["matriks_ternormalisasi"] = $matriks_ternormalisasi;
				$data["matriks_r"] = $matriks_r;
				$data["bobot"] = $bobot;
				$data["matriks_terbobot"] = $matriks_terbobot;
				$data["solusiPositif"] = $solusiPositif;
				$data["solusiNegatif"] = $solusiNegatif;
				$data["jarakSolusiPositif"] = $jarakSolusiPositif;
				$data["jarakSolusiNegatif"] = $jarakSolusiNegatif;

				$data["sortingPM"] = $sortingPM;
				$data["menuMakan"] = $menuMakan;
				$data["paketMakan"] = $paketMakan;
				$data["kedekatanAlternatif"] = $kedekatanAlternatif;
				$data["terpilihPM"] = $terpilihPM;

				$data["nilaiSortingPM"] = implode(", ", $sortingPM);
				$data["nilaiPaketMakan"] = implode(", ", $paketMakan);
			} else {
				$data["report_message"] = "
				Pada Kriteria <b>" . $data["kriteria_pasien_id"]['nama_kriteria_pasien'] . "</b>
				Hasil CR = " . $number_cr . " Lebih besar dari 0,1. Silahkan inputkan data lagi pada Halaman Penilaian Kriteria
				<a href='" . site_url('admin/PenilaianKriteriaC') . "' class='btn btn-danger text-white'>Penilaian Kriteria</a>";
			}
		} else {
			$data["report_message"] = "Tidak ada data pada penilaian Kriteria TOPSIS!";
		}

		$this->loadMenu('Admin Page | Data Alternatif TOPSIS', 'admin/sidebar.php');
		$this->loadContent('admin/data_alternatif_topsis.php', $data);
		$this->loadMenu(null, 'admin/navbar.php');
	}

	public function simpan_record()
	{
		$result = $this->record_data->tambah_dataM($_POST);
		redirect("admin/DataAlternatifTopsisC");
	}

	public function pdf()
	{
		$this->load->library('dompdf_gen');

		$data['Hallo'] = "";
		$data["alternatif_topsis"] = $this->alternatif_topsis->tampil_data();

		$this->load->view('admin/print_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$namefile = "Laporan" . date('d-m-Y-H-i-s') . ".pdf";

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream($namefile, array('Attachment' => 0));
	}
}
