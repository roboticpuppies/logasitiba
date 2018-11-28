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
<script src="<?php echo base_url('assets/js/peminjaman.js') ?>"></script>
<?php if (empty($this->uri->segment(2))): ?>
	<script>
		$(document).ready(function(){
			$('a#kembali').click(function(){
				var i = confirm('Kembalikan barang?');
				if(i == true) {
					var id_member = $(this).attr('data-id-member');
					var id_peminjaman = $(this).attr('data-id-peminjaman');
					var id_barang = $(this).attr('data-id-barang');

					$.ajax({
						type: 'POST',
						data: {id_member: id_member, id_peminjaman: id_peminjaman, id_barang: id_barang},
						url: '<?= base_url('peminjaman/kembalikan') ?>',
						cache: false,
						success: function(e){
							M.toast({html: 'Barang berhasil dikembalikan.', displayLength: 2000});
							setTimeout(function() {
								location.reload();
							}, 1000);
						},
						error: function(){
							M.toast({html: 'Gagal menghapus.',displayLength: 2000});
						}
					});
				}
			});
		});
	</script>
<?php endif ?>
<?php if ($this->uri->segment(2) == "waiting_approval"): ?>
	<script>
		var id_member, id_peminjaman;
		$(document).ready(function(){
			$('a#approve').click(function(){
				if ($(this).attr('data-act') == "tolak") {
					var i = confirm('Tolak peminjaman?');
					if(i == true) {
						var id_member = $(this).attr('data-id-member');
						var id_peminjaman = $(this).attr('data-id-peminjaman');
						var id_barang = $(this).attr('data-id-barang');
						id_peminjaman = $(this).attr('data-id-peminjaman');
						$.ajax({
							type: 'POST',
							data: {id_member: id_member, id_peminjaman: id_peminjaman, id_barang: id_barang},
							url: '<?= base_url('peminjaman/tolak') ?>',
							cache: false,
							success: function(e){
								M.toast({html: 'Peminjaman berhasil ditolak.', displayLength: 2000});
								setTimeout(function() {
									// location.reload();
								}, 1000);
							},
							error: function(){
								M.toast({html: 'Gagal ditolak.',displayLength: 2000});
							}
						});
					}
				}
				else {
					var i = confirm('Approve peminjaman?');
					if(i == true) {
						id_peminjaman = $(this).attr('data-id-peminjaman');
						$.ajax({
							type: 'POST',
							data: {id_peminjaman: id_peminjaman},
							url: '<?= base_url('peminjaman/approve') ?>',
							cache: false,
							success: function(e){
								M.toast({html: 'Peminjaman berhasil disetujui.', displayLength: 2000});
								setTimeout(function() {
									location.reload();
								}, 1000);
							},
							error: function(){
								M.toast({html: 'Gagal approve.',displayLength: 2000});
							}
						});
					}
				}
			});
		});
	</script>
<?php endif; ?>
</html>