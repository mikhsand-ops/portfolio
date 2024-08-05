<?php
	
	/**
	 * 
	 */
	class Mkasir extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->database('orsa');
		}

		public function tampil($value)
		{
			$this->db->select('*');
			$this->db->from('kasir');
			$this->db->where('id_kasir', $value);
			$data=$this->db->get()->result();
			return $data;

		}

		public function login($value)
		{
			$this->db->select('*');
			$this->db->from('kasir');				
			$this->db->where('username_kasir', $value);
			$return=$this->db->get()->result();
			return $return;
		}

		public function edit($where)
		{
			$this->db->select('*');
			$this->db->from('kasir');
			$this->db->where('id_kasir',$where);

			$query=$this->db->get();
			return $query->result();
		}

		public function update($table,$value,$where)
		{
			$this->db->where('id_kasir',$where);
			$this->db->update($table,$value);
		}

		public function status($table,$value,$where)
		{
			$this->db->where('id_keranjang',$where);
			$this->db->update($table, $value);
		}

		public function cetakbukti($value)
		{
			$this->db->select('nama_pemesan, nama_menu ,nama_merchant, nomor_hp, nomor_meja, total_harga, metode_pembayaran');
			$this->db->from('pesanan');
			$this->db->join('menu', 'menu.id_menu = pesanan.id_menu');
			$this->db->join('merchant', 'merchant.id_merchant = pesanan.id_merchant');
			$this->db->where('id_keranjang', $value);
			$this->db->group_by('id_trans');
			return $this->db->get()->result();
		}

		public function cetakbukti2($where)
		{
			$this->db->select('id_trans, metode_pembayaran, nama_pemesan, nomor_hp, nama_merchant, nama_menu, pesanan.total_harga, keranjang.grand_total,nomor_meja');
			$this->db->from('pesanan');
			$this->db->join('merchant', 'merchant.id_merchant = pesanan.id_merchant');
			$this->db->join('menu', 'menu.id_menu = pesanan.id_menu');
			$this->db->join('keranjang', 'keranjang.id_keranjang = pesanan.id_keranjang');
			$this->db->where('pesanan.id_keranjang', $where);
			$this->db->where('pesanan.status', 0);
			$this->db->group_by('id_trans');
			return $this->db->get()->result();
		}

		public function tracking()
		{
			$this->db->select('*');
			$this->db->from('trackTrans');
			$this->db->order_by('tgl_update', 'desc');
			$data=$this->db->get()->result();
			return $data;
		}

		public function tampilmerch()
		{
			$data = $this->db->query("SELECT SUM(pesanan.total_harga) AS Omset,merchant.id_merchant,nama,nama_merchant,alamat FROM merchant JOIN pesanan ON merchant.id_merchant =  pesanan.id_merchant WHERE pesanan.status = 2 AND pesanan.tgl_trans=DATE(now()) GROUP BY merchant.id_merchant")->result();
			return $data;
		}

		public function filterreport($value)
		{
			$data = $this->db->query("SELECT nama_menu,nama_merchant,pesanan.id_merchant,total_harga,tgl_trans,metode_pembayaran,freport(pesanan.status) as keterangan FROM pesanan JOIN menu ON menu.id_menu = pesanan.id_menu JOIN merchant ON merchant.id_merchant = pesanan.id_merchant WHERE pesanan.status=2 AND tgl_trans = '".$value."' GROUP BY id_trans")->result();
			return $data;
		}

		public function filterbulan($value)
		{
			$stat = 2;

			$this->db->select('nama_menu,
								nama_merchant,
								pesanan.id_merchant,
								total_harga,
								tgl_trans,
								metode_pembayaran,
								freport(pesanan.status) as keterangan');
			$this->db->from('pesanan');
			$this->db->join('menu', 'menu.id_menu = pesanan.id_menu');
			$this->db->join('merchant', 'merchant.id_merchant = pesanan.id_merchant');
			$this->db->where('pesanan.status', $stat);
			$this->db->where('month(tgl_trans)', $value);
			$return = $this->db->get()->result();
			
			return $return;
		}

		public function omsetfilter($value)
		{
			$stat = 2;

			$this->db->select('nama_menu,
								nama_merchant,
								SUM(total_harga) AS Omset,
								pesanan.id_merchant,
								total_harga,
								tgl_trans,
								metode_pembayaran,
								freport(status) as keterangan');
			$this->db->from('pesanan');
			$this->db->join('menu', 'menu.id_menu = pesanan.id_menu');
			$this->db->join('merchant', 'merchant.id_merchant = pesanan.id_merchant');
			$this->db->where('pesanan.status', $stat);
			$this->db->where('tgl_trans', $value);
			$return = $this->db->get()->result();
			return $return;
		}

		public function omsetbulan($value)
		{
			$stat = 2;

			$this->db->select('nama_menu,
								nama_merchant,
								SUM(total_harga) AS Omset,
								pesanan.id_merchant,
								total_harga,
								tgl_trans,
								metode_pembayaran,
								freport(status) as keterangan');
			$this->db->from('pesanan');
			$this->db->join('menu', 'menu.id_menu = pesanan.id_menu');
			$this->db->join('merchant', 'merchant.id_merchant = pesanan.id_merchant');
			$this->db->where('pesanan.status', $stat);
			$this->db->where('month(tgl_trans)', $value);
			$return = $this->db->get()->result();
			
			return $return;
		}

		public function omsetmingguan()
		{
			$stat=2;
			$data = $this->db->query("SELECT SUM(pesanan.total_harga) AS Omset,merchant.id_merchant,nama,nama_merchant,alamat FROM merchant JOIN pesanan ON merchant.id_merchant =  pesanan.id_merchant WHERE pesanan.status = 2 AND YEARWEEK(tgl_trans)= YEARWEEK(now()) GROUP BY merchant.id_merchant")->result();
			return $data;
		}

		public function omsetbulanan()
		{
			$stat=2;
			$data = $this->db->query("SELECT SUM(pesanan.total_harga) AS Omset,merchant.id_merchant,nama,nama_merchant,alamat FROM merchant JOIN pesanan ON merchant.id_merchant =  pesanan.id_merchant WHERE pesanan.status = 2 AND MONTH(tgl_trans)=MONTH(now()) GROUP BY merchant.id_merchant")->result();
			return $data;
		}

		public function detailomset($value)
		{
			$stat = 2;
			$this->db->select('menu.nama_menu,pesanan.id_trans,pesanan.total_harga,pesanan.tgl_trans');
			$this->db->from('pesanan');
			$this->db->join('menu', 'menu.id_menu = pesanan.id_menu');
			$this->db->where('pesanan.id_merchant', $value);
			$this->db->where('pesanan.status', $stat);
			$this->db->where('pesanan.tgl_trans=DATE(now())');
			$this->db->group_by('id_trans');
			$return = $this->db->get()->result();
			return $return;
		}

		public function detailomsetmingguan($value)
		{
			$stat = 2;
			$this->db->select('menu.nama_menu,pesanan.id_trans,pesanan.total_harga,pesanan.tgl_trans');
			$this->db->from('pesanan');
			$this->db->join('menu', 'menu.id_menu = pesanan.id_menu');
			$this->db->where('pesanan.id_merchant', $value);
			$this->db->where('pesanan.status', $stat);
			$this->db->where('YEARWEEK(pesanan.tgl_trans)=YEARWEEK(now())');
			$this->db->group_by('id_trans');
			$return = $this->db->get()->result();
			return $return;
		}

		public function detailomsetbulanan($value)
		{
			$stat = 2;
			$this->db->select('menu.nama_menu,pesanan.id_trans,pesanan.total_harga,pesanan.tgl_trans');
			$this->db->from('pesanan');
			$this->db->join('menu', 'menu.id_menu = pesanan.id_menu');
			$this->db->where('pesanan.id_merchant', $value);
			$this->db->where('pesanan.status', $stat);
			$this->db->where('MONTH(pesanan.tgl_trans)=MONTH(now())');
			$this->db->group_by('id_trans');
			$return = $this->db->get()->result();
			return $return;
		}

		public function cetakomset($value)
		{
			$stat=2;
			$this->db->select('SUM(total_harga) AS total_harga,nama_merchant');
			$this->db->from('pesanan');
			$this->db->join('merchant', 'merchant.id_merchant = pesanan.id_merchant');
			$this->db->where('pesanan.status', $stat);
			$this->db->where('pesanan.id_merchant', $value);
			$this->db->where('pesanan.tgl_trans=DATE(now())');
			$return = $this->db->get()->result();
			return $return;
		}

		public function tampilprofit($value)
		{
			$return=$this->db->query("call profitkasir('".$value."')")->result();
			return $return;
		}

		public function profitstatus($table,$value,$where)
		{
			$this->db->where('id_trans', $where);
			$this->db->update($table, $value);
		}
	}
?>