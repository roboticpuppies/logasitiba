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
			<li><a href="<?= base_url('member/') ?>"><i class="material-icons">home</i>Home</a></li>
			<li><a href="<?= base_url('member/waiting') ?>"><i class="material-icons">thumb_up</i>Menunggu Approval</a></li>
			<li><a href="<?= base_url('member/listbrg') ?>"><i class="material-icons">bookmark</i>Barang yang dipinjam</a>
				<li><a href="<?= base_url('member/rejected') ?>"><i class="material-icons">close</i>Peminjaman di tolak</a></li>
			<li><a class="subheader">Account</a></li>
			<li><a href="<?= base_url('auth/logout') ?>"><i class="material-icons">keyboard_backspace</i>Sign Out</a></li>
		</ul>
	</header>