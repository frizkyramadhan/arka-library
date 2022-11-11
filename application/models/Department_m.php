<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Department_m extends CI_Model
{

  function selectAll()
  {
    return $this->db->order_by('department_name', 'asc')->get('departments')->result();
  }

  function insert($data)
  {
    $this->db->insert('departments', $data);
  }

  function delete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('departments');
  }

  public function update($id)
  {
    $this->db->where('id', $id)->update('departments', $_POST);
  }

  function select($id)
  {
    return $this->db->get_where('departments', array('id' => $id))->row();
  }
}
