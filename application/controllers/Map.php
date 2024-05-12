<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Map extends CI_Controller
{

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
        $this->load->view('map/index', $data);
        $this->load->view('templates/footer');
    }

    public function data()
    {

        $data["title"] = "View List Drama";
        $this->load->model('Location_model', 'lmodel');
        $data['location'] = $this->lmodel->getAllData();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topnav');
        $this->load->view('templates/sidenav');
        $this->load->view('map/data', $data);
        $this->load->view('templates/footer');
    }
}
