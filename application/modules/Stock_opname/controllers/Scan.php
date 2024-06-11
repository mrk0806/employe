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
	{
		if (!cek_akses_menu(__FUNCTION__)) {
			echo json_encode(array("status" => FALSE, "message" => "You don't have access"));
			return;
		}

		$cek = $this->get_model->cek_data($id);

			if (!$cek) {
				echo json_encode(array("status" => FALSE, "message" => "$id tidak ada diitem master"));
				return;
			}

			$data = $this->get_model->get_data_by($id);
			$output = array(
				"status" => "success",
				"data" => $data
			);

			echo json_encode($output);
	}

	private function _validate()
	{
		$inputs = array(
			'item_code' => 'Item Code is required',
			'stock_code' => 'Stock Code is required',
			'description' => 'Description Lahir is required',
			'size' => 'Size Masuk is required',
			'inventory_onhand' => 'Stock Sistem Masuk is required',
			'stock_fisik' => 'Stock Fisik Masuk is required',
			// 'brand' => 'Brand is required',
			// 'group' => 'Group is required',
			// 'base_unit' => 'Base_unit Lahir is required',
			// 'retail_price' => 'Retail Price Masuk is required',
			// 'retail_tag' => 'Retail Tag is required'
		);

		validate_inputs($inputs);
	}

}