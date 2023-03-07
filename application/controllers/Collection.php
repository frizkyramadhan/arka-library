<?php

class Collection extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_superuser();
        $this->load->model('collection_m');
        $this->load->model('category_m');
    }

    function index($slug)
    {
        $data['title'] = "Collection Data - ARKA Library";
        $data['subtitle'] = "Collection Data";
        $data['category_list'] = $this->category_m->category_list();

        $data['subcategory_list'] = $this->category_m->getSubCatBySlug($slug);
        $data['category'] = $this->category_m->selectSlug($slug);

        $this->session->unset_userdata('archive');

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar', $data);
        $this->load->view('collection/collection', $data);
        $this->load->view('layout/footer', $data);
    }

    public function detail($subcategory_id)
    {
        $data['title'] = "Collection Data - ARKA Library";
        $data['subtitle'] = "Collection Data";
        $data['category_list'] = $this->category_m->category_list();
        $data['subcategory'] = $this->category_m->selectSubcategory($subcategory_id);

        $this->load->library('pagination');

        if (isset($_POST['reset'])) {
            $this->session->unset_userdata('archive');
        }
        if (isset($_POST['filter'])) {
            // $post = $this->input->post(null, TRUE);
            $date1 = $this->input->post('date1');
            $date2 = $this->input->post('date2');
            $post = [
                'date1' => $date1 == null ? null : date('Y-m-01', strtotime($date1)),
                'date2' => $date2 == null ? null : date('Y-m-01', strtotime($date2)),
                'collection_name' => $this->input->post('collection_name'),
                'name' => $this->input->post('name'),
            ];
            $this->session->set_userdata('archive', $post);
        } else {
            $post = $this->session->userdata('archive');
        }

        $config['base_url'] = site_url('collection/detail/' . $subcategory_id);
        $config['total_rows'] = $this->collection_m->getCollectionBySubCat($subcategory_id)->num_rows();
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

        $data['collection_list'] = $this->collection_m->getCollectionBySubCat($subcategory_id, $config['per_page'], $this->uri->segment(4));
        $data['post'] = $post;
        $data['query'] = $this->db->last_query();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar', $data);
        $this->load->view('collection/detail', $data);
        $this->load->view('layout/footer', $data);
    }

    public function add($subcategory_id)
    {
        $ci = &get_instance();
        $user_id = $ci->session->userdata('id');
        $dept_id = $ci->session->userdata('department_id');

        $input = [
            // 'id' => $this->input->post('id'),
            'collection_date' => date('Y-m-01', strtotime($_POST['collection_date'])),
            'collection_name' => $this->input->post('collection_name'),
            'collection_status' => 1,
            'subcategory_id' => $this->input->post('subcategory_id'),
            'user_id' => $user_id,
            'department_id' => $dept_id,
        ];
        // var_dump($input);
        // die;
        // $this->db->set('collections.id', 'UUID()', FALSE);
        $this->db->insert('collections', $input);

        // upload document
        $collection_id = $this->db->insert_id();
        $doc = $this->db
            ->select('collections.*, departments.department_code, categories.slug')
            ->join('departments', 'collections.department_id = departments.id')
            ->join('subcategories', 'collections.subcategory_id = subcategories.id')
            ->join('categories', 'subcategories.category_id = categories.id')
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
                $config['upload_path'] = './uploads/' . $doc['department_code'] . '/' . $doc['slug'] . '/' . $doc['subcategory_id'];
                $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|jpeg|png|rar|zip';
                $config['max_size'] = 35000; // max_size in kb

                //Load upload library
                $this->load->library('upload', $config);

                if (!is_dir('uploads')) {
                    mkdir('./uploads/', 0777, true);
                }
                $dir_exist = true; // flag for checking the directory exist or not
                if (!is_dir('./uploads/' . $doc['department_code'])) {
                    mkdir('./uploads/' . $doc['department_code'], 0777, true);
                    $dir_exist = false; // dir not exist
                } else {
                    $dir_exist = true; // dir exist
                }
                if (!is_dir('./uploads/' . $doc['department_code'] . '/' . $doc['slug'])) {
                    mkdir('./uploads/' . $doc['department_code'] . '/' . $doc['slug'], 0777, true);
                    $dir_exist = false; // dir not exist
                } else {
                    $dir_exist = true; // dir exist
                }
                if (!is_dir('./uploads/' . $doc['department_code'] . '/' . $doc['slug'] . '/' . $doc['subcategory_id'])) {
                    mkdir('./uploads/' . $doc['department_code'] . '/' . $doc['slug'] . '/' . $doc['subcategory_id'], 0777, true);
                    $dir_exist = false; // dir not exist
                } else {
                    $dir_exist = true; // dir exist
                }

                // File upload
                if ($this->upload->do_upload('file')) {
                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $doc_file = $uploadData['file_name'];
                    $upload_date = $_POST['upload_date'];
                    $upload_by = $user_id;
                    $data['filenames'][] = $doc_file;

                    $query = "INSERT INTO attachments (collection_id, collection_file, upload_date, upload_by) VALUES ('$collection_id','$doc_file','$upload_date','$upload_by')";
                    $this->db->query($query);
                } else {
                    //delete data if not upload
                    $this->db->where('id', $collection_id);
                    $this->db->delete('collections');
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('collection/detail/' . $subcategory_id);
                }
            }
        }

        $this->session->set_flashdata('message', '
                        <div class="alert alert-success" role="alert">
                              New Colletion has been added!
                        </div>');
        redirect('collection/detail/' . $subcategory_id);
    }

    public function edit($subcategory_id, $id)
    {
        $ci = &get_instance();
        $user_id = $ci->session->userdata('id');

        $data['category_list'] = $this->category_m->category_list();

        $input = [
            'collection_date' => date('Y-m-01', strtotime($_POST['collection_date'])),
            'collection_name' => $this->input->post('collection_name'),
            'collection_status' => $this->input->post('collection_status'),
            'subcategory_id' => $this->input->post('subcategory_id'),
            // 'user_id' => $user_id,
            // 'department_id' => $dept_id,
        ];
        $this->db->where('id', $id);
        $this->db->update('collections', $input);

        // upload document
        $collection_id = $id;
        $doc = $this->db
            ->select('collections.*, departments.department_code, categories.slug')
            ->join('departments', 'collections.department_id = departments.id')
            ->join('subcategories', 'collections.subcategory_id = subcategories.id')
            ->join('categories', 'subcategories.category_id = categories.id')
            ->get_where('collections', ['collections.id' => $id])
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
                $config['upload_path'] = './uploads/' . $doc['department_code'] . '/' . $doc['slug'] . '/' . $doc['subcategory_id'];
                $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|jpeg|png|rar|zip';
                $config['max_size'] = 35000; // max_size in kb

                //Load upload library
                $this->load->library('upload', $config);

                if (!is_dir('uploads')) {
                    mkdir('./uploads/', 0777, true);
                }
                $dir_exist = true; // flag for checking the directory exist or not
                if (!is_dir('./uploads/' . $doc['department_code'])) {
                    mkdir('./uploads/' . $doc['department_code'], 0777, true);
                    $dir_exist = false; // dir not exist
                } else {
                    $dir_exist = true; // dir exist
                }
                if (!is_dir('./uploads/' . $doc['department_code'] . '/' . $doc['slug'])) {
                    mkdir('./uploads/' . $doc['department_code'] . '/' . $doc['slug'], 0777, true);
                    $dir_exist = false; // dir not exist
                } else {
                    $dir_exist = true; // dir exist
                }
                if (!is_dir('./uploads/' . $doc['department_code'] . '/' . $doc['slug'] . '/' . $doc['subcategory_id'])) {
                    mkdir('./uploads/' . $doc['department_code'] . '/' . $doc['slug'] . '/' . $doc['subcategory_id'], 0777, true);
                    $dir_exist = false; // dir not exist
                } else {
                    $dir_exist = true; // dir exist
                }

                // File upload
                if ($this->upload->do_upload('file')) {
                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $doc_file = $uploadData['file_name'];
                    $upload_date = $_POST['upload_date'];
                    $upload_by = $user_id;
                    $data['filenames'][] = $doc_file;

                    $query = "INSERT INTO attachments (collection_id, collection_file, upload_date, upload_by) VALUES ('$collection_id','$doc_file','$upload_date','$upload_by')";
                    $this->db->query($query);
                } else {
                    //delete data if not upload
                    $this->db->where('id', $collection_id);
                    $this->db->delete('collections');
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('collection/detail/' . $subcategory_id);
                }
            }
        }

        $this->session->set_flashdata('message', '
                        <div class="alert alert-success" role="alert">
                              Collection edited successfully!
                        </div>');
        redirect('collection/detail/' . $subcategory_id);
    }

    public function delete($subcategory_id, $id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', '
                        <div class="alert alert-danger" role="alert">
                            Collection delete failed!
                        </div>');
            redirect('collection/detail/' . $subcategory_id);
        } else {

            $this->load->helper('file'); // Load codeigniter file helper

            $this->db
                ->select('attachments.*, collections.subcategory_id, departments.department_code, categories.slug')
                ->join('collections', 'attachments.collection_id = collections.id', 'left')
                ->join('departments', 'collections.department_id = departments.id')
                ->join('subcategories', 'collections.subcategory_id = subcategories.id')
                ->join('categories', 'subcategories.category_id = categories.id')
                ->where('collections.id', $id);
            $query = $this->db->get('attachments');
            $row = $query->row();
            $result = $query->result();

            $dir_path  = 'uploads/' . $row->department_code . '/' . $row->slug . '/' . $row->subcategory_id;  // For check folder exists
            $del_path  = './uploads/' . $row->department_code . '/' . $row->slug . '/' . $row->subcategory_id . '/'; // For Delete folder

            if (is_dir($dir_path)) {
                foreach ($result as $att) {
                    unlink(FCPATH . './uploads/' . $att->department_code . '/' . $att->slug . '/' . $att->subcategory_id . '/' . $att->collection_file);
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
            redirect('collection/detail/' . $subcategory_id);
        }
    }

    public function deleteFile($subcategory_id, $id)
    {
        $row = $this->db
            ->select('attachments.*, collections.subcategory_id, departments.department_code, categories.slug')
            ->join('collections', 'attachments.collection_id = collections.id', 'left')
            ->join('departments', 'collections.department_id = departments.id')
            ->join('subcategories', 'collections.subcategory_id = subcategories.id')
            ->join('categories', 'subcategories.category_id = categories.id')
            ->where('attachments.id', $id)
            ->get('attachments')
            ->row();

        if ($id == "") {
            $this->session->set_flashdata('file', '
                        <div class="alert alert-danger" role="alert">
                            File delete failed!
                        </div>');
            redirect('collection/detail/' . $subcategory_id);
        } else {
            $this->load->helper('file'); // Load codeigniter file helper

            $dir_path  = 'uploads/' . $row->department_code . '/' . $row->slug . '/' . $row->subcategory_id;  // For check folder exists
            $del_path  = './uploads/' . $row->department_code . '/' . $row->slug . '/' . $row->subcategory_id . '/'; // For Delete folder

            if (is_dir($dir_path)) {
                // delete_files($del_path, true); // Delete files into the folder
                unlink(FCPATH . './uploads/' . $row->department_code . '/' . $row->slug . '/' . $row->subcategory_id . '/' . $row->collection_file);
                $this->db->where('id', $id);
                $this->db->delete('attachments');
            } else {
                $this->session->set_flashdata('file', '
                        <div class="alert alert-danger" role="alert">
                            File failed to delete!
                        </div>');
                redirect('collection/detail/' . $subcategory_id);
            }
            $this->session->set_flashdata('file', '
                        <div class="alert alert-danger" role="alert">
                            File deleted!
                        </div>');
            redirect('collection/detail/' . $subcategory_id);
        }
    }
}
