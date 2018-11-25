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
<?php if ($this->uri->segment(2) !== "log" ): ?>
	<script>
	var id_member, id_peminjaman;
	$(document).ready(function(){
		$('a#kembali').click(function(){
			var i = confirm('Kembalikan barang?');
			if(i == true) {
				id_member = $('a#kembali').attr('data-id-member');
				id_peminjaman = $('a#kembali').attr('data-id-peminjaman');
				id_barang = $('a#kembali').attr('data-id-barang');

				$.ajax({
					type: 'POST',
					data: {id_member: id_member, id_peminjaman: id_peminjaman, id_barang: id_barang},
					url: '<?= base_url('peminjaman/kembalikan') ?>',
					cache: false,
					success: function(e){
						M.toast({html: 'Barang berhasil dikembalikan.', displayLength: 2000});
						setTimeout(function() {
							location.reload();
							// $('table#tabel_barang').load('http://[::1]/logasitiba/peminjaman #tabel_peminjaman');
						}, 1000);
					},
					error: function(){
						M.toast({html: 'Gagal menghapus.',displayLength: 3000});
					}
				});
			}
		});
	});
</script>
<?php endif ?>

</html>