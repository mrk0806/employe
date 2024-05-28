<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_karyawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_aktif_login();
	}

	public function index()
	{
		$data['main_menu'] = main_menu();
		$data['sub_menu'] = sub_menu();
		
        $data['nama_menu'] = 'Master Data';
        $data['nama_submenu'] = 'Data Karyawan';
		$data['data_user']= get_user_data();
		
		// $this->load->view('dashboard_v', $data);
		$this->load->view('templates/header');
		$this->load->view('templates/main-sidebar', $data);
		// $this->load->view('templates/content');
		$this->load->view('data_karyawan_v',$data);
		$this->load->view('templates/footer');
	}   
}