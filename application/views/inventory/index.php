<main>
	<div class="container">
		<h5 class="light">Manajemen Barang</h5>
		<a href="add" class="waves-effect waves-teal btn-flat blue-text right"><i class="material-icons left blue-text">add_box</i>Tambah Barang</a>
		<p class="grey-text">List semua barang. Barang bisa ditambah, diedit, dan dihapus dari halaman ini.</p>
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

		<table class="striped" id="tabel_peminjaman">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Tipe Barang</th>
					<th>Sisa Barang</th>
					<th>Jumlah Awal</th>
					<th>Kondisi Barang</th>
					<th>Action</th>
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
					<td>
						<div style="width: 100px">
							<select id="option" data-id="<?= $barang['id'] ?>">
								<option value="" disabled selected>Pilih</option>
								<option value="hapus">Hapus</option>
								<option value="preview">Edit</option>
							</select>
						</div>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
</main>