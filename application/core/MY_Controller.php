<?php

class MY_Controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  function getSession()
  {
    $ci = &get_instance();
    $session = $ci->session;
    return $session;
  }
}
