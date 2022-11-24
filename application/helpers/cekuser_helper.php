<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( !function_exists('isnt_admin') ) {
	
	function isnt_admin($callback) {
		$ci =& get_instance();
		if ( $ci->session->userdata('user_type') !== 'admin') {
			$callback();
		}
	}

}

if( !function_exists('isnt_pembina') ) {
	
	function isnt_adminbaak($callback) {
		$ci =& get_instance();
		if ( $ci->session->userdata('user_type') !== 'pembina') {
			$callback();
		}
	}

}

if( !function_exists('isnt_siswa') ) {
	
	function isnt_pegawai($callback) {
		$ci =& get_instance();
		if ( $ci->session->userdata('user_type') !== 'siswa') {
			$callback();
		}
	}

}
