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
						<span class="info-box-number"><?= $admin_eskul?> Jenis</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Total Pendaftar</span>
						<span class="info-box-number"><?= $admin_total_pendaftar?> Siswa</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Total Siswa</span>
						<span class="info-box-number"><?= $admin_total_siswa?> Siswa</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-red"><i class="fa fa-file-o"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Total Pembina</span>
						<span class="info-box-number"><?= $admin_total_pembina?> Pembina</span>
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
			<div class="col-md-8">
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">Papan Informasi dan Berita</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<!-- <?php if ($berita->status_berita == 'Berlangsung') : ?> -->
								<dl class="dl-horizontal">
									<dt>JUDUL</dt>
									<dd><?= $berita->judul ?></dd>
									<dt>INFORMASI</dt>
									<dd><?= $berita->keterangan ?></dd>
									<dt>WAKTU UPLOAD</dt>
									<dd><?= $berita->tanggal_pos ?></dd>
									<dt>PENANGGUNG JAWAB</dt>
									<dd>ADMIN</dd>
								</dl>
							<!-- <?php else : ?> -->
								<dl class="dl-horizontal">
									<dt>JUDUL</dt>
									<dd> Tidak ada Informasi</dd>
									<dt>INFORMASI</dt>
									<dd>Tidak ada Informasi</dd>
									<dt>WAKTU UPLOAD</dt>
									<dd>Tidak ada Informasi</dd>
									<dt>PENANGGUNG JAWAB</dt>
									<dd>ADMIN</dd>
								</dl>
							<!-- <?php endif; ?>	 -->
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
					<div class="info-box-content">
						<span class="info-box-number">Total Pendaftar</span>
						<span class="info-box-text"> <b><?= $pembina_total_pendaftar;?> </b> Siswa</span>
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
			<div class="col-md-8">
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">Papan Informasi dan Berita</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<!-- <?php if ($berita->status_berita == 'Berlangsung') : ?> -->
								<dl class="dl-horizontal">
									<dt>JUDUL</dt>
									<dd><?= $berita->judul ?></dd>
									<dt>INFORMASI</dt>
									<dd><?= $berita->keterangan ?></dd>
									<dt>WAKTU UPLOAD</dt>
									<dd><?= $berita->tanggal_pos ?></dd>
									<dt>PENANGGUNG JAWAB</dt>
									<dd>ADMIN</dd>
								</dl>
							<!-- <?php else : ?> -->
								<dl class="dl-horizontal">
									<dt>JUDUL</dt>
									<dd> Tidak ada Informasi</dd>
									<dt>INFORMASI</dt>
									<dd>Tidak ada Informasi</dd>
									<dt>WAKTU UPLOAD</dt>
									<dd>Tidak ada Informasi</dd>
									<dt>PENANGGUNG JAWAB</dt>
									<dd>ADMIN</dd>
								</dl>
							<!-- <?php endif; ?>	 -->
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="info-box">
					<span class="info-box-icon bg-yellow"><i class="fa fa-pie-chart"></i></span>
					<div class="info-box-content">
						<span class="info-box-number">Ekstrakurikuler</span>
							<?php foreach ($nama_eskul as $total => $data) : ?>
								<span class="info-box-text"><?= $data->nama_ekskul?></span>
							<?php endforeach; ?>
					</div>
				</div>
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