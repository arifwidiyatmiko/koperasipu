<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan extends CI_Controller {

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
		$this->load->model('SimpananModel');
		if (!$this->session->userdata('users_koperasi')) {
			redirect('Auth','refresh');
		}
	}
	
	public function index()
	{	
		$data['simpanan'] = $this->SimpananModel->getSimpanan()->result();
		// print_r($data['peminjaman']);die();
		$this->load->view('header');
		$this->load->view('Simpanan/simpanan_index',$data);
		$this->load->view('footer');
	}

	public function bayarSimpanan($id)
	{	
		$data['simpanan'] = $this->SimpananModel->getSimpananId($id);
		// print_r($data['peminjaman']);die();
		$this->load->view('header');
		$this->load->view('Simpanan/simpanan_bayar',$data);
		$this->load->view('footer');
	}

	public function submitSimpanan($id){
		$saldo = $this->input->post("saldo") + $this->input->post("bayar_simpanan");
		$saldokem = $this->input->post("saldokem") + $this->input->post("bayar_kematian");
		$simpanan = array('idSimpanan' => $id, 'nominalBayar' => $this->input->post("bayar_simpanan"),'tagihanBayar' => $this->input->post("tagihanBayar"), 'saldoTerakhir' => $saldo, 'saldokemTerakhir' => $saldokem, 'tanggal'=>date('Y-m-d H:i:s'));
		$tgl = date('Y-m-d H:i:s');
		// print_r($saldokem);die();
		$this->SimpananModel->updateSimpanan($id,$saldo,$saldokem,$tgl);
		$this->SimpananModel->insertSimpanan($simpanan);
		redirect('Simpanan');
		// print_r($nominal); die();
	}

	public function detailSimpanan($id)
	{	
		$data['simpanan'] = $this->SimpananModel->getDetailSimpanan($id)->result();
		// print_r($data['simpanan']);die();
		$this->load->view('header');
		$this->load->view('Simpanan/simpanan_detail',$data);
		$this->load->view('footer');
	}
	
}
