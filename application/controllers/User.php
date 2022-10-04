<?php

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('category_m');
        $this->load->model('user_m');
    }

    function index()
    {
        $data['title'] = "User Data - ARKA IT Library";
        $data['subtitle'] = "User Data";
        $data['user'] = $this->user_m->selectAll();
        $data['category_list'] = $this->category_m->category_list();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar', $data);
        $this->load->view('user/user', $data);
        $this->load->view('layout/footer');
    }

    function add()
    {
        $input = [
            'nik' => $this->input->post('nik'),
            'name' => $this->input->post('name'),
            'password' => $this->input->post('password'),
            'user_status' => 1,
            'level' => 'user'
        ];
        $this->db->insert('users', $input);

        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                New User has been added!
            </div>');
        redirect('user');
    }

    function delete($id)
    {
        $this->user_m->delete($id);
        $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    User has been deleted!
                </div>');
        redirect('user');
    }

    function edit($id)
    {
        $this->db->where('id', $id);
        $input = [
            'nik' => $this->input->post('nik'),
            'name' => $this->input->post('name'),
            'password' => $this->input->post('password'),
            'user_status' => $this->input->post('user_status'),
            'level' => $this->input->post('level')
        ];
        $this->db->update('users', $input);

        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                User has been updated!
            </div>');
        redirect('user');
    }
}
