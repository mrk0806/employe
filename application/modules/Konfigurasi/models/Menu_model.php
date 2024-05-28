<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    var $table = 'menu';

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function delete($kode)
    {
        $this->db->where('kode_menu', $kode);
        $this->db->delete($this->table);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_menu()
    {
        return $this->db->select('kode_menu, nama_menu, url, icon, main_menu, no_urut, level, aktif')
            ->order_by('no_urut', 'ASC')
            ->get($this->table)
            ->result();
    }

    public function get_menu_bykode($kode)
    {
        return $this->db->get_where($this->table, array('kode_menu' => $kode))->row();
    }

    public function cek_kode_menu($kode)
    {
        $result = $this->db->get_where($this->table, array('kode_menu' => $kode))->row();
        return ($result) ? true : false;
    }
}