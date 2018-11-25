<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/materialize.min.css') ?>"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Sistem Peminjaman</title>
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 200px">
			<div class="col s7 m7 l7">
				<h3>Sistem Peminjaman</h3>
				<hr style="width: 100px;border-color: #42a5f5" align="left">
				<p class="grey-text">Silahkan login untuk menggunakan website ini. Sebagai member, Anda bisa melakukan peminjaman barang yang nantinya akan diapprove oleh admin</p>
			</div>
			<div class="col s5 m5 l5" >
				<ul class="tabs">
					<li class="tab col s3"><a href="#login">Admin</a></li>
					<li class="tab col s3"><a href="#register">Member</a></li>
				</ul>
				<div id="login" class="col s12">
					<h5 class="light">Sign In</h5>
					<?php if ($this->session->flashdata('message')) : ?>
						<p class="red-text"><?= $this->session->flashdata( 'message' ); ?></p>
					<?php endif ?>
					<form id="formLogin" action="<?php echo base_url('auth/login_adm'); ?>" method="POST">
						<div class="input-field">
							<input id="username" type="text" class="validate" name="username" autofocus required>
							<label for="username">Username</label>
						</div>
						<div class="input-field">
							<input id="password" type="password" class="validate" name="password" required>
							<label for="password">Password</label>
						</div>
						<button class="btn blue darken-3 waves-effect waves-light right" id="send" type="submit">Sign In</button>
					</form>
				</div>
				<div id="register" class="col s12">
					<h5 class="light">Sign In</h5>
					<form id="formLogin" action="<?php echo base_url('auth/login_member'); ?>" method="POST">
						<div class="input-field">
							<input id="username_member" type="text" class="validate" name="username_member" required>
							<label for="username_member">Username</label>
						</div>
						<div class="input-field">
							<input id="password_member" type="password" class="validate" name="password_member" required>
							<label for="password_member">Password</label>
						</div>
						<button class="btn blue darken-3 waves-effect waves-light right" id="send" type="submit">Register</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.tabs').tabs();
		});
	</script>
</body>
</html>