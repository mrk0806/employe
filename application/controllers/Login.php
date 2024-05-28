<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Menggunakan alias 'user' untuk 'User_model'
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        if($this->user->isLogin());
        $this->load->view('login_v');
    }

    public function out(){
        $this->session->sess_destroy();
        redirect('/');
    }

    public function auth()
    {
        $now = date('Y-m-d H:i:s');
        $nik = $this->input->post('nik', TRUE);
        $password = $this->input->post('password', TRUE);

        $cek = $this->user->check_user($nik);
        if ($cek > 0) {
            $user = $this->user->get_user_by_nik($nik);
            $salah_password = $user->salah_password;
            
            if ($user->blokir == '1') {
                echo json_encode(['success' => false, 'message' => 'User blocked, silahkan hubungi admin IT']);
                return;
            }

            if (password_verify($password, $user->password)) {
                $this->user->update_berhasil_login($nik, 0, $now);
                $this->session->set_userdata('user_logged', ['nik' => $user->nik, 'level_user' => $user->level_user]);
                echo json_encode(['success' => true, 'message' => 'Login successful']);
            } else {
                $batas_salah = 10;
                    $this->user->update_salah_password($nik, $salah_password + 1);
                    $sisa_kesempatan = $batas_salah - ($salah_password + 1);

                    if ($sisa_kesempatan == 0) {
                        $this->user->update_blokir_user($nik, '1');
                        echo json_encode(['success' => false, 'message' => 'User blocked']);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Incorrect password, sisa kesempatan ' . $sisa_kesempatan]);
                }
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'User not found']);
        }
    }
    
}