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
	<!-- Header -->
	<!-- Header -->
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
							<div class="col-sm-6">
								<h2><b>Kriteria Topsis</b></h2>
							</div>
							<!-- <div class="col-sm-6">
						<a href="#addKriteriaModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Kriteria</span></a>
						<a href="#deleteKriteriaModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div> -->
						</div>
					</div>
					<table class="table table-striped table-hover">
						<div class="form-group">
							<label for="exampleFormControlSelect1">Pemilihan Kriteria Pasien</label>
							<form action="<?= site_url("admin/KriteriaTopsisC/hitungEigen") ?>" method="POST">
								<select required class="col-md-3 form-control mb-2" name="kriteria_pasien" id="exampleFormControlSelect1" onchange='this.form.submit()'>
									<option selected disabled> Pilih Kriteria Pasien </option>
									<?php foreach ($kriteria_pasien as $value) { ?>
										<option value="<?php echo $value["id_kriteria_pasien"] ?>" <?php if (isset($_POST["kriteria_pasien"])) {
																																																																					if ($value["id_kriteria_pasien"] == $data_post) {
																																																																						echo "selected";
																																																																					}
																																																																				} ?>> <?php echo $value["nama_kriteria_pasien"] ?></option>
									<?php

							}
							?>
								</select>

								<?php if (isset($_POST["kriteria_pasien"])) : ?>
									<a class="btn bg-danger text-white p-1" href="<?= site_url('admin/KriteriaTopsisC') ?>">Kembali</a>
								<?php endif; ?>

							</form>
						</div>
					</table>

					<?php if (isset($_POST["kriteria_pasien"])) { ?>
						<div class="eigen_count">
							<h3>1. Perbandingan Berpasangan : </h3>

							<table border="1" cellpadding="5" cellspacing="0" class="mb-5">
								<tr>
									<th class="bg-dark text-white text-center"> Kriteria </th>
									<?php foreach ($kriteria_ahp as $header) : ?>
										<th><?= $header["nama_kriteria"] ?></th>
									<?php endforeach; ?>
								</tr>

								<?php for ($x = 0; $x < count($kriteria_ahp); $x++) : ?>
									<tr>
										<td><?= $kriteria_ahp[$x]["nama_kriteria"]; ?></td>
										<?php for ($y = 0; $y < count($matriks); $y++) : ?>
											<td class="text-center"><?= $matriks[$x][$y]; ?></td>
										<?php endfor; ?>
									</tr>
								<?php endfor; ?>

							</table>


							<h3>2. Sintesis : </h3>

							<table border="1" cellpadding="5" cellspacing="0" class="mb-5">
								<tr>
									<th class="bg-dark text-white text-center"> Kriteria </th>
									<?php foreach ($kriteria_ahp as $header) : ?>
										<th><?= $header["nama_kriteria"] ?></th>
									<?php endforeach; ?>
								</tr>

								<?php for ($z1 = 0; $z1 < count($kriteria_ahp); $z1++) : ?>
									<tr>
										<td><?= $kriteria_ahp[$z1]["nama_kriteria"]; ?></td>
										<?php for ($z2 = 0; $z2 < count($matriks); $z2++) : ?>
											<td class="text-center"><?= $matriks[$z1][$z2]; ?></td>
										<?php endfor; ?>
									</tr>
								<?php endfor; ?>
								<tr>
									<td class="text-center"><b>Jumlah</b></td>
									<?php for ($z3 = 0; $z3 < count($kriteria_ahp); $z3++) : ?>
										<td class="text-center"><b><?= $matriks_total[$z3]; ?></b></td>
									<?php endfor; ?>
								</tr>
							</table>

							<h3>3. Normalisasi Matriks : </h3>

							<table border="1" cellpadding="5" cellspacing="0" class="mb-5">
								<tr>
									<th class="bg-dark text-white text-center"> Kriteria </th>
									<?php foreach ($kriteria_ahp as $header) : ?>
										<th class="text-center"><?= $header["nama_kriteria"] ?></th>
									<?php endforeach; ?>
									<th class="text-center bg-primary text-white">Eigen</th>
								</tr>

								<?php for ($x1 = 0; $x1 < count($kriteria_ahp); $x1++) : ?>
									<tr>
										<td><?= $kriteria_ahp[$x1]["nama_kriteria"]; ?></td>
										<?php for ($x2 = 0; $x2 < count($matriks_normalisasi); $x2++) : ?>
											<td class="text-center"><?= round($matriks_normalisasi[$x1][$x2], 5); ?></td>
										<?php endfor; ?>
										<td class="text-center" style="background: #D3E3FC"><?= round($eigenAhp[$x1], 5); ?></td>
									</tr>
								<?php endfor; ?>
							</table>

							<h3>4. Mengukur Konsistensi : </h3>

							<table border="1" cellpadding="5" cellspacing="0" class="mb-5">
								<tr>
									<th class="bg-dark text-white text-center"> Kriteria </th>
									<?php foreach ($kriteria_ahp as $header) : ?>
										<th class="text-center"><?= $header["nama_kriteria"] ?></th>
									<?php endforeach; ?>
									<th class="text-center bg-primary text-white">Eigen</th>
									<th class="text-center bg-success text-white">Konsistensi</th>
								</tr>

								<?php for ($y1 = 0; $y1 < count($kriteria_ahp); $y1++) : ?>
									<tr>
										<td><?= $kriteria_ahp[$y1]["nama_kriteria"]; ?></td>
										<?php for ($y2 = 0; $y2 < count($matriks_normalisasi); $y2++) : ?>
											<td class="text-center"><?= round($matriks_normalisasi[$y1][$y2], 5); ?></td>
										<?php endfor; ?>
										<td class="text-center" style="background: #D3E3FC"><?= round($eigenAhp[$y1], 3); ?></td>
										<td class="text-center" style="background: #C8E6C8"><?= round($konsistensiAhp[$y1], 3); ?></td>
									</tr>
								<?php endfor; ?>
							</table>

							<h3>5. Preferensi : </h3>

							<table border="1" cellpadding="5" cellspacing="0" class="mb-5">
								<?php for ($i = 0; $i < count($kriteria_ahp); $i++) : ?>
									<tr>
										<td class="text-center"><?= $kriteria_ahp[$i]["nama_kriteria"]; ?></td>
										<td class="text-center"><?= round($preferensiAhp[$i], 3); ?></td>
									</tr>
								<?php endfor; ?>
								<tr>
									<td class="text-center"><b>Total</b></td>
									<td class="text-center"><?= round($total_preferensi, 3); ?></td>
								</tr>
							</table>

							<table border="1" cellpadding="5" cellspacing="0" class="mb-3">
								<tr>
									<td class="text-center bg-danger text-white"><b>Lambda Max :</b></td>
									<td class="text-center"><?= $lambdaMax ?></td>
								</tr>
							</table>

							<table border="1" cellpadding="5" cellspacing="0" class="mb-3">
								<tr>
									<td class="text-center bg-success text-white"><b>CI :</b></td>
									<td class="text-center"><?= $number_ci ?></td>
								</tr>
							</table>

							<table border="1" cellpadding="5" cellspacing="0" class="mb-3">
								<tr>
									<td class="text-center bg-primary text-white"><b>CR :</b></td>
									<td class="text-center"><?= $number_cr ?></td>
								</tr>
							</table>

							<?php if ($number_cr < 0.1) :
							echo "<h5>Nilai CR = " . $number_cr . " Lebih Kecil dari (0,1). Maka Nilai Eigennya adalah</h5>";
						?>
								<table border="1" cellpadding="5" cellspacing="0" class="mb-3">
									<tr>
										<td class="text-center text-white bg-secondary">Eigen</td>
										<?php for ($j = 0; $j < count($eigenAhp); $j++) : ?>
											<td class="text-center"><?= round($eigenAhp[$j], 5); ?></td>
										<?php endfor; ?>
									</tr>
								</table>

							<?php
						else :
							echo "Nilai CR = " . $number_cr . " Lebih Besar dari (0,1).";
						?>
							<?php endif; ?>

						</div>
					<?php

			} ?>

				</div>
			</div>
		</div>
		<!-- Delete Modal HTML -->
		<div id="deleteKriteriaModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form>
						<div class="modal-header">
							<h4 class="modal-title">Delete Kriteria</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<p>Are you sure you want to delete these Records?</p>
							<p class="text-warning"><small>This action cannot be undone.</small></p>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-danger" value="Delete">
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>

	</html>
