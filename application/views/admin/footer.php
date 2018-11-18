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
</html>