<main>
	<div class="container">
		<h5 class="light">Manajemen Laboran</h5>
		<a href="#add_user" class="waves-effect waves-teal btn-flat blue-text right modal-trigger" data-target="add_user"><i class="material-icons left blue-text">add_box</i>Tambah Laboran</a>
		<p class="grey-text">List semua laboran. User laboran bisa dihapus maupun diedit. Namun user admin tidak bisa dihapus.</p>

		<div id="add_user" class="modal">
			<div class="modal-content">
				<h5 class="light">Tambah Laboran</h5>
				<form action="<?= base_url('admin/adduser'); ?>" method="POST">
					<div class="input-field col s6">
						<input id="nama" type="text" class="validate" name="nama">
						<label for="nama">Nama</label>
					</div>
					<div class="input-field col s6">
						<input id="username" type="text" class="validate" name="username">
						<label for="username">Username</label>
					</div>
					<div class="input-field col s6">
						<input id="email" type="text" class="validate" name="email">
						<label for="email">Email</label>
					</div>
					<div class="input-field col s6">
						<input id="password" type="password" class="validate" name="password">
						<label for="password">Password</label>
					</div>
					<button class="btn waves-effect waves-light btn-large blue darken-2">Daftar</button>
				</form>
			</div>
		</div>

		<div class="input-field col s6">
			<input onkeyup="filter()" placeholder="Filter berdasarkan username..." id="filter" type="text" class="validate">
		</div>

		<table class="striped" id="tabel_user">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Email</th>
					<th>Tanggal Registrasi</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($users as $user) : ?>
					<tr>
						<td><?= $user['ID'] ?></td>
						<td><?= $user['user_rname'] ?></td>
						<td><?= $user['user_login'] ?></td>
						<td><?= $user['user_email'] ?></td>
						<td><?= $user['user_registered'] ?></td>
						<td>
							<div class="input-field col">
								<select id="option" data-id="<?= $user['ID'] ?>">
									<?php if($user['user_role'] == 1) : ?>
										<option value="" disabled selected>Action</option>
										<option value="1" disabled>Hapus</option>
										<option value="preview">Edit</option>
										<?php else : ?>
											<option value="" disabled selected>Action</option>
											<option value="hapus">Hapus</option>
											<option value="preview">Edit</option>
										<?php endif; ?>
									</select>
								</div>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>

		<div id="preview" class="modal">
			<form action="<?= base_url('admin/edituser'); ?>" method="POST">
				<div class="modal-content">
					<h4 id="judul"></h4>
					<div class="row">
						<div class="input-field col s6">
							<input id="user_id2" type="text" class="validate" placeholder="User ID" readonly name="user_id2">
							<label for="user_id2">User ID</label>
						</div>
						<div class="input-field col s6">
							<input id="nama2" type="text" class="validate" placeholder="Nama" name="nama2">
							<label for="nama2">Nama</label>
						</div>
						<div class="input-field col s6">
							<input id="username2" type="text" class="validate" placeholder="Username" name="username2">
							<label for="username2">Username</label>
						</div>
						<div class="input-field col s6">
							<input id="email2" type="text" class="validate" placeholder="Email" name="email2">
							<label for="email2">Email</label>
						</div>
						<div class="input-field col s6">
							<input id="password2" type="password" class="validate" placeholder="Password" name="password2">
							<label for="password2">Password</label>
						</div>
						<button class="btn waves-effect waves-light btn-large blue darken-2">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</main>