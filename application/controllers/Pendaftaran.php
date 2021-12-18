<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {


	public function __construct()
   {
        parent::__construct();
        $this->load->model('PendaftarModel', 'pm');
        $this->load->model('UserModel', 'um');
        $this->load->model('WelcomeModel', 'wm');
		$this->cek_role();
   }

    function cek_role(){
        if(!$this->session->userdata('authenticated')){
			redirect(base_url('Login'));
		}
    }

    function valtodate($val)
    {
        $date = strtotime($val);
        $date = date('Ymd', $date);
        return intval($date);
    }
    
    function gelombang($jadwal)
    {   
            $tanggal = date('Ymd');
            $tanggalbuka1 = $this->valtodate($jadwal[0]['tanggalbuka']);
            $tanggaltutup1 = $this->valtodate($jadwal[0]['tanggaltutup']);
            $tanggalbuka2 = $this->valtodate($jadwal[1]['tanggalbuka']);
            $tanggaltutup2 = $this->valtodate($jadwal[1]['tanggaltutup']);
    
            if(intval($tanggal) < $tanggaltutup1){
              return  $gelombang  = 1;
            } elseif(intval($tanggal) < $tanggaltutup2) {
                return $gelombang = 2;
            } else {
                return $gelombang = 0;
            }
    }

    public function index()
    {
        $data['datapendaftar'] = $this->pm->getdatapendaftar();
        $data['judul'] = 'PPDB AL-AMIN 2020';
		$data['isian'] = $this->wm->index();
        $data['um'] = $this->um;
        $this->load->view('header', $data);
        $this->load->view('welcome_message', $data);
        $this->load->view('footer');        
    }
    
    public function Cetak()
    {
        $data['data'] = $this->pm->getdatapendaftar();
        $this->load->view('cetak', $data);        
    }

    public function Formulir()
    {   
        $level = intval($this->session->userdata('level')) - 3;
        // $tanggal = date('Ymd');
        $jadwal = $this->um->getjadwal($level);
        $p = $this->pm->getdatapendaftar();
        // var_dump($p);
        $p = intval($p->gelombang);
        // echo $p;
        // $level =$level == 5 && count($jadwal > 1) ? $gelombang = $this->gelombang($jadwal) : '' ;
        if($level == 5 && count($jadwal) > 1)
        {
            $gelombang = $this->gelombang($jadwal);
            if ($p != $gelombang) {
            $this->session->set_flashdata('peringatan', 'Pendaftaran sudah melebihi jadwal, Silahkan menghubungi Operator untuk melanjutkan pengisian formulir / perubahan data formulir');
            redirect(base_url('Pendaftaran'));
            }
        }
        $data['datapendaftar'] = $this->pm->getdatapendaftar();
		$data['judul'] = 'PPDB AL-AMIN 2020';
        $this->load->view('header', $data);
        $this->load->view('Form');
        $this->load->view('footer');
    }

    public function Simpan()
    {
        if($this->pm->insert() > 0)
        {
            if($this->session->userdata('level') < 4){
                $this->session->set_flashdata('message', 'Sukses, data berhasil diubah!');
                redirect(base_url('Operator'));
                
            }
            redirect(base_url('Pendaftaran'));
        } else {
            if($this->session->userdata('level') < 4){
                $this->session->set_flashdata('peringatan', 'tidak ada data yang diubah!');
                redirect(base_url('Operator'));
                
            }
            $this->session->set_flashdata('peringatan', 'tidak ada perubahan data');
            redirect(base_url('Pendaftaran'));
        }
    }

}