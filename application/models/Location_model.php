<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Location_model extends CI_Model
{
    public function addData($data)
    {
        $this->db->insert('location', $data);
    }

    public function getAllData()
    {
        return $this->db->get('location')->result_array();
    }

    public function searchData($keyword)
    {
        $this->db->like('drama_title', $keyword);
        return $this->db->get('location')->result_array();
    }
}
