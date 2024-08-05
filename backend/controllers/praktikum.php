<?php

	/**
	 * 
	 */
	class Praktikum extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();
			
			$this->load->model('Mtugas');
			$this->load->helper(array('form', 'url'));
		}

		public function form()
		{
			$this->load->view('tugas');
		}

		public function regis()
		{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '20000';
			$config['max_width']  = '1920';
			$config['max_height']  = '1080';
			
			$this->load->library('upload', $config);
			$this->load->helper('security');

			if ( ! $this->upload->do_upload('gambar')){
				$error = array('error' => $this->upload->display_errors());
				echo "<pre>";
				print_r ($error);
				echo "</pre>";
			}
			else{
				$data =$this->upload->data();
				$gambar=$data['file_name'];
				$regis = array('nim'=>$this->input->post('nim'),
							'nama'=>$this->input->post('nama'),
							'password'=>do_hash($this->input->post('pass'),'sha1'),
							'gambar'=>$gambar);
				print_r($data);

			$this->Mtugas->input($regis);
			echo "succes";
			}
		}
	}

	public function idexlogin()
	{
		$this->load->view('login');
	}
?>