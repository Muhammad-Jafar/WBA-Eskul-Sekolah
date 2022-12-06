<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(['nilai_model', 'pendaftaran_model']);
    }

    public function index() {
        $data['set_nilai'] = $this->nilai_model->set_nilai();
        $data['get_nilai'] = $this->nilai_model->get_nilai();
        $this->template->load('template', 'nilai/nilai_data', $data);
    }

    public function beri_nilai() {
        $nilai = new stdClass();
        // $nilai->id_nilai = null;
        $nilai->id_pendaftaran = null;
        $data = [
            'page' => 'nilai',
            'get_data_siswa' => $this->pendaftaran_model->get(),
            // 'get_data_nilai' => $this->nilai_model->set_nilai_siswa(),
        ];
        $this->template->load('template', 'nilai/nilai_form', $data);
    }
}
