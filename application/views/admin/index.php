<main>
	<div class="container">
		<h5 class="light">Overview</h5>
		<div class="row">
			<div class="row">
				<div class="col s12 m6 l4 show">
					<div class="card small">
						<a href="users">
							<div class="card-image blue darken-2 waves-effect waves-block waves-light" style="height:100%">
								<i class="material-icons white-text right" style="margin: 28px; font-size:70pt">people</i>
								<span class="card-title">Laboran</span>
							</div>
						</a>
						<div class="card-content">
							<p>List laboran</p>
							<h5 class="light-judul">Jumlah Data : <?= $this->db->count_all('users') ?></h5>
						</div>
					</div>
				</div>
				<div class="col s12 m6 l4 show">
					<div class="card small">
						<a href="member">
							<div class="card-image blue darken-2 waves-effect waves-block waves-light" style="height:100%">
								<i class="material-icons white-text right" style="margin: 28px; font-size:70pt">face</i>
								<span class="card-title">Member</span>
							</div>
						</a>
						<div class="card-content">
							<p>List member</p>
							<h5 class="light-judul">Jumlah Data : <?= $this->db->count_all('member') ?></h5>
						</div>
					</div>
				</div>
				<div class="col s12 m6 l4 show">
					<div class="card small">
						<a href="../inventory">
							<div class="card-image blue darken-2 waves-effect waves-block waves-light" style="height:100%">
								<i class="material-icons white-text right" style="margin: 28px; font-size:70pt">list</i>
								<span class="card-title">Barang</span>
							</div>
						</a>
						<div class="card-content">
							<p>List barang-barang</p>
							<h5 class="light-judul">Jumlah Data : <?= $this->db->count_all('barang') ?></h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>