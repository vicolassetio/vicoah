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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		$this->load->view('welcome_message');
	}
	
	function value_cek()
	{
		$this->load->helper("test_helper");
		value_checker();
	}
	
	function test_helper1()
	{
		$this->load->library('session');
		$this->load->helper('test_helper');
		 cetak();
	}
	
	function insert_array($var1,$var2,$var3)
	{
		$this->load->helper("test_helper");
		addArray($var1,$var2,$var3);
	}
	
	function cetak_ar()
	{
		$this->load->helper("test_helper");
		cetak_array();
	}
	
	function hapus_ar($var1)
	{
		$this->load->helper("test_helper");
		hapus_array($var1);
	}
	
	function cari_ar($var1)
	{
		$this->load->helper("test_helper");
		cari_array($var1);
	}
	
	function olah_kata($var1)
	{
		echo strtoupper($var1);
		echo "<br>";
		echo strlen($var1);
		echo "<br>";
		echo "Huruf pertama " . strtoupper($var1[0]);
		echo "<br>";
		echo "Huruf terakhir " . strtoupper(substr($var1, -1));
	}
	
	function bulan($bulan)
		{
			$months = array(1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'December');
			
			if($bulan < 1 || $bulan > 12)
			{
				return false;
			}
			else
			{
				return $months[$bulan];
			}
		}
	
	function sample()
	{
		$var =$this->bulan(4); 
		if($var!=false)
		{
			echo $var;
		}
	}
	
	function get_kode($var)
	{
			echo date("Ym" . "-" . sprintf('%03d', $var));	
			echo "<br>";
			echo str_pad($var, 3, 0, STR_PAD_LEFT);
	}
	
	function get_selisih($tgl1,$tgl2)
	{
		$time = strtotime($tgl1);
		$newformat = date('Y-m-d',$time);
		echo $newformat;
		
		echo "<br>";
		
		$time2 = strtotime($tgl2);
		$newformat2 = date('Y-m-d',$time2);
		echo $newformat2;
		
		echo "<br>";
		
		$date1 = new DateTime($tgl1);
		$date2 = new DateTime($tgl2);
		
		
		$diff = $date2->diff($date1)->format("%a");
		echo $diff;

	}
}
