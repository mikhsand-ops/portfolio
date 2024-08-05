 <?php
	
	/**
	 * 
	 */
	class Cmerch extends CI_Controller
	{
		
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mmenu');
		$this->load->model('Mmerch');
		$this->load->model('Mtransaksi');	
	}

	public function index($value='awalmerch')
	{
		if ($this->session->userdata('id_merchant')) {
			$where=$this->session->userdata('id_merchant');
			$where1=$this->session->userdata('id_merchant');

			$stat['total'] = $this->Mmerch->omsetbulanan($where1);
			$stat['menu'] = $this->Mmenu->pesanan($where);
			$stat['jumlah'] = $this->Mmerch->jumlahtrans($where);
			$data['merchant'] = $this->Mmerch->tampil($where);
			$this->load->view('theme/headermech',$data);
			$this->load->view($value,$stat);


		}else{
			redirect('index','refresh');
		}
	}

	public function indexlogin()
	{
		$this->load->view('loginmerch');
	}

	public function login()
	{
		$username=$this->input->post('username');
		$pass=$this->input->post('pass');

		$data=array('userMerch'=>$username, 'passMerch'=>$pass);
		$clean=$this->security->xss_clean($data);

		$query=$this->Mmerch->login($username);

		if (count($query)==0 OR count($query)>1) {
			echo "username salah";
		}
		elseif (count($query)==1) {
			$pass_db=$query[0]->pass_merchant;
			//$pass_decrypt=$this->encryption->decrypt($pass_db);//
			//echo $pass_db."<br>".$pass_decrypt;//

			if ($pass==$pass_db) {
				$session=array('id_merchant'=>$query[0]->id_merchant,
								'nama'=>$query[0]->nama,
								'username_merchant'=>$query[0]->username_merchant,
								'alamat_merchant'=>$query[0]->alamat,
								'logo_merchant'=>$query[0]->logo_merchant);

				$this->session->set_userdata($session);
				//$this->load->view('awalmerch', $session);
				redirect('Cmerch/index','refresh');
			}else{
				echo "password salah";
			}
		}
	}

	public function indextambah()
	{
		if ($this->session->userdata('id_merchant')) {

			$this->load->view('tambahmenu');
		}else{
			redirect('index','refresh');
		}
		
	}

	public function tambah()
	{	
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required|min_length[10]|max_length[100]');

			$config['upload_path'] = './menu/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000';
			$config['max_width']  = '10000';
			$config['max_height']  = '10000';

			$this->load->library('upload', $config);
			$this->load->helper('security');


			if ( ! $this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
				echo "<pre>";
				print_r ($error);
				echo "</pre>";
			}
			else{
				$data =$this->upload->data();
				$gambar=$data['file_name'];

				$tambah = array('id_merchant'=>$this->session->userdata('id_merchant'),
							'nama_menu'=>$this->input->post('nama'),
							'harga'=>$this->input->post('harga'),
							'keterangan'=>$this->input->post('desk'),
							'kategori'=>$this->input->post('kategori'),
							'foto_menu'=>$gambar);

			$this->Mmenu->input($tambah);
			redirect('Cmerch/kelolamenu','refresh');
			}
	}

	public function kelolamenu()
	{
		if ($this->session->userdata('id_merchant')) {
			
			$where=$this->session->userdata('id_merchant');
			$tambah['tambah']=$this->Mmenu->tampil($where);
			$this->load->view('theme/headermech');
			$this->load->view('kelolamenu',$tambah);
		}else{
			redirect('index','refresh');
		}
	}

	public function single($idMenu)
	{
		if ($this->session->userdata('id_merchant')) {

			$detail['detail']=$this->Mmenu->edit($idMenu);
			$this->load->view('single',$detail);
		}else{
			redirect('index','refresh');
		}
		
	}

	public function Veditmenu($idMenu)
	{
		if ($this->session->userdata('id_merchant')) {

			$detail['detail']=$this->Mmenu->edit($idMenu);
			$this->load->view('editmenu',$detail);
		}else{
			redirect('index','refresh');
		}
		
	}

	public function editmenu($idMenu)
	{
		$nama=$this->input->post('nama');
		$harga=$this->input->post('harga');
		$kategori=$this->input->post('kategori');
		$deskripsi=$this->input->post('deskripsi');	


			$config['upload_path'] = './menu/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000';
			$config['max_width']  = '10000';
			$config['max_height']  = '10000';

			$this->load->library('upload', $config);
			$this->load->helper('security');


		if ( ! $this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
				echo "<pre>";
				print_r ($error);
				echo "</pre>";
			}
			else{
				$data =$this->upload->data();
				$gambar=$data['file_name'];

				$menu = array('nama_menu'=>$this->input->post('nama'),
							'harga'=>$this->input->post('harga'),
							'kategori'=>$this->input->post('kategori'),
							'keterangan'=>$this->input->post('deskripsi'),
							'foto_menu'=>$gambar);

			$this->Mmenu->update('menu',$menu,$idMenu);
			$this->load->view('kelolamenu',$menu);
			redirect('Cmerch/kelolamenu','refresh');
			}
	}

	public function delete($idMenu)
	{
		$status="Non-Aktif";

			$trans = array('status_menu' =>$status );
		$this->Mmenu->hapus('menu',$trans,$idMenu);
		redirect('Cmerch/kelolamenu','refresh');
	}

	public function aktif($idMenu)
	{
		$status="Aktif";

			$trans = array('status_menu' =>$status );
		$this->Mmenu->aktif('menu',$trans,$idMenu);
		redirect('Cmerch/kelolamenu','refresh');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('index','refresh');
	}

	public function profilmerch()
	{
		if ($this->session->userdata('id_merchant')) {

			$where=$this->session->userdata('id_merchant');
			$data['data']=$this->Mmerch->tampil($where);
			//$this->load->view('theme/headermech',$data);
			$this->load->view('profilmerch',$data);
		}else{
			redirect('index','refresh');
		}
	}

	public function penonaktifan($where)
	{
		$data['merchant'] = $this->Mmerch->tampil($where);
		$this->load->view('form_penonaktifan',$data);
	}

	public function kiostutup($id_merchant)
	{
		$status=$this->input->post('status');

		$stat = array('status_merch' =>$status );
		$this->Mmerch->update_stat('merchant',$stat,$id_merchant);
		redirect('Cmerch/profilmerch','refresh');
	}

	public function bukakios($id_merchant)
	{
		$status="Aktif";

		$stat = array('status_merch' =>$status );
		$this->Mmerch->update_stat('merchant',$stat,$id_merchant);
		redirect('Cmerch/profilmerch','refresh');
	}

	public function Veditprofil($id_merchant)
	{
		if ($this->session->userdata('id_merchant')) {

			$detail['detail']=$this->Mmerch->edit($id_merchant);
			$this->load->view('editprofil',$detail);
		}else{
			redirect('index','refresh');
		}
		
	}

	public function editprofil($id_merchant)
	{

		$nama_merchant=$this->input->post('kios');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$logo=$this->input->post('logo');	


			$config['upload_path'] = './assets/img/logoToko/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000';
			$config['max_width']  = '10000';
			$config['max_height']  = '10000';

			$this->load->library('upload', $config);
			$this->load->helper('security');


		if ( ! $this->upload->do_upload('logo')){
				$error = array('error' => $this->upload->display_errors());
				echo "<pre>";
				print_r ($error);
				echo "</pre>";
			}
			else{
				$data =$this->upload->data();
				$gambar=$data['file_name'];

				$value = array('nama_merchant'=>$this->input->post('kios'),
							'nama'=>$this->input->post('nama'),
							'alamat'=>$this->input->post('alamat'),
							'logo_merchant'=>$gambar);

			$this->Mmerch->update('merchant',$value,$id_merchant);
			$this->load->view('profilmerch',$value);
			redirect('Cmerch/profilmerch','refresh');
			}

			/*$data = array('nama_merchant'=>$this->input->post('kios'),
							'nama'=>$this->input->post('nama'),
							'alamat'=>$this->input->post('alamat'),
							'logo_merchant'=>$this->input->post('gambar'));

			$this->Mmerch->update('merchant',$data,$id_merchant);
			$this->load->view('profilmerch',$data);
			redirect('Cmerch/profilmerch','refresh');*/
	}

	public function reportmerch()
	{
		if ($this->session->userdata('id_merchant')) {

			$where1=$this->session->userdata('id_merchant');
			$data['data'] = $this->Mmerch->tampilreport($where1);
			$data['total'] = $this->Mmerch->omsetharian($where1);
			
			//$data['merchant']=$this->Mmerch->tampil();
			//$this->load->view('theme/headermech',$data);
			$this->load->view('reportmerch',$data);
			
		}else{
			redirect('index','refresh');
		}
	}

	public function filterreport()
	{
		if ($this->session->userdata('id_merchant')) {

			$tgl=$this->input->post('tanggal');
			$where1=$this->session->userdata('id_merchant');
			$data['filter']=$this->Mmerch->filterreport($tgl,$where1);
			$data['total'] = $this->Mmerch->omsetfilter($tgl,$where1);
			$this->load->view('reportfilter', $data);
		}else{
			redirect('index','refresh');
		}
	}

	public function filterbulan()
	{
		if ($this->session->userdata('id_merchant')) {

			$tgl=$this->input->post('bulan');
			$where1=$this->session->userdata('id_merchant');
			$data['filter']=$this->Mmerch->filterbulan($tgl,$where1);
			$data['total'] = $this->Mmerch->omsetbulan($tgl,$where1);
			$this->load->view('reportfilter', $data);
			
		}else{
			redirect('index','refresh');
		}
	}

	public function reportmingguan()
	{
		if ($this->session->userdata('id_merchant')) {

			$where1=$this->session->userdata('id_merchant');
			$data['data'] = $this->Mmerch->reportmingguan($where1);
			$data['total'] = $this->Mmerch->omsetmingguan($where1);
			
			//$data['merchant']=$this->Mmerch->tampil();
			//$this->load->view('theme/headermech',$data);
			$this->load->view('reportmerch',$data);
			
		}else{
			redirect('index','refresh');
		}
	}

	public function reportbulanan()
	{
		if ($this->session->userdata('id_merchant')) {

			$where1=$this->session->userdata('id_merchant');
			$data['data'] = $this->Mmerch->reportbulanan($where1);
			$data['total'] = $this->Mmerch->omsetbulanan($where1);
			
			//$data['merchant']=$this->Mmerch->tampil();
			//$this->load->view('theme/headermech',$data);
			$this->load->view('reportmerch',$data);
			/*$this->load->view('awalmerch', $data);*/
			
		}else{
			redirect('index','refresh');
		}
	}

	public function proses($id)
	{
		if ($this->session->userdata('id_merchant')) {
			
			$status=2;

			$trans = array('status' =>$status );
			$this->Mmenu->proses('pesanan',$trans,$id);
			//$this->load->view('reportkasir', $trans);
			redirect('Cmerch/index','refresh');
		}
	}

	public function profit(){
		if ($this->session->userdata('id_merchant')) {
			
			$where = $this->session->userdata('id_merchant');
			$data['data']  = $this->Mtransaksi->profit($where);
			$this->load->view('profitmerch', $data);
		}else{
			redirect('index','refresh');
		}
	}
	
}

?>