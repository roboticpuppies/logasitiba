<main>
	<div class="container">
		<div class="row">
			<form action="<?= base_url('inventory/submitbrg'); ?>" method="POST">
				<div class="input-field col s6">
					<input id="kode-brg" type="text" class="validate" name="kode-brg">
					<label for="kode-brg">Kode Barang</label>
				</div>
				<div class="input-field col s6">
					<input id="nama-brg" type="text" class="validate" name="nama-brg">
					<label for="nama-brg">Nama Barang</label>
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
				<input id="jml-brg" type="number" class="validate" name="jml-brg">
				<label for="jml-brg">Jumlah Barang</label>
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
	<button class="btn waves-effect waves-light btn-large blue darken-2">Submit</button>
</form>
</div>
</main>