<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller {
    private $auth_model;

    function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
        $this->auth_model = $this->Auth_model;
    }

    public function login() {
        is_login(function () {
            redirect(base_url('dashboard'));
        });
        isnt_login(function () {
            $this->load->view('login');
        });
    }

    public function process() {
        is_login(function () {
            redirect(base_url('dashboard'));
        });

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $this->security->xss_clean($this->input->post('username'));
            $password = $this->security->xss_clean($this->input->post('password'));

            //validasi
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if (!$this->form_validation->run()) {
                $this->session->set_flashdata('msg_alert', 'Masukan username dan password');
                redirect('auth/login');
            }

            $this->auth_model->doLogin($username, $password);
        } else {
            $this->load->view('login');
        }
    }

    //fungsi logout diganti
    public function logout() {
        isnt_login(function () {
            redirect('auth/login');
        });

        $this->session->sess_destroy();
        $params = ['id_level'];
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}
