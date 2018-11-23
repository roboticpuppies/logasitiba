<main>
	<div class="container">
		<h5 class="light">Manajemen Barang</h5>
		<a href="add" class="waves-effect waves-teal btn-flat blue-text right"><i class="material-icons left blue-text">add_box</i>Tambah Laboran</a>
		<p class="grey-text">List semua barang. Barang bisa ditambah, diedit, dan dihapus dari halaman ini.</p>


		<table class="striped" id="tabel_barang">
			<thead>
				<tr>
					<th>ID</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Tipe Barang</th>
					<th>Sisa Barang</th>
					<th>Jumlah Awal</th>
					<th>Kondisi Barang</th>
					<th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($inventory as $barang) : ?>
					<tr>
						<td><?= $barang['id'] ?></td>
						<td><?= $barang['kode_barang'] ?></td>
						<td><?= $barang['nama_barang'] ?></td>
						<td><?= $barang['tipe_barang'] ?></td>
						<td><?= ($barang['quantity'] < 1) ?  "Habis" :  $barang['quantity'] ; ?></td>
						<td><?= $barang['initial_quantity'] ?></td>
						<td><?= $barang['kondisi_barang'] ?></td>
						<td><?= $barang['keterangan_barang'] ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</main>