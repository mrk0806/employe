<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_sistem extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model', 'get_model');
		$this->load->model('akses_model');
		cek_aktif_login();
		cek_akses_user();
	}

	public function index()
	{
		$data['main_menu'] = main_menu();
		$data['sub_menu'] = sub_menu();

		$data['nama_menu'] = 'Konfigurasi';
		$data['nama_submenu'] = 'Menu Sistem';
		$data['data_user'] = get_user_data();

		$this->load->view('menu_v', $data);
	}

	private function generateSwitch($akses, $id)
	{
		$isChecked = ($akses == 1) ? 'checked' : '';

		return '
		<div class="custom-control custom-switch">
			<input type="checkbox" class="custom-control-input" id="' . $id . '" ' . $isChecked . ' disabled>
			<label class="custom-control-label" for="' . $id . '"></label>
		</div>';
	}

	public function get_list()
	{
		$get_alls = $this->get_model->get_data_all();
		$data = array();
		$no = 0;

		foreach ($get_alls as $get) {
			$no++;
			$row = array();
			$aktif = $this->generateSwitch($get->aktif, $get->kode_menu);

			$row[] = $no;
			$row[] = strtolower($get->kode_menu);
			$row[] = ucwords(strtolower($get->nama_menu));
			$row[] = ucwords(strtolower($get->level));
			$row[] = $aktif;
			$row[] = '
					<a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="edit(' . "'" . $get->kode_menu . "'" . ')">
						<i class="fas fa-pencil-alt"></i>
						Edit
					</a>
					<a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="hapus(' . "'" . $get->kode_menu . "'" . ')">
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
		$cek_akses = cek_akses_menu(__FUNCTION__);
		if ($cek_akses) {
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
			$cek = $this->get_model->cek_data($kode_menu);

			if ($cek) {
				echo json_encode(array("status" => FALSE, "message" => "Kode already exists"));
				return;
			}

			$data = get_post_data($fields);
			$data['tanggal'] = date('Y-m-d H:i:s');
			$data['user'] = $this->session->userdata('user_logged')['nik'];

			// var_dump($data);exit;
			// Start transaction
			$this->db->trans_begin();

			$insert = $this->get_model->save($data);

			if ($insert) {
				// Insert associated akses records
				$level_users = array('admin', 'karyawan');

				foreach ($level_users as $level) {
					$akses_data = array(
						'kode_menu' => $data['kode_menu'],
						'level_user' => $level,
						'akses' => 0,
						'add' => 0,
						'edit' => 0,
						'delete' => 0
					);

					$akses_inserted = $this->akses_model->save($akses_data);

					if (!$akses_inserted) {
						// Rollback transaction if any insert into 'akses' fails
						$this->db->trans_rollback();
						echo json_encode(array("status" => FALSE, "message" => "Failed to insert access data"));
						return;
					}
				}

				// Commit transaction if all inserts are successful
				$this->db->trans_commit();

				// Adding to log
				$log_url = base_url() . $this->router->fetch_class() . "/" . $this->router->fetch_method();
				$log_type = "ADD";
				$log_data = json_encode($data);
				log_helper($log_url, $log_type, $log_data);
				// End log

				echo json_encode(array("status" => TRUE, "message" => "Data successfully inserted"));
			} else {
				// Rollback transaction if insert into 'menu' fails
				$this->db->trans_rollback();
				echo json_encode(array("status" => FALSE, "message" => "Failed to insert data"));
			}
		} else {
			echo json_encode(array("status" => FALSE, "message" => "You don't have access"));
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

		$update = $this->get_model->update(array('kode_menu' => $this->input->post('kode')), $data);

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
		$cek_akses = cek_akses_menu(__FUNCTION__);
		if ($cek_akses) {
			// Mulai transaksi
			$this->db->trans_begin();

			// Mengambil data sebelum dihapus untuk keperluan log
			$data =  $this->get_model->get_data_by($id);

			// Menghapus dari tabel 'akses'
			$this->db->where('kode_menu', $id);
			$this->db->delete('akses');
			$akses_deleted = $this->db->affected_rows() > 0;

			if ($akses_deleted) {
				// Menghapus dari tabel 'menu'
				$delete = $this->get_model->delete($id);

				if ($delete) {
					// Commit transaksi jika semua penghapusan berhasil
					$this->db->trans_commit();

					// Menambahkan ke log
					$log_url = base_url() . $this->router->fetch_class() . "/" . $this->router->fetch_method();
					$log_type = "DELETE";
					$log_data = json_encode($data);
					log_helper($log_url, $log_type, $log_data);
					// Akhir log
					echo json_encode(array("status" => TRUE, "message" => "Data successfully deleted"));
				} else {
					// Rollback transaksi jika penghapusan dari 'menu' gagal
					$this->db->trans_rollback();
					echo json_encode(array("status" => FALSE, "message" => "Failed to deleted data"));
				}
			} else {
				// Rollback transaksi jika penghapusan dari 'akses' gagal
				$this->db->trans_rollback();
				echo json_encode(array("status" => FALSE, "message" => "Failed to deleted data entri akses"));
			}
		} else {
			echo json_encode(array("status" => FALSE, "message" => "You don't have access"));
		}
	}


	public function edit($id)
	{
		$cek_akses = cek_akses_menu(__FUNCTION__);
		if ($cek_akses) {

			$data = $this->get_model->get_data_by($id);
			$output = array(
				"status" => "success",
				"data" => $data
			);
			echo json_encode($output);
		} else {
			echo json_encode(array("status" => FALSE, "message" => "You don't have access"));
		}
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