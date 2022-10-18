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
          'level' => $data->level
        );
        $this->session->set_userdata($params);
        redirect('dashboard');
      } else {
        echo "<script>
  				alert('Login gagal, NIK atau password salah ');
  				window.location='" . site_url('auth') . "';
  				</script>";
      }
    }
  }

  public function logout()
  {
    $params = array('nik');
    $this->session->unset_userdata($params);
    redirect('auth');
  }
}
