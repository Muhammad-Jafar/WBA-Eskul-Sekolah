<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model
{
    public function get($id = null)
    {
        $id_ekskul = $this->session->userdata('pembina_ekskul');
        $this->db->select('nilai.*, siswa.nama_siswa, siswa.kelas, ekstrakurikuler.nama_ekskul ');
        $this->db->from('nilai');
        $this->db->join('pendaftaran', 'pendaftaran.id_pendaftaran = nilai.id_pendaftaran');
        $this->db->join('siswa', 'siswa.id_siswa = pendaftaran.id_siswa');
        $this->db->join('ekstrakurikuler', 'ekstrakurikuler.id_ekskul = pendaftaran.id_ekskul');
        $this->db->where('pendaftaran.id_ekskul', $id_ekskul);
        $this->db->order_by('ekstrakurikuler.id_ekskul');

        if ($id != null) {
            $this->db->where('id_nilai', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_nilai() //agar bisa di akses masing-masing sesuai siswa
    {
        $id_siswa = $this->session->userdata('user_id');
        $this->db->select('nilai.*, ekstrakurikuler.nama_ekskul');
        $this->db->from('nilai');
        $this->db->join('pendaftaran', 'pendaftaran.id_pendaftaran = nilai.id_pendaftaran');
        $this->db->join('ekstrakurikuler', 'ekstrakurikuler.id_ekskul = pendaftaran.id_ekskul');
        $this->db->join('siswa', 'siswa.id_siswa = pendaftaran.id_siswa');
        $this->db->where('pendaftaran.id_siswa', $id_siswa);
        $this->db->order_by('siswa.id_siswa');

        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'id_pendaftaran' => $post['pendaftaran'],

        ];
        $this->db->insert('nilai', $params);
    }
    public function edit($post)
    {
        $params = [
            'id_pendaftaran' => $post['pendaftaran'],

        ];
        $this->db->where('id_nilai', $post['id_nilai']);
        $this->db->update('nilai', $params);
    }

    public function delete($id)
    {
        $this->db->where('id_nilai', $id);
        $this->db->delete('nilai');
    }
}
