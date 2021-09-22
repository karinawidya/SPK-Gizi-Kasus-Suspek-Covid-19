<div class="main-content" id="panel">
	<!-- Topnav -->
	<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom" style="min-height:50px">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- Logout form -->
				<form method="POST" action="<?= site_url("admin/DashboardC/logout") ?>" >
					<div class="form-group mb-0">
						<button type="submit" class="btn btn-light" style="right:0; position:absolute; margin-right:10px; margin-top:-17px">
							Logout
						</button>
					</div>
				</form>
			</div>
		</div>
	</nav>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style>
		body {
			color: #566787;
			background: #f5f5f5;
			font-family: 'Varela Round', sans-serif;
			font-size: 13px;
		}

		.table-responsive {
			margin: 30px 0;
		}

		.table-wrapper {
			background: #fff;
			padding: 20px 25px;
			border-radius: 3px;
			min-width: 1000px;
			box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
		}

		.table-title {
			padding-bottom: 15px;
			background: #8FBC8F;
			color: #fff;
			padding: 16px 30px;
			min-width: 100%;
			margin: -20px -25px 10px;
			border-radius: 3px 3px 0 0;
		}

		.table-title h2 {
			margin: 5px 0 0;
			font-size: 24px;
		}

		.table-title .btn-group {
			float: right;
		}

		.table-title .btn {
			color: #fff;
			float: right;
			font-size: 13px;
			border: none;
			min-width: 50px;
			border-radius: 2px;
			border: none;
			outline: none !important;
			margin-left: 10px;
		}

		.table-title .btn i {
			float: left;
			font-size: 21px;
			margin-right: 5px;
		}

		.table-title .btn span {
			float: left;
			margin-top: 2px;
		}

		table.table tr th,
		table.table tr td {
			border-color: #e9e9e9;
			padding: 12px 15px;
			vertical-align: middle;
		}

		table.table tr th:first-child {
			width: 60px;
		}

		table.table tr th:last-child {
			width: 100px;
		}

		table.table-striped tbody tr:nth-of-type(odd) {
			background-color: #fcfcfc;
		}

		table.table-striped.table-hover tbody tr:hover {
			background: #f5f5f5;
		}

		table.table th i {
			font-size: 13px;
			margin: 0 5px;
			cursor: pointer;
		}

		table.table td:last-child i {
			opacity: 0.9;
			font-size: 22px;
			margin: 0 5px;
		}

		table.table td a {
			font-weight: bold;
			color: #566787;
			display: inline-block;
			text-decoration: none;
			outline: none !important;
		}

		table.table td a:hover {
			color: #2196F3;
		}

		table.table td a.edit {
			color: #FFC107;
		}

		table.table td a.delete {
			color: #F44336;
		}

		table.table td i {
			font-size: 19px;
		}

		table.table .avatar {
			border-radius: 50%;
			vertical-align: middle;
			margin-right: 10px;
		}

		.pagination {
			float: right;
			margin: 0 0 5px;
		}

		.pagination li a {
			border: none;
			font-size: 13px;
			min-width: 30px;
			min-height: 30px;
			color: #999;
			margin: 0 2px;
			line-height: 30px;
			border-radius: 2px !important;
			text-align: center;
			padding: 0 6px;
		}

		.pagination li a:hover {
			color: #666;
		}

		.pagination li.active a,
		.pagination li.active a.page-link {
			background: #03A9F4;
		}

		.pagination li.active a:hover {
			background: #0397d6;
		}

		.pagination li.disabled i {
			color: #ccc;
		}

		.pagination li i {
			font-size: 16px;
			padding-top: 6px
		}

		.hint-text {
			float: left;
			margin-top: 10px;
			font-size: 13px;
		}

		/* Custom checkbox */
		.custom-checkbox {
			position: relative;
		}

		.custom-checkbox input[type="checkbox"] {
			opacity: 0;
			position: absolute;
			margin: 5px 0 0 3px;
			z-index: 9;
		}

		.custom-checkbox label:before {
			width: 18px;
			height: 18px;
		}

		.custom-checkbox label:before {
			content: '';
			margin-right: 10px;
			display: inline-block;
			vertical-align: text-top;
			background: white;
			border: 1px solid #bbb;
			border-radius: 2px;
			box-sizing: border-box;
			z-index: 2;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			content: '';
			position: absolute;
			left: 6px;
			top: 3px;
			width: 6px;
			height: 11px;
			border: solid #000;
			border-width: 0 3px 3px 0;
			transform: inherit;
			z-index: 3;
			transform: rotateZ(45deg);
		}

		.custom-checkbox input[type="checkbox"]:checked+label:before {
			border-color: #03A9F4;
			background: #03A9F4;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			border-color: #fff;
		}

		.custom-checkbox input[type="checkbox"]:disabled+label:before {
			color: #b8b8b8;
			cursor: auto;
			box-shadow: none;
			background: #ddd;
		}

		/* Modal styles */
		.modal .modal-dialog {
			max-width: 400px;
		}

		.modal .modal-header,
		.modal .modal-body,
		.modal .modal-footer {
			padding: 20px 30px;
		}

		.modal .modal-content {
			border-radius: 3px;
			font-size: 14px;
		}

		.modal .modal-footer {
			background: #ecf0f1;
			border-radius: 0 0 3px 3px;
		}

		.modal .modal-title {
			display: inline-block;
		}

		.modal .form-control {
			border-radius: 2px;
			box-shadow: none;
			border-color: #dddddd;
		}

		.modal textarea.form-control {
			resize: vertical;
		}

		.modal .btn {
			border-radius: 2px;
			min-width: 100px;
		}

		.modal form label {
			font-weight: normal;
		}

		.hidden_form_topsis {
			display: block;
			width: 100%;
			height: 0;
			overflow: hidden;
		}
	</style>
	<script>
		$(document).ready(function() {
			// Activate tooltip
			$('[data-toggle="tooltip"]').tooltip();

			// Select/Deselect checkboxes
			var checkbox = $('table tbody input[type="checkbox"]');
			$("#selectAll").click(function() {
				if (this.checked) {
					checkbox.each(function() {
						this.checked = true;
					});
				} else {
					checkbox.each(function() {
						this.checked = false;
					});
				}
			});
			checkbox.click(function() {
				if (!this.checked) {
					$("#selectAll").prop("checked", false);
				}
			});
		});
	</script>
	</head>

	<body style="color: #302F2F; font-family:times-roman, sans-serif; font-weight: bold;">
		<div class="container-xl">
			<div class="table-responsive">
				<div class="table-wrapper">
					<div class="table-title">
						<div class="row">
							<div class="col-sm-12">
								<h2>Data <b>Alternatif Topsis</b></h2>
							</div>

						</div>
					</div>

					<label for="exampleFormControlSelect1">Pemilihan Kriteria Pasien</label>

					<form action="<?= site_url("admin/DataAlternatifTopsisC/hitungTopsis") ?>" method="POST">
						<select required class="col-md-3 form-control mb-2" name="kriteria_pasien" id="exampleFormControlSelect1" onchange='this.form.submit()'>
							<option selected disabled> Pilih Kriteria Pasien </option>
							<?php foreach ($kriteria_pasien as $value) { ?>
								<option value="<?php echo $value["id_kriteria_pasien"] ?>" <?php if (isset($_POST["kriteria_pasien"])) {
																																																																			if ($value["id_kriteria_pasien"] == $data_post) {
																																																																				$nama_kriteria = $value["nama_kriteria_pasien"];
																																																																				echo "selected";
																																																																			}
																																																																		} ?>> <?php echo $value["nama_kriteria_pasien"]; ?></option>
							<?php

					}
					?>
						</select>

						<?php if (isset($_POST["kriteria_pasien"])) : ?>
							<a class="btn bg-danger text-white p-1" href="<?= site_url('admin/DataAlternatifTopsisC') ?>">Kembali</a>
						<?php endif; ?>

					</form>

					<?php
				if (isset($_POST["kriteria_pasien"])) {
					if ($report_message == " ") : ?>
							<div class="mb-3"></div>

							Hasil nilai CR dari <b>kriteria <?= $kriteria_pasien_id["nama_kriteria_pasien"] ?></b> adalah <?= $number_cr; ?>

							<div class="mb2"></div>

							<h3>1. Matriks Keputusan Ternormalisasi : </h3>
							<table class="mb-5" border="1" cellpadding="5" cellspacing="0">
								<tr>
									<th class="text-center">Alternatif</th>
									<?php for ($a1 = 0; $a1 < count($kriteria_ahp); $a1++) : ?>
										<th class="text-center"><?= $kriteria_ahp[$a1]["nama_kriteria"] ?></th>
									<?php endfor; ?>
								</tr>
								<?php //die(print_r($matriks_keputusan)) 
							?>
								<?php for ($a2 = 0; $a2 < count($paketMakan); $a2++) : ?>
									<tr>
										<td><?= $paketMakan[$a2]; ?></td>
										<?php for ($a3 = 0; $a3 < count($kriteria_ahp); $a3++) : ?>
											<td class="text-center"><?= $matriks_keputusan[$a2][$a3]; ?></td>
										<?php endfor; ?>
									</tr>
								<?php endfor; ?>
							</table>

							<h3>2. Matriks Ternormalisasi : </h3>
							<table class="mb-5" border="1" cellpadding="5" cellspacing="0">
								<?php for ($b1 = 0; $b1 < count($matriks_ternormalisasi); $b1++) : ?>
									<?php $no_b1 = $b1 + 1; ?>
									<tr>
										<td><?= "X" . $no_b1; ?></td>
										<td><?= $matriks_ternormalisasi[$b1]; ?></td>
									</tr>
								<?php endfor; ?>
							</table>

							<h3>3. Matriks R</h3>

							<table class="mb-5" border="1" cellpadding="5" cellspacing="0">
								<?php for ($b2 = 0; $b2 < count($paketMakan); $b2++) : ?>
									<tr>
										<?php for ($b3 = 0; $b3 < count($kriteria_ahp); $b3++) : ?>
											<td><?= round($matriks_r[$b2][$b3], 5); ?></td>
										<?php endfor; ?>
									</tr>
								<?php endfor; ?>
							</table>

							<h3>4. Ternormalisasi Terbobot :</h3>
							<p>
								Dengan Pemakaian Bobot =
							<table class="mb-2" border="1" cellpadding="5" cellspacing="0">
								<tr>
									<?php for ($c1 = 0; $c1 < count($bobot); $c1++) : ?>
										<td class="text-center"><?= $bobot[$c1]; ?></td>
									<?php endfor; ?>
								</tr>
							</table>
							</p>

							<p>
								Akan menghasilkan matriks ternormalisasi terbobot seperti dibawah =
							<table class="mb-5" border="1" cellpadding="5" cellspacing="0">
								<?php for ($c2 = 0; $c2 < count($paketMakan); $c2++) : ?>
									<tr>
										<?php for ($c3 = 0; $c3 < count($kriteria_ahp); $c3++) : ?>
											<td><?= round($matriks_terbobot[$c2][$c3], 5); ?></td>
										<?php endfor; ?>
									</tr>
								<?php endfor; ?>
							</table>
							</p>

							<h3>5. Solusi Ideal Positif :</h3>
							<table class="mb-5" border="1" cellpadding="5" cellspacing="0">
								<?php for ($d1 = 0; $d1 < count($solusiPositif); $d1++) : ?>
									<?php $no_d1 = $d1 + 1; ?>
									<tr>
										<td><?= "Y" . $no_d1 . "+" ?></td>
										<td><?= $solusiPositif[$d1] ?></td>
									</tr>
								<?php endfor; ?>
							</table>

							<h3>6. Solusi Ideal Negatif :</h3>
							<table class="mb-5" border="1" cellpadding="5" cellspacing="0">
								<?php for ($d2 = 0; $d2 < count($solusiNegatif); $d2++) : ?>
									<?php $no_d2 = $d2 + 1; ?>
									<tr>
										<td><?= "Y" . $no_d2 . "-" ?></td>
										<td><?= $solusiNegatif[$d2] ?></td>
									</tr>
								<?php endfor; ?>
							</table>

							<h3>7. Jarak Antara <b>Nilai terbobot</b>, terhadap <b>Solusi Ideal Positif</b> :</h3>
							<table class="mb-5" border="1" cellpadding="5" cellspacing="0">
								<tr>
									<?php for ($e1 = 0; $e1 < count($jarakSolusiPositif); $e1++) : ?>
										<td><?= $jarakSolusiPositif[$e1]; ?></td>
									<?php endfor; ?>
								</tr>
							</table>

							<h3>8. Jarak Antara <b>Nilai terbobot</b>, terhadap <b>Solusi Ideal Negatif</b> :</h3>
							<table class="mb-5" border="1" cellpadding="5" cellspacing="0">
								<tr>
									<?php for ($e2 = 0; $e2 < count($jarakSolusiNegatif); $e2++) : ?>
										<td><?= $jarakSolusiNegatif[$e2]; ?></td>
									<?php endfor; ?>
								</tr>
							</table>

							<p>Maka akan menghasilkan kedekatan di tiap alternatif solusi seperti dibawah :</p>
							<table class="mb-5" border="1" cellpadding="5" cellspacing="0">
								<tr>
									<?php for ($f1 = 0; $f1 < count($kedekatanAlternatif); $f1++) : ?>
										<?php $no_f1 = $f1 + 1; ?>
										<td class="text-center"><?= "V" . $no_f1 ?>
										<?php endfor; ?>
								</tr>
								<tr>
									<?php for ($f2 = 0; $f2 < count($kedekatanAlternatif); $f2++) : ?>
										<td class="text-center"><?= $kedekatanAlternatif[$f2] ?>
										<?php endfor; ?>
								</tr>
							</table>

							<p>Jadi hasil pengurutan dengan nilai terbesar adalah = <?= $minim_kedekatan ?> akan seperti table dibawah :</p>

							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th class="text-center">Nilai V</th>
										<th class="text-center">Paket Menu</th>
										<th class="text-center">Urutan-PM</th>
										<th class="text-center">Terpilih</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<?php for ($i = 0; $i < count($kedekatanAlternatif); $i++) {
											$no = $i + 1;
											echo "V" . $no . " = " . round($kedekatanAlternatif[$i], 5) . "<br>";
										}
										?>

										</td>
										<td>
											<?php for ($u = 0; $u < count($paketMakan); $u++) {
											$no1 = $u + 1;
											echo $paketMakan[$u] . "<br>";
										}
										?>
										</td>
										<td>

											<?php for ($v = 0; $v < count($sortingPM); $v++) {
											echo $sortingPM[$v] . "<br>";
										}
										?>
										</td>
										<td>
											<h6 class="text-center"><?= $terpilihPM; ?></h6>
											<span><b>Menu Pagi :</b></span><br>
											<?= $menuMakan["pagi"] . "<br>"; ?>
											<span><b>Menu Siang :</b></span><br>
											<?= $menuMakan["siang"] . "<br>"; ?>
											<span><b>Menu Sore :</b></span><br>
											<?= $menuMakan["sore"] . "<br>"; ?>
										</td>
										<!-- <td>
								<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td> -->
									</tr>
								</tbody>
							</table>
						<?php else : ?>
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th class="text-center">Data Alternatif Topsis</th>
									</tr>
								</thead>
								<tr>
									<td><?= $report_message; ?></td>
								</tr>
							</table>
					<?php endif;
			} ?>

					<!-- <div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div> -->
				</div>
			</div>

			<?php if (isset($_POST["kriteria_pasien"])) : ?>
				<form action="<?= site_url('admin/DataAlternatifTopsisC/simpan_record') ?>" method="POST">
					<div class="hidden_form_topsis">
						<input type="text" name="nama_kriteria" value="<?= $nama_kriteria; ?>">
						<input type="text" name="paket_menu" value="<?= $nilaiPaketMakan; ?>">
						<input type="text" name="urutan_menu" value="<?= $nilaiSortingPM; ?>">
						<input type="text" name="pagi" value="<?= $menuMakan['pagi'] ?>">
						<input type="text" name="siang" value="<?= $menuMakan['siang']; ?>">
						<input type="text" name="sore" value="<?= $menuMakan['sore']; ?>">
					</div>
					<div class="mb-6 text-right">
						<input type="submit" class="btn btn-success" value="SIMPAN">
						<a class="btn btn-danger text-white" target="_blank" href="<?= site_url('admin/DataAlternatifTopsisC/pdf?nama_kriteria=' . $nama_kriteria . '&urutan_menu=' . $nilaiSortingPM) ?>"><i class="fa fa-print"></i> Print</a>
					</div>
				</form>
			<?php endif; ?>

		</div>
	</body>
	</html>
