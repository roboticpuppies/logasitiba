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
<?php if($this->uri->segment(2) == "users"): ?>
	<script>
		$(document).ready(function(){
			$('select#option').change(function(){
				var section = "users";
				var val = $(this).val();
				var id_user = $(this).attr('data-id');
				if(val == 'hapus'){
					var i = confirm('Hapus data ini?');
					if(i == true) {
						$.ajax({
							type: 'POST',
							data: {section: section, id: id_user},
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
						data: {id: id_user, section: section},
						url: '<?= base_url('admin/preview')?>',
						dataType: "json",
						success: function(e){
							$('#user_id2').val(e[0].id);
							$('#username2').val(e[0].user_login);
							$('#nama2').val(e[0].user_rname);
							$('#email2').val(e[0].user_email);
						},
						error: function(e){
							$('#judul').text('AJAX Call Failed');
						}
					});
				}
			});
		});
	</script>
<?php endif; ?>
<?php if($this->uri->segment(2) == "member"): ?>
	<script>
		$(document).ready(function(){
			$('select#option').change(function(){
				var section = "member";
				var val = $(this).val();
				var id_user = $(this).attr('data-id');
				if(val == 'hapus'){
					var i = confirm('Hapus data ini?');
					if(i == true) {
						$.ajax({
							type: 'POST',
							data: {section: section, id: id_user},
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
						data: {id: id_user, section: section},
						url: '<?= base_url('admin/preview')?>',
						dataType: "json",
						success: function(e){
							$('#user_id2').val(e[0].id);
							$('#username2').val(e[0].username);
							$('#nama2').val(e[0].nama);
							$('#email2').val(e[0].email);
						},
						error: function(e){
							$('#judul').text('AJAX Call Failed');
						}
					});
				}
			});
		});
	</script>
<?php endif; ?>
</html>