<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PeminjamanModel');
		if (!$this->session->userdata('users_koperasi')) {
			redirect('Auth','refresh');
		}
	}
	public function index()
	{
		$data['peminjaman'] = $this->PeminjamanModel->getPinjamanList()->result();
		// print_r($this->session->userdata('users'));die();
		$this->load->view('header');
		$this->load->view('peminjaman',$data);
		// $this->load->view('sidebar');
		//$this->load->view('peminjaman');
		$this->load->view('footer');
	}
	public function pengajuan($value='')
	{
		$data['ref_peminjaman'] = $this->Ref_JenispeminjamanModel->getAll();
		// print_r($data['ref_peminjaman']->result());die();
		$this->load->view('header');
		$this->load->view('pengajuan_peminjaman',$data);
		$this->load->view('footer');
	}

	public function pembayaran($id){
		$data['bayar'] = $this->PeminjamanModel->getNominal($id);

		$this->load->view('header');
		$this->load->view('pembayaran',$data);
		$this->load->view('footer');
	}

	public function submitPembayaran($id){
		$angsuran = array('idPeminjaman' => $id, 'nominalBayar' => $this->input->post("bayar_angsuran"), 'jasa' => $this->input->post("bayar_jasa") );
		// print_r($this->input->post("sisa_nominal")); die();
		$nominal = $this->input->post("sisa_nominal") - $this->input->post("bayar_angsuran");
		$this->PeminjamanModel->updatePembayaran($id,$nominal);
		$this->PeminjamanModel->insertPembayaran($angsuran);

	}

}
