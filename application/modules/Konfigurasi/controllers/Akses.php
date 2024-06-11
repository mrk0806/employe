<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akses extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Akses_model', 'get_model');
		cek_aktif_login();
		cek_akses_user();
	}

	public function index()
	{
		$data['main_menu'] = main_menu();
		$data['sub_menu'] = sub_menu();

		$data['nama_menu'] = 'Konfigurasi';
		$data['nama_submenu'] = 'Akses';
		
		$data['data_user'] = get_user_data();

		$this->load->view('akses_v', $data);
	}

	public function get_list_all()
	{
		$get_alls = $this->get_model->get_data_all();
		$data = array();
		$no = 0;

		foreach ($get_alls as $get) {
			$no++;
			$row = array();

			$row[] = $no;
			$row[] = ucwords(strtolower($get->level_user));
			$row[] = '
					<a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="edit(' . "'" . $get->level_user . "'" . ')">
						<i class="fas fa-pencil-alt"></i>
						Edit Akses
					</a>
					';
			$data[] = $row;
		}

		$output = array(
			"data" => $data,
		);

		echo json_encode($output);
	}

	public function get_list()
	{
		$columns = ['level_user'];
		$group_by_column = 'level_user';
		$get_alls = $this->get_model->get_data_all_group($columns, $group_by_column);
		$data = array();
		$no = 0;

		foreach ($get_alls as $get) {
			$no++;
			$row = array();

			$row[] = $no;
			$row[] = ucwords(strtolower($get->level_user));
			$row[] = '
					<a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="edit(' . "'" . $get->level_user . "'" . ')">
						<i class="fas fa-pencil-alt"></i>
						Edit Akses
					</a>
					';
			$data[] = $row;
		}

		$output = array(
			"data" => $data,
		);

		echo json_encode($output);
	}


	private function generateSwitch($akses, $id)
	{
		$isChecked = ($akses == 1) ? 'checked' : '';
		$initial = "'$id'";
		return '
		<div class="custom-control custom-switch">
			<input type="checkbox" class="custom-control-input" onclick="update(' . $initial . ', this.checked)" data-id="'.$initial.'" id="' . $id . '" ' . $isChecked . ' >
			<label class="custom-control-label" for="' . $id . '"></label>
		</div>';
	}

	public function edit()
	{
		if (!cek_akses_menu(__FUNCTION__)) {
			echo json_encode(array("status" => FALSE, "message" => "You don't have access"));
			return;
		}
		
		$data = array($this->input->post('inisial') => $this->input->post('status'));
		$update = $this->get_model->update(array('id' => $this->input->post('id')), $data);
		
		$data['id'] = $this->input->post('id');
		log_helper(base_url() . $this->router->fetch_class() . "/" . $this->router->fetch_method(), "UPDATE", json_encode($data));
		
		echo json_encode(array("status" => $update ? TRUE : FALSE, "message" => $update ? "Data berhasil diperbarui" : "Gagal memperbarui data"));
	}


	public function edit_akses($id)
	{
		$get_alls = $this->get_model->get_data_all_by(null, $id);
		$data = array();
		$no = 0;

		foreach ($get_alls as $get) {
			$no++;
			$row = array();
			$akses 	=  $this->generateSwitch($get->akses, $get->id . "|akses");
			$tambah = ($get->level == 'main_menu') ? '' : $this->generateSwitch($get->add, $get->id . "|add");
			$edit 	= ($get->level == 'main_menu') ? '' :  $this->generateSwitch($get->edit, $get->id . "|edit");
			$hapus 	= ($get->level == 'main_menu') ? '' :  $this->generateSwitch($get->delete, $get->id . "|delete");

			$row[] = $no;
			$row[] = strtolower($get->kode_menu);
			$row[] = ucwords(strtolower($get->nama_menu));
			$row[] = ucwords(strtolower($get->level_user));
			$row[] = $akses;
			$row[] = $tambah;
			$row[] = $edit;
			$row[] = $hapus;
			$data[] = $row;
		}

		$output = array(
			"data" => $data,
		);

		echo json_encode($output);
	}
}