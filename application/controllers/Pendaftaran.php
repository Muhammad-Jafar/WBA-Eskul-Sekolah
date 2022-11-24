<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(['pendaftaran_model', 'ekstrakurikuler_model']);
    }

    public function index() {
        $data['row'] = $this->pendaftaran_model->get();
        $data['get_pendaftaran'] = $this->pendaftaran_model->get_pendaftaran();
        $this->template->load('template', 'pendaftaran/pendaftaran_data', $data);
    }

    public function add() {
        $pendaftaran = new stdClass();
        $pendaftaran->id_pendaftaran = null;

        $query_ekstrakurikuler = $this->ekstrakurikuler_model->get();

        $data = array(
            'page' => 'add',
            'row' => $pendaftaran,
            'ekstrakurikuler' => $query_ekstrakurikuler,
            'id_siswa' => $this->session->userdata('user_id')
        );

        $this->template->load('template', 'pendaftaran/pendaftaran_form', $data);
    }

    // public function edit($id)
    // {
    //     $query = $this->pendaftaran_model->get($id);
    //     if ($query->num_rows() > 0) {
    //         $pendaftaran = $query->row();

    //         $ekstrakurikuler = $this->ekstrakurikuler_model->get();
    //         $query_siswa = $this->siswa_model->get();

    //         $data = array(
    //             'page' => 'edit',
    //             'row' => $pendaftaran,
    //             'ekstrakurikuler' => $ekstrakurikuler,
    //             'siswa' => $query_siswa,
    //         );
    //         $this->template->load('template', 'pendaftaran/pendaftaran_form', $data);
    //     } else {
    //         echo "<script>alert('data berhasil di simpan');</script>";
    //         echo "<script>window.location='" . site_url('pendaftaran') . "';</script>";
    //     }
    // }

    public function edit_status() {
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
        echo "<script>window.location='" . site_url('pendaftaran') . "';</script>";
    }

    public function delete() {
        $id = $this->input->post('id_pendaftaran');
        $this->pendaftaran_model->delete($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil di hapus');</script>";
        }
        echo "<script>window.location='" . site_url('pendaftaran') . "';</script>";
    }
}
