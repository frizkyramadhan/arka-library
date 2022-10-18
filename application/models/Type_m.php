<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Type_m extends CI_Model
{

  function selectAll()
  {
    return $this->db->order_by('type_name', 'asc')->get('types')->result();
  }

  function insert($data)
  {
    $this->db->insert('types', $data);
  }

  function delete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('types');
  }

  public function update($id)
  {
    $this->db->where('id', $id)->update('types', $_POST);
  }

  function select($id)
  {
    return $this->db->get_where('types', array('id' => $id))->row();
  }
}
