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
		$this->load->model('user_m');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['subtitle'] = 'Dashboard';
		$data['category_list'] = $this->category_m->category_list();
		$data['dchart'] = $this->collection_m->get_collection_by_category();
		$data['recent'] = $this->collection_m->get_recent();

		$ci = &get_instance();
		$data['dept_id'] = $ci->session->userdata('department_id');
		$data['level'] = $ci->session->userdata('level');
		$data['chart'] = $this->collection_m->chart_collection();
		$data['total'] = $this->collection_m->chart_total_files();
		$data['total_per_user'] = $this->collection_m->total_files_per_user();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar', $data);
		$this->load->view('dashboard/dashboard', $data);
		$this->load->view('layout/footer');
	}

	public function search()
	{
		$data['title'] = 'Dashboard';
		$data['subtitle'] = 'Dashboard';
		$data['category_list'] = $this->category_m->category_list();
		$data['dchart'] = $this->collection_m->get_collection_by_category();
		$data['recent'] = $this->collection_m->get_recent();

		$ci = &get_instance();
		$data['dept_id'] = $ci->session->userdata('department_id');
		$data['level'] = $ci->session->userdata('level');
		$data['chart'] = $this->collection_m->chart_collection();
		$data['total'] = $this->collection_m->chart_total_files();
		$data['total_per_user'] = $this->collection_m->total_files_per_user();

		// get search string
		$search = ($this->input->post("search")) ? $this->input->post("search") : "NIL";
		$search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

		// pagination settings
		$config = array();
		$config['base_url'] = site_url("dashboard/search/$search");
		$config['total_rows'] = $this->collection_m->searchDoc($search);
		$config['per_page'] = 10;
		$config["uri_segment"] = 4;

		// integrate bootstrap pagination
		$config['cur_tag_open'] = '<b class="btn btn-info">';
		$config['cur_tag_close'] = '</b>';
		$config['anchor_class'] = 'class="btn"';

		$this->pagination->initialize($config);

		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['doclist'] = $this->collection_m->get_doc($config['per_page'], $data['page'], $search);

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

	public function sitemap()
	{

		$data['title'] = 'Sitemap';
		$data['subtitle'] = 'Sitemap';
		$data['category_list'] = $this->category_m->category_list();

		$ci = &get_instance();
		$data['dept_id'] = $ci->session->userdata('department_id');
		$data['sitemap_category'] = $this->collection_m->get_sitemap_category();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar', $data);
		$this->load->view('dashboard/sitemap', $data);
		$this->load->view('layout/footer');
	}

	public function users($id)
	{
		$data['title'] = 'User Summary';
		$data['subtitle'] = 'User Summary';
		$data['category_list'] = $this->category_m->category_list();
		$data['user'] = $this->user_m->select($id);

		$ci = &get_instance();
		$dept_id = $ci->session->userdata('department_id');

		if ($dept_id != $data['user']->department_id) {
			redirect('dashboard/error403');
		}

		$this->load->library('pagination');

		if (isset($_POST['reset'])) {
			$this->session->unset_userdata('archive');
		}
		if (isset($_POST['filter'])) {
			// $post = $this->input->post(null, TRUE);
			$date1 = $this->input->post('date1');
			$date2 = $this->input->post('date2');
			$post = [
				'date1' => $date1,
				'date2' => $date2,
				'collection_file' => $this->input->post('collection_file'),
				'collection_name' => $this->input->post('collection_name'),
			];
			$this->session->set_userdata('archive', $post);
		} else {
			$post = $this->session->userdata('archive');
		}

		$config['base_url'] = site_url('dashboard/users/' . $id);
		$config['total_rows'] = $this->collection_m->getAttachmentByUser($id)->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt';
		$config['cur_tag_open'] = '<button class="btn btn-warning">';
		$config['num_tag_open'] = '<div>';
		$config['num_tag_close'] = '</div>';
		$config['cur_tag_close'] = '</button>';
		$config['attributes'] = array('class' => 'btn text-light');

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();

		$data['attachment_list'] = $this->collection_m->getAttachmentByUser($id, $config['per_page'], $this->uri->segment(4));
		$data['post'] = $post;
		$data['query'] = $this->db->last_query();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar', $data);
		$this->load->view('dashboard/user', $data);
		$this->load->view('layout/footer');
	}
}
