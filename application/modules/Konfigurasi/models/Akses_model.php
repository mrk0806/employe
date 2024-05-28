<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akses_model extends CI_Model
{
  protected $table = 'akses'; //nama tabel
  protected $pk = 'id'; //primary key
  protected $pk2 = 'level_user'; //primary key 2
  protected $columns = ['kode_menu, level_user, akses, tambah, edit, hapus, id']; //nama field


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
    return ($this->db->affected_rows() > 0) ? true : false;
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

  public function get_data_all_group($columns, $group_by_column)
  {
    $selects = (empty($columns)) ? $this->columns : $columns;
    $select = implode(',', $selects);

    return $this->db->select($select)
      ->group_by($group_by_column)
      ->get($this->table)
      ->result();
  }

  public function get_data_all_by($columns = array(), $where)
  {
    $selects = (empty($columns)) ? $this->columns : $columns;
    $select = implode(',', $selects);

    return $this->db->select($select)
      ->order_by($this->pk, 'ASC')
      ->get_where($this->table, array($this->pk2 => $where))
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