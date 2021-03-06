<main>
	<div class="container">
		<h5 class="light">Peminjaman Ditolak</h5>
		<p class="grey-text">Daftar peminjaman barang yang tidak disetujui.</p>
		<br>
		<label>
			<input name="group1" type="radio" class="with-gap" value="1" checked />
			<span>Nama Peminjam</span>
		</label>
		<label>
			<input name="group1" type="radio" class="with-gap" value="2" />
			<span>Nama Barang</span>
		</label>
		<div class="input-field col s6">
			<input onkeyup="filter()" placeholder="Cari berdasarkan filter ..." id="filter" type="text" class="validate">
		</div>
		<table id="tabel_peminjaman">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Peminjam</th>
					<th>Nama Barang</th>
					<th>Jumlah Barang</th>
					<th>Tanggal Pinjam</th>
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
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
</main>