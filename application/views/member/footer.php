</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="<?php echo base_url('assets/js/member.js') ?>"></script>
<script>
	$(document).ready(function(){
		$('.sidenav').sidenav();
		$('select').formSelect();
		$('.modal').modal();
	});
</script>
<script>
	$('a.modal-trigger').click(function(){
		var id = $(this).attr('data-id');
		var max = $(this).attr('data-max');
		$('#idpinjam').val(id);
		$('input#jml-brg').attr('max', max);
	});
</script>
<script>
	var id_member, id_peminjaman;
	$(document).ready(function(){
		$('form').submit(function(){
			var jumlah = $('input#jml-brg').val();
			var idpinjam = $('input#idpinjam').val();
			event.preventDefault();
			$.ajax({
				type: 'POST',
				data: {id: idpinjam, jml_brg: jumlah},
				url: '<?= base_url('member/pinjam') ?>',
				cache: false,
				success: function(e){
					M.toast({html: 'Barang berhasil dipinjam.', displayLength: 2000});
					setTimeout(function() {
						location.reload();
					}, 1000);
				},
				error: function(){
					M.toast({html: 'Gagal meminjam.',displayLength: 2000});
				}
			});
		});
	});
</script>
</html>