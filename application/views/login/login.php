<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/materialize.min.css') ?>"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Sistem Peminjaman</title>
</head>
<body class="grey darken-4">
	<div class="container">
		<div class="row" style="margin-top: 200px">
			<div class="col s7 m7 l7 white-text">
				<h3>Sistem Peminjaman</h3>
				<hr style="width: 100px;border-color: #42a5f5" align="left">
				<p class="grey-text">Silahkan login untuk menggunakan website ini. Sebagai member, Anda bisa melakukan peminjaman barang yang nantinya akan diapprove oleh admin</p>
			</div>
			<div class="col s5 m5 l5">
				<div class="card">
					<div class="card-content">
						<span class="card-title">Sign In</span>
						<form action="<?= base_url('auth/do_login'); ?>" method="POST">
							<div class="input-field">
								<input id="username" type="text" class="validate" name="username" autofocus required>
								<label for="username">Username</label>
							</div>

							<div class="input-field">
								<input id="password" type="password" class="validate" name="password" required>
								<label for="password">Password</label>
							</div>

							<button class="btn waves-effect waves-light btn-large blue darken-2
							">Sign In</button>
						</form>
					</div>
				</div>
				<?php if ($this->session->flashdata('message')) : ?>
					<div class="card">
						<div class="card-content red white-text"><i class="material-icons left">warning</i><?= $this->session->flashdata( 'message' ); ?></div>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>