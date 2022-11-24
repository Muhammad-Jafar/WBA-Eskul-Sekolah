<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
		$this->dashboard_model = $this->Dashboard_model;

		isnt_login(function () {
			redirect('auth/login');
		});
	}

	public function index()
	{
		$this->template->load('template', 'dashboard');
	}
}
