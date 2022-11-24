<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model {

    public function get($id = null) {
        $this->db->from('siswa')->join('level', 'level.id_level = siswa.id_level');
        if ($id != null) { $this->db->where('id_siswa', $id); }
        $query = $this->db->get();
        return $query;
    }

    public function add($post) {
        $params = [
            'nama_siswa'    => $post['nama_siswa'],
            'nis'           => $post['nis'],
            'jenis_kelamin' => $post['jenis_kelamin'],
            'kelas'         => $post['kelas'],
            'ttl'           => $post['ttl'],
            'no_hp'         => $post['no_hp'],
            'username'      => $post['username'],
            'password'      => md5($post['password']),
        ];
        $this->db->insert('siswa', $params);
    }

    public function edit($post) {
        $params = [
            'nama_siswa'    => $post['nama_siswa'],
            'nis'           => $post['nis'],
            'jenis_kelamin' => $post['jenis_kelamin'],
            'kelas'         => $post['kelas'],
            'ttl'           => $post['ttl'],
            'no_hp'         => $post['no_hp'],
            // 'username'      => $post['username'],
        ];
        $this->db->where('id_siswa', $post['id_siswa'])->update('siswa', $params);
    }

    public function delete($id) {
        $this->db->where('id_siswa', $id)->delete('siswa');
    }

    public function import_data($siswa) {
        $jumlah = count($siswa);
        if ($jumlah > 0) { $this->db->replace('siswa', $siswa); }
    }
}
