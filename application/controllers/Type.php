<?php

class Type extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    check_not_login();
    check_superuser();
    $this->load->model('type_m');
    $this->load->model('category_m');
  }

  function index()
  {
    $data['title'] = "Type Data - ARKA IT Library";
    $data['subtitle'] = "Type Data";
    $data['type'] = $this->type_m->selectAll();
    $data['category_list'] = $this->category_m->category_list();

    $this->load->view('layout/header', $data);
    $this->load->view('layout/navbar');
    $this->load->view('layout/sidebar', $data);
    $this->load->view('type/type', $data);
    $this->load->view('layout/footer', $data);
  }

  function add()
  {
    $input = [
      'type_name' => $this->input->post('type_name'),
      'type_status' => 1,
    ];
    $this->db->insert('types', $input);

    $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                New Type has been added!
            </div>');
    redirect('type');
  }

  function addFromCollection()
  {
    $input = [
      'type_name' => $this->input->post('type_name'),
      'type_status' => 1,
    ];
    $this->db->insert('types', $input);

    $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                New Type has been added!
            </div>');
    redirect('collection/add');
  }

  function delete($id)
  {
    $this->type_m->delete($id);
    $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    Type has been deleted!
                </div>');
    redirect('type');
  }

  function edit($id)
  {
    $this->db->where('id', $id);
    $input = [
      'type_name' => $this->input->post('type_name'),
      'type_status' => $this->input->post('type_status')
    ];
    $this->db->update('types', $input);

    $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Type has been updated!
            </div>');
    redirect('type');
  }
}
