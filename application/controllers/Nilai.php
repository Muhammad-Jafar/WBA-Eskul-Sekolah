<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['nilai_model', 'pendaftaran_model']);
    }

    public function index()
    {
        $data['row'] = $this->nilai_model->get();
        $data['get_nilai'] = $this->nilai_model->get_nilai();
        $this->template->load('template', 'nilai/nilai_data', $data);
    }

    public function add()
    {
        $nilai = new stdClass();
        $nilai->id_nilai = null;
        $nilai->id_pendaftaran = null;


        $data = array(
            'page' => 'add',
            'get' => $this->pendaftaran_model->get(),
        );

        $this->template->load('template', 'nilai/nilai_form', $data);
    }

    public function edit($id)
    {
        $query = $this->nilai_model->get($id);
        if ($query->num_rows() > 0) {
            $nilai = $query->row();

            $data = array(
                'page' => 'edit',
                'row' => $nilai,
            );

            $this->template->load('template', 'nilai/nilai_form', $data);
        } else {
            echo "<script>alert('data berhasil di simpan');</script>";
            echo "<script>window.location='" . site_url('nilai') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->nilai_model->add($post);
        } else if (isset($_POST['edit'])) {
            $this->nilai_model->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil di simpan');</script>";
        }
        echo "<script>window.location='" . site_url('nilai') . "';</script>";
    }

    public function delete()
    {
        $id = $this->input->post('id_nilai');
        $this->nilai_model->delete($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil di hapus');</script>";
        }
        echo "<script>window.location='" . site_url('nilai') . "';</script>";
    }
}
