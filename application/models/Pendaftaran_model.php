<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {
    public function get($id = null) { //Untuk Pembina
        $id_ekskul = $this->session->userdata('pembina_ekskul');
        $q=$this->db->select('p.*, pm.id_ekskul, je.nama_ekskul, s.nama_siswa, s.kelas')
                    ->from('pendaftaran as p')
                    ->join('pembina as pm', 'pm.id_ekskul = p.id_ekskul', 'LEFT')
                    ->join('siswa as s', 's.id_siswa = p.id_siswa', 'LEFT')
                    ->join('jenis_eskul as je', 'je.id_ekskul = p.id_ekskul', 'LEFT')
                    ->where('p.id_ekskul', $id_ekskul)
                    ->where('status_pendaftaran', 'BELUM SELEKSI')->get();
        if ($id != null) { $this->db->where('id_pendaftaran', $id); }
        return $q;
    }

    public function get_pendaftaran() { // Untuk Siswa
        $id_siswa = $this->session->userdata('user_id');
        $q=$this->db->select('p.*, je.nama_ekskul, je.jadwal, je.tempat, s.nama_siswa, s.kelas')
                    ->from('pendaftaran as p')
                    ->join('siswa as s', 's.id_siswa = p.id_siswa', 'LEFT')
                    ->join('jenis_eskul as je', 'je.id_ekskul = p.id_ekskul', 'LEFT')
                    ->where('p.id_siswa', $id_siswa)->get();
        return $q;
    }

    public function check_limit_eskul() {
        $id_siswa = $this->session->userdata('user_id');
        $q = $this->db->query("SELECT ( SELECT COUNT(id_siswa) FROM pendaftaran WHERE id_siswa = '$id_siswa') AS CEK");
        return $q->row_array()['CEK'];
    }

    public function check_eskul() {
        $id_siswa = $this->session->userdata('user_id');
        $q = $this->db->select('p.id_ekskul, je.nama_ekskul')->from('pendaftaran as p')
                      ->JOIN('jenis_eskul as je', 'je.id_ekskul = p.id_ekskul' , 'LEFT')
                      ->where('p.id_siswa', $id_siswa)->get()->result();
        return $q;
    }

    /* PEMBINA PROSES */
    public function accept($id) {
        $params = ['status_pendaftaran' => 'LULUS'];
        $this->db->where('id_pendaftaran', $id)->update('pendaftaran', $params);    
    }

    public function reject($id) {
        $params = ['status_pendaftaran' => 'TIDAK LULUS'];
        $this->db->where('id_pendaftaran', $id)->update('pendaftaran', $params);
    }

    public function delete($id) {
        $this->db->where('id_pendaftaran', $id)->delete('pendaftaran');
    }

    /* SISWA PROSES */
    public function add($post) {
        $pendaftaran = [
            'id_ekskul' => $post['id_ekskul'],
            'id_siswa' => $post['id_siswa'],
        ];
        $this->db->insert('pendaftaran', $pendaftaran);
    }

    public function edit($post) {
        $params = [ 'id_ekskul' => $post['ekstrakurikuler'] ];
        $this->db->where('id_pendaftaran', $post['id_pendaftaran'])->update('pendaftaran', $params);
    }
}
