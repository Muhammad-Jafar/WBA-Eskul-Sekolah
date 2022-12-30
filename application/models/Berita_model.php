<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model {

    public function get($id = null) {
        $q = $this->db->get('berita');
        if ($id != null) { $this->db->where('id_berita', $id); }
        return $q;
    }

    public function add($post) {
        $params = [
            'judul' => $post['judul'],
            'keterangan' => $post['keterangan'],
        ];
        $this->db->insert('berita', $params);
    }

    public function edit($post) {
        $params = [
            'judul' => $post['judul'],
            'keterangan' => $post['keterangan'],
        ];
        $this->db->where('id_berita', $post['id_berita'])->update('berita', $params);
    }

    public function delete($id) {
        $this->db->where('id_berita', $id)->delete('berita');
    }

    public function show_berita($id) {
        $data = [ 'status_berita' => 'Berlangsung' ];
        $this->db->where('id_berita', $id)->update('berita', $data);
    }

    public function hide_berita($id) {
        $data = [ 'status_berita' => 'Usai' ];
        $this->db->where('id_berita', $id)->update('berita', $data);
    }
}
