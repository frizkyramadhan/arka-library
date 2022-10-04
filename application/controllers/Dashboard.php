<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('category_m');
		$this->load->model('collection_m');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['subtitle'] = 'Dashboard';
		$data['category_list'] = $this->category_m->category_list();
		$data['dchart'] = $this->collection_m->get_collection_by_category();
		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar', $data);
		$this->load->view('dashboard/dashboard', $data);
		$this->load->view('layout/footer');
	}

	public function error403()
	{
		$data['title'] = '403 Error';
		$data['subtitle'] = '403 Error Page';
		$data['category_list'] = $this->category_m->category_list();
		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar', $data);
		$this->load->view('dashboard/error403', $data);
		$this->load->view('layout/footer');
	}
}
