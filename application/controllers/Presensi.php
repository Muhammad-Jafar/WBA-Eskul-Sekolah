<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(['presensi_model', 'pendaftaran_model']);
    }

    public function index() {
        $data['set_presensi'] = $this->presensi_model->pembina_set_presensi();
        $data['check_presensi'] = $this->presensi_model->check_presensi_siswa();
        $data['get_presensi'] = $this->presensi_model->siswa_get_presensi();
        $data['get_eskul'] = $this->presensi_model->siswa_get_eskul();
        $this->template->load('template', 'presensi/presensi_data', $data);
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

    // public function add() {
    //     $absen = new stdClass();
    //     $absen->id_absen = null;
    //     $data = ['page' => 'add', 'row' => $this->pendaftaran_model->get() ];
    //     $this->template->load('template', 'presensi/presensi_form', $data);
    // }

    // public function edit($id) {
    //     $query = $this->absen_model->get($id);
    //     if ($query->num_rows() > 0) {
    //         $absen = $query->row();
    //         $data = [ 'page' => 'edit', 'row' => $absen ];
    //         $this->template->load('template', 'presensi/presensi_form', $data);
    //     } else {
    //         echo "<script>alert('data berhasil di simpan');</script>";
    //         redirect('presensi');
    //     }
    // }

    // public function process() {
    //     $post = $this->input->post(null, TRUE);
    //     if (isset($_POST['add'])) {
    //         $this->absen_model->add($post);
    //     } else if (isset($_POST['edit'])) {
    //         $this->absen_model->edit($post);
    //     }
    //     if ($this->db->affected_rows() > 0) {
    //         echo "<script>alert('data berhasil di simpan');</scrsite_url>";
    //     }
    //     redirect('presensi');
    // }

    // public function delete() {
    //     $id = $this->input->post('id_absen');
    //     $this->absen_model->delete($id);

    //     if ($this->db->affected_rows() > 0) {
    //         echo "<script>alert('data berhasil di hapus');</script>";
    //     }
    //     redirect('presensi');
    // }
}
