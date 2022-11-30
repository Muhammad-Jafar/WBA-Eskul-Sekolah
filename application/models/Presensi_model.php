<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi_model extends CI_Model {
    public function pembina_set_presensi($id = null) { //Untuk pembina
        $id_ekskul = $this->session->userdata('pembina_ekskul');
        $q = $this->db->select('pr.id_pendaftaran, s.nama_siswa, s.kelas, je.nama_ekskul, p.status_pendaftaran')
                    ->from('presensi as pr')
                    ->join('pendaftaran as p', 'p.id_pendaftaran = pr.id_pendaftaran', 'LEFT')
                    ->join('siswa as s', 's.id_siswa = p.id_siswa', 'LEFT')
                    ->join('jenis_eskul as je', 'je.id_ekskul = pr.id_ekskul', 'LEFT')
                    ->where('p.status_pendaftaran', 'LULUS')
                    ->where('je.id_ekskul', $id_ekskul)->get();
        if ($id != null) { $this->db->where('id_absen', $id); }
        return $q;
    }

    public function check_presensi_siswa() {
        $id_siswa = $this->session->userdata('user_id');
        $get_id_eskul = $this->session->userdata('get_id_eskul');
        $a = $this->db->query("SELECT ( SELECT COUNT(pr.id_siswa) FROM presensi AS pr JOIN siswa AS s JOIN jenis_eskul AS je JOIN pendaftaran AS p
                            WHERE pr.id_pendaftaran = p.id_pendaftaran && pr.id_ekskul = je.id_ekskul && s.id_siswa = p.id_siswa 
                            && pr.id_siswa = '$id_siswa' && je.id_ekskul = '$get_id_eskul') AS CHECK_PRESENSI ");
        return $a->row_array()['CHECK_PRESENSI'];
    }

    public function siswa_get_presensi() { //Untuk siswa
        $id_siswa = $this->session->userdata('user_id');
        $get_id_eskul = $this->session->userdata('get_id_eskul');
        $q = $this->db->select('je.nama_ekskul, pr.tgl_presensi, pr.status_presensi, pr.ket_presensi')->from('presensi as pr')
                    ->join('jenis_eskul as je', 'je.id_ekskul = pr.id_ekskul', 'LEFT')
                    ->join('siswa as s', 's.id_siswa = pr.id_siswa', 'LEFT')
                    ->where('je.id_ekskul', $get_id_eskul)
                    ->where('pr.id_siswa', $id_siswa)->get()->result();
        return $q;
    }

    public function siswa_get_eskul() {
        $id_siswa = $this->session->userdata('user_id');
        $q = $this->db->select('je.nama_ekskul')->from('presensi as pr')
                    ->join('jenis_eskul as je', 'je.id_ekskul = pr.id_ekskul', 'LEFT')
                    ->join('siswa as s', 's.id_siswa = pr.id_siswa', 'LEFT')
                    ->where('pr.id_siswa', $id_siswa)->limit(3)->get()->result();
        return $q;
    }

    // public function add($post) {
    //     $absen = [
    //         'id_pendaftaran' => $post['pendaftaran'],
    //         'status_absen' => $post['status_absen'],
    //     ];
    //     $this->db->insert('absen', $absen);
    // }

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
