<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public $table = 'menu';
    public $table_2 = 'akses';
    public $level_user;

    public function __construct()
    {
        parent::__construct();
        $this->level_user = $this->session->userdata('user_logged')['level_user'];
    }

    public function main_menu()
    {
        $main_menu = $this->db->select('m.*, a.akses, a.tambah, a.edit, a.hapus')
            ->from('menu m')
            ->join('akses a', 'a.kode_menu = m.kode_menu', 'left')
            ->where(['a.level_user' => 'admin', 'm.aktif' => '1', 'm.level' => 'main_menu', 'm.nama_menu !='=>'dashboard'])
            ->get()->result_array();
        return $main_menu;
    }
   

 function sub_menu()
    {
        
        $sub_menu = $this->db->select('m.*, a.akses, a.tambah, a.edit, a.hapus')
            ->from('menu m')
            ->join('akses a', 'a.kode_menu = m.kode_menu', 'left')
            ->where(['a.level_user' => 'admin', 'm.aktif' => '1', 'm.level' => 'sub_menu'])
            ->order_by('m.no_urut','ASC')
            ->get()->result_array();
        return $sub_menu;
    }
}