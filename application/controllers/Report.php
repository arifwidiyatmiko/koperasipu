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

		if(isset($_POST['tahun'])){
			$tahun = $_POST['tahun'];
		}else{
			$tahun = 2018;
		}
		if(isset($_POST['unit_kerja'])){
			$unit_kerja = $_POST['unit_kerja'];
		}else{
			$unit_kerja = 0;
		}
		$data['peminjaman'] = $this->ReportModel->getPeminjam($tahun,$unit_kerja);
		$data['tahun'] = $tahun;
		$data['unit_kerja'] = $unit_kerja;

		$this->load->view('header');
		$this->load->view('Report/peminjaman', $data);
		$this->load->view('footer');
	}

	public function PeminjamanPerbulan()
	{	
		$bulan = '';
		$tahun = '';
		$unit_kerja = '';

		if(isset($_POST['bulan'])){
			$bulan = $_POST['bulan'];
		}else{
			$bulan = 8;
		}
		if(isset($_POST['tahun'])){
			$tahun = $_POST['tahun'];
		}else{
			$tahun = 2018;
		}
		if(isset($_POST['unit_kerja'])){
			$unit_kerja = $_POST['unit_kerja'];
		}else{
			$unit_kerja = 0;
		}
		$data['peminjaman'] = $this->ReportModel->getPeminjamanPerBulan($bulan, $tahun, $unit_kerja);
		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;
		$data['unit_kerja'] = $unit_kerja;

		$this->load->view('header');
		$this->load->view('Report/peminjaman_perbulan', $data);
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
		$tahun = $this->uri->segment(3);
		$unit_kerja = $this->uri->segment(4);
		$data['angsuran'] = $this->ReportModel->getDetailAngsuran($tahun,$unit_kerja);
		$data['tahun'] = $tahun;
		$data['unit_kerja'] = $unit_kerja;
		$this->load->view('report_peminjaman',$data);
	}

	public function downloadExcelPerbulan()
	{
		$bulan = $this->uri->segment(3);
		$tahun = $this->uri->segment(4);
		$unit_kerja = $this->uri->segment(5);
		$data['angsuran'] = $this->ReportModel->getDetailTagihanPerbulan($bulan, $tahun,$unit_kerja);
		$data['tahun'] = $tahun;
		$data['unit_kerja'] = $unit_kerja;
		$this->load->view('Report/report_peminjaman_perbulan',$data);
	}
	
	
}
