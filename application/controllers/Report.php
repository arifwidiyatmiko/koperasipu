<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
		$this->load->model('ReportModel');
		$this->load->helper(array('url','form','file'));
		$this->load->library(array('PHPExcel'));
		if (!$this->session->userdata('users_koperasi')) {
			redirect('Auth','refresh');
		}
	}
	public function Peminjaman()
	{	
		$tahun = '';
		$unit_kerja = '';
		($tahun == null) ? $tahun = 2018 : $tahun = $_POST['tahun'];
		($unit_kerja == null) ? $unit_kerja = 0 : $tahun = $_POST['unit_kerja'];

		$data['peminjaman'] = $this->ReportModel->getPeminjam($tahun,$unit_kerja);
		$this->load->view('header');
		$this->load->view('Report/peminjaman', $data);
		$this->load->view('footer');
	}

	public function Simpanan()
	{
		
		$this->load->view('header');
		$this->load->view('Report/simpanan');
		$this->load->view('footer');
	}

	public function downloadExcel()
	{
		$this->load->view('report_peminjaman');
		
	}
	
	
}
