<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function signin($value='')
	{
		$data = array('no_hp' => $this->input->post('phone'),'password'=>md5($this->input->post('password')) );
		$res['data'] = $this->UserModel->getUser($data)->result();
		// print_r($res['data']);die();
		if (empty($res['data'])) {
			$info = '<div class="alert alert-danger">
					  <strong>Coba Lagi!</strong> Kombinasi Nomor Telepon dan Password Salah.
					</div>';
			$this->session->set_flashdata('info', $info);
			redirect('Auth');
		}else{
			$this->session->set_userdata('users_koperasi',$res['data'][0]);
			if ($res['data'][0]->role == 'ANGGOTA') {
				redirect('welcome','refresh');
			}elseif ($res['data'][0]->role == 'PENGURUS') {
				redirect('pengurus','refresh');
			}
		}
		
	}
	public function logout($value='')
	{
		$this->session->sess_destroy();
		redirect('Welcome','refresh');
	}
}
