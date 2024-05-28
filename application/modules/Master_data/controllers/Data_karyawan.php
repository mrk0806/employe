<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_karyawan extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Data_karyawan_model', 'get_model');
		cek_aktif_login();
	}

	public function index()
	{
		$data['main_menu'] = main_menu();
		$data['sub_menu'] = sub_menu();

		$data['nama_menu'] = 'Master Data';
		$data['nama_submenu'] = 'Data Karyawan';
		$data['data_user'] = get_user_data();

		$this->load->view('data_karyawan_v', $data);
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
			$row[] = $get->nik;
			$row[] = ucwords(strtolower($get->nama_lengkap));
			$row[] = $get->tgl_lahir;
			$row[] = $get->tgl_masuk;
			$row[] = $get->tgl_keluar;
			$row[] = strtoupper($get->divisi);
			$row[] = '
					<a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="edit(' . "'" . $get->nik . "'" . ')">
						<i class="fas fa-pencil-alt"></i>
						Edit
					</a>
					<a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="hapus(' . "'" . $get->nik . "'" . ')">
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
		$this->_validate();
		$nik = $this->input->post('nik');

		$fields = array(
			'nik' => 'nik',
			'nama' => 'nama_lengkap',
			'tgl_lhr' => 'tgl_lahir',
			'tgl_msk' => 'tgl_masuk',
			'tgl_klr' => 'tgl_keluar',
			'divisi' => 'divisi',
		);

		$cek = $this->get_model->cek_data($nik);

		if ($cek) {
			echo json_encode(array("status" => FALSE, "message" => "$nik already exists"));
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
			'nama' => 'nama_lengkap',
			'tgl_lhr' => 'tgl_lahir',
			'tgl_msk' => 'tgl_masuk',
			'tgl_klr' => 'tgl_keluar',
			'divisi' => 'divisi',
		);

		$data = get_post_data($fields);

		$update = $this->get_model->update(array('nik' => $this->input->post('nik')), $data);

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
			'nik' => 'NIK is required',
			'nama' => 'Nama is required',
			'tgl_lhr' => 'Tanggal Lahir is required',
			'tgl_msk' => 'Tanggal Masuk is required',
			'divisi' => 'Divisi is required'
		);

		validate_inputs($inputs);
	}
}