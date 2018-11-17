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
	<header>
		<nav>
			<div class="nav-wrapper grey darken-4">
				<a href="#" class="brand-logo center">Sistem Peminjaman</a>
				<ul class="left">
					<li><a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a></li>
				</ul>
			</div>
		</nav>
		<ul id="slide-out" class="sidenav grey darken-4 sidenav-fixed" style="padding-top: 50px">
			<li><a class="subheader grey-text"><i class="material-icons grey-text">dashboard</i>Dashboard</a></li>
			<li><a class="subheader grey-text">Navigation</a></li>
			<li><a href="#!" class="grey-text"><i class="material-icons grey-text">home</i>Home</a></li>
			<li><a href="#!" class="grey-text"><i class="material-icons grey-text">people</i>User Management</a></li>
			<li><a href="#!" class="grey-text"><i class="material-icons grey-text">list</i>Inventory Management</a></li>
			<li><a class="subheader grey-text">Account</a></li>
			<li><a href="#!" class="grey-text"><i class="material-icons grey-text">settings</i>Settings</a></li>
			<li><a href="<?= base_url('auth/logout') ?>" class="grey-text"><i class="material-icons grey-text">keyboard_backspace</i>Sign Out</a></li>
		</ul>
	</header>

<main>
	<div class="container">
		<h5 class="grey-text">Overview</h5>
		<div class="row">
			<div class="col s12 m4 l4">
				<div class="card">
					<div class="card-content">
						<span class="card-title">Jumlah barang</span>
						<h4 class="light">5</h4>
					</div>
				</div>
			</div>
			<div class="col s12 m4 l4">
				<div class="card">
					<div class="card-content">
						<span class="card-title">Jumlah member</span>
						<h4 class="light">10</h4>
					</div>
				</div>
			</div>
			<div class="col s12 m4 l4">
				<div class="card">
					<div class="card-content">
						<span class="card-title">Jumlah peminjam</span>
						<h4 class="light">3</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
	$(document).ready(function(){
		$('.sidenav').sidenav();
	});
</script>
</html>