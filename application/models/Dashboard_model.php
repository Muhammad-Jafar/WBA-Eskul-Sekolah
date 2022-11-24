<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function total_pembina()
    {
        $q = $this->db->query('SELECT COUNT(*) FROM pembina');
        return $q->row_array()['COUNT(*)'];
    }

    public function total_ekstrakurikuler()
    {
        $q = $this->db->query('SELECT COUNT(*) FROM jenis_eskul');
        return $q->row_array()['COUNT(*)'];
    }

    public function total_pendaftar()
    {
        $q = $this->db->query('SELECT COUNT(*) FROM pendaftaran');
        return $q->row_array()['COUNT(*)'];
    }

    public function total_siswa()
    {
        $q = $this->db->query('SELECT COUNT(*) FROM siswa');
        return $q->row_array()['COUNT(*)'];
    }
}
