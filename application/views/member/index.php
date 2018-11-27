<main>
	<div class="container">
		<h5 class="light">Daftar Barang</h5>
		<p class="grey-text">Berikut ini adalah daftar barang yang bisa dipinjam.</p>
		<br>
		<label>
			<input name="group1" type="radio" class="with-gap" value="1" checked />
			<span>Kode Barang</span>
		</label>
		<label>
			<input name="group1" type="radio" class="with-gap" value="2" />
			<span>Nama Barang</span>
		</label>
		<div class="input-field col s6">
			<input onkeyup="filter()" placeholder="Cari berdasarkan filter ..." id="filter" type="text" class="validate">
		</div>
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