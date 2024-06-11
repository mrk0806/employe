<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_master extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Item_master_model', 'get_model');
		cek_aktif_login();
		cek_akses_user();
	}

	public function index()
	{
		$data['main_menu'] = main_menu();
		$data['sub_menu'] = sub_menu();

		$data['nama_menu'] = 'Master Data';
		$data['nama_submenu'] = 'Item Master';
		$data['data_user'] = get_user_data();

		$this->load->view('item_master_v', $data);
	}

	public function get_list()
	{
		$get_alls = $this->get_model->get_data_all();
		$data = array();
		$no = 0;

		foreach ($get_alls as $get) {
			$no++;
			$row = array();

			$row[] = $no;
			$row[] = $get->item_code;
			$row[] = $get->stock_code;
			$row[] = ucwords(strtolower($get->description));
			$row[] = $get->size;
			$row[] = $get->brand;
			$row[] = strtoupper($get->group);
			$row[] = $get->base_unit;
			$row[] = $get->inventory_onhand;
			$row[] = $get->retail_price;
			$row[] = $get->retail_tag;
			$row[] = '
					<a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="edit(' . "'" . $get->item_code . "'" . ')">
						<i class="fas fa-pencil-alt"></i>
						Edit
					</a>
					<a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="hapus(' . "'" . $get->item_code . "'" . ')">
						<i class="fas fa-trash-alt"></i>
						Delete
					</a>';
			$data[] = $row;
		}

		$output = array(
			"data" => $data,
		);

		echo json_encode($output);
	}

	public function add()
	{
		if (!cek_akses_menu(__FUNCTION__)) {
			echo json_encode(array("status" => FALSE, "message" => "You don't have access"));
			return;
		}
			$this->_validate();
			$item_code = $this->input->post('item_code');

			$fields = array(
				'item_code' => 'item_code',
				'stock_code' => 'stock_code',
				'description' => 'description',
				'size' => 'size',
				'brand' => 'brand',
				'group' => 'group',
				'base_unit' => 'base_unit',
				'inventory_onhand' => 'inventory_onhand',
				'retail_price' => 'retail_price',
				'retail_tag' => 'retail_tag',
			);

			$cek = $this->get_model->cek_data($item_code);

			if ($cek) {
				echo json_encode(array("status" => FALSE, "message" => "$item_code already exists"));
				return;
			}

			$data = get_post_data($fields);

			$insert = $this->get_model->save($data);

			// Adding to log
			$log_url = base_url() . $this->router->fetch_class() . "/" . $this->router->fetch_method();
			$log_type = "ADD";
			$log_data = json_encode($data);

			log_helper($log_url, $log_type, $log_data);
			// End log

			if ($insert) {
				echo json_encode(array("status" => TRUE, "message" => "Data successfully inserted"));
			} else {
				echo json_encode(array("status" => FALSE, "message" => "Failed to insert data"));
			}
	
	}

	public function update()
	{
		$this->_validate();

		$fields = array(
		
			'stock_code' => 'stock_code',
			'description' => 'description',
			'size' => 'size',
			'brand' => 'brand',
			'group' => 'group',
			'base_unit' => 'base_unit',
			'inventory_onhand' => 'inventory_onhand',
			'retail_price' => 'retail_price',
			'retail_tag' => 'retail_tag',
		);

		$data = get_post_data($fields);

		$update = $this->get_model->update(array('item_code' => $this->input->post('item_code')), $data);

		// Adding to log
		$log_url = base_url() . $this->router->fetch_class() . "/" . $this->router->fetch_method();
		$log_type = "UPDATE";
		$log_data = json_encode($data);

		log_helper($log_url, $log_type, $log_data);
		// End log

		if ($update) {
			echo json_encode(array("status" => TRUE, "message" => "Data successfully updated"));
		} else {
			echo json_encode(array("status" => FALSE, "message" => "Failed to update data"));
		}
	}

	public function delete($id)
	{
		if (!cek_akses_menu(__FUNCTION__)) {
			echo json_encode(array("status" => FALSE, "message" => "You don't have access"));
			return;
		}
			$data =  $this->get_model->get_data_by($id);
			$delete = $this->get_model->delete($id);

			// Adding to log
			$log_url = base_url() . $this->router->fetch_class() . "/" . $this->router->fetch_method();
			$log_type = "DELETE";
			$log_data = json_encode($data);

			log_helper($log_url, $log_type, $log_data);
			// End log

			if ($delete) {
				echo json_encode(array("status" => TRUE, "message" => "Data successfully deleted"));
			} else {
				echo json_encode(array("status" => FALSE, "message" => "Failed to deleted data"));
			}
	
	}


	public function edit($id)
	{
		if (!cek_akses_menu(__FUNCTION__)) {
			echo json_encode(array("status" => FALSE, "message" => "You don't have access"));
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
			'brand' => 'Brand is required',
			'group' => 'Group is required',
			'base_unit' => 'Base_unit Lahir is required',
			'retail_price' => 'Retail Price Masuk is required',
			'retail_tag' => 'Retail Tag is required'
		);

		validate_inputs($inputs);
	}
}