<?php
	

	class Mmenu extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->database('orsa');
		}

		public function input($tambah)
		{
			$this->db->insert('menu', $tambah);
		}

		public function tampil($where)
		{
			$this->db->select('*');
			$this->db->from('menu');
			$this->db->where('id_merchant', $where);
			$return=$this->db->get()->result();
			return $return;


		}

		public function edit($where)
		{
			$this->db->select('*');
			$this->db->from('menu');
			$this->db->where('id_menu',$where);

			$query=$this->db->get();
			return $query->result();
		}

		public function update($table,$menu,$where)
		{
			$this->db->where('id_menu',$where);
			$this->db->update($table,$menu);
		}

		public function hapus($table,$trans,$where)
		{
			$this->db->where('id_menu',$where);
			$this->db->update($table,$trans);
		}

		public function aktif($table,$trans,$where)
		{
			$this->db->where('id_menu',$where);
			$this->db->update($table,$trans);
		}

		public function pesanan($where)
		{
			$stat = 1;

			
			$this->db->select('*');
			$this->db->from('pesanan');
			$this->db->join('menu', 'menu.id_menu = pesanan.id_menu');
			$this->db->where('status',$stat);
			$this->db->where('pesanan.id_merchant',$where);
			$return=$this->db->get()->result();
			return $return;
		}

		public function proses($table,$value,$where)
		{
			$this->db->where('id_trans',$where);
			$this->db->update($table,$value);
		}
	}
?>