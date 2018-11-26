<main>
	<div class="container">
		<h5 class="light">Manajemen Barang</h5>
		<a href="add" class="waves-effect waves-teal btn-flat blue-text right"><i class="material-icons left blue-text">add_box</i>Tambah Barang</a>
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
					<th>Action</th>
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
	<div id="preview" class="modal">
		<form action="<?= base_url('inventory/editbrg'); ?>" method="POST">
			<div class="modal-content">
				<h4 id="judul"></h4>
				<div class="row">
					<div class="input-field col s6">
						<input id="kode-brg" type="text" class="validate" name="kode-brg" placeholder="Kode Barang">
					</div>
					<div class="input-field col s6">
						<input id="nama-brg" type="text" class="validate" name="nama-brg" placeholder="Nama Barang">
					</div>
					<div class="input-field col s6">
						<select name="tipe-brg">
							<option value="" disabled selected>Pilih tipe</option>
							<?php
							foreach($this->db->get('tipe_barang')->result() as $tipe) : ?>
								<option value="<?= $tipe->id ?>"><?= $tipe->tipe_barang ?></option>
						<?php endforeach ?>
					</select>
					<label>Tipe Barang</label>
				</div>
				<div class="input-field col s6">
					<input id="jml-brg" type="number" class="validate" name="jml-brg" placeholder="Jumlah Barang">
				</div>
				<div class="input-field col s6">
					<select name="kondisi-brg">
						<option value="" disabled selected>Pilih kondisi</option>
						<?php
						foreach($this->db->get('kondisi_barang')->result() as $tipe) : ?>
							<option value="<?= $tipe->id ?>"><?= $tipe->kondisi_barang ?></option>
					<?php endforeach ?>
				</select>
				<label>Kondisi Barang</label>
			</div>
		</div>
	</div>
</form>
</div>
</main>