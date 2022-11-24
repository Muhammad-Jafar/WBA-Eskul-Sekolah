<?php

function check_admin() //fungsi di panggil di setiap controller.. hak akses admin agar tidak bisa di akses level lain
{
    $ci = &get_instance();
    $ci->load->library('fungsi');

    if (!$ci->fungsi->admin_login()) {
        redirect('dashboard');
    }
}
