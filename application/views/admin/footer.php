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
			var section = "<?= $this->uri->segment(2) ?>";
			var val = $(this).val();
			var id = $(this).attr('data-id');
			if(val == 'hapus'){
				var i = confirm('Hapus data ini?');
				if(i == true) {
					console.log(id);
					$.ajax({
						type: 'POST',
						data: {section: section, id: id},
						url: '<?= base_url('admin/deleteUser') ?>',
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
				$('#preview').modal({onOpenEnd: $('select#option').val('')});
				$('#preview').modal('open');
				$.ajax({
					type: 'POST',
					url: '<?= base_url('admin/preview') . "?id=" ?>' + id,
					dataType: "json",
					success: function(e){
						$('#user_id2').val(e[0].ID);
						$('#username2').val(e[0].user_login);
						$('#nama2').val(e[0].user_rname);
						$('#email2').val(e[0].user_email);
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