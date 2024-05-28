<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
        public function isLogin()
    {
        if ($this->session->userdata('user_logged')) {
            redirect('dashboard');
        }
    }
    public function isNotLogin()
    {
        if (!$this->session->userdata('user_logged')) {
            redirect('/');
        }
    }
}