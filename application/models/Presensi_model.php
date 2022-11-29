<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi_model extends CI_Model {
    public function get($id = null) { //Untuk pembina
        $id_ekskul = $this->session->userdata('pembina_ekskul');
        $this->db->select('absen.*, siswa.nama_siswa, siswa.kelas, ekstrakurikuler.nama_ekskul ');
        $this->db->from('absen');
        $this->db->join('pendaftaran', 'pendaftaran.id_pendaftaran = absen.id_pendaftaran');
        $this->db->join('siswa', 'siswa.id_siswa = pendaftaran.id_siswa');
        $this->db->join('ekstrakurikuler', 'ekstrakurikuler.id_ekskul = pendaftaran.id_ekskul');
        $this->db->where('pendaftaran.id_ekskul', $id_ekskul);
        $this->db->order_by('ekstrakurikuler.id_ekskul');

        if ($id != null) {
            $this->db->where('id_absen', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_absen() { //Untuk siswa
        $id_siswa = $this->session->userdata('user_id');
        $this->db->select('absen.*, ekstrakurikuler.nama_ekskul, ekstrakurikuler.tempat, ekstrakurikuler.jadwal, siswa.nama_siswa');
        $this->db->from('absen');
        $this->db->join('pendaftaran', 'pendaftaran.id_pendaftaran = absen.id_pendaftaran');
        $this->db->join('ekstrakurikuler', 'ekstrakurikuler.id_ekskul = pendaftaran.id_ekskul');
        $this->db->join('siswa', 'siswa.id_siswa = pendaftaran.id_siswa');
        $this->db->where('pendaftaran.id_siswa', $id_siswa);
        $this->db->order_by('siswa.id_siswa');

        $query = $this->db->get();
        return $query;
    }

    public function add($post) {
        $absen = [
            'id_pendaftaran' => $post['pendaftaran'],
            'status_absen' => $post['status_absen'],
        ];
        $this->db->insert('absen', $absen);
    }

    public function edit($post) {
        $params = [
            'id_pendaftaran' => $post['pendaftaran'],
        ];
        $this->db->where('id_absen', $post['id_absen'])->update('absen', $params);
    }

    public function delete($id) {
        $this->db->where('id_absen', $id)->delete('absen');
    }
}
