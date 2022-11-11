<?php

class Department extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    check_not_login();
    check_superuser();
    $this->load->model('category_m');
    $this->load->model('department_m');
  }

  function index()
  {
    $data['title'] = "Department Data - ARKA IT Library";
    $data['subtitle'] = "Department Data";
    $data['department'] = $this->department_m->selectAll();
    $data['category_list'] = $this->category_m->category_list();

    $this->load->view('layout/header', $data);
    $this->load->view('layout/navbar');
    $this->load->view('layout/sidebar', $data);
    $this->load->view('department/department', $data);
    $this->load->view('layout/footer', $data);
  }

  function add()
  {
    $input = [
      'department_name' => $this->input->post('department_name'),
      'department_code' => $this->input->post('department_code'),
      'department_status' => 1,
    ];
    $this->db->insert('departments', $input);

    $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                New Department has been added!
            </div>');
    redirect('department');
  }

  function delete($id)
  {
    $this->department_m->delete($id);
    $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    Department has been deleted!
                </div>');
    redirect('department');
  }

  function edit($id)
  {
    $this->db->where('id', $id);
    $input = [
      'department_name' => $this->input->post('department_name'),
      'department_code' => $this->input->post('department_code'),
      'department_status' => $this->input->post('department_status')
    ];
    $this->db->update('departments', $input);

    $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Department has been updated!
            </div>');
    redirect('department');
  }
}
