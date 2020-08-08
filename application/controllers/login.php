<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        // Load form helper library
        $this->load->helper('form');

        // Load form validation library
        $this->load->library('form_validation');

        // Load session library
        $this->load->library('session');

        $this->load->model('admin');
    }

    public function index()
    {
        $this->load->view('form_login');
    }

    public function login_aksi()
    {
        if ($this->admin->logged_id()) {
            //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard

            if ($this->session->userdata('privilege') == '1') {
                redirect("dashboard");
            } else {
                redirect("crud");
            }
        } else {

            //jika session belum terdaftar

            //set form validation
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            //set message form validation
            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

            //cek validasi
            if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = $this->input->post('password', TRUE);

                //checking data via model
                $checking = $this->admin->check_login('users', array('username' => $username), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking) {
                    // echo 'login berhasil';

                    $session_data = array(
                        'user_id'   => $checking->user_id,
                        'user_name' => $checking->username,
                        'user_pass' => $checking->password,
                        'privilege' => $checking->privilege,
                    );
                    //set session userdata
                    $this->session->set_userdata($session_data);
                    if ($this->session->userdata('privilege') == '2') {
                        redirect("dashboard");
                    } else {
                        redirect("crud");
                    }
                } else {

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    $this->load->view('login', $data);
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
