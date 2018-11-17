<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<form action="<?= base_url('auth/do_login'); ?>" method="POST">
	<table>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit"></td>
		</tr>
	</table>
</form>
</body>
</html>