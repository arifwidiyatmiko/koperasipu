<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

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
		$this->load->model('UserModel');
		if (!$this->session->userdata('users_koperasi')) {
			redirect('Auth','refresh');
		}
	}
	public function index()
	{
		$data['anggota'] = $this->UserModel->getUserList('ANGGOTA')->result();
		$this->load->view('header');
		$this->load->view('anggota',$data);
		$this->load->view('footer');
	}

	public function editAnggota($id){
		$data['anggota'] = $this->UserModel->getUserID($id)->result();
		// print_r($data['anggota']->result());die();
		$this->load->view('header');
		$this->load->view('Anggota/edit_anggota',$data);
		$this->load->view('footer');
	}
	
	
}
