<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller {
   function __construct() {
		parent::__construct();
      
		isnt_login(function () {
			redirect('auth/login');
		});
	}

   public function index() {
      $this->template->load('template', 'profile');
   }
}