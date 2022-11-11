<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function index()
  {
    check_already_login();
    $this->load->view('login');
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($post['login'])) {
      $this->load->model('auth_m');
      $query = $this->auth_m->login($post);
      if ($query->num_rows() > 0) {
        $row = $query->row();
        $data = $this->auth_m->dataPengguna($row->nik);
        $params = array(
          'id' => $data->id,
          'nik' => $data->nik,
          'name' => $data->name,
          'department_id' => $data->department_id,
          'department_name' => $data->department_name,
          'department_code' => $data->department_code,
          'level' => $data->level
        );
        $this->session->set_userdata($params);
        redirect('dashboard');
      } else {
        $this->session->set_flashdata('message', '
                  <div class="alert alert-danger" role="alert">
                      Login failed! Please check your NIK and password.
                  </div>');
        redirect('auth');
      }
    }
  }

  public function register()
  {
    check_already_login();

    $this->form_validation->set_rules('nik', 'NIK', 'required|is_unique[users.nik]|numeric');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('department_id', 'Department', 'required');

    if ($this->form_validation->run() == false) {
      $data['departments'] = $this->db->where('department_status', '1')->order_by('department_name', 'ASC')->get('departments')->result();
      $this->load->view('register', $data);
    } else {
      $input = [
        'nik' => $this->input->post('nik'),
        'name' => $this->input->post('name'),
        'password' => $this->input->post('password'),
        'department_id' => $this->input->post('department_id'),
        'user_status' => 0,
        'level' => 'user'
      ];
      $this->db->insert('users', $input);

      $this->session->set_flashdata('message', '
                  <div class="alert alert-success" role="alert">
                      New User has been added! Please contact IT to activate your account.
                  </div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $params = array('nik');
    $this->session->unset_userdata($params);
    redirect('auth');
  }
}
