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
							setTimeout(function() {
								location.reload();
							}, 1000);
						},
						error: function(){
							M.toast({html: 'Gagal menghapus.',displayLength: 3000});
						}
					});
				}
			}
			else if(val == 'preview'){
				window.location = "<?= base_url('inventory/editbrg/') ?>" + id;
			}
		});
	});
</script>
</html>