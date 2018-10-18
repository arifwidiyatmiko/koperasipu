<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas extends CI_Controller {

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
		$this->load->model('KasModel');
		if (!$this->session->userdata('users_koperasi')) {
			redirect('Auth','refresh');
		}
	}
	
	public function index()
	{	
		$data['kas'] = $this->KasModel->getKasList()->result();
		$this->load->view('header');
		$this->load->view('Kas/index',$data);
		$this->load->view('footer');
	}

	public function tambahKas()
	{	
		$data['kas'] = $this->KasModel->getNoPerkiraanList()->result();
		$this->load->view('header');
		$this->load->view('Kas/tambah_kas',$data);
		$this->load->view('footer');
	}

	public function submitKas(){
		$kas = array('noPerkiraan' => $this->input->post("noPerkiraan"),'nominal' => $this->input->post("nominal"), 'jenisKas' => $this->input->post("jenisKas"), 'keterangan' => $this->input->post("keterangan"), 'tanggal'=>date('Y-m-d H:i:s'));
		// print_r($kas); die();
		$this->KasModel->InsertKas($kas);
		redirect('Kas');
		
	}

}
