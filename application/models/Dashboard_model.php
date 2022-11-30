<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    /* DASHBOARD ADMIN */
    public function total_ekstrakurikuler() {
        $q = $this->db->query("SELECT (SELECT COUNT(*) FROM jenis_eskul) AS ESKUL");
        return $q->row_array()['ESKUL'];
    }

    public function total_siswa() {
        $q = $this->db->query("SELECT (SELECT COUNT(*) FROM siswa) AS SISWA");
        return $q->row_array()['SISWA'];
    }

    public function total_pendaftar() { // Gabung ke pembina
        $q = $this->db->query("SELECT (SELECT COUNT(p.id_siswa) FROM pendaftaran AS p JOIN siswa AS s WHERE p.id_siswa = s.id_siswa) AS PENDAFTAR");
        return $q->row_array()['PENDAFTAR'];
    }

    public function total_pembina() {
        $q = $this->db->query("SELECT (SELECT COUNT(*) FROM pembina) AS PEMBINA");
        return $q->row_array()['PEMBINA'];
    }

    /* DASHBOARD PEMBINA */


    /* DASHBOARD SISWA */
    public function get_nama_eskul() {
        $id = $this->session->userdata('user_id');
        $q = $this->db->select('p.id_ekskul, p.id_siswa, p.status_pendaftaran, s.id_siswa, je.id_ekskul, je.nama_ekskul')
                 ->from('pendaftaran as p')
                 ->join('siswa as s', 's.id_siswa = p.id_siswa', 'LEFT')
                 ->join('jenis_eskul as je', 'je.id_ekskul = p.id_ekskul', 'LEFT')
                 ->where('p.status_pendaftaran', 'LULUS')
                 ->where('p.id_siswa', $id)->get()->result();
        return $q;
    }

    public function get_pembina_eskul() {
        $id = $this->session->userdata('user_id');
        $q = $this->db->select('p.id_ekskul, p.id_siswa, s.id_siswa, je.id_ekskul, pm.nama_pembina')
                 ->from('pendaftaran as p')
                 ->join('siswa as s', 's.id_siswa = p.id_siswa', 'LEFT')
                 ->join('jenis_eskul as je', 'je.id_ekskul = p.id_ekskul', 'LEFT')
                 ->join('pembina as pm', 'pm.id_ekskul = p.id_ekskul','pm.id_ekskul = je.id_ekskul', 'LEFT')
                 ->where('p.status_pendaftaran', 'LULUS')
                 ->where('p.id_siswa', $id)->get()->result();
        return $q;
    }

    public function total_ikut_eskul() {
        $id = $this->session->userdata('user_id');
        $q = $this->db->query("SELECT ( SELECT COUNT(*) FROM siswa WHERE id_siswa = $id ) AS PEMBINA");
        return $q->row_array()['PEMBINA'];
    }
}
