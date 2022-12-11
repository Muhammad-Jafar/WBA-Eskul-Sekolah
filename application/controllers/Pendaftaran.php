<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(['pendaftaran_model', 'ekstrakurikuler_model']);
        $this->load->helper('tgl_indo_helper');
    }

    public function index() {
        $data['row'] = $this->pendaftaran_model->get(); //Untuk Pembina
        $data['pendaftaran'] = $this->pendaftaran_model->get_pendaftaran(); //Untuk Siswa
        $data['cek'] = $this->pendaftaran_model->check_limit_eskul();//cek pendaftaran
        $this->template->load('template', 'pendaftaran/pendaftaran_data', $data);
    }

    /* SISWA PROSES */
    public function add() {
        $pendaftaran = new stdClass();
        $query_eskul = $this->ekstrakurikuler_model->get();
        $query_cek_eskul = $this->pendaftaran_model->check_eskul();
        $data = [ 'row' => $pendaftaran, 'eskul' => $query_eskul,'cek' => $query_cek_eskul ];
        $this->template->load('template', 'pendaftaran/pendaftaran_form', $data);
    }

    public function process() {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->pendaftaran_model->add($post);
        } else if (isset($_POST['edit'])) {
            $this->pendaftaran_model->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil di simpan');</script>";
        }
        redirect('pendaftaran');
    }

    /* PEMBINA PROSES */
    public function accept($id) {
        $this->pendaftaran_model->accept($id);
        redirect('pendaftaran');
    }

    public function reject($id) {
        $this->pendaftaran_model->reject($id);
        redirect('pendaftaran');
    }

    public function delete() {
        $id = $this->input->post('id_pendaftaran');
        $this->pendaftaran_model->delete($id);
        redirect('pendaftaran');
    }
}
