<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akses_model extends CI_Model
{
    var $table = 'users';
    public function check_user($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->get($this->table)->num_rows();
    }

    public function get_user_by_nik($nik)
    {
        $this->db->select('nik, password, salah_password, blokir,level_user');
        $this->db->where('nik', $nik);
        return $this->db->get($this->table)->row();
    }

    public function update_salah_password($nik, $salah_password)
    {
        $this->db->set('salah_password', $salah_password);
        $this->db->where('nik', $nik);
        $this->db->update($this->table);
    }

    public function update_blokir_user($nik, $update)
    {
        $this->db->set('blokir', $update);
        $this->db->where('nik', $nik);
        $this->db->update($this->table);
    }

    public function update_berhasil_login($nik, $salah_password, $timestamp)
    {
        $this->db->set('salah_password', $salah_password);
        $this->db->set('last_login', $timestamp);
        $this->db->where('nik', $nik);
        $this->db->update($this->table);
    }

}