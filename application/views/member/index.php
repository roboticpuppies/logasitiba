<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/materialize.min.css') ?>"  media="screen,projection"/>
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
	</header>
	<main>
		<div class="container">
			<table class="striped" id="tabel_barang">
				<thead>
					<tr>
						<th>No.</th>
						<th>Kode Barang</th>
						<th>Nama Barang</th>
						<th>Tipe Barang</th>
						<th>Sisa Barang</th>
						<th>Jumlah Awal</th>
						<th>Kondisi Barang</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php $n = 1; foreach($inventory as $barang) : ?>
					<tr>
						<td><?= $n++ ?></td>
						<td><?= $barang['kode_barang'] ?></td>
						<td><?= $barang['nama_barang'] ?></td>
						<td><?= $barang['tipe_barang'] ?></td>
						<td><?= ($barang['quantity'] < 1) ?  "Habis" :  $barang['quantity'] ; ?></td>
						<td><?= $barang['initial_quantity'] ?></td>
						<td><?= $barang['kondisi_barang'] ?></td>
						<td><a href="#modal1" class="waves-effect btn blue darken-2 modal-trigger" data-id="<?= $barang['id'] ?>" data-max="<?= $barang['quantity'] ?>">Pinjam</a></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<div id="modal1" class="modal">
		<form method="post" action="javascript:alert( 'success!' );">
			<div class="modal-content">
				<h4>Jumlah</h4>
				<div class="input-field col s6">
					<input type="number" id="idpinjam" name="id" readonly hidden>
					<input id="jml-brg" type="number" class="validate" name="jml-brg" placeholder="Jumlah Barang" required max="10">
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn waves-effect waves-light blue darken-2">Submit</button>
			</div>
		</form>
	</div>
</main>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
	$(document).ready(function(){
		$('.sidenav').sidenav();
		$('select').formSelect();
		$('.modal').modal();
	});
</script>
<script>
	$('a.modal-trigger').click(function(){
		var id = $(this).attr('data-id');
		var max = $(this).attr('data-max');
		$('#idpinjam').val(id);
		$('input#jml-brg').attr('max', max);
	});
</script>
<script>
	var id_member, id_peminjaman;
	$(document).ready(function(){
		$('form').submit(function(){
			var jumlah = $('input#jml-brg').val();
			var idpinjam = $('input#idpinjam').val();
			event.preventDefault();
			$.ajax({
				type: 'POST',
				data: {id: idpinjam, jml_brg: jumlah},
				url: '<?= base_url('member/pinjam') ?>',
				cache: false,
				success: function(e){
					M.toast({html: 'Barang berhasil dipinjam.', displayLength: 2000});
					setTimeout(function() {
						location.reload();
					}, 1000);
				},
				error: function(){
					M.toast({html: 'Gagal menghapus.',displayLength: 2000});
				}
			});
		});
	});
</script>
</html>