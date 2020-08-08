<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_admin extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
