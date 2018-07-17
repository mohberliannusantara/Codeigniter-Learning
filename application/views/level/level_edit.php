<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Begin page content -->
<main role="main" class="container">
	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="jumbotron-heading">Edit Level</h1>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<?php $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>'); ?>
					<?php echo validation_errors(); ?>
					<?php echo form_open(current_url(), array('class' => 'needs-validation', 'novalidate' => '')); ?>

					<div class="form-group">
						<label for="title">Nama Level</label>
						<input type="text" class="form-control" name="nama_level" value="<?php echo set_value('nama_level', $level->nama_level) ?>" required>
						<div class="invalid-feedback">Isi judul dulu gan</div>
					</div>
					<div class="form-group">
					<button id="submitBtn" type="submit" class="btn btn-primary">Edit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
</main>
