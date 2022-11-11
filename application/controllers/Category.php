<?php

class Category extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_superuser();
        $this->load->model('category_m');
    }

    function index()
    {
        $data['title'] = "Category Data - ARKA IT Library";
        $data['subtitle'] = "Category Data";
        $data['category_list'] = $this->category_m->category_list();
        $data['departments'] = $this->db->where('department_status', '1')->order_by('department_name', 'ASC')->get('departments')->result();

        if ($this->getSession()->level == 'admin') {
            $data['category'] = $this->category_m->selectAll();
        } else {
            $data['category'] = $this->category_m->selectAllByDept($this->getSession()->department_id);
        }

        $data['getSession'] = $this->getSession();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar', $data);
        $this->load->view('category/category', $data);
        $this->load->view('layout/footer', $data);
    }

    function add()
    {
        $input = [
            'category_name' => $this->input->post('category_name'),
            'slug' => $this->input->post('slug'),
            'department_id' => $this->input->post('department_id'),
            'category_status' => 1,
        ];
        $this->db->insert('categories', $input);

        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                New Category has been added!
            </div>');
        redirect('category');
    }

    function addFromCollection()
    {
        $input = [
            'category_name' => $this->input->post('category_name'),
            'slug' => $this->input->post('slug'),
            'department_id' => $this->input->post('department_id'),
            'category_status' => 1,
        ];
        $this->db->insert('categories', $input);

        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                New Category has been added!
            </div>');
        redirect('collection/add');
    }

    function delete($id)
    {
        $this->category_m->delete($id);
        $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    Category has been deleted!
                </div>');
        redirect('category');
    }

    function edit($id)
    {
        $this->db->where('id', $id);
        $input = [
            'category_name' => $this->input->post('category_name'),
            'slug' => $this->input->post('slug'),
            'department_id' => $this->input->post('department_id'),
            'category_status' => $this->input->post('category_status')
        ];
        $this->db->update('categories', $input);

        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Category has been updated!
            </div>');
        redirect('category');
    }

    function subcategory($id)
    {
        $data['title'] = "SubCategory Data - ARKA IT Library";
        $data['subtitle'] = "SubCategory Data";
        $data['category'] = $this->category_m->select($id);
        $data['category_list'] = $this->category_m->category_list();
        $data['subcategory'] = $this->category_m->getSubCatById($id);
        $data['departments'] = $this->db->where('department_status', '1')->order_by('department_name', 'ASC')->get('departments')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar', $data);
        $this->load->view('category/subcategory', $data);
        $this->load->view('layout/footer', $data);
    }

    function add_subcategory($category_id)
    {
        $input = [
            'id' => $this->uuid->v4(),
            'subcategory_name' => $this->input->post('subcategory_name'),
            'category_id' => $category_id,
            'subcategory_status' => 1,
        ];
        $this->db->insert('subcategories', $input);

        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                New SubCategory has been added!
            </div>');
        redirect('category/subcategory/' . $category_id);
    }

    function add_subcategory_from_collection($slug, $category_id)
    {
        $input = [
            'id' => $this->uuid->v4(),
            'subcategory_name' => $this->input->post('subcategory_name'),
            'category_id' => $category_id,
            'subcategory_status' => 1,
        ];
        $this->db->insert('subcategories', $input);

        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                New SubCategory has been added!
            </div>');
        redirect('collection/' . $slug);
    }

    function delete_subcategory($category_id, $id)
    {
        $this->category_m->delete_subcategory($id);
        $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    SubCategory has been deleted!
                </div>');
        redirect('category/subcategory/' . $category_id);
    }

    function edit_subcategory($category_id, $id)
    {
        $this->db->where('id', $id);
        $input = [
            'subcategory_name' => $this->input->post('subcategory_name'),
            'subcategory_status' => $this->input->post('subcategory_status'),
            'category_id' => $category_id
        ];
        $this->db->update('subcategories', $input);

        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                SubCategory has been updated!
            </div>');
        redirect('category/subcategory/' . $category_id);
    }
}
