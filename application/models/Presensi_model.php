<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi_model extends CI_Model {
    
    /* Untuk pembina */
    public function pembina_set_presensi($id = null) {
        $id_ekskul = $this->session->userdata('pembina_ekskul');
        $q = $this->db->select('pr.id_presensi, pm.id_ekskul, pr.id_pendaftaran, pr.presensi_point, pr.status_presensi, pr.tgl_presensi,
                                s.nama_siswa, s.kelas, s.jurusan, je.nama_ekskul, p.status_pendaftaran')
                    ->from('presensi as pr')
                    ->join('pendaftaran as p', 'p.id_pendaftaran = pr.id_pendaftaran', 'LEFT')
                    ->join('pembina as pm', 'pm.id_ekskul = p.id_ekskul', 'LEFT')
                    ->join('siswa as s', 's.id_siswa = p.id_siswa', 'LEFT')
                    ->join('jenis_eskul as je', 'je.id_ekskul = p.id_ekskul', 'LEFT')
                    ->where('p.status_pendaftaran', 'LULUS')
                    ->where('pr.status_presensi', 'Belum Hadir')
                    ->where('pm.id_ekskul', $id_ekskul)
                    ->order_by('s.nama_siswa', 'ASC')->get();
        if ($id != null) { $this->db->where('id_siswa', $id); }
        return $q;
    }
    
    public function cetak_data_presensi() {
        $id_ekskul = $this->session->userdata('pembina_ekskul');
        $q = $this->db->select('pr.id_presensi, pr.id_pendaftaran, pr.presensi_point, pr.status_presensi, pr.tgl_presensi,
                                s.nama_siswa, s.nis, s.jenis_kelamin, s.ttl, s.no_hp, s.kelas, s.jurusan, je.nama_ekskul, 
                                p.status_pendaftaran, pm.id_ekskul')
                    ->from('presensi as pr')
                    ->join('pendaftaran as p', 'p.id_pendaftaran = pr.id_pendaftaran', 'LEFT')
                    ->join('pembina as pm', 'pm.id_ekskul = p.id_ekskul', 'LEFT')
                    ->join('siswa as s', 's.id_siswa = p.id_siswa', 'LEFT')
                    ->join('jenis_eskul as je', 'je.id_ekskul = p.id_ekskul', 'LEFT')
                    ->where('p.status_pendaftaran', 'LULUS')
                    ->where('pm.id_ekskul', $id_ekskul)
                    ->order_by('s.nama_siswa', 'ASC')->get();
        return $q;
    }

    /* Untuk siswa */
    public function siswa_get_presensi() {
        $id_siswa = $this->session->userdata('user_id');
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

    public function set_presensi_siswa($id) {
        $set = [ 'id_pendaftaran' => $id ];
        $this->db->set('tgl_presensi', 'NOW() + INTERVAL 7 DAY', FALSE);
        $this->db->insert('presensi', $set);
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
}
