<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title><?= $title ?> </title>
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url(); ?>assets/admin/img/brand/icon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="<?= site_url('admin/DashboardC') ?>">
          <img src="<?= base_url(); ?>assets/admin/img/brand/logo.png" style="width:85%;">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <!-- <li class="nav-item">
              <a class="nav-link active" href="<?= site_url('admin/DashboardC') ?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('admin/KriteriaPasienC') ?>">
                <i class="ni ni-bullet-list-67 text-orange"></i>
                <span class="nav-link-text">Kriteria Pasien</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('admin/KriteriaAhpC') ?>">
                <i class="ni ni-bullet-list-67 text-primary"></i>
                <span class="nav-link-text">Kriteria AHP</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('admin/PenilaianKriteriaC') ?>">
                <i class="ni ni-single-copy-04 text-yellow"></i>
                <span class="nav-link-text">Penilaian Kriteria</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('admin/NilaiIRC') ?>">
                <i class="ni ni-single-copy-04 text-default"></i>
                <span class="nav-link-text">Nilai IR</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('admin/AlternatifTopsisC') ?>">
                <i class="ni ni-check-bold text-info"></i>
                <span class="nav-link-text">Alternatif TOPSIS</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('admin/PenilaianAlternatifTopsisC') ?>">
                <i class="ni ni-single-copy-04 text-red"></i>
                <span class="nav-link-text">Penilaian Alternatif TOPSIS</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('admin/KriteriaTopsisC') ?>">
                <i class="ni ni-bullet-list-67 text-pink"></i>
                <span class="nav-link-text">Kriteria TOPSIS</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('admin/DataAlternatifTopsisC') ?>">
                <i class="ni ni-collection text-dark"></i>
                <span class="nav-link-text">Data Alternatif TOPSIS</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
        </div>
      </div>
    </div>
  </nav>