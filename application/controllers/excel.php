<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Excel extends CI_Controller
{

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data user',
            'user' => $this->m_admin->listing()
        );
        $this->load->view('excel', $data);
    }

    public function export_excel()
    {
        $data = array(
            'title' => 'Laporan Excel',
            'user' => $this->user_model->listing()
        );
        $this->load->view('laporan_excel', $data);
    }
}

/* End of file Excel.php */
/* Location: ./application/controllers/Excel.php */
