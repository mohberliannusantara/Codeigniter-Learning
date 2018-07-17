<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Begin page content -->
<main role="main" class="container">
	<section class="jumbotron text-center">
		<?php if($this->session->userdata('logged_in')){ ?>
			<div class="container">
				<div class="py-5 text-center">
					<h2>Selamat Datang</h1>
					<h1><?php echo $user->nama ?></h1>
				</div>
			</div>
		<?php }  else { ?>
			<div class="container">
				<h1 class="jumbotron-heading">Home</h1>
				<h6 class="text-muted">Ini bagian Home Page</h6>
			</div>
		<?php } ?>
	</section>
</main>
