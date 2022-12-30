<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(['nilai_model', 'pendaftaran_model']);
        $this->load->library('form_validation');
        
        isnt_login(function() { 
			redirect( site_url('auth/login') );
		});
    }

    public function index() {
        $data['set_nilai'] = $this->nilai_model->set_nilai();
        $data['get_nilai'] = $this->nilai_model->get_nilai();
        $this->template->load('template', 'nilai/nilai_data', $data);
    }

    public function beri_nilai($id) {
        $this->form_validation->set_rules('nilai_presensi', 'Nilai Presensi', 'required');
        $this->form_validation->set_rules('total_nilai_ujian', 'Total Nilai Ujian', 'required');
        $this->form_validation->set_rules('nilai_ujian', 'Nilai Ujian', 'required');
        $this->form_validation->set_rules('total', 'Total Keseluruhan Nilai', 'required');
        $this->form_validation->set_rules('predikat', 'Predikat', 'required');
        
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->nilai_model->set_nilai($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'nilai/nilai_form', $data);
            } else {
                echo "<script>alert('data tidak ditemukan');</script>";
                redirect('nilai');
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->nilai_model->set_nilai_siswa($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil di simpan');</script>";
            }
            redirect('nilai');
        }
    }
}
