<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekstrakurikuler_model extends CI_Model {
    public function get($id = null) {
        $this->db->from('jenis_eskul');
        if ($id != null) {
            $this->db->where('id_ekskul', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post) {
        $params = [
            'nama_ekskul'   => $post['nama_ekskul'],
            'jadwal'        => $post['jadwal'],
            'tempat'        => $post['tempat'],
        ];
        $this->db->insert('jenis_eskul', $params);
    }

    public function edit($post) {
        $params = [
            'nama_ekskul' => $post['nama_ekskul'],
            'jadwal' => $post['jadwal'],
            'tempat' => $post['tempat'],
        ];
        $this->db->where('id_ekskul', $post['id_ekskul'])->update('jenis_eskul', $params);
    }

    public function delete($id) {
        $this->db->where('id_ekskul', $id)->delete('jenis_eskul');
    }
}
