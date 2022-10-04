<?php

class Archive extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('collection_m');
        $this->load->model('category_m');
    }

    function list($slug)
    {
        $data['title'] = "Archive Data - ARKA Plant Library";
        $data['subtitle'] = "Archive Data";
        $data['category_list'] = $this->category_m->category_list();
        $data['category'] = $this->category_m->select($slug);

        $this->load->library('pagination');

        if (isset($_POST['reset'])) {
            $this->session->unset_userdata('archive');
        }
        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, TRUE);
            $this->session->set_userdata('archive', $post);
        } else {
            $post = $this->session->userdata('archive');
        }

        $config['base_url'] = site_url('archive/list/' . $slug);
        $config['total_rows'] = $this->collection_m->selectAllBySlug($slug)->num_rows();
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

        $data['row'] = $this->collection_m->selectAllBySlug($slug, $config['per_page'], $this->uri->segment(4));
        $data['post'] = $post;
        $data['query'] = $this->db->last_query();


        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar', $data);
        $this->load->view('archive/list', $data);
        $this->load->view('layout/footer', $data);
    }
}
