<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekstrakurikuler extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ekstrakurikuler_model');

        isnt_login(function() { 
			redirect( site_url('auth/login') );
		});
    }

    public function index() {
        $data['row'] = $this->ekstrakurikuler_model->get();
        $this->template->load('template', 'ekstrakurikuler/ekstrakurikuler_data', $data);
    }

    public function add() {
        $ekstrakurikuler = new stdClass();
        $ekstrakurikuler->id_ekskul = null;
        $ekstrakurikuler->nama_ekskul = null;
        $ekstrakurikuler->jadwal = null;
        $ekstrakurikuler->tempat = null;
        $data = [ 'page' => 'add', 'row' => $ekstrakurikuler ];
        $this->template->load('template', 'ekstrakurikuler/ekstrakurikuler_form', $data);
    }

    public function edit($id) {
        $query = $this->ekstrakurikuler_model->get($id);
        if ($query->num_rows() > 0) {
            $ekstrakurikuler = $query->row();
            $data = [ 'page' => 'edit', 'row' => $ekstrakurikuler ];
            $this->template->load('template', 'ekstrakurikuler/ekstrakurikuler_form', $data);
        } else {
            echo "<script>alert('data berhasil di simpan');</script>";
            redirect('ekstrakurikuler');
        }
    }

    public function process() {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->ekstrakurikuler_model->add($post);
        } else if (isset($_POST['edit'])) {
            $this->ekstrakurikuler_model->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil di simpan');</script>";
        }
        redirect('ekstrakurikuler');
    }

    public function delete() {
        $id = $this->input->post('id_ekskul');
        $this->ekstrakurikuler_model->delete($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil di hapus');</script>";
        }
        redirect('ekstrakurikuler');
    }

    public function cetak() {
        $data['row'] = $this->ekstrakurikuler_model->get();
        $this->load->view('ekstrakurikuler/ekstrakurikuler_print', $data);
    }
}
