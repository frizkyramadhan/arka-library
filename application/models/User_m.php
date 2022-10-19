<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class User_m extends CI_Model
{

    function selectAll()
    {
        return $this->db
            ->select('users.*, departments.department_name')
            ->join('departments', 'users.department_id = departments.id', 'left')
            ->order_by('nik', 'asc')->get('users')->result();
    }

    function insert($data)
    {
        $this->db->insert('users', $data);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    public function update($id)
    {
        $this->db->where('id', $id)->update('users', $_POST);
    }

    function select($id)
    {
        return $this->db->get_where('users', array('id' => $id))->row();
    }
}
