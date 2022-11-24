<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( !function_exists('generate_page') ) {

	function generate_navlink($path_page, $var_path_page, $page_name) {
		$html = '<li class="nav-item {status}">';
		$html.= "\n";
		$html.= '<a class="nav-link" href="' . base_url($var_path_page) .'">'.$page_name.'</a>';
		$html.= '</li>';
		return ( ($path_page==$var_path_page) ? str_replace('{status}', 'active', $html) : str_replace('{status}', '', $html) );
	}

}

if( !function_exists('generate_page') ) {
	
	function generate_page($title_page, $path_page, $user_type) {
		$ci =& get_instance();
		$data = array();

		$data_menu['path_page'] = $path_page;
		$data_menu['user_name'] = $ci->session->userdata('user_name');
		$data['menu'] = $ci->load->view('menu/V_Menu_' . $user_type, $data_menu, true);
		return $data;
	}

}