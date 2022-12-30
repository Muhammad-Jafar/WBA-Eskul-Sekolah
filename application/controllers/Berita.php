<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('berita_model');

        isnt_login(function() { 
			redirect( site_url('auth/login') );
		});
    }

    public function index() {
        $data['row'] = $this->berita_model->get();
        $this->template->load('template', 'berita/berita_data', $data);
    }

    public function add() {
        $berita = new stdClass();
        $berita->judul = null;
        $berita->keterangan = null;
        $data = [ 'page' => 'add', 'row' => $berita ];
        $this->template->load('template', 'berita/berita_form', $data);
    }

    public function edit($id) {
        $query = $this->berita_model->get($id);
        if ($query->num_rows() > 0) {
            $berita = $query->row();
            $data = [ 'page' => 'edit', 'row' => $berita ];
            $this->template->load('template', 'berita/berita_form', $data);
        } else {
            echo "<script>alert('Data berhasil di simpan');</script>";
            redirect('berita');
        }
    }

    public function process() {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->berita_model->add($post);
        } else if (isset($_POST['edit'])) {
            $this->berita_model->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil di simpan');</script>";
        }
        redirect('berita');
    }

    public function delete() {
        $id = $this->input->post('id_berita');
        $this->berita_model->delete($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil di hapus');</script>";
        }
        redirect('berita');
    }

    public function show($id) {
        $this->berita_model->show_berita($id);
        redirect('berita');
    }

    public function hide($id) {
        $this->berita_model->hide_berita($id);
        redirect('berita');
    }
}
