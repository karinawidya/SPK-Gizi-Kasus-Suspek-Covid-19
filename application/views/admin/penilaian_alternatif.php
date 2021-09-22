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

	<body>
		<div class="container-xl">
			<div class="table-responsive">
				<div class="table-wrapper">
					<div class="table-title">
						<div class="row">
							<div class="col-sm-6">
								<h2>Manage <b>Penilaian Alternatif TOPSIS</b></h2>
							</div>
							<div class="col-sm-6">
								<a href="#addPenilaianModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Penilaian Alternatif</span></a>
							</div>
						</div>
					</div>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Alternatif Baris</th>
								<th>Nama Alternatif Kolom</th>
								<th>Nilai</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($penilaian_alternatif as $key => $value) {
							?>
								<tr>
									<td>
										<center> <?php echo $key + 1; ?> </center>
									</td>
									<td><?php echo $value["nama_alternatif_baris"] ?></td>
									<td><?php echo $value["nama_kriteria_kolom"] ?></td>
									<td><?php echo $value["nilai"] ?></td>
									<td>
										<a href="#editPenilaianModal<?php echo $value["id_alternatif_kriteria"] ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
										<a href="#deletePenilaianModal<?php echo $value["id_alternatif_kriteria"] ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
									</td>
								</tr>

								<div id="deletePenilaianModal<?php echo $value["id_alternatif_kriteria"] ?>" class="modal fade">
									<div class="modal-dialog">
										<div class="modal-content">
											<form action="<?= site_url("admin/PenilaianAlternatifTopsisC/hapus_data/" . $value["id_alternatif_kriteria"]) ?>" method="POST">
												<form>
													<div class="modal-header">
														<h4 class="modal-title">Hapus Penilaian Kriteria</h4>
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													</div>
													<div class="modal-body">
														<p>Apakah Anda ingin menghapus alternatif kriteria </p>
														<p class="text-warning"><small>Aksi ini tidak dapat dibatalkan.</small></p>
													</div>
													<div class="modal-footer">
														<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
														<input type="submit" class="btn btn-danger" value="Delete">
													</div>
												</form>
										</div>
									</div>
								</div>
								<div id="editPenilaianModal<?php echo $value["id_alternatif_kriteria"] ?>" class="modal fade">
									<div class="modal-dialog">
										<div class="modal-content">
											<form action="<?= site_url("admin/PenilaianAlternatifTopsisC/edit_data/" . $value["id_alternatif_kriteria"]) ?>" method="POST">
												<div class="modal-header">
													<h4 class="modal-title">Edit Penilaian Alternatif Kriteria</h4>
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												</div>
												<div class="modal-body">
													<div class="form-group">
														<label>Nama Kriteria Baris</label>
														<select name="id_alternatif_baris" id="inputid_alternatif_baris" class="form-control">
															<option value="" readonly>Pilih Kriteria TOPSIS Baris</option>
															<?php
														foreach ($alternatif_topsis as $row) {
															if ($row["id_alternatif"] == $value["id_alternatif_baris"]) { ?>
																	<option selected value="<?php echo $value["id_alternatif_baris"] ?>"><?php echo $value["nama_alternatif_baris"] ?></option>
																<?php

														} else { ?>
																	<option value="<?php echo $row["id_alternatif"] ?>"><?php echo $row["nama_alternatif"] ?></option>
																<?php

														}
														?>
															<?php

													}
													?>
														</select>
													</div>
													<div class="form-group">
														<label>Nama Kriteria Kolom</label>
														<select name="id_alternatif_kolom" id="inputid_alternatif_kolom" class="form-control">
															<option value="" readonly>Pilih Alternatif Kriteria TOPSIS Kolom</option>
															<?php
														foreach ($kriteria_ahp as $row) {
															if ($row["id_kriteria_ahp"] == $value["id_alternatif_kolom"]) { ?>
																	<option selected value="<?php echo $value["id_alternatif_kolom"] ?>"><?php echo $value["nama_kriteria_kolom"] ?></option>
																<?php

														} else { ?>
																	<option value="<?php echo $row["id_kriteria_ahp"] ?>"><?php echo $row["nama_kriteria"] ?></option>
																<?php

														}
														?>
															<?php

													}
													?>
														</select>
													</div>
													<div class="form-group">
														<label>Nilai</label>
														<input type="text" name="nilai" value="<?php echo $value["nilai"] ?>" class="form-control" required>
													</div>
												</div>
												<div class="modal-footer">
													<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
													<input type="submit" class="btn btn-info" value="Save">
												</div>
											</form>
										</div>
									</div>
								</div>
							<?php

					}
					?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- Edit Modal HTML -->
		<div id="addPenilaianModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="<?= site_url("admin/PenilaianAlternatifTopsisC/tambah_data") ?>" method="POST">
						<div class="modal-header">
							<h4 class="modal-title">Tambahkan Penilaian Kriteria</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Kriteria Baris</label>

								<select name="id_alternatif_baris" id="inputid_alternatif_baris" class="form-control">
									<option value="" readonly>Pilih Alternatif Kriteria TOPSIS Baris</option>
									<?php
								foreach ($alternatif_topsis as $value) { ?>
										<option value="<?php echo $value["id_alternatif"] ?>"><?php echo $value["nama_alternatif"] ?></option>
									<?php

							}
							?>
								</select>

							</div>
							<div class="form-group">
								<label>Kriteria Kolom</label>

								<select name="id_alternatif_kolom" id="inputid_alternatif_kolom" class="form-control">
									<option value="" readonly>Pilih Alternatif Kriteria TOPSIS Kolom</option>
									<?php
								foreach ($kriteria_ahp as $value) { ?>
										<option value="<?php echo $value["id_kriteria_ahp"] ?>"><?php echo $value["nama_kriteria"] ?></option>
									<?php

							}
							?>
								</select>
							</div>
							<div class="form-group">
								<label>Nilai</label>
								<input type="text" name="nilai" class="form-control" required>
							</div>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Keluar">
							<input type="submit" class="btn btn-success" value="Tambah">
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>

	</html>
