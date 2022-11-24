<?php

class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    function admin_login()
    {
        $this->ci->load->model('admin_model');
        $admin = $this->ci->session->userdata('admin');
        $user_data = $this->ci->admin_model->get($admin)->row();
        return $user_data;
    }

    function pembina_login()
    {
        $this->ci->load->model('pembina_model');
        $pembina = $this->ci->session->userdata('pembina');
        $user_data = $this->ci->pembina_model->get($pembina)->row();
        return $user_data;
    }

    function siswa_login()
    {
        $this->ci->load->model('siswa_model');
        $siswa = $this->ci->session->userdata('siswa');
        $user_data = $this->ci->siswa_model->get($siswa)->row();
        return $user_data;
    }
}
