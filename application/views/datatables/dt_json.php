<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<main role="main">
	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="jumbotron-heading">Basic DataTables</h1>
			<?php echo anchor('blog/create', 'Tulis Artikel', array('class' => 'btn btn-primary')); ?>
			<?php echo anchor('blog/', 'Lihat versi Card', array('class' => 'btn btn-success')); ?>
		</div>
	</section>
	<div class="album py-5 bg-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-block">
							<div class="container">
								<br>
								<h4 class="text-center">Versi JSON</h4>
								<?php echo anchor('datatables/', 'Lihat Versi Basic', array('class' => 'btn btn-secondary float-center')); ?>
							</div>
							<br>
							<table id="dt-ajax" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>ID</th>
										<th>Tanggal</th>
										<th>Judul</th>
										<th>Kategori</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
							</table>
							<br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
