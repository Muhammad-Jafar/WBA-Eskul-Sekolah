<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Dashboard_model');
		$this->dashboard_model = $this->Dashboard_model;

		isnt_login(function () {
			redirect('auth/login');
		});
	}

	public function index() {
		$data['admin_eskul'] = $this->dashboard_model->total_ekstrakurikuler();
		$data['admin_total_siswa'] = $this->dashboard_model->total_siswa();
		$data['admin_total_pendaftar'] = $this->dashboard_model->total_pendaftar();
		$data['admin_total_pembina'] = $this->dashboard_model->total_pembina();
		$data['pembina_total_pendaftar'] = $this->dashboard_model->total_pendaftar();
		$data['nama_eskul'] = $this->Dashboard_model->get_nama_eskul();
		$data['pembina_eskul'] = $this->Dashboard_model->get_pembina_eskul();
		$this->template->load('template', 'dashboard', $data);
	}
}
