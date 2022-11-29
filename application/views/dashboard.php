<!-- Main content -->
<?php if ($this->session->userdata('user_type') == 'admin') : ?>
	<section class="content-header"><h1>Dashboard</h1></section>
	<section class="content">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-yellow"><i class="fa fa-pie-chart"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Ekstrakurikuler</span>
						<span class="info-box-number"><?= $admin_eskul; ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Total Pendaftar</span>
						<span class="info-box-number"><?= $admin_total_pendaftar; ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Total Siswa</span>
						<span class="info-box-number"><?= $admin_total_siswa; ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-red"><i class="fa fa-file-o"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Total Pembina</span>
						<span class="info-box-number"><?= $admin_total_pembina; ?></span>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ($this->session->userdata('user_type') == 'pembina') : ?>
	<section class="content-header"><h1>Dashboard</h1></section>
	<section class="content">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Total Pendaftar</span>
						<span class="info-box-number"><?= $admin_total_pendaftar;  ?></span>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ($this->session->userdata('user_type') == 'siswa') : ?>
	<section class="content-header"><h1>Dashboard</h1></section>
	<section class="content">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-yellow"><i class="fa fa-pie-chart"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Ekstrakurikuler</span>
							<?php foreach ($nama_eskul->result() as $total => $data) : ?>
								<span class="info-box-number"><?= $data->nama_ekskul?></span>
							<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Pembina PRAMUKA</span>
						<?php foreach ($pembina_eskul->result() as $total => $data) : ?>
								<span class="info-box-number"><?= $data->nama_pembina?></span>
							<?php endforeach; ?>
					</div>
				</div>
			</div>
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
					<span class="info-box-icon bg-red"><i class="fa fa-file-o"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Total Pembina</span>
						<span class="info-box-number"><?= $this->dashboard_model->total_pembina() ?></span>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>