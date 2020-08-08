<?php

class Crud extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['user'] = $this->m_data->tampil_data()->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/view_data', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah()
    {
        $this->load->view('v_tambah_data');
    }

    public function tambah_aksi()
    {
        $Customer_Name = $this->input->post('Customer_Name');
        $Destination = $this->input->post('Destination');
        $Price = $this->input->post('Price');
        $Promo = $this->input->post('Promo');
        $Payment_Type = $this->input->post('Payment_Type');

        $data = array(
            'Customer_Name' => $Customer_Name,
            'Destination' => $Destination,
            'Price' => $Price,
            'Promo' => $Promo,
            'Payment_Type' => $Payment_Type,
        );
        $this->m_data->input_data($data, 'data_customer');
        redirect('crud/index');
    }

    public function edit($id)
    {
        $data['user'] = $this->m_data->tampil_data()->result();
        $dataEdit['data_customer'] = $this->m_data->data_edit_user($id)->row();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('v_edit', $dataEdit);
        $this->load->view('template/footer', $data);
    }

    public function edit_simpan($id)
    {
        $Customer_Name = $this->input->post('CustomerName');
        $Destination = $this->input->post('Destination');
        $Price = $this->input->post('Price');
        $Promo = $this->input->post('Promo');
        $Payment_Type = $this->input->post('PaymentType');

        $data = array(
            'Customer_Name' => $Customer_Name,
            'Destination' => $Destination,
            'Price' => $Price,
            'Promo' => $Promo,
            'Payment_Type' => $Payment_Type,

        );

        $this->db->where('Customer_ID', $id);
        $this->db->update('data_customer', $data);
        redirect('crud/index');
    }

    public function hapus($id)
    {
        // echo "Masuk hapus";
        // die;
        $where = array('Customer_ID' => $id);
        $this->m_data->hapus_data($where, 'data_customer');
        redirect('crud/index');
    }

    public function form()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('v_tambah_data');
        $this->load->view('template/footer');
    }

    public function search()
    {
        $search = $this->input->post('search');
        $data['user'] = $this->users_model->search($search);
        $this->load->view('index');
    }

    public function index_pagination()
    {
        $this->load->database();
        $thisjumlah_data = $this->m_data->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'index.php/tiket.com/index';
        $config['total_rows'] = $thisjumlah_data;
        $config['per_page'] = 10;
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['user'] = $this->m_data->data($config['per_page'], $from);
        $this->load->view('view_data', $data);
    }
}
