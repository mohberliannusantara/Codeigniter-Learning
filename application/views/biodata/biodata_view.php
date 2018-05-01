<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- Begin page content -->
	<main role="main">
		<section class="jumbotron text-center">
			<div class="container">
				<h1 class="jumbotron-heading"><?php echo $page_title ?></h1>

				<p>
					<?php echo anchor('biodata/create', 'Input Biodata', array('class' => 'btn btn-primary')); ?>
				</p>
			</div>
		</section>

		<?php if( !empty($biodata_builder_object) ) : ?>
		<div class="album py-5 bg-light">
			<div class="container">
				<div class="row">

					<?php
						foreach ($biodata_builder_object as $key) :
					?>

					<div class="col-md-4">
						<div class="card mb-4 box-shadow border-0">
							
							<div class="card-body">
								<h5><?php echo character_limiter($key->nama, 50) ?></h5>
								<small class="text-success text-uppercase"><?php echo $key->nim ?></small>
								<p class="card-text"><?php echo word_limiter($key->alamat, 20) ?></p>

								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<!-- Untuk link detail -->
										<a href="<?php //echo base_url(). 'biodata/read/' . //$key->post_slug ?>" class="btn btn-outline-secondary">Baca</a>
										<a href="<?php //echo base_url(). 'biodata/edit/' . //$key->id ?>" class="btn btn-outline-secondary">Edit</a>
									</div>
								</div>
							</div>

						</div>
					</div>
					<?php endforeach; ?>

				</div>
			</div>
		</div>
		<?php else : ?>
      <center>
        <p>Belum ada data gan..</p>
      </center>
		<?php endif; ?>

	</main>
