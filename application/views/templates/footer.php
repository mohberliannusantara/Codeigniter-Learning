<footer class="footer">
	<div class="container">
		<small class="text-muted">Copyleft 2018</small>
	</div>
</footer>
<!-- Bootstrap core & jQuery JavaScript
================================================== -->
<script src="<?php echo base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>

<!-- Custom -->
<script src="<?php echo base_url() ?>assets/js/custom.js"></script>

<script>
jQuery(document).ready(function() {
	$('#dt-basic').DataTable();
} );

jQuery(document).ready(function(){
	$('#dt-ajax').DataTable({
		"ajax": "<?php echo base_url() ?>datatables/get_json",
		"columns": [
			{ "data": "post_id" },
			{ "data": "date_created" },
			{ "data": "post_title" },
			{ "data": "cat_name" },
			{ "data": "post_status" },
			// Kolom Action
			{
				"data" : null,
				"render": function (data) {
					return '<a href="<?php echo base_url('blog/edit/') ?>'+ data.post_id + '" class="btn btn-sm btn-outline-warning">Edit</a> <a href="<?php echo base_url('blog/delete/') ?>'+ data.post_id + '" class="btn btn-sm btn-outline-danger">Delete</a>'
				}
			},
		],
	});
});
</script>
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>assets/datatables/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/datatables/js/datatables.min.js"></script>
</body>
</html>
