<?php
	

	class Mmerch extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->database('orsa');
		}

		/*public function input($regis)
		{
			$this->db->insert('prak',$regis);
		}*/

		public function tampil($value)
		{
			$this->db->select('id_merchant,nama_merchant,nama,alamat,status_merch,logo_merchant');
			$this->db->from('merchant');
			$this->db->where('id_merchant', $value);
			$return=$this->db->get()->result();
			return $return;
		}

		public function login($value)
		{
			$this->db->select('*');
			$this->db->from('merchant');				
			$this->db->where('username_merchant', $value);
			$return=$this->db->get()->result();
			return $return;
		}

		public function edit($where)
		{
			$this->db->select('*');
			$this->db->from('merchant');
			$this->db->where('id_merchant',$where);

			$query=$this->db->get();
			return $query->result();
		}

		public function update($table,$value,$where)
		{
			$this->db->where('id_merchant',$where);
			$this->db->update($table,$value);
		}

		public function update_stat($table,$value,$where)
		{
			$this->db->where('id_merchant',$where);
			$this->db->update($table,$value);
		}

		public function report($value)
		{
			$stat = 2;

			$this->db->select('nama_menu,
								pesanan.id_merchant,
								total_harga,
								tgl_trans,
								freport(status) as keterangan');
			$this->db->from('pesanan');
			$this->db->join('menu', 'menu.id_menu = pesanan.id_menu');
			$this->db->where('pesanan.id_merchant', $value);
			$this->db->where('status', $stat);
			$this->db->group_by('id_trans');
			$return = $this->db->get()->result();
			
			return $return;
		}

		public function filterreport($value,$where)
		{
			$stat = 2;

			$this->db->select('nama_menu,
								pesanan.id_merchant,
								total_harga,
								tgl_trans,
								metode_pembayaran,
								freport(status) as keterangan');
			$this->db->from('pesanan');
			$this->db->join('menu', 'menu.id_menu = pesanan.id_menu');
			$this->db->where('pesanan.id_merchant', $where);
			$this->db->where('status', $stat);
			$this->db->where('tgl_trans', $value);
			$this->db->group_by('id_trans');
			$return = $this->db->get()->result();
			
			return $return;
		}

		public function filterbulan($value,$where)
		{
			$stat = 2;

			$this->db->select('nama_menu,
								pesanan.id_merchant,
								total_harga,
								tgl_trans,
								metode_pembayaran,
								freport(status) as keterangan');
			$this->db->from('pesanan');
			$this->db->join('menu', 'menu.id_menu = pesanan.id_menu');
			$this->db->where('pesanan.id_merchant', $where);
			$this->db->where('status', $stat);
			$this->db->where('month(tgl_trans)', $value);
			$return = $this->db->get()->result();
			
			return $return;
		}

		public function omsetfilter($value,$where1)
		{
			$stat = 2;

			$this->db->select('nama_menu,
								SUM(total_harga) AS Omset,
								pesanan.id_merchant,
								total_harga,
								tgl_trans,
								metode_pembayaran,
								freport(status) as keterangan');
			$this->db->from('pesanan');
			$this->db->join('menu', 'menu.id_menu = pesanan.id_menu');
			$this->db->where('pesanan.id_merchant', $where1);
			$this->db->where('status', $stat);
			$this->db->where('tgl_trans', $value);
			$return = $this->db->get()->result();
			
			return $return;
		}

		public function omsetbulan($value,$where1)
		{
			$stat = 2;

			$this->db->select('nama_menu,
								SUM(total_harga) AS Omset,
								pesanan.id_merchant,
								total_harga,
								tgl_trans,
								metode_pembayaran,
								freport(status) as keterangan');
			$this->db->from('pesanan');
			$this->db->join('menu', 'menu.id_menu = pesanan.id_menu');
			$this->db->where('pesanan.id_merchant', $where1);
			$this->db->where('status', $stat);
			$this->db->where('month(tgl_trans)', $value);
			$return = $this->db->get()->result();
			
			return $return;
		}

		public function tampilreport($where)
		{
			$data = $this->db->query("SELECT menu.nama_menu,tgl_trans,total_harga,metode_pembayaran from pesanan 
			JOIN menu ON menu.id_menu = pesanan.id_menu 
			WHERE status = 2 AND tgl_trans=DATE(now()) 
			AND pesanan.id_merchant = '".$where."' GROUP BY id_trans")->result();
			return $data;
		}

		public function reportmingguan($where)
		{
			$data = $this->db->query("SELECT menu.nama_menu,tgl_trans,total_harga,metode_pembayaran from pesanan 
			JOIN menu ON menu.id_menu = pesanan.id_menu 
			WHERE status = 2 AND YEARWEEK(tgl_trans)=YEARWEEK(now()) 
			AND pesanan.id_merchant = '".$where."' GROUP BY id_trans")->result();
			return $data;
		}

		public function reportbulanan($where)
		{
			$data = $this->db->query("SELECT menu.nama_menu,tgl_trans,total_harga,metode_pembayaran from pesanan 
			JOIN menu ON menu.id_menu = pesanan.id_menu 
			WHERE status = 2 AND MONTH(tgl_trans)=MONTH(now()) 
			AND pesanan.id_merchant = '".$where."' GROUP BY id_trans")->result();
			return $data;
		}

		public function totalreport($value)
		{
			$this->db->select('SUM(total_harga) AS Omset');
			$this->db->from('pesanan');
			$this->db->where('id_merchant', $value);
			$query = $this->db->get()->result();
			// $query = $this->db->query("SELECT SUM(totalHrg) AS Omset FROM transaksi 
			// 							WHERE idMerch = '".$value."'")->result();
			return $query;
		}

		public function omsetharian($where1)
		{
			$data = $this->db->query("SELECT SUM(total_harga) AS Omset FROM pesanan WHERE status = 2 AND tgl_trans=DATE(now()) AND id_merchant = '".$where1."' GROUP BY id_merchant")->result();
			return $data;
		}

		public function omsetmingguan($where1)
		{
			$data = $this->db->query("SELECT SUM(total_harga) AS Omset FROM pesanan WHERE status = 2 AND YEARWEEK(tgl_trans)=YEARWEEK(now()) AND id_merchant = '".$where1."' GROUP BY id_merchant")->result();
			return $data;
		}

		public function omsetbulanan($where1)
		{
			$data = $this->db->query("SELECT MONTH(tgl_trans) AS bulan, SUM(total_harga) AS Omset FROM pesanan WHERE status = 2 AND MONTH(tgl_trans)=MONTH(now()) AND id_merchant = '".$where1."' GROUP BY id_merchant")->result();
			return $data;
		}

		public function jumlahtrans($where1)
		{
			$data = $this->db->query("SELECT count(id_trans) AS jumlah FROM pesanan WHERE status = 2 
				AND MONTH(tgl_trans)=MONTH(now()) AND id_merchant = '".$where1."'")->result();
			return $data;
		}
	}
?>