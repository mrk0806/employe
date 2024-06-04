<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_aktif_login();
		cek_akses_user();
	}

	public function index()
	{
		$data['main_menu'] = main_menu();
		$data['sub_menu'] = sub_menu();

		$data['nama_menu'] = 'Dashboard';
		$data['nama_submenu'] = 'Dashboard';
		
		$data['data_user']= get_user_data();
		
		$this->load->view('dashboard_v',$data);
	}
}