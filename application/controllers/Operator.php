<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {


	public function __construct()
   {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('UserModel', 'um');
		$this->cek_role();
   }

   function search()
	{
		$keyword = $this->input->post('data');
        $level = intval($this->session->userdata('level')) + 3;
		$this->db->select();
		$this->db->from('biodata');
		$this->db->join('user', 'biodata.id_biodata = user.id');
		$this->db->where('level', $level);
		$this->db->like('nama', $keyword);
		$data = $this->db->get()->result_array();
		echo json_encode($data);
	}

	   function searchver()
	{
		$keyword = $this->input->post('data');
        $level = intval($this->session->userdata('level')) + 3;
		$this->db->select();
		$this->db->from('biodata');
		$this->db->join('user', 'biodata.id_biodata = user.id');
		$this->db->where('level', $level);
		$this->db->where('statusformulir', 'sudah');
		$this->db->like('nama', $keyword);
		$data = $this->db->get()->result_array();
		echo json_encode($data);
	}

   public function cetak($id){
	   $data['data'] = $this->um->getby($id);
	   $this->load->view('cetak', $data);
	}

   public function cek_role()
    {
        if(!$this->session->userdata('authenticated')){
			redirect(base_url('Login'));
		} else {
// 			$level = intval($this->session->userdata('level'));
			if (intval($this->session->userdata('level')) > 3 )
			{
			redirect(base_url());
			}
		}
	}

	public function jadwal(){
		if ( $this->um->ubahjadwal()) {
			$this->session->set_flashdata('message', 'Success, jadwal berhasil diubah');
			redirect(base_url('Operator'));
		} else {
			$this->session->set_flashdata('message', 'Gagal, jadwal tidak berhasil diubah');
			redirect(base_url('Operator'));
		}
	}

	public function index()
	{
		$data['judul'] = 'PPDB AL-AMIN 2020';
        $data['pendaftar'] = $this->um->get_pendaftar();
        $data['formulirpendaftar'] = $this->um->get_formulirpendaftar();
        $data['verifikasipendaftar'] = $this->um->get_verifikasipendaftar();
        $data['total'] = $this->um->getby();
		$role = $this->session->userdata('level');
		$data['jadwal'] = $this->um->getjadwal($role);
		$data['um'] = $this->um;
		$this->load->view('header', $data);
		$this->load->view('Operator', $data);
		$this->load->view('footer');
	}

	public function insert()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'level' => $this->input->post('level'),
		);
		
		$biodata = array(
			'nama' => $this->input->post('nama'),
			'asalsekolah' => $this->input->post('asalsekolah'),
			'gelombang' => $this->input->post('gelombang'),
			'tempatlahir' => $this->input->post('tempatlahir'),
			'tanggallahir' => $this->input->post('tanggallahir'),
			'no_hp' => $this->input->post('no_hp')
		);

		$tanggal = intval(date('Ymd'));
		$tanggallahir = strtotime($this->input->post('tanggallahir'));
		$tanggallahir = intval(date('Ymd', $tanggallahir));
		$umur = $tanggal - $tanggallahir;
		if ($this->session->userdata('level') == 1 && $umur < 70000) {
			$this->session->set_flashdata('peringatan', "<strong>GAGAL</strong>, Umur pendaftar belum mencapai 7 tahun");
			redirect(base_url('Operator'));
		} else {
			$id = $this->um->insert($data, $biodata);
			if ( $id->id ) {
				$this->session->set_flashdata('message', "<strong>Success</strong> data berhasil ditambahkan");
				$this->cetak($id->id);
			}
		}
	}
	
	public function edit($id)
	{
		if ($this->input->post()) {
				$data = $this->input->post();			
			if ($this->um->edit($id, $data)) {
				$this->session->set_flashdata('message', "<strong>Success</strong> data berhasil diubah");
				redirect(base_url('Operator'));
			}
		} 			
			$data['detail'] = $this->um->getby($id);
			$data['judulnya'] = 'Ubah data pendaftar';
			$this->load->view('header', $data);
			$this->load->view('Form', $data);
			$this->load->view('footer');
	}

	public function editformulir($id)
	{
		if ($this->input->post('id')) {
			$data = $this->input->post();
			
			if ($this->um->edit($id, $data) > 0) {
				redirect(base_url('Operator'));
			}
		}

			$data['datapendaftar'] = $this->um->getdatapendaftar($id);
			$data['judulnya'] = 'Ubah data pendaftar';
			$this->load->view('header', $data);
			$this->load->view('Form', $data);
			$this->load->view('footer');
	}

	public function delete($id){
		if ($this->um->delete($id)){
			$this->session->set_flashdata('message', 'Data berhasil terhapus');
			redirect(base_url('Operator'));
		}
	}

	public function verifikasi($id = null){

	if (!isset($id)) redirect(base_url('Operator'));
		$stat = 1;
		if ($this->um->ver($id, $stat)){
			redirect(base_url('Operator'));
		}
	}

	public function unverifikasi($id = null){

	if (!isset($id)) redirect(base_url('Operator'));
		$stat = 0;
		if ($this->um->ver($id, $stat)){
			redirect(base_url('Operator'));
		}
	}
	
	public function cetakformulir($id)
    {
        $data['data'] = $this->um->getdatapendaftar($id);
        $this->load->view('cetak', $data);
    }
	
	public function exportpd($cl){
		switch ($cl) {
			case 'sd':
				$data['pendaftar'] = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 4")->result_array();
			break;
			case 'smp1':
				$data['pendaftar'] = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 5 AND gelombang = 1")->result_array();
			break;
			case 'smp2':
				$data['pendaftar'] = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 5 AND gelombang = 2")->result_array();
			break;
			case 'smk':
				$data['pendaftar'] = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 6")->result_array();
			break;
			case 'smk1':
				$data['pendaftar'] = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 6  AND jurusan LIKE '%Multimedia%' ESCAPE '!'")->result_array();
			break;
			case 'smk2':
				$data['pendaftar'] = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 6  AND jurusan LIKE '%Tata Boga%' ESCAPE '!' ")->result_array();
			break;
		}
		$this->load->view('exportpd', $data);
	}
	
	public function export($cl){
		switch ($cl) {
			case 'sd':
				$data['pendaftar'] = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 4")->result_array();
			break;
			case 'smp1':
				$data['pendaftar'] = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 5 AND gelombang = 1")->result_array();
			break;
			case 'smp2':
				$data['pendaftar'] = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 5 AND gelombang = 2")->result_array();
			break;
			case 'smk':
				$data['pendaftar'] = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 6")->result_array();
			break;
			case 'smk1':
				$data['pendaftar'] = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 6  AND jurusan LIKE '%Multimedia%' ESCAPE '!'")->result_array();
			break;
			case 'smk2':
				$data['pendaftar'] = $this->db->query("SELECT * FROM user JOIN biodata ON user.id = biodata.id_biodata WHERE level = 6  AND jurusan LIKE '%Tata Boga%' ESCAPE '!' ")->result_array();
			break;
		}
		$this->load->view('export', $data);
	}
}