<?php
defined('BASEPATH') or exit('No direct script access allowed');

/* Untuk pembina */
class Presensi_model extends CI_Model {
    public function pembina_set_presensi($id = null) { 
        $id_ekskul = $this->session->userdata('pembina_ekskul');
        $q = $this->db->select('pr.id_presensi, pr.id_pendaftaran, pr.presensi_point, pr.status_presensi, pr.tgl_presensi,
                                s.nama_siswa, s.kelas, je.nama_ekskul, p.status_pendaftaran')
                    ->from('presensi as pr')
                    ->join('pendaftaran as p', 'p.id_pendaftaran = pr.id_pendaftaran', 'LEFT')
                    ->join('siswa as s', 's.id_siswa = p.id_siswa', 'LEFT')
                    ->join('jenis_eskul as je', 'je.id_ekskul = p.id_ekskul', 'LEFT')
                    ->where('p.status_pendaftaran', 'LULUS')
                    ->where('pr.status_presensi', 'Belum Hadir')
                    ->where('je.id_ekskul', $id_ekskul)->get();
        if ($id != null) { $this->db->where('id_siswa', $id); }
        return $q;
    }

    public function check_presensi_siswa() {
        $id_siswa = $this->session->userdata('user_id');
        $id_eskul = $this->session->userdata('get_id_eskul');
        $q = $this->db->query("SELECT (SELECT COUNT(pr.presensi_point) FROM presensi AS pr INNER JOIN pendaftaran AS p 
                                INNER JOIN siswa AS s INNER JOIN jenis_eskul AS je ON pr.id_pendaftaran = p.id_pendaftaran
                                WHERE p.id_ekskul = je.id_ekskul AND s.id_siswa = p.id_siswa
                                AND p.id_siswa = '$id_siswa' AND je.id_ekskul = '$id_eskul' ) AS CEK_PRESENSI ");
        return $q->row_array()['CEK_PRESENSI'];
    }

    /* Untuk siswa */
    public function siswa_get_presensi() {
        $id_siswa = $this->session->userdata('user_id');
        $get_id_eskul = $this->session->userdata('get_id_eskul');
        $q = $this->db->select('je.nama_ekskul, pr.tgl_presensi, pr.status_presensi, pr.ket_presensi')
                    ->from('presensi as pr')
                    ->join('pendaftaran as p', 'p.id_pendaftaran = pr.id_pendaftaran', 'LEFT')
                    ->join('jenis_eskul as je', 'je.id_ekskul = p.id_ekskul', 'LEFT')
                    ->join('siswa as s', 's.id_siswa = p.id_siswa', 'LEFT')
                    ->where('p.id_siswa', $id_siswa)->get()->result();
        return $q;
    }

    public function siswa_get_eskul() {
        $id_siswa = $this->session->userdata('user_id');
        $q = $this->db->select('je.nama_ekskul')->from('presensi as pr')
                    ->join('pendaftaran as p', 'p.id_pendaftaran = pr.id_pendaftaran', 'LEFT')
                    ->join('jenis_eskul as je', 'je.id_ekskul = p.id_ekskul', 'LEFT')
                    ->join('siswa as s', 's.id_siswa = p.id_siswa', 'LEFT')
                    ->where('p.id_siswa', $id_siswa)->limit(3)->get()->result(); 
        return $q;
    }

    public function present($id) {
        $present = [
            'presensi_point' => '1',
            'status_presensi' => 'Hadir',
        ];
        $this->db->where('id_presensi', $id)->update('presensi', $present);
    }

    public function absen_izin($id) {
        $absen = [
            'status_presensi' => 'Tidak Hadir',
            'ket_presensi' => 'Izin',
        ];
        $this->db->where('id_presensi', $id)->update('presensi', $absen);
    }

    public function absen_sakit($id) {
        $absen = [
            'status_presensi' => 'Tidak Hadir',
            'ket_presensi' => 'Sakit',
        ];
        $this->db->where('id_presensi', $id)->update('presensi', $absen);
    }

    public function absen_lainlain($id) {
        $absen = [
            'status_presensi' => 'Tidak Hadir',
            'ket_presensi' => 'Lain-lain',
        ];
        $this->db->where('id_presensi', $id)->update('presensi', $absen);
    }

    // public function delete($id) {
    //     $this->db->where('id_absen', $id)->delete('absen');
    // }
}
