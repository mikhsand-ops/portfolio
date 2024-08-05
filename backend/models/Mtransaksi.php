<?php
	
	/**
	 * 
	 */
	class Mtransaksi extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->database('orsa');
		}

		// public function tampil()
		// {
		// 	$return=$this->db->query("SELECT 
		// 								totalHrg,
		// 								menu.namaMenu,
		// 								merchant.namaKios,
		// 								jumlah,
		// 								tglTrans,
		// 								freport(status) as keterangan 
		// 								from transaksi 
		// 								JOIN menu ON menu.idMenu = transaksi.idMenu
		// 								JOIN merchant ON merchant.idMerch = transaksi.idMerch
		// 								GROUP BY idTrans")->result();
		// 	return $return;
		// 	//return $this->db->get('transaksi',$number,$offset)->result();
		// }

		public function tampiltrans()
		{
			$data = $this->db->query("SELECT menu.nama_menu,merchant.nama_merchant,
			tgl_trans,freport(pesanan.status) as keterangan,total_harga  from pesanan 
			JOIN menu ON menu.id_menu = pesanan.id_menu
			JOIN merchant ON merchant.id_merchant = pesanan.id_merchant 
			WHERE pesanan.status = 2 AND tgl_trans=DATE(now()) GROUP BY id_trans")->result();
			return $data;
		}

		public function transmingguan()
		{
			$data = $this->db->query("SELECT menu.nama_menu,merchant.nama_merchant,
			tgl_trans,freport(pesanan.status) as keterangan,total_harga  from pesanan 
			JOIN menu ON menu.id_menu = pesanan.id_menu
			JOIN merchant ON merchant.id_merchant = pesanan.id_merchant 
			WHERE pesanan.status = 2 AND YEARWEEK(tgl_trans)=YEARWEEK(now()) GROUP BY id_trans")->result();
			return $data;
		}

		public function transbulanan()
		{
			$data = $this->db->query("SELECT menu.nama_menu,merchant.nama_merchant,
			tgl_trans,freport(pesanan.status) as keterangan,total_harga  from pesanan 
			JOIN menu ON menu.id_menu = pesanan.id_menu
			JOIN merchant ON merchant.id_merchant = pesanan.id_merchant 
			WHERE pesanan.status = 2 AND MONTH(tgl_trans)=MONTH(now()) GROUP BY id_trans")->result();
			return $data;
		}

		public function omsetharian()
		{
			$data = $this->db->query("SELECT SUM(total_harga) AS Omset from pesanan 
			WHERE status = 2 AND tgl_trans=DATE(now())")->result();
			return $data;
		}

		public function omsetmingguan()
		{
			$data = $this->db->query("SELECT SUM(total_harga) AS Omset from pesanan  
			WHERE status = 2 AND YEARWEEK(tgl_trans)=YEARWEEK(now())")->result();
			return $data;
		}

		public function omsetbulanan()
		{
			$data = $this->db->query("SELECT SUM(total_harga) AS Omset from pesanan 
			WHERE status = 2 AND MONTH(tgl_trans)=MONTH(now())")->result();
			return $data;
		}

		public function jumlah_data()
		{
			return $this->db->get('pesanan')->num_rows();
		}

		public function dailyorder()
		{
			$this->db->select('*');
			$this->db->from('pesanan');
			$this->db->where('status',0);
			$data=$this->db->get()->result();
			return $data;
		}

		public function profit($value)
		{
			$return=$this->db->query("call totaltrans('".$value."')")->result();
			return $return;
		}

		public function getkeranjang($value)
		{
			$this->db->select('keranjang.id_keranjang,grand_total,metode_pembayaran');
			$this->db->from('keranjang');
			$this->db->join('pesanan', 'pesanan.id_keranjang = keranjang.id_keranjang');
			$this->db->where('keranjang.id_keranjang', $value);
			$this->db->where('pesanan.status', 0);
			$this->db->group_by('id_keranjang');
			return $this->db->get()->result();
		}

		public function inputbayar($where)
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
	}
?>