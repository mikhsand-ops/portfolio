<?php
/**
 * 
 */
class dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mmenu');
		
	}

	public function index()
	{
		$this->load->view('awal');
	}

	public function login(){

		$user=$this->input->post('username');
		$pass=$this->input->post('pass');

		if ($user=='user' && $pass=='user') {
			redirect('awalpengelola','refresh');
		}
		elseif ($user=='merch' && $pass=='merch') {
			redirect('Cmerch/index','refresh');
		}
		elseif ($user=='kasir' && $pass=='kasir') {
			redirect('Ckasir/index','refresh');
		}
		else{
			echo "username atau password salah";
		}
	}

	

	

	

	

	

}
?>