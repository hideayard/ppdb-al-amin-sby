<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_controller {


	public function __construct()
   {
        parent::__construct();
        $this->load->model('UserModel', 'um');
   }


	public function index()
	{
        $data['judul'] = 'Login PPDB';
        $this->load->view('header', $data);
        $this->load->view('Login_view');
        $this->load->view('footer');
    }
    
    public function act_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->um->get($username);
        if(empty($user))
        {
            $this->session->set_flashdata('message', 'User tidak ditemukan');
            redirect(base_url('Login'));
        } else {
            if($password !== $user->password)
            {
                $this->session->set_flashdata('message', 'Password yang anda masukan salah!');
                redirect(base_url('Login'));
            } else {
                // echo "Hello World!";
                $level = $user->level;
                switch($level){
                    case "0":
                        $role = "Super Admin";
                    break;
                    case "1":
                        $role = "Operator SD";
                        $res = 'Pendaftar SD';
                    break;
                    case "2":
                        $role = "Operator SMP";
                        $res = 'Pendaftar SMP';
                    break;
                    case "3":
                        $role = "Operator SMK";
                        $res = "Pendaftar SMk";
                    break;
                    case "4":
                        $role = "Pendaftar SD";
                        $res = "Pendaftar SD";
                    break;
                    case "5":
                        $role = "Pendaftar SMP";
                        $res = "Pendaftar SMP";
                    break;
                    case "6":
                        $role = "Pendaftar SMK";
                        $res = "Pendaftar SMK";
                    break;
                }
                // echo $level;
                // echo $role;

                $session = array(
                    'authenticated' => true,
                    'id' => $user->id,
                    'username' => $user->username,
                    'level' => $user->level,
                    'role' => $role,
                    'res' => $res
                );

                $this->session->set_userdata($session);
                $level = intval($user->level);
                
                // print_r($session);
                // echo $level;
                if ($level < 4) {
                    redirect('Operator');
                    // redirect(base_url('Operator'));
                } else {
                    // echo "pendaftar";
                    $user = $this->um->getby($user->id);
                    // var_dump($user);
                    $formulir = $user->statusformulir;
                    $id_biodata = intval($user->id_biodata);
                    $this->session->set_userdata('formulir', $formulir);
                    $this->session->set_userdata('id_biodata', $id_biodata);
                    if($formulir !== 'sudah'){
                        redirect('/Pendaftaran/Formulir');
                    } else {
                        redirect('/Pendaftaran');
                    }
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}