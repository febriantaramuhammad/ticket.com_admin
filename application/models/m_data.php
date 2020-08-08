<?php

class M_data extends CI_Model
{
    function index_pagination($number, $offset)
    {
        $this->db->select('*');
        $this->db->from('data_customer');
        $this->db->order_by('id', 'ASC');
        return $query = $this->db->get();
    }
    function tampil_data()
    {
        return $this->db->get('data_customer');
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function update_data()
    {
        return $this->db->get('user');
    }

    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function data_edit_user($id)
    {
        $this->db->select('*');
        $this->db->from('data_customer');
        $this->db->where('Customer_ID', $id);

        return $this->db->get();
    }

    function edit_data($where, $table)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        return $this->db->get_where($table, $where);

        function jumlah_data()
        {
            return $this->db->get('user')->num_rows();
        }
    }

    function search($search)
    {
        $this->db->select('*');
        $this->db->from('data_customer');
        $this->db->like('customer_id', 'customer_name', 'destination', 'price', 'promo', 'payment_type', 'sales_code', 'sales_name', $search);
        $query = $this->db->get('db');
        return $query->result();
    }

    function jumlah_data()
    {
        return $this->db->get('user')->num_rows();
    }
}
