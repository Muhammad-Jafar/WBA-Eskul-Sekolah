<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Siswa extends CI_Controller {
    function __construct() {
        parent::__construct();
        check_admin(); // ambil dari fungsi helper
        $this->load->model('siswa_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['row'] = $this->siswa_model->get();
        $this->template->load('template', 'siswa/siswa_data', $data);
    }

    public function add() {
        $this->form_validation->set_rules('nama_siswa', 'Nama', 'required|min_length[3]');
        $this->form_validation->set_rules('nis', 'Nis', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('ttl', 'TTL', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[siswa.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');

        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        $this->form_validation->set_message('min_length', '{field} minimal 3 karakter');
        $this->form_validation->set_message('is_unique', '{field} telah digunakan');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        $data = array('id_level' => $this->session->userdata('user_type'));

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'siswa/siswa_add', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $this->siswa_model->add($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('data berhasil di simpan');</script>";
            }
            redirect('siswa');
        }
    }

    public function edit($id) {
        $this->form_validation->set_rules('nama_siswa', 'Nama', 'required|min_length[3]');
        $this->form_validation->set_rules('nis', 'Nis', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('ttl', 'TTL', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
        // $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[siswa.username]');

        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        $this->form_validation->set_message('min_length', '{field} minimal 3 karakter');
        $this->form_validation->set_message('is_unique', '{field} telah digunakan');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->siswa_model->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'siswa/siswa_edit', $data);
            } else {
                echo "<script>alert('data tidak ditemukan');</script>";
                redirect('siswa');
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->siswa_model->edit($post);
            if ($this->db->affected_rows() > 0) { echo "<script>alert('data berhasil di simpan');</script>"; }
            redirect('siswa');
        }
    }

    function username_check() {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM siswa WHERE username = '$post[username]' AND id_siswa != '$post[id_siswa]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '{field} sudah di pakai');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function delete() {
        $id = $this->input->post('id_siswa');
        $this->siswa_model->delete($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil di hapus');</script>";
        }
        redirect('siswa');
    }

    public function cetak() {
        $data['row'] = $this->siswa_model->get();
        $this->load->view('siswa/siswa_print', $data);
    }

    public function import() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'doc' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('importexcel')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('uploads/' . $file['file_name']);

            foreach ($reader->getSheetIterator() as $sheet) {
                $numRow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numRow > 1) {
                        $siswa = array(
                            'nama_siswa' => $row->getCellAtIndex(1),
                            'nis' => $row->getCellAtIndex(2),
                            'jenis_kelamin' => $row->getCellAtIndex(3),
                            'kelas' => $row->getCellAtIndex(4),
                            'ttl' => $row->getCellAtIndex(5),
                            'no_hp' => $row->getCellAtIndex(6),
                            'username' => $row->getCellAtIndex(7),
                            'password' => md5($row->getCellAtIndex(8)),
                            'id_level' => $row->getCellAtIndex(9),
                        );
                        $this->siswa_model->import_data($siswa);
                    }
                    $numRow++;
                }
                $reader->close();
                unlink('uploads/' . $file['file_name']);
                echo "<script>
                alert('data berhasil di tambahkan');
                window.location='" . site_url('siswa') . "';
                </script>";
            }
        } else {
            echo "error :" . $this->upload->display_errors();
        };
    }
}
