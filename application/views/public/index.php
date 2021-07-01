<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, inital-scale=1">
	<title>BBC</title>
	
	<link rel="stylesheet" href="<?php echo base_url('daftarulang/') ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('daftarulang/') ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url('daftarulang/') ?>assets/css/all.min.css">

	<script src="<?php echo base_url('daftarulang/') ?>assets/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url('daftarulang/') ?>assets/js/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url('daftarulang/') ?>assets/js/jquery.countup.js"></script>
	<script src="<?php echo base_url('daftarulang/') ?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url('daftarulang/') ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('daftarulang/') ?>assets/js/all.min.js"></script>
	<script src="<?php echo base_url('daftarulang/') ?>assets/js/masonry.pkgd.min.js"></script>
	<script src="https://unpkg.com/scrollreveal"></script>

</head>
<body style="overflow-x: hidden; max-width: 100% ! important;">
	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="https://smkbbc.sch.id/assets/img/profil%20sekolah/logo.png" width="200" class="img-fluid" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
				</ul>
				<div class="form-inline my-2 my-lg-0">
					<a href="<?php echo base_url('login') ?>" class="btn my-2 mx-2 my-sm-0 rounded-pill bg-dark border-primary px-4 text-light">
						Login
					</a>
				</div>
			</div>
		</div>
	</nav>
	<!-- endnavbar -->
	<!-- section -->
	<!-- <div id="sectionp-1-trigger" class="vh10"></div> -->
	<div id="sectionp-1" class="sectionp-1 min-vh-100 my-5 my-md-0">
		<div class="container">
			<div class="row min-vh-100 d-flex flex-column-reverse flex-md-row">
				<div class="col d-flex justify-content-center align-items-start flex-column left-scrl">
					<h2 class="font-weight-bold">
						Daftar Ulang SMK Budi Bakti Ciwidey
					</h2>
					<p>
						Dengan adanya e-daftar ulang, kini pembayaran dapat lebih mudah, bisa dilakukan dimana saja dan kapan saja
					</p>
					<a href="#tatacara" class="btn btn-primary rounded-pill shadow py-3 px-4 low-scrl">Lihat Tatacaranya sekarang</a>
				</div>
				<div class="col bottom-scrl">
					<img src="<?php echo base_url('daftarulang/') ?>assets/img/daftarulangillu.png" alt="" class="img-fluid p-5 mt-5">
				</div>
			</div>
		</div>
	</div>

	<div class="container" id="tatacara">
		<h2 class="font-weight-bold mb-5 text-center">Tatacara daftar ulang</h2>
		<div class="row">
			<div class="col-md-3 overflow-hidden">
				<div class="circle">
					<h1 class="mt-3">1</h1>
				</div>
			</div>
			<div class="col-md-9 my-5 top-scrl">
				<h3 class="font-weight-bold">Transfer Pembayaran Ke Rekening Bank SMK Budi Bakti Ciwidey</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 overflow-hidden">
				<div class="circle">
					<h1 class="mt-3">2</h1>
				</div>
			</div>
			<div class="col-md-9 my-5 top-scrl">
				<h3 class="font-weight-bold">Foto Bukti Transfer</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 overflow-hidden">
				<div class="circle">
					<h1 class="mt-3">3</h1>
				</div>
			</div>
			<div class="col-md-9 my-5 top-scrl">
				<h3 class="font-weight-bold">Login Aplikasi Daftar Ulang</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 overflow-hidden">
				<div class="circle">
					<h1 class="mt-3">4</h1>
				</div>
			</div>
			<div class="col-md-9 my-5 top-scrl">
				<h3 class="font-weight-bold">Isi Data</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 overflow-hidden">
				<div class="circle">
					<h1 class="mt-3">5</h1>
				</div>
			</div>
			<div class="col-md-9 my-5 top-scrl">
				<h3 class="font-weight-bold">Upload File Raport Dan Bukti Pembayaran</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 overflow-hidden">
				<div class="circle">
					<h1 class="mt-3">6</h1>
				</div>
			</div>
			<div class="col-md-9 my-5 top-scrl">
				<h3 class="font-weight-bold">Tunggu Verifikasi Bukti Pembayaran</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 overflow-hidden">
				<div class="circle">
					<h1 class="mt-3">7</h1>
				</div>
			</div>
			<div class="col-md-9 my-5 top-scrl">
				<h3 class="font-weight-bold">Cetak Hasil Verifikasi Untuk Melihat Kelas Baru Kalian</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 overflow-hidden">
				<div class="circle">
					<h1 class="mt-3">8</h1>
				</div>
			</div>
			<div class="col-md-9 my-5 top-scrl">
				<h3 class="font-weight-bold">Ayo Login Disini</h3>
				<a class="btn btn-primary rounded-pill shadow" href="<?php echo base_url('login') ?>">Disini</a> 
			</div>
		</div>
	</div>
	<!-- endsection -->
	<!-- footer -->
	<div id="footer">
		<div class="bg-black">
			<div class="container">
				<div class="row">
					<div class="col text-light">
						<h3 class="my-4">SMK BUDI BAKTI CIWIDEY</h3>
						<p>
							Jl. Babakan tiga no.82
						</p>
					</div>
					<div class="col text-center">
						<iframe class="p-2 mt-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.2413429348067!2d107.46368231405324!3d-7.098001671559312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68f2b2c67ba193%3A0xab60fd034618b65a!2sSMK%20Budi%20Bakti%20Ciwidey!5e0!3m2!1sid!2sid!4v1586599647821!5m2!1sid!2sid" height="200" frameborder="0" style="border:0;" allowfullscreen="0" aria-hidden="true" tabindex="0" style="width: 100% !important ; overflow: hidden;"></iframe>
					</div>
				</div>
			</div>
			<div class="bg-dark">
				<div class="container py-3">
					<div class="row text-light">
						<div class="col">
							<small class="text-muted">Copyright © 2020 | SMK Budi Bakti Ciwidey</small>
						</div>
						<div class="col text-right">
							<a href="" class="text-light">
								<i class="fab fa-facebook-square"></i>
							</a>
							<a href="" class="text-light">
								<i class="fab fa-whatsapp"></i>
							</a>
						</a>
						<a href="" class="text-light">
							<i class="fab fa-instagram"></i>
						</a>
						<a href="" class="text-light">
							<i class="fab fa-youtube"></i>
							<a href="" class="text-light">
								<i class="fab fa-github"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- endfooter -->
	<script>

		window.sr = ScrollReveal({ reset: false });
		// sr.reveal('.top', { duration: 900 });
		sr.reveal('.top-scrl', {
			interval	: 200,
			desktop		: true,
			origin		: 'bottom',
			distance	: '200px',
			delay		: 400,
			opacity		: .0,
			duration	: 1500
		});

		sr.reveal('.low-scrl', {
			interval	: 200,
			desktop		: true,
			origin		: 'bottom',
			distance	: '200px',
			delay		: 1000,
			opacity		: .0,
			duration	: 1500
		});

		sr.reveal('.left-scrl', {
			interval	: 200,
			desktop		: true,
			origin		: 'left',
			distance	: '200px',
			delay		: 400,
			opacity		: .0,
			duration	: 1500
		});

		sr.reveal('.right-scrl', {
			interval	: 200,
			desktop		: true,
			origin		: 'right',
			distance	: '200px',
			delay		: 400,
			opacity		: .0,
			duration	: 1500
		});
		
		sr.reveal('.bottom-scrl', {
			interval	: 200,
			desktop		: true,
			origin		: 'top',
			animation 	: 'ease-out',
			distance	: '200px',
			delay		: 700,
			opacity		: .0,
			duration	: 1500
		});




	</script>
</body>
</html>
