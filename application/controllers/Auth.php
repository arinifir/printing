<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('m_admin');
        //load helper login
        $this->load->helper('auth_helper');
    }
    public function index()
    {
        $this->load->view('admin/login');
        $this->load->view('admin/myjs');
    }
    public function register()
    {
        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tb_user.email_user]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_message('is_unique','Email Sudah Terdaftar!');
        $this->form_validation->set_message('matches','Konfirmasi Password Salah!');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/register');
        }else{
            $this->signup();
        }
    }
    private function signup()
    {
        $nama = $this->input->post("nama", TRUE);
        $email = $this->input->post("email", TRUE);
        $pass = md5($this->input->post("password", TRUE));
        $pass2 = md5($this->input->post("password2", TRUE));
        $level = "Admin";
        $status = 0;

        if ($pass != $pass2) {
            $this->session->set_flashdata('message', 'Konfirmasi Password Salah!');
            redirect('Auth/register');
        }
        $data = [
            'nama_user' => $nama,
            'email_user' => $email,
            'password_user' => $pass2,
            'level_user' => $level,
            'status_user' => $status
        ];
        $this->m_admin->addData('tb_user',$data);
        $this->session->set_flashdata('message', 'Berhasil Mendaftar. Silahkan Tunggu Admin Untuk Melakukan Verifikasi Data Anda!');
        redirect('Auth');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth');
    }
}
