<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Begin page content -->
<main role="main">
	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="jumbotron-heading"><?php echo $page_title ?></h1>
			<?php echo anchor('level/create', 'Tambah Level', array('class' => 'btn btn-primary')); ?>
		</div>
	</section>
	<?php if( !empty($all_level) ) : ?>
		<div class="album py-5 bg-light">
			<div class="container">
				<div class="row">
					<?php
					foreach ($all_level as $key) :
						?>
						<div class="col-md-4">
							<div class="media mb-4 box-shadow border-0 bg-white">
									<div class="card-body">
										<h5><?php echo character_limiter($key->nama_level, 40) ?></h5>

										<div class="d-flex justify-content-between align-items-center">
											<div class="btn-group">
												<!-- Untuk link detail -->
												<a href="<?php echo base_url(). 'level/edit/' . $key->level_id ?>" class="btn btn-outline-warning">Edit</a>
												<a href="<?php echo site_url( 'level/delete/'.$key->level_id) ?>" class="btn btn-outline-danger">Hapus</a>
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
				<p>Can't Display Article</p>
			</center>
		<?php endif;
		if (isset($links)) {
			echo $links;
		}
		?>
	</main>
