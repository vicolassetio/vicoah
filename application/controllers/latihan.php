<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Latihan extends CI_Controller {

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
		$tmp = 'PE-201507-003';
		$tmp2 = explode('-',$tmp);
		echo substr($tmp,-3) .'<br>';
		echo $tmp2[count($tmp2)-1];
	}
	
}
