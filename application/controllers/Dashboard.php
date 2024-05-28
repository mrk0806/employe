<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model', 'user');
		$this->load->model('dashboard_model', 'dm');
		if ($this->user->isNotLogin());
	}

	public function index()
	{
		$data['main_menu'] = $this->dm->main_menu();
		$data['sub_menu'] = $this->dm->sub_menu();
		// foreach
				// var_dump(cek_akses_user());exit;
		// $this->load->view('dashboard_v', $data);
		$this->load->view('templates/header');
		$this->load->view('templates/main-sidebar', $data);
		// $this->load->view('templates/content');
		$this->load->view('dashboard_v');
		$this->load->view('templates/footer');
	}
}