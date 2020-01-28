<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/multi-select.css'); ?>">

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h3 class="m-0 font-weight-bold text-primary">Tambah Rombel</h3>
				</div>
				<div class="card-body">
					<select id='callbacks' multiple='multiple'>
						<option value='elem_1'>elem 1</option>
						<option value='elem_2'>elem 2</option>
						<option value='elem_3'>elem 3</option>
						<option value='elem_4'>elem 4</option>
						...
						<option value='elem_100'>elem 100</option>
					</select>
				</div>
			</div>
		</div>
	</div>

	<!-- content row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Your Website 2019</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.multi-select.js'); ?>"></script>


<script type="text/javascript">
  // run callbacks
      $('#callbacks').multiSelect({
      afterSelect: function(values){
		// alert("Select value: "+values);
		
      },
      afterDeselect: function(values){
		// alert("Deselect value: "+values);
		
      }
    });
  </script>