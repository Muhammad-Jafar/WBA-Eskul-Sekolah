<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembina extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('pembina_model');
        $this->load->library('form_validation');

        isnt_login(function() { 
			redirect( site_url('auth/login') );
		});
    }

    public function index() {
        $data['row'] = $this->pembina_model->get();
        $this->template->load('template', 'pembina/pembina_data', $data);
    }

    public function add() {
        $this->form_validation->set_rules('nama_pembina', 'Nama', 'required|min_length[3]');
        $this->form_validation->set_rules('nip', 'Nip', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
        $this->form_validation->set_rules('id_ekskul', 'Jenis Ekskul', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[pembina.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');

        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        $this->form_validation->set_message('min_length', '{field} minimal 3 karakter');
        $this->form_validation->set_message('is_unique', '{field} telah digunakan');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['jenis_eskul'] = $this->pembina_model->jenis_eskul();
            $this->template->load('template', 'pembina/pembina_add', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $this->pembina_model->add($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil di simpan');</script>";
            }
            redirect('pembina');
        }
    }

    public function edit($id) {
        $this->form_validation->set_rules('nama_pembina', 'Nama', 'required|min_length[3]');
        $this->form_validation->set_rules('nip', 'Nip', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
        $this->form_validation->set_rules('id_ekskul', 'Jenis Ekskul', 'required');

        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        $this->form_validation->set_message('min_length', '{field} minimal 3 karakter');
        $this->form_validation->set_message('is_unique', '{field} telah digunakan');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->pembina_model->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $data['jenis_eskul'] = $this->pembina_model->jenis_eskul();
                $this->template->load('template', 'pembina/pembina_edit', $data);
            } else {
                echo "<script>alert('data tidak ditemukan');</script>";
                redirect('pembina');
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->pembina_model->edit($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil di simpan');</script>";
            }
            redirect('pembina');
        }
    }

    function username_check() {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM pembina WHERE username = '$post[username]' AND id_pembina != '$post[id_pembina]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '{field} sudah di pakai');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function delete() {
        $id = $this->input->post('id_pembina');
        $this->pembina_model->delete($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil di hapus');</script>";
        }
        redirect('pembina');
    }

    public function cetak() {
        $data['row'] = $this->pembina_model->get();
        $this->load->view('pembina/pembina_print', $data);
    }
}
