<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scan extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Scan_model', 'get_model');
		cek_aktif_login();
		cek_akses_user();
	}

	public function index()
	{
		$data['main_menu'] = main_menu();
		$data['sub_menu'] = sub_menu();

		$data['nama_menu'] = 'Stock Opname';
		$data['nama_submenu'] = 'Scan';
		$data['data_user'] = get_user_data();

		$this->load->view('Scan_v', $data);
	}

	public function get_list()
	{}

	public function add()
	{}

	public function update()
	{}

	public function delete($id)
	{}


	public function edit($id)
	{}

	private function _validate()
	{
		$inputs = array(
			'nik' => 'NIK is required',
			'nama' => 'Nama is required',
			'tgl_lhr' => 'Tanggal Lahir is required',
			'tgl_msk' => 'Tanggal Masuk is required',
			'divisi' => 'Divisi is required'
		);

		validate_inputs($inputs);
	}
}