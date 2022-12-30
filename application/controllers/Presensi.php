<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(['presensi_model', 'pendaftaran_model']);
        $this->load->helper('tgl_indo_helper');

        isnt_login(function() { 
			redirect( site_url('auth/login') );
		});
    }

    public function index() {
        $data['set_presensi'] = $this->presensi_model->pembina_set_presensi();
        $data['get_presensi'] = $this->presensi_model->siswa_get_presensi();
        $data['get_eskul'] = $this->presensi_model->siswa_get_eskul();
        $this->template->load('template', 'presensi/presensi_data', $data);
    }

    public function set_presensi($id) {
        $this->presensi_model->set_presensi_siswa($id);
        redirect('presensi');
    }

    public function present($id) {
        $this->presensi_model->present($id);
        redirect('presensi');
    }

    public function absen_izin($id) {
        $this->presensi_model->absen_izin($id);
        redirect('presensi');
    }
    public function absen_sakit($id) {
        $this->presensi_model->absen_sakit($id);
        redirect('presensi');
    }
    public function absen_lainlain($id) {
        $this->presensi_model->ababsen_lainlainsen($id);
        redirect('presensi');
    }

    public function cetak() {
        $data['row'] = $this->presensi_model->cetak_data_presensi();
        $this->load->view('presensi/presensi_print', $data);
    }
}
