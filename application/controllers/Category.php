<?php

class Category extends CI_Controller
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
        $data['category'] = $this->category_m->selectAll();
        $data['category_list'] = $this->category_m->category_list();

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
            'category_status' => $this->input->post('category_status')
        ];
        $this->db->update('categories', $input);

        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Category has been updated!
            </div>');
        redirect('category');
    }
}
