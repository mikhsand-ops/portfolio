<?php
	
	/**
	 * 
	 */
	class Ckasir extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			
			$this->load->model('Mkasir');
			$this->load->model('Mtransaksi');
			$this->load->library('pagination');
		}

		public function indexloginkasir()
		{
			$this->load->view('loginkasir');
		}

		public function loginkasir()
		{
			$username=$this->input->post('username');
			$pass=$this->input->post('pass');

			$data=array('username_kasir'=>$username, 'pass_kasir'=>$pass);
			$clean=$this->security->xss_clean($data);

			$query=$this->Mkasir->login($username);

			if (count($query)==0 OR count($query)>1) {
				echo "username salah";
			}
			elseif (count($query)==1) {
				$pass_db=$query[0]->pass_kasir;
				//$pass_decrypt=$this->encryption->decrypt($pass_db);//
				//echo $pass_db."<br>".$pass_decrypt;//

				if ($pass==$pass_db) {
					$session=array('id_kasir'=>$query[0]->id_kasir,
									'nama_kasir'=>$query[0]->nama_kasir,
									'username_kasir'=>$query[0]->username_kasir);

					$this->session->set_userdata($session);
					//$this->load->view('awalkasir', $session);
					redirect('Ckasir/index','refresh');
				}else{
					echo "password salah";
				}
			}
		}	

		public function index($value='inputbayar')
		{
			if ($this->session->userdata('id_kasir')) {

				// $where=$this->session->userdata('idKasir');
				// $data['kasir']=$this->Mkasir->tampil($where);
				$this->load->view('theme/headerkasir');

				// $report['report']=$this->Mtransaksi->dailyorder();
				$this->load->view($value);
				// $this->load->view($value,$report);
			}else{
				redirect('index','refresh');
			}
		}

		public function profilkasir()
		{
		if ($this->session->userdata('id_kasir')) {

			$where=$this->session->userdata('id_kasir');
			$data['data']=$this->Mkasir->tampil($where);
			//$this->load->view('theme/headermech',$data);
			$this->load->view('profilkasir',$data);
		}else{
			redirect('index','refresh');
		}
	}

	public function Veditprofilkasir($id_kasir)
	{
		if ($this->session->userdata('id_kasir')) {

			$detail['detail']=$this->Mkasir->edit($id_kasir);
			$this->load->view('editprofilkasir',$detail);
		}else{
			redirect('index','refresh');
		}
		
	}

	public function editprofil($id_kasir)
	{
			$data = array('nama_kasir'=>$this->input->post('nama'),
							'alamat_kasir'=>$this->input->post('alamat'));

			$this->Mkasir->	update('kasir',$data,$id_kasir);
			$this->load->view('profilkasir',$data);
			redirect('Ckasir/profilkasir','refresh');
	}

		public function acctrans($id)
		{
			$status=1;

			$trans = array('status' =>$status );
			$this->Mkasir->status('pesanan',$trans,$id);
			$data['cetak'] = $this->Mkasir->cetakbukti($id);
			//$this->load->view('reportkasir', $trans);
			$this->load->view('cetakbukti', $data);
		}

		public function cetakbukti()
		{
			$this->load->view('cetakbukti', $data, FALSE);
		}

		public function reportkantin()
		{
			if ($this->session->userdata('id_kasir')) {

				$data['omset'] = $this->Mtransaksi->omsetharian();
				$data['total'] = $this->Mtransaksi->tampiltrans();
				$this->load->view('reportkantin',$data);
				
			}else{
				redirect('index','refresh');
			}
		}

		public function filterreport()
	{
		if ($this->session->userdata('id_kasir')) {

			$tgl=$this->input->post('tanggal');
			$data['filter']=$this->Mkasir->filterreport($tgl);
			$data['total'] = $this->Mkasir->omsetfilter($tgl);
			$this->load->view('reportkantinfilter', $data);
		}else{
			redirect('index','refresh');
		}
	}

	public function filterbulan()
	{
		if ($this->session->userdata('id_kasir')) {

			$tgl=$this->input->post('bulan');
			$data['filter']=$this->Mkasir->filterbulan($tgl);
			$data['total'] = $this->Mkasir->omsetbulan($tgl);
			$this->load->view('reportkantinfilter', $data);
			
		}else{
			redirect('index','refresh');
		}
	}

		public function kantinmingguan()
		{
			if ($this->session->userdata('id_kasir')) {
				
				$data['omset'] = $this->Mtransaksi->omsetmingguan();
				$data['total'] = $this->Mtransaksi->transmingguan();
				$this->load->view('reportkantin', $data);
			}else{
				redirect('index','refresh');
			}
		}

		public function kantinbulanan()
		{
			if ($this->session->userdata('id_kasir')) {
				
				$data['omset'] = $this->Mtransaksi->omsetbulanan();
				$data['total'] = $this->Mtransaksi->transbulanan();
				$this->load->view('reportkantin', $data);
			}else{
				redirect('index','refresh');
			}
		}

		public function tracking()
		{
			if ($this->session->userdata('id_kasir')) {

				$data['data']=$this->Mkasir->tracking();
				$this->load->view('tracking',$data);
			}else{
				redirect('index','refresh');
			}
			
		}

		public function logoutkasir()
		{
			$this->session->sess_destroy();
			redirect('index','refresh');
		}

		public function inputbayar()
		{
			if ($this->session->userdata('id_kasir')) {
				$inputkode = $this->input->post('inputbayar');

				$data['kodebayar'] = $this->Mtransaksi->inputbayar($inputkode);
				$data['keranjang'] = $this->Mtransaksi->getkeranjang($inputkode);
				$this->load->view('theme/headerkasir');
				$this->load->view('orderbayar',$data);
			}else{
				redirect('index','refresh');
			}
			
		}

		public function tampilmerch()
		{
			if ($this->session->userdata('id_kasir')) {
				
				$data['merch'] = $this->Mkasir->tampilmerch();
				$this->load->view('tampilmerch', $data);
			}else{
				redirect('index','refresh');	
			}
		}

		public function tampilmerchmingguan()
		{
			if ($this->session->userdata('id_kasir')) {
				
				$data['merch'] = $this->Mkasir->omsetmingguan();
				$this->load->view('tampilmerchmingguan', $data);
			}else{
				redirect('index','refresh');	
			}
		}

		public function tampilmerchbulanan()
		{
			if ($this->session->userdata('id_kasir')) {
				
				$data['merch'] = $this->Mkasir->omsetbulanan();
				$this->load->view('tampilmerchbulanan', $data);
			}else{
				redirect('index','refresh');	
			}
		}

		public function detailomsethari($value)
		{
			if ($this->session->userdata('id_kasir')) {
				
				$data['omset'] = $this->Mkasir->detailomset($value);
				$this->load->view('detailomset', $data);
			}else{
				redirect('index','refresh');
			}
		}

		public function detailomsetmingguan($value)
		{
			if ($this->session->userdata('id_kasir')) {
				
				$data['omset'] = $this->Mkasir->detailomsetmingguan($value);
				$this->load->view('detailomset', $data);
			}else{
				redirect('index','refresh');
			}
		}

		public function detailomsetbulanan($value)
		{
			if ($this->session->userdata('id_kasir')) {
				
				$data['omset'] = $this->Mkasir->detailomsetbulanan($value);
				$this->load->view('detailomset', $data);
			}else{
				redirect('index','refresh');
			}
		}		

		public function cetakomset($value)
		{
			if ($this->session->userdata('id_kasir')) {
				
				$data['cetak'] = $this->Mkasir->cetakomset($value);
				$this->load->view('cetakomset', $data);
			}else{
				redirect('index','refresh');
			}
		}

		public function omsetbulanan()
		{
			if ($this->session->userdata('id_kasir')) {
				
				$data['merch'] = $this->Mkasir->omsetbulanan();
				$this->load->view('tampilmerchbulanan', $data);
			}else{
				redirect('index','refresh');
			}
		}

		public function omsetmingguan()
		{
			if ($this->session->userdata('id_kasir')) {
				
				$data['merch'] = $this->Mkasir->omsetmingguan();
				$this->load->view('tampilmerch', $data);
			}else{
				redirect('index','refresh');
			}
		}

		public function Vprofit()
		{
			if ($this->session->userdata('id_kasir')) {

				$status = 0;
				$data['data']  = $this->Mkasir->tampilprofit($status);
				$this->load->view('profitkasir',$data);
			}
		}

		public function profit($id)
		{
			if ($this->session->userdata('id_kasir')) {
				$stat = 1;

				$profit = array('profitStatus' =>$stat );
				$this->Mkasir->profitstatus('transaksi',$profit,$id);
			}
		}

		// public function orderbayar($kodebayar)
		// {

		// 	$this->load->view('orderbayar', $kodebayar);
		// }
	}
?>