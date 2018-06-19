<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main role="main" class="container">
  <section class="jumbotron text-center">
    <div class="container">
      <img src="<?php echo base_url('assets/icon.png') ?>" alt="" style="height: 120px; width:100px;">
      <h2 class="jumbotron-heading text-muted"><?php	echo $page_title ?></h2>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <?php
          $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
          echo validation_errors();
          echo form_open('user/register', array('class' => 'needs-validation', 'novalidate' => ''));
          ?>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap"value="<?php echo set_value('nama') ?>" required autofocus>
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email') ?>" required>
          </div>

          <div class="form-group">
            <label>Kodepos</label>
            <input type="text" class="form-control" name="kodepos" placeholder="Kodepos" value="<?php echo set_value('kodepos') ?>" required>
          </div>

          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username') ?>" required>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>

          <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" class="form-control" name="password2" placeholder="Password">
          </div>

          <div class="form-group">
            <label for="">Paket Membership</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="membership" id="regulermember" value="2" checked>
              <label class="form-check-label" for="regulermember">Reguler</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="membership" id="premiummember" value="3">
              <label class="form-check-label" for="premiummember">Premium</label>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Daftar</button>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </section>
</main>
