<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserModel extends CI_Model {
    
    private $_table = 'user';
    private $_tableb = 'biodata';
    private $_tablei = 'info';

    public function get($username){
        // $this->db->select('*');
        // $this->db->from($this->_table);
        // $this->db->join($this->_tableb, 'user.id = biodata.id_biodata');
        $this->db->where('user.username', $username);
        return $this->db->get($this->_table)->row();
    }

    public function total()
    {
                $sd = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 4")->result_array();
                $sd = count($sd);

                $smp1 = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 5 AND gelombang = 1")->result_array();
                $smp1 = count($smp1);

                $smp2 = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 5 AND gelombang = 2")->result_array();
                $smp2 = count($smp2);
		
                $smk = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 6")->result_array();
                $smk = count($smk);
		
                $smk1 = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 6  AND jurusan LIKE '%Multimedia%' ESCAPE '!'")->result_array();
                $smk1 = count($smk1);
                
                $smk2 = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 6  AND jurusan LIKE '%Tata Boga%' ESCAPE '!' ")->result_array();
                $smk2 = count($smk2);

                $data = array(
                    'sd' => $sd,
                    'smp1' => $smp1,
                    'smp2' => $smp2,
               		'smk' => $smk,
                    'smk1' => $smk1,
                    'smk2' => $smk2
                ); 
                return $data;
    }

    public function diterima()
    {
                $sd = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 4 AND verifikasi = TRUE")->result_array();
                $sd = count($sd);

                $smp1 = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 5 AND gelombang = 1 AND verifikasi = TRUE")->result_array();
                $smp1 = count($smp1);

                $smp2 = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 5 AND gelombang = 2 AND verifikasi = TRUE")->result_array();
                $smp2 = count($smp2);

                $smk1 = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 6 AND verifikasi = TRUE AND jurusan = 'Multimedia'")->result_array();
                $smk1 = count($smk1);
                
                $smk2 = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 6 AND verifikasi = TRUE AND jurusan = 'Tata Boga' ")->result_array();
                $smk2 = count($smk2);

                $data = array(
                    'sd' => $sd,
                    'smp1' => $smp1,
                    'smp2' => $smp2,
                    'smk1' => $smk1,
                    'smk2' => $smk2
                ); 
                return $data;
    }

    public function getby($id = null){
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join($this->_tableb, 'user.id = biodata.id_biodata');
        $this->db->where('user.id', $id);
        return $this->db->get()->row();
    }

    public function get_pendaftar(){
        $level = intval($this->session->userdata('level'));
        $level = $level + 3;
        $this->db->select('*');
        $this->db->from($this->_tableb);
        $this->db->join($this->_table, 'biodata.id_biodata = user.id');
        $this->db->where('user.level', $level);
        $query = $this->db->get()->result_array();
        return $query;

    }

    public function get_formulirpendaftar(){
        $level = intval($this->session->userdata('level'));
        $level = $level + 3;
        $this->db->select('*');
        $this->db->from($this->_tableb);
        $this->db->join($this->_table, 'biodata.id_biodata = user.id');
        $this->db->where('statusformulir', 'sudah');
        $this->db->where('user.level', $level);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function get_verifikasipendaftar(){
        $level = intval($this->session->userdata('level'));
        $level = $level + 3;
        $this->db->select('*');
        $this->db->from($this->_tableb);
        $this->db->join($this->_table, 'biodata.id_biodata = user.id');
        $this->db->where('statusformulir', 'sudah');
        $this->db->where('user.level', $level);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function insert($data, $biodata){
        $this->db->insert($this->_table, $data);
        // var_dump($data);
        $id = $this->db->get_where($this->_table, array('username' => $data['username'] ))->row();
        // var_dump($id);
        if($id){
            $this->db->set('id_biodata', $id->id);
            $this->db->set('nama', $biodata['nama']);
            $this->db->set('gelombang', $biodata['gelombang']);
            $this->db->set('tempatlahir', $biodata['tempatlahir']);
            $this->db->set('tanggallahir', $biodata['tanggallahir']);
            $this->db->set('asalsekolah', $biodata['asalsekolah']);
            $this->db->set('no_hp', $biodata['no_hp']);
            $this->db->insert($this->_tableb);
            return $id;
        }
    }
    
    public function insertbd($data){
        $this->db->insert($this->_tableb, $data);
        return $this->db->affected_rows();
    }
    
    public function edit($id, $data){
        if(intval($this->session->userdata('level')) != 1 ){
        $this->db->set('nama', $data['nama']);
        $this->db->set('tempatlahir', $data['tempatlahir']);
        $this->db->set('tanggallahir', $data['tanggallahir']);
        $this->db->set('no_hp', $data['no_hp']);
        $this->db->set('asalsekolah', $data['asalsekolah']);
        $this->db->where('id_biodata', $id);
        return $this->db->update($this->_tableb);
        } else {
        $this->db->set('nama', $data['nama']);
        $this->db->set('tempatlahir', $data['tempatlahir']);
        $this->db->set('tanggallahir', $data['tanggallahir']);
        $this->db->set('no_hp', $data['no_hp']);
        $this->db->where('id_biodata', $id);
        return $this->db->update($this->_tableb);
        }
        // $this->db->where('id', $id);
        // return $this->db->update($this->_table);
    }
    
    public function delete($id){
        // var_dump($id);
        $this->db->where('biodata.id_biodata', $id);
        $this->db->delete($this->_tableb);
        $this->db->where('user.id', $id);
        return $this->db->delete($this->_table);
    }

    public function getjadwal($role){
        return $this->db->get_where($this->_tablei, array('role' => $role))->result_array();
    }

    public function ubahjadwal()
    {
        $level = $this->session->userdata('level');
        $id_info_sd = 1;
        $id_info_1 = 2;
        $id_info_2 = 3;
        $id_info_smk = 4;

        switch($level){
            case "1" :
                $data = array(
                    'role' => '1',
        			'tanggalbuka' => $this->input->post('tanggalbuka'),
        			'tanggaltutup' => $this->input->post('tanggaltutup')
                );
                $this->db->where('id_info', $id_info_sd);
                return $this->db->update($this->_tablei, $data);
            break;
            case "2" :
                    $data = array(
                        array(
                        'role' => '2',
                        'tanggalbuka' => $this->input->post('tanggalbuka1'),
                        'tanggaltutup' => $this->input->post('tanggaltutup1'),
                        'tanggaltes' => $this->input->post('tanggaltes1'),
                        'pengumumanhasiltes' => $this->input->post('pengumumanhasiltes1'),
                        ),
                        array(
                        'role' => '2',
                        'tanggalbuka' => $this->input->post('tanggalbuka2'),
                        'tanggaltutup' => $this->input->post('tanggaltutup2'),
                        'tanggaltes' => $this->input->post('tanggaltes2'),
                        'pengumumanhasiltes' => $this->input->post('pengumumanhasiltes2')
                        )
                    );
                    $this->db->where('id_info', $id_info_1);
                    $this->db->update($this->_tablei, $data[0]);
                    $this->db->where('id_info', $id_info_2);
                    return $this->db->update($this->_tablei, $data[1]);
            break;
            case "3" :
                $data = array(
                    'role' => '3',
        			'tanggalbuka' => $this->input->post('tanggalbuka'),
        			'tanggaltutup' => $this->input->post('tanggaltutup')
                );
                $this->db->where('id_info', $id_info_smk);
                return $this->db->update($this->_tablei, $data);
            break;
        }
    }

    public function ver($id, $stat){
        if($stat == 1){
            $this->db->set('verifikasi', TRUE);
            $this->db->where('id_biodata', $id);
            return $this->db->update($this->_tableb);
        }
            $this->db->set('verifikasi', FALSE);
            $this->db->where('id_biodata', $id);
            return $this->db->update($this->_tableb);
    }
    
    public function getdatapendaftar($id)
    {
         $this->db->select('*');
         $this->db->from('biodata');
         $this->db->join('user', 'biodata.id_biodata = user.id');
         $this->db->where('biodata.id_biodata', $id);
         return $this->db->get()->row();
    }
}