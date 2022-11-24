<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['absen_model', 'pendaftaran_model']);
    }

    public function index()
    {
        $data['row'] = $this->absen_model->get();
        $data['get_absen'] = $this->absen_model->get_absen();

        $this->template->load('template', 'absen/absen_data', $data);
    }

    public function add()
    {
        $absen = new stdClass();
        $absen->id_absen = null;

        $data = array(
            'page' => 'add',
            'row' => $this->pendaftaran_model->get()

        );

        $this->template->load('template', 'absen/absen_form', $data);
    }

    public function edit($id)
    {
        $query = $this->absen_model->get($id);
        if ($query->num_rows() > 0) {
            $absen = $query->row();

            $data = array(
                'page' => 'edit',
                'row' => $absen,
            );

            $this->template->load('template', 'absen/absen_form', $data);
        } else {
            echo "<script>alert('data berhasil di simpan');</script>";
            echo "<script>window.location='" . site_url('absen') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->absen_model->add($post);
        } else if (isset($_POST['edit'])) {
            $this->absen_model->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil di simpan');</script>";
        }
        echo "<script>window.location='" . site_url('absen') . "';</script>";
    }

    public function delete()
    {
        $id = $this->input->post('id_absen');
        $this->absen_model->delete($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil di hapus');</script>";
        }
        echo "<script>window.location='" . site_url('absen') . "';</script>";
    }
}
