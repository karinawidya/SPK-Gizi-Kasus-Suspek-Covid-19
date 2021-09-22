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

	<head>
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
	</head>

	<body>
		<div class="container-xl">
			<div class="table-responsive">
				<div class="table-wrapper">
					<div class="table-title">
						<div class="row">
							<div class="col-sm-6">
								<h2>Manage <b>Nilai Index Ratio</b></h2>
							</div>
							<div class="col-sm-6">
								<a href="#addNilaiModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i>
									<span>Tambah Nilai Matrik Ratio</span></a>
							</div>
						</div>
					</div>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>
								</th>
								<th>No</th>
								<th>
									<center> Ukuran Matrik </center>
								</th>
								<th>Nilai</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($nilai_ir as $key => $value) { ?>
								<tr>
									<td>
									</td>
									<td><?php echo $key + 1; ?></td>
									<td>
										<center> <?php echo $value["ukuran_matrik"] ?> </center>
									</td>
									<td><?php echo $value["nilai"] ?></td>
									<td>
										<a href="#editNilaiModal<?php echo $value["id_ir"] ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
										<a href="#deleteNilaiModal<?php echo $value["id_ir"] ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
									</td>
								</tr>
								<div id="deleteNilaiModal<?php echo $value["id_ir"] ?>" class="modal fade">
									<div class="modal-dialog">
										<div class="modal-content">
											<form action="<?= site_url("admin/NilaiIRC/hapus_data/" . $value["id_ir"]) ?>" method="POST">
												<div class="modal-header">
													<h4 class="modal-title">Hapus Nilai Matrik</h4>
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												</div>
												<div class="modal-body">
													<p>Apakah Anda ingin menghapus nilai matrik <?php echo $value["id_ir"] ?> ?</p>
													<p class="text-warning"><small>Aksi ini tidak bisa dibatalkan.</small></p>
												</div>
												<div class="modal-footer">
													<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
													<input type="submit" class="btn btn-danger" value="Delete">
												</div>
											</form>
										</div>
									</div>
								</div>
								<div id="editNilaiModal<?php echo $value["id_ir"] ?>" class="modal fade">
									<div class="modal-dialog">
										<div class="modal-content">
											<form action="<?= site_url("admin/NilaiIRC/edit_data/" . $value["id_ir"]) ?>" method="POST">
												<div class="modal-header">
													<h4 class="modal-title">Edit Nilai Matrik</h4>
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												</div>
												<div class="modal-body">
													<div class="form-group">
														<label>Ukuran Matrik</label>
														<input type="number" name="ukuran_matrik" value="<?php echo $value["ukuran_matrik"] ?>" class="form-control" required>
													</div>
													<div class="form-group">
														<label>Nilai</label>
														<input type="text" name="nilai" value="<?php echo $value["nilai"] ?>" class="form-control" required>
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
		<div id="addNilaiModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<!-- ACTION -->
					<form action="<?= site_url("admin/NilaiIRC/tambah_data") ?>" method="POST">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Ukuran Matrik</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Ukuran Matrik</label>
								<input type="number" name="ukuran_matrik" min="1" class="form-control" required>
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
		<!-- Edit Modal HTML -->

	</body>

	</html>
</div>
