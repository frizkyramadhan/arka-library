<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Category_m extends CI_Model
{

    function selectAll()
    {
        return $this->db->order_by('category_name', 'asc')->get('categories')->result();
    }

    function category_list()
    {
        return $this->db->where('category_status', 1)->order_by('category_name', 'asc')->get('categories')->result();
    }

    function insert($data)
    {
        $this->db->insert('categories', $data);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('categories');
    }

    public function update($id)
    {
        $this->db->where('id', $id)->update('categories', $_POST);
    }

    function select($slug)
    {
        return $this->db->get_where('categories', array('slug' => $slug))->row();
    }
}
