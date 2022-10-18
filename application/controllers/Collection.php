<?php

class Collection extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_superuser();
        $this->load->model('collection_m');
        $this->load->model('category_m');
        $this->load->library('uuid');
    }

    function index()
    {
        $data['title'] = "Collection Data - ARKA IT Library";
        $data['subtitle'] = "Collection Data";
        $data['collection'] = $this->collection_m->selectAll();
        $data['category_list'] = $this->category_m->category_list();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar', $data);
        $this->load->view('collection/collection', $data);
        $this->load->view('layout/footer', $data);
    }

    public function add()
    {
        $data['title'] = "Collection Data - ARKA IT Library";
        $data['subtitle'] = "Add Collection Data";
        $data['category_list'] = $this->category_m->category_list();

        $data['categories'] = $this->db->where('category_status', '1')->order_by('category_name', 'ASC')->get('categories')->result();
        $data['types'] = $this->db->where('type_status', '1')->order_by('type_name', 'ASC')->get('types')->result();

        $ci = &get_instance();
        $user_id = $ci->session->userdata('id');

        $this->form_validation->set_rules('type_id', 'Type', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        $this->form_validation->set_rules('collection_name', 'Collection Name', 'required');

        if ($this->form_validation->run() == false) {
            // if ($_POST == NULL) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar', $data);
            $this->load->view('collection/add', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $input = [
                'id' => $this->input->post('id'),
                'category_id' => $this->input->post('category_id'),
                'collection_date' => $this->input->post('collection_date'),
                'collection_name' => $this->input->post('collection_name'),
                'collection_status' => 1,
                'type_id' => $this->input->post('type_id'),
                'user_id' => $user_id,
            ];

            // $this->db->set('collections.id', 'UUID()', FALSE);
            $this->db->insert('collections', $input);
            // upload document
            $collection_id = $input['id'];
            $doc = $this->db
                ->select('collections.*, categories.slug')
                ->join('categories', 'collections.category_id = categories.id')
                ->get_where('collections', ['collections.id' => $collection_id])
                ->row_array();

            $data = array();

            // Count total files
            $countfiles = count($_FILES['collection_files']['name']);

            // Looping all files
            for ($i = 0; $i < $countfiles; $i++) {

                if (!empty($_FILES['collection_files']['name'][$i])) {

                    // Define new $_FILES array - $_FILES['file']
                    $_FILES['file']['name'] = $_FILES['collection_files']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['collection_files']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['collection_files']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['collection_files']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['collection_files']['size'][$i];

                    // Set preference
                    $config['upload_path'] = './uploads/' . $doc['slug'];
                    $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|jpeg|png';
                    $config['max_size'] = 0; // max_size in kb

                    //Load upload library
                    $this->load->library('upload', $config);

                    if (!is_dir('uploads')) {
                        mkdir('./uploads/', 0777, true);
                    }
                    $dir_exist = true; // flag for checking the directory exist or not
                    if (!is_dir('./uploads/' . $doc['slug'])) {
                        mkdir('./uploads/' . $doc['slug'], 0777, true);
                        $dir_exist = false; // dir not exist
                    } else {
                    }

                    // File upload
                    if ($this->upload->do_upload('file')) {
                        // Get data about the file
                        $uploadData = $this->upload->data();
                        $doc_file = $uploadData['file_name'];
                        $upload_date = $_POST['upload_date'];
                        $data['filenames'][] = $doc_file;

                        $query = "INSERT INTO attachments (collection_id, collection_file, upload_date) VALUES ('$collection_id','$doc_file','$upload_date')";
                        $this->db->query($query);
                    }
                }
            }

            $this->session->set_flashdata('message', '
                        <div class="alert alert-success" role="alert">
                              New Colletion has been added!
                        </div>');
            redirect('collection');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Collection Data - ARKA IT Library";
        $data['subtitle'] = "Edit Collection Data";
        $data['category_list'] = $this->category_m->category_list();

        $data['categories'] = $this->db->where('category_status', '1')->order_by('category_name', 'ASC')->get('categories')->result();
        $data['types'] = $this->db->where('type_status', '1')->order_by('type_name', 'ASC')->get('types')->result();
        $data['collection'] = $this->db->select('collections.*, categories.category_name, categories.slug')->join('categories', 'collections.category_id = categories.id', 'left')->where('collections.id', $id)->get('collections')->row();
        $data['attachments'] = $this->db->where('collection_id', $id)->get('attachments')->result();

        $this->form_validation->set_rules('type_id', 'Type', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        $this->form_validation->set_rules('collection_name', 'Collection Name', 'required');
        $this->form_validation->set_rules('collection_status', 'Collection Status', 'required');

        if ($this->form_validation->run() == false) {
            // if ($_POST == NULL) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar', $data);
            $this->load->view('collection/edit', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $input = [
                'category_id' => $this->input->post('category_id'),
                'collection_date' => $this->input->post('collection_date'),
                'collection_name' => $this->input->post('collection_name'),
                'collection_status' => $this->input->post('collection_status'),
                'type_id' => $this->input->post('type_id')
            ];
            $this->db->where('id', $id);
            $this->db->update('collections', $input);

            // upload document
            $collection_id = $id;
            $doc = $this->db
                ->select('collections.*, categories.slug')
                ->join('categories', 'collections.category_id = categories.id')
                ->get_where('collections', ['collections.id' => $collection_id])
                ->row_array();

            $data = array();

            // Count total files
            $countfiles = count($_FILES['collection_files']['name']);

            // Looping all files
            for ($i = 0; $i < $countfiles; $i++) {

                if (!empty($_FILES['collection_files']['name'][$i])) {

                    // Define new $_FILES array - $_FILES['file']
                    $_FILES['file']['name'] = $_FILES['collection_files']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['collection_files']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['collection_files']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['collection_files']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['collection_files']['size'][$i];

                    // Set preference
                    $config['upload_path'] = './uploads/' . $doc['slug'];
                    $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|jpeg|png';
                    $config['max_size'] = '0'; // max_size in kb

                    //Load upload library
                    $this->load->library('upload', $config);

                    if (!is_dir('uploads')) {
                        mkdir('./uploads/', 0777, true);
                    }
                    $dir_exist = true; // flag for checking the directory exist or not
                    if (!is_dir('./uploads/' . $doc['slug'])) {
                        mkdir('./uploads/' . $doc['slug'], 0777, true);
                        $dir_exist = false; // dir not exist
                    } else {
                    }

                    // File upload
                    if ($this->upload->do_upload('file')) {
                        // Get data about the file
                        $uploadData = $this->upload->data();
                        $doc_file = $uploadData['file_name'];
                        $upload_date = $_POST['upload_date'];
                        $data['filenames'][] = $doc_file;

                        $query = "INSERT INTO attachments (collection_id, collection_file, upload_date) VALUES ('$collection_id','$doc_file','$upload_date')";
                        $this->db->query($query);
                    }
                }
            }

            $this->session->set_flashdata('message', '
                        <div class="alert alert-success" role="alert">
                              Collection edited successfully!
                        </div>');
            redirect('collection');
        }
    }

    public function delete($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', '
                        <div class="alert alert-danger" role="alert">
                            Collection delete failed!
                        </div>');
            redirect('document');
        } else {

            $this->load->helper('file'); // Load codeigniter file helper

            $this->db
                ->select('attachments.*, categories.category_name, categories.slug')
                ->join('collections', 'attachments.collection_id = collections.id', 'left')
                ->join('categories', 'collections.category_id = categories.id', 'left')
                ->where('attachments.collection_id', $id);
            $query = $this->db->get('attachments');
            $result = $query->result();
            $row = $query->row();

            $dir_path  = 'uploads/' . $row->slug;  // For check folder exists
            $del_path  = './uploads/' . $row->slug . '/'; // For Delete folder

            if (is_dir($dir_path)) {
                foreach ($result as $att) {
                    unlink(FCPATH . './uploads/' . $att->slug . '/' . $att->collection_file);
                }
                // delete_files($del_path); // Delete files into the folder
                // rmdir($del_path); // Delete the folder
                // return true;
                $this->db->where('id', $id);
                $this->db->delete('collections');
                $this->db->where('collection_id', $id);
                $this->db->delete('attachments');
            }
            // return false;

            $this->session->set_flashdata('message', '
                        <div class="alert alert-danger" role="alert">
                            Collection deleted!
                        </div>');
            redirect('collection');
        }
    }

    public function deleteFile($collection_id, $id)
    {
        $this->db
            ->select('attachments.*, categories.category_name, categories.slug')
            ->join('collections', 'attachments.collection_id = collections.id', 'left')
            ->join('categories', 'collections.category_id = categories.id', 'left')
            ->where('attachments.id', $id);
        $query = $this->db->get('attachments');
        $row = $query->row();
        if ($id == "") {
            $this->session->set_flashdata('file', '
                        <div class="alert alert-danger" role="alert">
                            File delete failed!
                        </div>');
            redirect('collection/edit/' . $collection_id);
        } else {
            $this->db
                ->select('attachments.*, categories.category_name, categories.slug')
                ->join('collections', 'attachments.collection_id = collections.id', 'left')
                ->join('categories', 'collections.category_id = categories.id', 'left')
                ->where('attachments.id', $id);
            $query = $this->db->get('attachments');
            $row = $query->row();

            $this->load->helper('file'); // Load codeigniter file helper

            $dir_path  = 'uploads/' . $row->slug;  // For check folder exists
            $del_path  = './uploads/' . $row->slug . '/'; // For Delete folder

            if (is_dir($dir_path)) {
                // delete_files($del_path, true); // Delete files into the folder
                unlink(FCPATH . './uploads/' . $row->slug . '/' . $row->collection_file);
                $this->db->where('id', $id);
                $this->db->delete('attachments');
            } else {
                $this->session->set_flashdata('file', '
                        <div class="alert alert-danger" role="alert">
                            File failed to delete!
                        </div>');
                redirect('collection/edit/' . $collection_id);
            }
            $this->session->set_flashdata('file', '
                        <div class="alert alert-danger" role="alert">
                            File deleted!
                        </div>');
            redirect('collection/edit/' . $collection_id);
        }
    }
}
