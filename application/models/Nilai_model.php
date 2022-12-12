<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model {
    public function set_nilai($id = null) {
        $id_ekskul = $this->session->userdata('pembina_ekskul');
        $q = $this->db->select('n.*, s.nama_siswa, s.kelas, s.jurusan, je.nama_ekskul')
                    ->from('nilai as n')
                    ->join('pendaftaran as p', 'p.id_pendaftaran = n.id_pendaftaran', 'LEFT')
                    ->join('siswa as s', 's.id_siswa = p.id_siswa', 'LEFT')
                    ->join('jenis_eskul as je', 'je.id_ekskul = p.id_ekskul', 'LEFT')
                    ->where('p.id_ekskul', $id_ekskul)->get();
                    // ->order_by('je.id_ekskul');
        if ($id != null) { $this->db->where('n.id_pendaftaran', $id); }
        return $q;
    }

    public function get_nilai() {
        $id_siswa = $this->session->userdata('user_id');
        $q = $this->db->select('n.*, je.nama_ekskul')
                    ->from('nilai as n')
                    ->join('pendaftaran as p', 'p.id_pendaftaran = n.id_pendaftaran', 'LEFT')
                    ->join('jenis_eskul as je', 'je.id_ekskul = p.id_ekskul', 'LEFT')
                    ->join('siswa as s', 's.id_siswa = p.id_siswa', 'LEFT')
                    ->where('p.id_siswa', $id_siswa)->get()->result();
        return $q;
    }

    public function set_nilai_siswa($id) {
        $set = [
            // 'id_pendaftaran' => 'id_pendaftaran',
            'total_nilai_ujian' => 'total_nilai_ujian',
            'nilai_presensi' => 'nilai_presensi',
            'nilai_ujian' => 'nilai_ujian',
            'total' => 'total',
            'predikat' => 'predikat',
        ];
        $this->db->where('id_pendaftaran', $id)->update('nilai', $set);
    }
}
