<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h3 class="m-0 font-weight-bold text-primary">Profil Lembaga</h3>
				</div>
				<div class="card-body">
					<form action="<?= base_url('profil/create_profil');?>" method="post">
						<div class="form-group"><label for="">id</label><input type="text" name="" id=""
								class="form-control"></div>
						<div class="form-group"><label for="">Nama Lembaga</label><input type="text" name="nama_lembaga"
								id="nama_lembaga" class="form-control"></div>
						<div class="form-group"><label for="">Jenis Lembaga</label><input type="text"
								name="jenis_lembaga" id="jenis_lembaga" class="form-control"></div>
						<div class="form-group"><label for="">NPSN</label><input type="text" name="npsn" id="npsn"
								class="form-control"></div>
						<div class="form-group"><label for="">Alamat</label><input type="text" name="alamat" id="alamat"
								class="form-control"></div>
						<div class="form-group"><label for="">Kelurahan</label><input type="text" name="kelurahan"
								id="kelurahan" class="form-control"></div>
						<div class="form-group"><label for="">Kecamatan</label><input type="text" name="kecamatan"
								id="kecamatan" class="form-control"></div>
						<div class="form-group"><label for="">Kota/Kab</label><input type="text" name="kota_kab"
								id="kota_kab" class="form-control"></div>
						<div class="form-group"><label for="">Provinsi</label><input type="text" name="provinsi"
								id="provinsi" class="form-control"></div>
						<div class="form-group"><label for="">Kode Pos</label><input type="text" name="kode_pos"
								id="kode_pos" class="form-control"></div>
						<div class="form-group"><label for="">Telp</label><input type="text" name="telp" id="telp"
								class="form-control"></div>
						<div class="form-group"><label for="">Email</label><input type="text" name="email" id="email"
								class="form-control"></div>
						<div class="form-group"><label for="">Website</label><input type="text" name="websie" id=""
								class="form-control"></div>
						<div class="form-group"><label for="">Logo</label><input type="text" name="logo" id=""
								class="form-control"></div>
						<button type="submit" class='btn btn-primary'>Simpan</button>
						<a class='btn btn-secondary' href="<?= base_url('dashboard'); ?>">Batal</a>
					</form>
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
