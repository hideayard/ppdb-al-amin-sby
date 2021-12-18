<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class T_controller extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->authenticated();
    }

    public function authenticated()
    {
        if($this->uri->segment(1) != 'Login' && $this->uri->segment(1) != '')
        {
            if(!$this->session->userdata('authenticated'))
            redirect(base_url('Login'));
        }
    }

    public function render_login($content, $data = NULL)
    {
        $data['contentnya'] = $this->load->view($content, $data, TRUE);
        $this->load->view('Login_view', $data);
    }
  
    public function render_dashboard($content, $data = NULL)
    {
        $data['contentnya'] = $this->load->view($content, $data, TRUE);
        $this->load->view('Dashboard', $data);
    }
}