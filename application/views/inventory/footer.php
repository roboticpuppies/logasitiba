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
<script src="<?php echo base_url('assets/js/admin.js') ?>"></script>
<script>
	$(document).ready(function(){
		$('select#option').change(function(){
			var val = $(this).val();
			var id = $(this).attr('data-id');
			if(val == 'hapus'){
				var i = confirm('Hapus data ini?');
				if(i == true) {
					$.ajax({
						type: 'POST',
						url: '<?= base_url('inventory/deletebrg') ?>' + '/' + id,
						cache: false,
						success: function(e){
							M.toast({html: 'Berhasil dihapus.', displayLength: 5000});
							location.reload();
						},
						error: function(){
							M.toast({html: 'Gagal menghapus.',displayLength: 3000});
						}
					});
				}
			}
			else if(val == 'preview'){
				$('#preview').modal({onOpenEnd: $('select#option').val('')});
				$('#preview').modal('open');
				$.ajax({
					type: 'POST',
					url: '<?= base_url('inventory/preview') . "?id=" ?>' + id,
					dataType: "json",
					success: function(e){
						$('#kode-brg').val(e[0].kode_barang);
						$('#nama-brg').val(e[0].nama_barang);
						$('#tipe-brg').val(e[0].tipe_barang);
						$('#jml-brg').val(e[0].jumlah_barang);
						console.log(e);
					},
					error: function(e){
						$('#judul').text('AJAX Call Failed');
						console.log(e);
					}
				});
			}
		});
	});
</script>
</html>