<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model {

    public function get($id = null) {
        $this->db->from('berita');
        if ($id != null) {
            $this->db->where('id_berita', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post) {
        $params = [
            'judul' => $post['judul'],
            'gambar' => $post['gambar'],
            'keterangan' => $post['keterangan'],
        ];
        $this->db->insert('berita', $params);
    }

    public function edit($post) {
        $params = [
            'judul' => $post['judul'],
            'gambar' => $post['gambar'],
            'keterangan' => $post['keterangan'],
        ];
        $this->db->where('id_berita', $post['id_berita'])->update('berita', $params);
    }

    public function delete($id) {
        $this->db->where('id_berita', $id)->delete('berita');
    }
}
