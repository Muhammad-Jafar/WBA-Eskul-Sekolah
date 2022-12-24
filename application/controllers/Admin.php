<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct() {
        parent::__construct();
        check_admin(); // ambil dari fungsi helper
        $this->load->model('admin_model');
    }

    public function index() {
		redirect(base_url('admin'));
	}

    public function berita() {
        $data['row'] = $this->admin_model->get();
        $this->template->load('template', 'berita/berita_data', $data);
    }
}
