<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_sistem extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model', 'mm');
		cek_aktif_login();
	}

	public function index()
	{
		$data['main_menu'] = main_menu();
		$data['sub_menu'] = sub_menu();

		$data['nama_menu'] = 'Konfigurasi';
		$data['nama_submenu'] = 'Menu Sistem';
		$data['data_user'] = get_user_data();

		$this->load->view('menu_v', $data);
		// $this->load->view('templates/header');
		// $this->load->view('templates/main-sidebar', $data);
		// $this->load->view('menu_sistem_v',$data);
		// $this->load->view('templates/footer');
	}

	public function get_list()
	{
		$menus = $this->mm->get_menu();
		$data = array();
		$no = 0;

		foreach ($menus as $menu) {
			$no++;
			$row = array();
			$no_urut = $menu->no_urut;

			$aktif = ($menu->aktif == 1) ? '<div class="custom-control custom-switch">
			<input type="checkbox" class="custom-control-input" id="' . $no_urut . '" checked disabled>
			<label class="custom-control-label" for="' . $no_urut . '"></label>
			</div>' : '<div class="custom-control custom-switch">
			<input type="checkbox" class="custom-control-input" id="' . $no_urut . '" disabled>
			<label class="custom-control-label" for="' . $no_urut . '"></label>
			</div>';

			$row[] = $no;
			$row[] = $menu->kode_menu;
			$row[] = $menu->nama_menu;
			$row[] = $menu->level;
			$row[] = $aktif;
			$row[] = '
					<a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="edit(' . "'" . $menu->kode_menu . "'" . ')">
						<i class="fas fa-pencil-alt"></i>
						Edit
					</a>
					<a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="hapus(' . "'" . $menu->kode_menu . "'" . ')">
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
		$kode_menu = $this->input->post('kode');

		$fields = array(
			'kode' => 'kode_menu',
			'nama' => 'nama_menu',
			'url' => 'url',
			'icon' => 'icon',
			'level' => 'level',
			'mainmenu' => 'main_menu',
			'nourut' => 'no_urut',
			'status' => 'aktif',
		);
		$cek = $this->mm->cek_kode_menu($kode_menu);

		if ($cek) {
			echo json_encode(array("status" => FALSE, "message" => "Kode already exists"));
			return;
		}

		$data = get_post_data($fields);
		$data['tanggal'] = date('Y-m-d H:i:s');

		$insert = $this->mm->save($data);

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
			'nama' => 'nama_menu',
			'url' => 'url',
			'icon' => 'icon',
			'level' => 'level',
			'mainmenu' => 'main_menu',
			'nourut' => 'no_urut',
			'status' => 'aktif',
		);

		$data = get_post_data($fields);
		$data['tanggal'] = date('Y-m-d H:i:s');

		$update = $this->mm->update(array('kode_menu' => $this->input->post('kode')), $data);

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
		$data =  $this->mm->get_menu_bykode($id);
		$delete = $this->mm->delete($id);

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
		$menu = $this->mm->get_menu_bykode($id);
		$output = array(
			"status" => "success",
			"data" => $menu
		);

		echo json_encode($output);
	}

	private function _validate()
	{
		$inputs = array(
			'kode' => 'Kode is required',
			'nama' => 'Nama is required',
			'url' => 'URL is required',
			'level' => 'Level is required',
			'nourut' => 'No Urut is required'
		);

		validate_inputs($inputs);
	}
}