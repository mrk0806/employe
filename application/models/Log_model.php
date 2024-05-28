<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_model extends CI_Model
{

  protected $table = 'logs';

  public function save_log($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }
}