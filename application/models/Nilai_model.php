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

    public function set_nilai_siswa($post) {
        $set = [
            'nilai_presensi'    => $post['nilai_presensi'],
            'total_nilai_ujian' => $post['total_nilai_ujian'],
            'nilai_ujian'       => $post['nilai_ujian'],
            'total'             => $post['total'],
            'predikat'          => $post['predikat'],
            'status_penilaian'  => $post['Dinilai'],
        ];
        $this->db->set('tgl_penilaian', 'NOW()', FALSE);
        $this->db->where('id_pendaftaran', $post['id_pendaftaran'])->update('nilai', $set);
    }
}
