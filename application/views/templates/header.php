<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>CodeIgniter Learning</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
        <!-- Style tambahan
        Note: Jika menginginkan style CSS tambahan, gunakan file custom.css sehingga file CSS asli milik Bootstrap tetap orisinil. Tujuannya, agar nantinya jika ada update baru dari Bootstrap dan ingin kita implementasikan, maka custom style kita tidak tertimpa.
        -->
        <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/theme.min.css"> -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-uno box-shadowf">
            <a class="navbar-brand" href="#">CodeIgniter Learning</a>
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
                </ul>

                <div class="btn-group" role="group" aria-label="Data baru">
                    <?php // echo anchor('blog/create', 'Artikel Baru', array('class' => 'btn btn-outline-light')); ?>
                    <?php //echo anchor('category/create', 'Kategori Baru', array('class' => 'btn btn-outline-light')); ?>

                </div>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
               </form>
            </div>
        </nav>

        <!-- akhir Header -->
