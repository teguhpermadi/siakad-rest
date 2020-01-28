<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="m-0 font-weight-bold text-primary">Edit Data Guru</h6>
		</div>
		<div class="card-body">
			<?php echo form_open('guru_mapel/edit/'.$guru_mapel['id'],array("class"=>"form-horizontal")); ?>

			<div class="form-group">
				<label for="id_guru" class="col-md-4 control-label"><span class="text-danger">*</span>Guru</label>
				<div class="col-md-8">
					<select name="id_guru" class="form-control">
						<option value="">select guru</option>
						<?php 
            foreach($all_guru as $guru)
            {
                $selected = ($guru['id'] == $guru_mapel['id_guru']) ? ' selected="selected"' : "";

                echo '<option value="'.$guru['id'].'" '.$selected.'>'.$guru['nama_lengkap'].'</option>';
            } 
            ?>
					</select>
					<span class="text-danger"><?php echo form_error('id_guru');?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="id_mapel" class="col-md-4 control-label"><span class="text-danger">*</span>Mapel</label>
				<div class="col-md-8">
					<select name="id_mapel" class="form-control">
						<option value="">select mapel</option>
						<?php 
            foreach($all_mapel as $mapel)
            {
                $selected = ($mapel['id'] == $guru_mapel['id_mapel']) ? ' selected="selected"' : "";

                echo '<option value="'.$mapel['id'].'" '.$selected.'>'.$mapel['nama'].'</option>';
            } 
            ?>
					</select>
					<span class="text-danger"><?php echo form_error('id_mapel');?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="id_tahun" class="col-md-4 control-label"><span class="text-danger">*</span>Tahun
					Pelajaran</label>
				<div class="col-md-8">
					<select name="id_tahun" class="form-control">
						<option value="">select tahun_pelajaran</option>
						<?php 
            foreach($all_tahun_pelajaran as $tahun_pelajaran)
            {
                $selected = ($tahun_pelajaran['id'] == $guru_mapel['id_tahun']) ? ' selected="selected"' : "";

                echo '<option value="'.$tahun_pelajaran['id'].'" '.$selected.'>'.$tahun_pelajaran['tahun'].'</option>';
            } 
            ?>
					</select>
					<span class="text-danger"><?php echo form_error('id_tahun');?></span>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
					<button type="submit" class="btn btn-success">Save</button>
				</div>
			</div>

			<?php echo form_close(); ?>
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
