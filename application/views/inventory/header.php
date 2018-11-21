<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/materialize.min.css') ?>"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?= $page_title ?></title>
</head>
<body>
	<header>
		<nav>
			<div class="nav-wrapper blue darken-2">
				<a href="#" class="brand-logo center">Sistem Peminjaman</a>
				<ul class="left">
					<li><a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a></li>
				</ul>
			</div>
		</nav>
		<ul id="slide-out" class="sidenav sidenav-fixed" style="padding-top: 50px">
			<li><a class="subheader"><i class="material-icons">dashboard</i>Dashboard</a></li>
			<li><a class="subheader">Navigation</a></li>
			<li><a href="<?= base_url('admin/') ?>"><i class="material-icons">home</i>Home</a></li>
			<li><a href="<?= base_url('admin/users/') ?>"><i class="material-icons">people</i>Manajemen Laboran</a></li>
			<li><a href="<?= base_url('inventory/') ?>"><i class="material-icons">list</i>Manajemen Barang</a></li>
			<li><a class="subheader">Account</a></li>
			<li><a href="#!"><i class="material-icons">settings</i>Settings</a></li>
			<li><a href="<?= base_url('auth/logout') ?>"><i class="material-icons">keyboard_backspace</i>Sign Out</a></li>
		</ul>
	</header>