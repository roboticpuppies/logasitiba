<main>
	<div class="container">
		<?php
		$param = $this->uri->segment(3);
		$query = $this->db->get_where('barang', array('id' => $param));
		foreach($query->result() as $item) : ?>
			<div class="row">
				<form action="<?= base_url('inventory/subeditbrg'); ?>" method="POST">
					<div class="input-field col s6">
						<input name="id" value="<?= $param ?>" readonly hidden>
						<input id="kode-brg" type="text" class="validate" name="kode-brg" value="<?= $item->kode_barang ?>">
						<label for="kode-brg">Kode Barang</label>
					</div>
					<div class="input-field col s6">
						<input id="nama-brg" type="text" class="validate" name="nama-brg" value="<?= $item->nama_barang ?>">
						<label for="nama-brg">Nama Barang</label>
					</div>
					<div class="input-field col s6">
						<select name="tipe-brg">
							<option value="" disabled>Pilih tipe</option>
							<?php
							foreach($this->db->get('tipe_barang')->result() as $tipe) : ?>
								<option value="<?= $tipe->id ?>" <?php if($tipe->id == $item->tipe_barang):?> selected <?php endif ?>><?= $tipe->tipe_barang ?></option>
						<?php endforeach ?>
					</select>
					<label>Tipe Barang</label>
				</div>
				<div class="input-field col s6">
					<input id="jml-brg" type="number" class="validate" name="jml-brg" value="<?= $item->jumlah_barang ?>">
					<label for="jml-brg">Jumlah Barang</label>
				</div>
				<div class="input-field col s6">
					<select name="kondisi-brg">
						<option value="" disabled>Pilih kondisi</option>
						<?php
						foreach($this->db->get('kondisi_barang')->result() as $kondisi) : ?>
							<option value="<?= $kondisi->id ?>" <?php if($kondisi->id == $item->kondisi_barang):?> selected <?php endif ?>><?= $kondisi->kondisi_barang ?></option>
					<?php endforeach ?>
				</select>
				<label>Kondisi Barang</label>
			</div>
		</div>
		<button class="btn waves-effect waves-light btn-large blue darken-2">Submit</button>
	</form>
<?php endforeach ?>
</div>
</main>