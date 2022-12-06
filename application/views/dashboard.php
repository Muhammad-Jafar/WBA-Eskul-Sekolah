<!-- Main content -->
<?php if ($this->session->userdata('user_type') == 'admin') : ?>
	<section class="content-header"><h1>Dashboard</h1></section>
	<section class="content">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-yellow"><i class="fa fa-pie-chart"></i></span>
					<div class="info-box-content">
						<span class="info-box-number">Ekstrakurikuler</span>
						<span class="info-box-text"><?= $admin_eskul; ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
					<div class="info-box-content">
						<span class="info-box-number">Total Pendaftar</span>
						<span class="info-box-text"><?= $admin_total_pendaftar; ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
					<div class="info-box-content">
						<span class="info-box-number">Total Siswa</span>
						<span class="info-box-text"><?= $admin_total_siswa; ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-red"><i class="fa fa-file-o"></i></span>
					<div class="info-box-content">
						<span class="info-box-number">Total Pembina</span>
						<span class="info-box-text"><?= $admin_total_pembina; ?></span>
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
						<span class="info-box-number">Total Pendaftar</span>
						<span class="info-box-text"><?= $admin_total_pendaftar;  ?></span>
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
						<span class="info-box-number">Ekstrakurikuler</span>
							<?php foreach ($nama_eskul as $total => $data) : ?>
								<span class="info-box-text"><?= $data->nama_ekskul?></span>
							<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
					<div class="info-box-content">
						<span class="info-box-number">Pembina</span>
						<?php foreach ($pembina_eskul as $total => $data) : ?>
								<span class="info-box-text"><?= $data->nama_pembina?></span>
							<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>