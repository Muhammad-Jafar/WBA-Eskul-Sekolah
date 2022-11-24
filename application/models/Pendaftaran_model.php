<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {
    public function get($id = null) {
        $id_ekskul = $this->session->userdata('pembina_ekskul');
        $this->db->select('pendaftaran.*, ekstrakurikuler.nama_ekskul, ekstrakurikuler.jadwal, ekstrakurikuler.tempat, siswa.nama_siswa, siswa.kelas');
        $this->db->from('pendaftaran');
        $this->db->join('siswa', 'siswa.id_siswa = pendaftaran.id_siswa');
        $this->db->join('ekstrakurikuler', 'ekstrakurikuler.id_ekskul = pendaftaran.id_ekskul');
        $this->db->where('pendaftaran.id_ekskul', $id_ekskul);
        $this->db->order_by('ekstrakurikuler.id_ekskul');

        if ($id != null) {
            $this->db->where('id_pendaftaran', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_pendaftaran() { //agar bisa di akses masing-masing sesuai siswa
        $id_siswa = $this->session->userdata('user_id');
        $this->db->select('pendaftaran.*, ekstrakurikuler.nama_ekskul, ekstrakurikuler.jadwal, ekstrakurikuler.tempat, siswa.nama_siswa, siswa.kelas');
        $this->db->from('pendaftaran');
        $this->db->join('ekstrakurikuler', 'ekstrakurikuler.id_ekskul = pendaftaran.id_ekskul');
        $this->db->join('siswa', 'siswa.id_siswa = pendaftaran.id_siswa');
        $this->db->where('pendaftaran.id_siswa', $id_siswa);
        $this->db->order_by('siswa.id_siswa');

        $query = $this->db->get();
        return $query;
    }

    public function add($post) {
        //$this->db->trans_start();

        $pendaftaran = [
            'id_ekskul' => $post['ekstrakurikuler'],
            'id_siswa' => $post['id_siswa'],
        ];
        $this->db->insert('pendaftaran', $pendaftaran);

        // $last_id = $this->db->insert_id();

        // $absen = [
        //     'id_pendaftaran' => $last_id,
        // ];
        // $this->db->insert('absen', $absen);

        // $this->db->trans_complete();
    }

    public function edit($post) {
        $params = [
            'id_ekskul' => $post['ekstrakurikuler'],

        ];
        $this->db->where('id_pendaftaran', $post['id_pendaftaran'])->update('pendaftaran', $params);
    }

    public function delete($id) {
        $this->db->where('id_pendaftaran', $id)->delete('pendaftaran');
    }
}
