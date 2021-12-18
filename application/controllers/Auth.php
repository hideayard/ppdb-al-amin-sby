<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends T_controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel', 'um');
    }

    public function index()
    {
        if ($this->session->userdata('authenticated'))
        {
            redirect(base_url());
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->um->get($username);

        if(empty($username))
        {
            $this->session->set_flashdata('message', 'Username Tidak Ditemukan');
            redirect(base_url('Login'));
        } else {
            if($password === $user->password)
            {   
                if($user->level = 1){
                    $judul = 'Operator SD';
                }
                if($user->level = 2){
                    $judul = 'Operator SMP';
                }
                if($user->level = 3){
                    $judul = 'Operator SMK';
                }
                if($user->level = 4){
                    $judul = 'Pendaftar SD';
                }
                if($user->level = 5){
                    $judul = 'Pendaftar SMP';
                }
                if($user->level = 6){
                    $judul = 'Pendaftar SMK';
                }

                $session = array(
                    'authenticated' => true,
                    'username'      => $user->username,
                    'level'         => $user->level,
                    'judul'         => $judul       
                );

                $this->session->set_userdata($session);
                redirect(base_url());
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}