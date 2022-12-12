<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model {
	private function loginAdmin($username, $password) {
		$q = $this->db->select('*')->where(['username' => $username, 'password' => md5($password)])->get('admin');
		return $q;
	}

	private function loginPembina($username, $password) {
		$q = $this->db->select('*')->where(['username' => $username, 'password' => md5($password)])->get('pembina');
		return $q;
	}

	private function loginSiswa($username, $password) {
		$q = $this->db->select('*')->where(['username' => $username, 'password' => md5($password)])->get('siswa');
		return $q;
	}

	public function doLogin($username, $password) {
		$cek_login_admin = $this->loginAdmin($username, $password);
		$cek_login_pembina = $this->loginPembina($username, $password);
		$cek_login_siswa = $this->loginSiswa($username, $password);

		if ($cek_login_admin->num_rows()) {
			$d = $cek_login_admin->row();
			$this->session->set_userdata('is_logged_in', 'login');
			$this->session->set_userdata('user_type', 'admin');
			$this->session->set_userdata('user_name', $d->nama);
			$this->session->set_userdata('user_username', $d->username);
			redirect(base_url('dashboard'));
		} 
		else if ($cek_login_pembina->num_rows()) {
			$d = $cek_login_pembina->row();
			$this->session->set_userdata('is_logged_in', 'login');
			$this->session->set_userdata('user_type', 'pembina');
			$this->session->set_userdata('user_name', $d->nama_pembina);
			$this->session->set_userdata('user_username', $d->username);
			$this->session->set_userdata('pembina_nip', $d->nip);
			$this->session->set_userdata('pembina_jk', $d->jenis_kelamin);
			$this->session->set_userdata('pembina_kontak', $d->no_hp);
			$this->session->set_userdata('pembina_id', $d->id_pembina);
			$this->session->set_userdata('pembina_ekskul', $d->id_ekskul);
			$nama_eskul = $this->db->query("SELECT je.nama_ekskul FROM pembina AS p JOIN jenis_eskul AS je 
												WHERE p.id_pembina = $d->id_pembina && p.id_ekskul = $d->id_ekskul");
			if ($nama_eskul->num_rows()) {
				$q = $nama_eskul->row();
				$this->session->set_userdata('nama_ekskul', $q->nama_ekskul);
			}
			redirect(base_url('dashboard'));
		} 
		else if ($cek_login_siswa->num_rows()) {
			$d = $cek_login_siswa->row();
			$this->session->set_userdata('user_id', $d->id_siswa);
			$cek_eskul = $this->db->query("SELECT p.id_siswa, p.id_ekskul, je.nama_ekskul 
											FROM pendaftaran AS p JOIN siswa AS s JOIN jenis_eskul as je 
											ON p.id_siswa = $d->id_siswa WHERE p.id_ekskul = je.id_ekskul LIMIT 3");
			if ($cek_eskul-> num_rows()) {
				$q = $cek_eskul->row();
				$this->session->set_userdata('cek_eskul', $q->id_siswa);
				$this->session->set_userdata('get_id_eskul', $q->id_ekskul);
				$this->session->set_userdata('get_nama_eskul', $q->nama_ekskul);
			}
			$this->session->set_userdata('is_logged_in', 'login');
			$this->session->set_userdata('user_type', 'siswa');
			$this->session->set_userdata('user_name', $d->nama_siswa);
			$this->session->set_userdata('user_username', $d->username);
			$this->session->set_userdata('siswa_nis', $d->nis);
			$this->session->set_userdata('siswa_jenis_kelamin', $d->jenis_kelamin);
			$this->session->set_userdata('siswa_kelas', $d->kelas);
			$this->session->set_userdata('siswa_ttl', $d->ttl);
			$this->session->set_userdata('siswa_no_hp', $d->no_hp);
			redirect(base_url('dashboard'));
		} 
		else {
			echo "<script>
			alert('login gagal, username atau password salah');
			window.location='" . site_url('auth/login') . "';
			</script>";
		}
	}
}
