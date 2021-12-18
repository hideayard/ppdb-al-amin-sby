<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PendaftarModel extends CI_Model {

    public function getdatapendaftar()
    {
     $id = $this->session->userdata('id');

     $this->db->select('*');
     $this->db->from('biodata');
     $this->db->join('user', 'biodata.id_biodata = user.id');
     $this->db->where('biodata.id_biodata', $id);
     return $this->db->get()->row();
    }

    public function insert(){
        $id = $this->input->post('id_biodata');
        $data = $this->input->post();
        $this->db->where('id_biodata', $id);
        $this->db->update('biodata', $data);
        return $this->db->affected_rows();
    }
}