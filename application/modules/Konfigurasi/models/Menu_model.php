<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    protected $table = 'menu'; //nama tabel
    protected $pk = 'kode_menu'; //primary key
    protected $columns = ['kode_menu, nama_menu, url, icon, main_menu, no_urut, level, aktif']; //nama field


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

    public function delete($pk)
    {
        $this->db->where($this->pk, $pk);
        $this->db->delete($this->table);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function get_data_all($columns = array())
    {
        $selects = (empty($columns)) ? $this->columns : $columns;
        $select = implode(',', $selects);

        return $this->db->select($select)
            ->order_by($this->pk, 'ASC')
            ->get($this->table)
            ->result();
    }

    public function get_data_by($pk)
    {
        return $this->db->get_where($this->table, array($this->pk => $pk))->row();
    }

    public function cek_data($pk)
    {
        $result = $this->db->get_where($this->table, array($this->pk => $pk))->row();
        return ($result) ? true : false;
    }
}