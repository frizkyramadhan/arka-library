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
            ->select('collections.*, categories.category_name, categories.slug, users.name')
            ->join('categories', 'collections.category_id = categories.id', 'left')
            ->join('users', 'collections.user_id = users.id', 'left')
            ->order_by('category_name', 'asc')
            ->order_by('collection_date', 'desc')
            ->get('collections')->result();
    }

    function getCollectionBySubCat($subcategory_id, $limit = null, $start = null)
    {
        $post = $this->session->userdata('archive');
        $this->db->select('collections.*, categories.category_name, categories.slug, users.name, departments.department_code, users.name');
        $this->db->join('subcategories', 'collections.subcategory_id = subcategories.id', 'left');
        $this->db->join('categories', 'subcategories.category_id = categories.id', 'left');
        $this->db->join('users', 'collections.user_id = users.id', 'left');
        $this->db->join('departments', 'collections.department_id = departments.id', 'left');
        $this->db->where('collections.subcategory_id', $subcategory_id);
        if (!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("collection_date BETWEEN '$post[date1]' AND '$post[date2]'");
        }
        if (!empty($post['collection_name'])) {
            $this->db->like("collections.collection_name", $post['collection_name']);
        }
        if (!empty($post['name'])) {
            $this->db->like("users.name", $post['name']);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('collections.id', 'desc');
        $collection = $this->db->get('collections');
        return $collection;
    }

    function selectAllBySlug($slug, $limit = null, $start = null)
    {
        $post = $this->session->userdata('archive');
        $this->db->select('collections.*, categories.category_name, categories.slug');
        $this->db->join('categories', 'collections.category_id = categories.id', 'left');
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
        if (!empty($post['name'])) {
            $this->db->like("users.name", $post['name']);
        }
        // if (!empty($post['collection_file'])) {
        //     $this->db->like("attachments.collection_file", $post['collection_file']);
        // }
        $this->db->limit($limit, $start);
        $this->db->order_by('collection_date', 'desc');
        $collection = $this->db->get('collections');
        return $collection;
    }

    function searchDoc($st = NULL)
    {
        $dept_id = $this->session->userdata('department_id');

        if ($st == "NIL") $st = "";
        $sql = "SELECT *, c.id as collection_id  
        FROM collections c
        LEFT JOIN subcategories sc ON c.subcategory_id = sc.id
        LEFT JOIN categories ct ON sc.category_id = ct.id
        WHERE c.collection_name LIKE '%$st%' AND c.department_id = $dept_id
        ORDER BY c.collection_name ASC";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function get_doc($limit, $start, $st = NULL)
    {
        $dept_id = $this->session->userdata('department_id');

        if ($st == "NIL") $st = "";
        $sql = "SELECT *, c.id as collection_id
        FROM collections c
        LEFT JOIN subcategories sc ON c.subcategory_id = sc.id
        LEFT JOIN categories ct ON sc.category_id = ct.id
        LEFT JOIN departments d ON c.department_id = d.id
        WHERE c.collection_name LIKE '%$st%' AND c.department_id = $dept_id
        ORDER BY c.collection_name ASC
        LIMIT " . $start . ", " . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_recent()
    {
        $dept_id = $this->session->userdata('department_id');

        $query = $this->db->query("SELECT *
        FROM attachments
        INNER JOIN collections ON attachments.collection_id = collections.id
        INNER JOIN subcategories ON collections.subcategory_id = subcategories.id
        INNER JOIN categories ON subcategories.category_id = categories.id
        INNER JOIN departments ON collections.department_id = departments.id
        WHERE collections.department_id = $dept_id
        AND DATEDIFF(CURDATE(), upload_date) < 7
        ORDER BY attachments.id DESC
        LIMIT 10");
        return $query->result();
    }

    function get_sitemap()
    {
        $dept_id = $this->session->userdata('department_id');

        $query = $this->db->query("SELECT *
        FROM attachments
        INNER JOIN collections ON attachments.collection_id = collections.id
        INNER JOIN subcategories ON collections.subcategory_id = subcategories.id
        INNER JOIN categories ON subcategories.category_id = categories.id
        INNER JOIN departments ON collections.department_id = departments.id
        WHERE collections.department_id = $dept_id
        ORDER BY categories.category_name ASC, subcategories.subcategory_name ASC, collections.collection_name ASC");
        return $query->result();
    }

    function get_sitemap_category()
    {
        $dept_id = $this->session->userdata('department_id');

        $query = $this->db->query("SELECT *
        FROM categories
        WHERE department_id = $dept_id
        ORDER BY categories.category_name ASC");
        return $query->result();
    }

    function chart_collection()
    {
        $dept_id = $this->session->userdata('department_id');

        $query = $this->db->query("SELECT 
        categories.id, categories.category_name, subcategories.subcategory_name, COUNT(attachments.id) as count
        FROM attachments
        INNER JOIN collections ON attachments.collection_id = collections.id
        INNER JOIN subcategories ON collections.subcategory_id = subcategories.id
        INNER JOIN categories ON subcategories.category_id = categories.id
        WHERE collections.department_id = $dept_id
        GROUP BY categories.id, categories.category_name, subcategories.subcategory_name
        ORDER BY count DESC");

        return $query->result();
    }

    function chart_total_files()
    {
        $query = $this->db->query("SELECT 
        d.id, d.department_name, d.department_code, 
        (SELECT COUNT(attachments.id) FROM attachments JOIN collections ON attachments.collection_id = collections.id WHERE collections.department_id = d.id) AS count
        FROM departments d
        GROUP BY d.id, d.department_name, d.department_code
        ORDER BY d.department_name ASC");

        return $query->result();
    }

    public function get_collection_by_category()
    {
        return $this->db->query("select subcategories.id, subcategory_name,(select count(id) from collections where collections.subcategory_id = subcategories.id) as count from subcategories order by count desc")->result();
    }

    function total_files_per_user()
    {
        $dept_id = $this->session->userdata('department_id');

        $query = $this->db->query("SELECT 
        u.id, u.name, 
        (SELECT COUNT(attachments.id) FROM attachments JOIN collections ON attachments.collection_id = collections.id WHERE attachments.upload_by = u.id) AS count
        FROM users u
        WHERE u.department_id = $dept_id
        GROUP BY u.id, u.name
        ORDER BY u.name ASC");

        return $query->result();
    }

    function getAttachmentByUser($user_id, $limit = null, $start = null)
    {
        $post = $this->session->userdata('archive');
        $this->db->select('attachments.*, collections.collection_name, collections.subcategory_id, subcategories.subcategory_name, categories.category_name, categories.slug, users.name, departments.department_code, users.name');
        $this->db->join('collections', 'attachments.collection_id = collections.id', 'left');
        $this->db->join('subcategories', 'collections.subcategory_id = subcategories.id', 'left');
        $this->db->join('categories', 'subcategories.category_id = categories.id', 'left');
        $this->db->join('users', 'collections.user_id = users.id', 'left');
        $this->db->join('departments', 'collections.department_id = departments.id', 'left');
        $this->db->where('attachments.upload_by', $user_id);
        if (!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("upload_date BETWEEN '$post[date1]' AND '$post[date2]'");
        }
        if (!empty($post['collection_file'])) {
            $this->db->like("collection_file", $post['collection_file']);
        }
        if (!empty($post['collection_name'])) {
            $this->db->like("collection_name", $post['collection_name']);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('attachments.id', 'desc');
        $attachments = $this->db->get('attachments');
        return $attachments;
    }
}
