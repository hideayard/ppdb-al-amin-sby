<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class WelcomeModel extends CI_Model {

    public function index()
    {
        return $this->db->get('info')->result_array();
    }
}