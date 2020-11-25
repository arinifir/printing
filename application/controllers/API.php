<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('m_api', 'api');
    }
    public function login()
    {
        //cek user ada atau tidak
        $email = $this->input->post("email", TRUE);
        $pass = md5($this->input->post("password", TRUE));
        $data = $this->api->checkuser('tb_user', $email);
        if ($data) {
            if ($data['status_user'] == 1) {
                if ($data['password_user'] == $pass) {
                    if ($data['level_user'] == "Pemilik") {
                        $output = [
                            'status' => "success",
                            'role' => "pemilik",
                            'message' =>  "berhasil login"
                        ];
                        $session_data = [
                            'id_user' => $data['id_user'],
                            'nama' => $data['nama_user'],
                            'email' => $data['email_user'],
                            'level' => $data['level_user']
                        ];
                        $this->session->set_userdata($session_data);
                        echo json_encode($output);
                    } elseif ($data['level_user'] == "User") {
                        $output = [
                            'status' => "success",
                            'role' => "user",
                            'message' =>  "berhasil login"
                        ];
                        $session_data = [
                            'id_user' => $data['id_user'],
                            'nama' => $data['nama_user'],
                            'email' => $data['email_user'],
                            'level' => $data['level_user']
                        ];
                        $this->session->set_userdata($session_data);
                        echo json_encode($output);
                    }
                } else {
                    $output = [
                        'status' => "wrong_password",
                        'message' =>  "gagal login"
                    ];
                    echo json_encode($output);
                }
            } else {
                $output = [
                    'status' => "not_active",
                    'message' =>  "akun tidak terverifikasi"
                ];
                echo json_encode($output);
            }
        } else {
            $output = [
                'status' => "empty",
                'message' =>  "user tidak terdaftar"
            ];
            echo json_encode($output);
        }
    }
    public function register()
    {
    }
}
