<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function __construct()
   {
        parent::__construct();
        $this->load->model('WelcomeModel', 'wm');
        $this->load->model('UserModel', 'um');
   }


	public function index()
	{
		$data['judul'] = 'PPDB AL-AMIN 2020';
		$data['isian'] = $this->wm->index();
		$data['um'] = $this->um;
		$this->load->view('header', $data);
		$this->load->view('welcome_message', $data);
		$this->load->view('footer');
	}

}