<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Category_m extends CI_Model
{

    function selectAll()
    {
        return $this->db
            ->select('categories.*, departments.id as department_id, departments.department_name')
            ->join('departments', 'categories.department_id = departments.id', 'left')
            ->order_by('category_name', 'asc')->get('categories')->result();
    }

    function selectAllByDept($dept_id)
    {
        return $this->db
            ->select('categories.*, departments.id as department_id, departments.department_name')
            ->join('departments', 'categories.department_id = departments.id', 'left')
            ->where('department_id', $dept_id)
            ->order_by('category_name', 'asc')->get('categories')->result();
    }

    function category_list()
    {
        // get department code from session
        $dept_id = $this->session->userdata('department_id');

        return $this->db
            ->where('category_status', 1)
            ->where('department_id', $dept_id)
            ->order_by('category_name', 'asc')
            ->get('categories')->result();
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

    function select($id)
    {
        return $this->db->get_where('categories', array('id' => $id))->row();
    }

    function selectSlug($slug)
    {
        $dept_id = $this->session->userdata('department_id');
        return $this->db->get_where('categories', array('slug' => $slug, 'department_id' => $dept_id))->row();
    }

    function selectSubcategory($id)
    {
        $dept_id = $this->session->userdata('department_id');
        return $this->db
            ->select('subcategories.*, categories.category_name, categories.slug')
            ->join('categories', 'subcategories.category_id = categories.id', 'left')
            ->where('subcategories.id', $id)->where('categories.department_id', $dept_id)
            ->get('subcategories')->row();
    }

    function getSubCatById($category_id)
    {
        return $this->db
            ->select('subcategories.*, categories.id as category_id, categories.category_name')
            ->join('categories', 'subcategories.category_id = categories.id', 'left')
            ->where('categories.id', $category_id)
            ->order_by('subcategory_name', 'asc')->get('subcategories')->result();
    }

    function getSubCatBySlug($slug)
    {
        $dept_id = $this->session->userdata('department_id');

        return $this->db
            ->select('subcategories.*, categories.id as category_id, categories.category_name')
            ->join('categories', 'subcategories.category_id = categories.id', 'left')
            ->where('department_id', $dept_id)
            ->where('categories.slug', $slug)
            ->where('subcategory_status', 1)
            ->order_by('subcategory_name', 'asc')->get('subcategories')->result();
    }

    function delete_subcategory($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('subcategories');
    }
}
