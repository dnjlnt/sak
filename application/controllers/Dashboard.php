<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require './vendor/autoload.php';

class Dashboard extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->library("pdfgenerator");
    }
	
	public function index() {
		$this->load->view('dashboard/index.php');
	}

	public function diagnosaListIndex() {
		$getMasterDiagnosa = $this->ModelDashboard->getMasterDiagnosa();
		$this->load->view('dashboard/diagnosa-list.php');
	}

	public function interUtamaIndex() {
		$this->load->view('dashboard/interutama-list.php');
	}

	public function interPendukungIndex() {
		$this->load->view('dashboard/interpendukung-list.php');
	}

	public function respirasi() {
		$this->load->view('dashboard/respirasi.php');
	}

	public function sirkulasi() {
		$this->load->view('dashboard/sirkulasi.php');
	}

	public function nutrisicairan() {
		$this->load->view('dashboard/nutrisicairan.php');
	}

	public function eliminasi() {
		$this->load->view('dashboard/eliminasi.php');
	}

	public function aktivitasistirahat() {
		$this->load->view('dashboard/aktivitasistirahat.php');
	}

	public function neurosensori() {
		$this->load->view('dashboard/neurosensori.php');
	}

	public function reproduksiseksualitas() {
		$this->load->view('dashboard/reproduksiseksualitas.php');
	}

	public function nyerikenyamanan() {
		$this->load->view('dashboard/nyerikenyamanan.php');
	}

	public function integritasego() {
		$this->load->view('dashboard/integritasego.php');
	}

	public function pertumbuhanperkembangan() {
		$this->load->view('dashboard/pertumbuhanperkembangan.php');
	}

	public function kebersihandiri() {
		$this->load->view('dashboard/kebersihandiri.php');
	}

	public function penyuluhanpembelajaran() {
		$this->load->view('dashboard/penyuluhanpembelajaran.php');
	}

	public function interaksisosial() {
		$this->load->view('dashboard/interaksisosial.php');
	}

	public function keamananproteksi() {
		$this->load->view('dashboard/keamananproteksi.php');
	}

	public function getform_intlatihanbatukefektif() {
		$this->load->view('dashboard/int_latihanbatuefektif.php');
	}

	public function getform_intmanjalannafas() {
		$this->load->view('dashboard/int_manjalannafas.php');
	}

	public function d0001() {
		$this->load->view('dashboard/d0001.php');
	}

	public function d0002() {
		$this->load->view('dashboard/d0002.php');
	}

	public function patientData() {
		$this->load->view('dashboard/patientdata_page.php');
	}

	public function patientDataBasedonDate() {
		$this->load->view('dashboard/patientdatabasedondate_page.php');
	}

	public function patientIntervensi() {
		$this->load->view('dashboard/patientintervensi_page.php');
	}

	public function previewDiagnosaD0001() {
		$this->load->view('dashboard/d0001-preview.php');
	}

	public function previewDiagnosaD0002() {
		$this->load->view('dashboard/d0002-preview.php');
	}

	public function previewDiagnosaD0003() {
		$this->load->view('dashboard/d0003-preview.php');
	}

	public function previewDiagnosaD0004() {
		$this->load->view('dashboard/d0004-preview.php');
	}

	public function previewDiagnosaD0005() {
		$this->load->view('dashboard/d0005-preview.php');
	}

	public function previewDiagnosaD0006() {
		$this->load->view('dashboard/d0006-preview.php');
	}

	public function previewIntervensi() {
		$this->load->view('dashboard/intervensi-preview.php');
	}
}