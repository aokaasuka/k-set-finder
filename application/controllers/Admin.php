<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {

        $data["title"] = "Map";
        $this->load->model('Location_model', 'lmodel');

        // Cek apakah ada pencarian
        $keyword = $this->input->get('keyword');
        if (!empty($keyword)) {
            // Jika ada keyword pencarian, ambil data berdasarkan pencarian
            $data['location'] = $this->lmodel->searchData($keyword);
        } else {
            // Jika tidak ada keyword pencarian, ambil semua data
            $data['location'] = $this->lmodel->getAllData();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topnav');
        $this->load->view('templates/sidenav', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('location_name', 'Location Name', 'required|trim');
        $this->form_validation->set_rules('location_address', 'Location Address', 'required|trim');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|trim');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data["title"] = "Add Data Location";

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topnav');
            $this->load->view('templates/sidenav');
            $this->load->view('admin/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'drama_title' => htmlspecialchars($this->input->post('drama_title', true)),
                'location_name' => htmlspecialchars($this->input->post('location_name', true)),
                'scene' => htmlspecialchars($this->input->post('scene', true)),
                'location_address' => htmlspecialchars($this->input->post('location_address', true)),
                'longitude' => htmlspecialchars($this->input->post('longitude', true)),
                'latitude' => htmlspecialchars($this->input->post('latitude', true)),
                'street_view' => htmlspecialchars($this->input->post('street_view', true)),
            ];

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '10000';
                $config['upload_path'] = './assets/images';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->load->model('Location_model', 'lmodel');
            $this->lmodel->addData($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data added successfully!</div>');
            redirect('admin/add');
        }
    }

    public function data()
    {

        $data["title"] = "View Data Location";
        $this->load->model('Location_model', 'lmodel');
        $data['location'] = $this->lmodel->getAllData();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topnav');
        $this->load->view('templates/sidenav');
        $this->load->view('admin/data', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('location');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data deleted successfully!</div>');
        redirect('admin/data');
    }

    public function edit($id)
    {
        $data["title"] = "Edit Data Location";

        $data['location'] = $this->db->get_where('location', ['id' => $id])->row_array();

        $this->form_validation->set_rules('drama_title', 'Drama Title', 'required|trim');


        $data["title"] = "Edit Data Location";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topnav');
        $this->load->view('templates/sidenav');
        $this->load->view('admin/edit', $data);
        $this->load->view('templates/footer');
    }

    public function editdata()
    {


        $id = $this->input->post('id');
        $data['location'] = $this->db->get_where('location', ['id' => $id])->row_array();

        $this->form_validation->set_rules('drama_title', 'Drama Title', 'required|trim');
        $this->form_validation->set_rules('location_name', 'Location Name', 'required|trim');
        $this->form_validation->set_rules('scene', 'Scene', 'required|trim');
        $this->form_validation->set_rules('location_address', 'Location Address', 'required|trim');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|trim');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|trim');

        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, kembali ke halaman edit dengan pesan error
            $this->edit($id);
        } else {
            // Ambil data yang diinputkan dari form
            $drama_title = $this->input->post('drama_title');
            $location_name = $this->input->post('location_name');
            $scene = $this->input->post('scene');
            $location_address = $this->input->post('location_address');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $street_view = $this->input->post('street_view');

            // Proses upload gambar jika ada
            $image = $_FILES['image']['name'];
            if ($image) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']     = '2048'; // 2MB
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['location']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            // Simpan data yang diubah ke dalam database
            $this->db->set('drama_title', $drama_title);
            $this->db->set('location_name', $location_name);
            $this->db->set('scene', $scene);
            $this->db->set('location_address', $location_address);
            $this->db->set('latitude', $latitude);
            $this->db->set('longitude', $longitude);
            $this->db->set('street_view', $street_view);
            $this->db->where('id', $id);
            $this->db->update('location');

            // Set pesan berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data location has been updated!</div>');

            // Redirect ke halaman data setelah proses berhasil
            redirect('admin/data');
        }
    }
}
