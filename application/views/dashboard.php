<!-- Main content -->
<?php if ($this->session->userdata('user_type') == 'admin') { ?>
	<section class="content-header">
		<h1>
			Dashboard
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Total Siswa</span>
						<span class="info-box-number"><?= $this->dashboard_model->total_siswa() ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-yellow"><i class="fa fa-pie-chart"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Ekstrakurikuler</span>
						<span class="info-box-number"><?= $this->dashboard_model->total_ekstrakurikuler() ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-red"><i class="fa fa-file-o"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Total Pembina</span>
						<span class="info-box-number"><?= $this->dashboard_model->total_pembina() ?></span>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>

<?php if ($this->session->userdata('user_type') == 'pembina') { ?>
	<section class="content-header">
		<h1>
			Dashboard
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Total Pendaftar</span>
						<span class="info-box-number"><?= $this->dashboard_model->total_pendaftar() ?></span>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>

<?php if ($this->session->userdata('user_type') == 'siswa') { ?>
	<section class="content-header">
		<h1>
			Profile
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">Profile</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-body box-profile">
						<img class="profile-user-img img-responsive img-circle" src="assets/dist/img/user2-160x160.jpg" alt="User profile picture">

						<h3 class="profile-username text-center"><?= $this->session->userdata('user_name') ?></h3>

						<ul class="list-group list-group-unbordered">
							<li class="list-group-item">
								<b>NISN</b> <a class="pull-right"><?= $this->session->userdata('siswa_nis') ?></a>
							</li>
							<li class="list-group-item">
								<b>Nama</b> <a class="pull-right"><?= $this->session->userdata('user_name') ?></a>
							</li>
							<li class="list-group-item">
								<b>Kelas</b> <a class="pull-right"><?= $this->session->userdata('siswa_kelas') ?></a>
							</li>
							<li class="list-group-item">
								<b>Jenis Kelamin</b> <a class="pull-right"><?= $this->session->userdata('siswa_jenis_kelamin') ?></a>
							</li>
							<li class="list-group-item">
								<b>TTL</b> <a class="pull-right"><?= $this->session->userdata('siswa_ttl') ?></a>
							</li>
							<li class="list-group-item">
								<b>No Hp</b> <a class="pull-right"><?= $this->session->userdata('siswa_no_hp') ?></a>
							</li>
						</ul>
					</div>
					<!-- /.box-body -->
				</div>
			</div>

			<div class="col-md-6">
				<!-- Horizontal Form -->
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Ganti Password</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form class="form-horizontal">
						<div class="box-body">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Username</label>

								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputEmail3" placeholder="Username">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">Password</label>

								<div class="col-sm-10">
									<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
								</div>
							</div>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<button type="submit" class="btn btn-danger">Reset</button>
							<button type="submit" class="btn btn-info pull-right">Confirm</button>
						</div>
						<!-- /.box-footer -->
					</form>
				</div>
			</div>
		</div>
	</section>

<?php } ?>