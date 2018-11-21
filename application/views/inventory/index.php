<main>
	<div class="container">
		<table class="striped" id="tabel_barang">
			<thead>
				<tr>
					<th>ID</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Tipe Barang</th>
					<th>Jumlah Barang</th>
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
						<td><?= $barang['jumlah_barang'] ?></td>
						<td><?= $barang['kondisi_barang'] ?></td>
						<td><?= $barang['keterangan_barang'] ?></td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</main>