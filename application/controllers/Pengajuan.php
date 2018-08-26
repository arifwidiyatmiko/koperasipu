<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

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
		
		if (!$this->session->userdata('users_koperasi')) {
			redirect('Auth','refresh');
		}
		$this->load->model('UserModel');
		$this->load->model('PeminjamanModel');
	}
	public function index()
	{
		$data['usulan'] = $this->PeminjamanModel->getPengajuanAll()->result();
		$this->load->view('header');
		$this->load->view('pengajuan',$data);
		$this->load->view('footer');
	}
	public function status($id,$status)
	{
		$this->PeminjamanModel->updateStatusPengajuan($id,$status);
		if ($status == 1) {
			$data = $this->PeminjamanModel->getUsulanPeminjamanId($id)->result_array()[0];
			unset($data['idUsulanPeminjaman']);
			unset($data['status']);
			$this->PeminjamanModel->usulan_to_peminjaman($data);
		}
		redirect('Pengajuan','refresh');
	}
	
}
