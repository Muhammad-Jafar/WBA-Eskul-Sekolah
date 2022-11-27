<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembina_model extends CI_Model {
    public function jenis_eskul() {
       $q = $this->db->select('*')->get('jenis_eskul');
       return $q->result();
    }

    public function get($id = null) {
        $this->db->select('p.id_ekskul, je.nama_ekskul');
        $this->db->from('pembina as p');
        $this->db->join('jenis_eskul as je', 'je.id_ekskul = p.id_ekskul');
        if ($id != null) {
            $this->db->where('id_pembina', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post) {
        $params = [
            'nama_pembina'  => $post['nama_pembina'],
            'nip'           => $post['nip'],
            'jenis_kelamin' => $post['jenis_kelamin'],
            'no_hp'         => $post['no_hp'],
            'id_ekskul'     => $post['id_ekskul'],
            'username'      => $post['username'],
            'password'      => md5($post['password']),
        ];
        $this->db->insert('pembina', $params);
    }

    public function edit($post) {
        $params = [
            'nama_pembina'  => $post['nama_pembina'],
            'nip'           => $post['nip'],
            'jenis_kelamin' => $post['jenis_kelamin'],
            'no_hp'         => $post['no_hp'],
            'id_ekskul'     => $post['id_ekskul'],
            // 'username'      => $post['username'],
        ];
        $this->db->where('id_pembina', $post['id_pembina'])->update('pembina', $params);
    }

    public function delete($id) {
        $this->db->where('id_pembina', $id)->delete('pembina');
    }
}
