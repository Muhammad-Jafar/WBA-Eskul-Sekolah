<?php if ($this->session->userdata('user_type') == 'admin') : ?>
   <section class="content-header"><h1>Profile</h1></section>
   <section class="content">
      <div class="row">
         <div class="col-md-4">
            <div class="box box-primary">
               <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="assets/dist/img/user2-160x160.jpg" alt="User profile picture">
                  <h3 class="profile-username text-center"><?= $this->session->userdata('user_name') ?></h3>
                  <p class="text-muted text-center"><?= $this->session->userdata('user_type') ?></p>
                  <ul class="list-group list-group-unbordered">
                     <li class="list-group-item">
                        <b>Username</b> <a class="pull-right"><?= $this->session->userdata('user_username') ?></a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </section>
<?php endif; ?>
<?php if ($this->session->userdata('user_type') == 'pembina') : ?>
   <section class="content-header"><h1>Profile</h1></section>
   <section class="content">
      <div class="row">
         <div class="col-md-4">
            <div class="box box-primary">
               <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="assets/dist/img/user2-160x160.jpg" alt="User profile picture">
                  <h3 class="profile-username text-center"> <?= $this->session->userdata('user_name') ?> </h3>
                  <p class="text-muted text-center"><?= $this->session->userdata('user_type') ?></p>
                  <ul class="list-group list-group-unbordered">
                     <li class="list-group-item">
                        <b>NIP</b> <a class="pull-right"><?= $this->session->userdata('pembina_nip') ?></a>
                     </li>
                     <li class="list-group-item">
                        <b>Username</b> <a class="pull-right"><?= $this->session->userdata('user_username') ?></a>
                     </li>
                     <li class="list-group-item">
                        <b>Jenis Kelamin</b> <a class="pull-right"><?= $this->session->userdata('pembina_jk') ?></a>
                     </li>
                     <li class="list-group-item">
                        <b>Kontak</b> <a class="pull-right"><?= $this->session->userdata('pembina_kontak') ?></a>
                     </li>
                     <li class="list-group-item">
                        <b>Membina pada Eskul</b> <a class="pull-right"><?= $this->session->userdata('nama_ekskul') ?></a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </section>
<?php endif; ?>
<?php if ($this->session->userdata('user_type') == 'siswa') : ?>
   <section class="content-header"><h1>Profile</h1></section>
   <section class="content">
      <div class="row">
         <div class="col-md-4">
            <div class="box box-primary">
               <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="assets/dist/img/user2-160x160.jpg" alt="User profile picture">
                  <h3 class="profile-username text-center"><?= $this->session->userdata('user_name') ?></h3>
                  <p class="text-muted text-center"><?= $this->session->userdata('user_type') ?></p>
                  <ul class="list-group list-group-unbordered">
                     <li class="list-group-item">
                        <b>NISN</b> <a class="pull-right"><?= $this->session->userdata('siswa_nis') ?></a>
                     </li>
                     <li class="list-group-item">
                        <b>Username</b> <a class="pull-right"><?= $this->session->userdata('user_username') ?></a>
                     </li>
                     <li class="list-group-item">
                        <b>Tempat tanggal lahir</b> <a class="pull-right"><?= $this->session->userdata('siswa_ttl') ?></a>
                     </li>
                     <li class="list-group-item">
                        <b>Jenis Kelamin</b> <a class="pull-right"><?= $this->session->userdata('siswa_jenis_kelamin') ?></a>
                     </li>
                     <li class="list-group-item">
                        <b>Kelas</b> <a class="pull-right"><?= $this->session->userdata('siswa_kelas') ?></a>
                     </li>
                     <li class="list-group-item">
                        <b>Kontak</b> <a class="pull-right"><?= $this->session->userdata('siswa_no_hp') ?></a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </section>
<?php endif; ?>