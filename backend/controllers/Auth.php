<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_dashboard');
		$this->load->model('M_pengelola');
		$this->load->library('encryption');
	}

	public function index()
	{
		/*$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {*/
			$data['title'] = 'Login Pengelola';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('login/login', $data);
			$this->load->view('templates/auth_footer', $data);
		/*} else {
			//validasi sukses
			$this->login();
		}*/
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$query = $this->M_pengelola->login($email);

		/*$pass_db = $query[0]->password;*/
		/*$user = $this->db->get_where('user', ['email' => $email])->row_array();*/

		//jika usernya ada
		if ($query) {
			//jika usernya aktiv

			if ($query[0]->is_active == 1) {
				//cek password

			if (count($query)==0 OR count($query)>1) {
			echo "email salah";

			}elseif (count($query)==1) {
			$pass_db=$query[0]->password;
			

			if ($password==$pass_db) {
				$session=array('email'=>$query[0]->email,
								'nama'=>$query[0]->name);

				$this->session->set_userdata($session);
				//$this->load->view('awalmerch', $session);
				redirect('User/index','refresh');
			}else{
				echo "password salah";
				
			}
		}
				/*if ($password==$pass_db) {
					$data = array(
						'email' => $query[0]->email,	
						'role_id' => $query[0]->role_id
					);
					$this->session->set_userdata($data);
					redirect('Auth/home','refresh');
				}else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> password salah! </div>');
					redirect('Auth');
				}*/
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Akun belum diaktivasi oleh pengelola! </div>');
				redirect('Auth');
			}
		} else {
			//jika tidak ada user maka gagal login

			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email is not registered</div>');
			redirect('Auth');
		}
	}

	public function home()
	{
        $data['title'] = 'Admin ORSA';
        $data['merchant'] = $this->M_dashboard->tampil_data3();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data );
        $this->load->view('admin/pengelola', $data);
        $this->load->view('templates_admin/footer', $data);
    }


	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registered!'
		]);

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'password dont matches!',
			'min_length' => 'password to short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registration Pengelola';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('login/registration', $data);
			$this->load->view('templates/auth_footer', $data);
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => $this->input->post('password1'),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Congratulation! your account has been created. Please Login</div>');
			redirect('auth');
		}
	}
	public function logout()
	{

		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> You have been loged out!</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('blocked');
	}
}
