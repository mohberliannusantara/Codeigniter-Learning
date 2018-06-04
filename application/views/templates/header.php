<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/icon.png') ?>">
  <title>CodeIgniter Learning</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css') ?>">

  <!-- dataTables -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap4.min.css') ?>">
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

  <!-- dataTables -->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/> -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->

</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark box-shadowf">
    <a class="navbar-brand" href="<?php echo site_url()?>">CI Learn</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainnavbar">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url() ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url() ?>biodata">Biodata</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url() ?>blog">Artikel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url() ?>category">Kategori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url() ?>about">About</a>
        </li>
        <li class="nav-item">
          <?php if($this->session->userdata('user_login')){ ?>
            <a class="nav-link" href="<?php echo site_url() ?>user/logout">Logout</a>
          <?php }  else { ?>
            <a class="nav-link" href="<?php echo site_url() ?>user/login">Login</a>
          <?php } ?>
        </li>
      </ul>
    </div>
  </nav>

  <!-- akhir Header -->
