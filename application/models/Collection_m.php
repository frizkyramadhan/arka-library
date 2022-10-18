<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Collection_m extends CI_Model
{

    function selectAll()
    {
        return $this->db
            ->select('collections.*, categories.category_name, categories.slug, users.name, types.type_name')
            ->join('categories', 'collections.category_id = categories.id', 'left')
            ->join('users', 'collections.user_id = users.id', 'left')
            ->join('types', 'collections.type_id = types.id', 'left')
            ->order_by('category_name', 'asc')
            ->order_by('collection_date', 'desc')
            ->get('collections')->result();
    }

    function selectAllBySlug($slug, $limit = null, $start = null)
    {
        $post = $this->session->userdata('archive');
        $this->db->select('collections.*, categories.category_name, categories.slug');
        $this->db->join('categories', 'collections.category_id = categories.id', 'left');
        $this->db->join('types', 'collections.type_id = types.id', 'left');
        // $this->db->join('attachments', 'attachments.collection_id = collections.id', 'inner');
        $this->db->where('slug', $slug);
        $this->db->where('collection_status', 1);
        // if (!empty($post['unit_type'])) {
        //     if ($post['unit_type'] == 'null') {
        //         $this->db->where("collections.unit_type_id IS NULL");
        //     } else {
        //         $this->db->where("collections.unit_type_id", $post['unit_type']);
        //     }
        // }
        if (!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("collection_date BETWEEN '$post[date1]' AND '$post[date2]'");
        }
        if (!empty($post['collection_name'])) {
            $this->db->like("collections.collection_name", $post['collection_name']);
        }
        // if (!empty($post['collection_file'])) {
        //     $this->db->like("attachments.collection_file", $post['collection_file']);
        // }
        $this->db->limit($limit, $start);
        $this->db->order_by('collection_date', 'desc');
        $collection = $this->db->get('collections');
        return $collection;
    }

    // function insert($data)
    // {
    //     $this->db->insert('collection_type', $data);
    // }

    // function delete($id)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->delete('collection_type');
    // }

    // public function update($id)
    // {
    //     $this->db->where('id', $id)->update('collection_type', $_POST);
    // }

    // function select($id)
    // {
    //     return $this->db->get_where('collection_type', array('id' => $id))->row();
    // }

    // public function get_collection_type($id = null)
    // {
    //     $this->db->from('collection_type');
    //     $this->db->order_by('collection_type', 'ASC');
    //     $this->db->where('collection_type_status', 1);
    //     if ($id != null) {
    //         $this->db->where('id', $id);
    //     }
    //     $query = $this->db->get();
    //     return $query;
    // }

    // public function get_unit_type($id = null)
    // {
    //     $this->db->from('unit_type');
    //     $this->db->order_by('unit_type', 'ASC');
    //     $this->db->where('unit_type_status', 1);
    //     if ($id != null) {
    //         $this->db->where('id', $id);
    //     }
    //     $query = $this->db->get();
    //     return $query;
    // }

    public function get_collection_by_category()
    {
        return $this->db->query("select categories.id, category_name,(select count(id) from collections where collections.category_id = categories.id) as count from categories order by count desc")->result();
    }
}
