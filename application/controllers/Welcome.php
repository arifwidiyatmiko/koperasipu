<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->model('PeminjamanModel');
	}
	public function index()
	{
		$data['usulan'] = $this->PeminjamanModel->getUsulanPeminjaman($this->session->userdata('users_koperasi')->idUser)->result();
		// print_r($data);die();
		$this->load->view('header');
		// $this->load->view('sidebar');
		$this->load->view('welcome_message',$data);
		$this->load->view('footer');
	}
	public function backup($value='')
	{
		$this->load->dbutil();

		$prefs = array(     
		    'format'      => 'zip',             
		    'filename'    => 'my_db_backup.sql'
		    );


		$backup =& $this->dbutil->backup($prefs); 

		$db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
		$save = 'pathtobkfolder/'.$db_name;

		$this->load->helper('file');
		write_file($save, $backup); 


		$this->load->helper('download');
		force_download($db_name, $backup);# code...
	}
}
