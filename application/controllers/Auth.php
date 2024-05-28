<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index(){
        echo "test";
    }
    public function out(){
        $this->session->sess_destroy();
        redirect('/');
    }
    public function access_denied(){
        $this->load->view('access_denied_v');
    }
}