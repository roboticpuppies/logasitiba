<main>
	<div class="container">
		<h5 class="light">Daftar Peminjaman</h5>

		<div class="input-field col s6">
			<input onkeyup="filter()" placeholder="Filter berdasarkan nama peminjam..." id="filter" type="text" class="validate">
		</div>
		<table id="tabel_peminjaman">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Peminjam</th>
					<th>Nama Barang</th>
					<th>Jumlah Barang</th>
					<th>Tanggal Pinjam</th>
					<th>&nbsp;</th>
				</tr>
			</thead>

			<tbody>
				<?php $no = 1; foreach($inventory as $barang) : ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $barang['nama'] ?></td>
						<td><?= $barang['nama_barang'] ?></td>
						<td><?= $barang['quantity'] ?></td>
						<td><?= $barang['tgl_pinjam'] ?></td>
						<td><a href="<?= 'peminjaman/kembalikan/' . $barang['id'] ?>" class="waves-effect btn blue darken-2">Kembalikan</a></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<pre>
			<?php var_dump($inventory) ?>
		</pre>
	</div>
</main>