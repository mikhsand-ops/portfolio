<?php 

class M_transaksi extends CI_Model
{
	public function index($pesanan)
	{
		// ini mengambil dari tabel meja
		$this->db->insert('pesanan', $pesanan);
		$id_transaksi = $this->db->insert_id();

			return TRUE;
	}

	public function keranjang($array_keranjang)
	{
		$this->db->insert('keranjang', $array_keranjang);
			return TRUE;
		/*$this->db->insert('keranjang', $jmlhanj);*/
	}

	public function select_keranjang($code)
	{
		/*$query_milih =$this->db->query("SELECT * FROM `keranjang` WHERE code = '".$code."'");*/

			$this->db->select('id_keranjang');
			$this->db->from('keranjang');
			$this->db->where('code', $code);
			return $this->db->get()->result();
	}
	public function tampil_pesanan()
	{
		$result = $this->db->get('pesanan');
		if($result->num_rows()>0){
			return $result->result();
		}else{
			return FALSE;
		}
	}

	public function tampilmerch()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('merchant', 'merchant.id_merchant = pesanan.id_merchant');
		$this->db->group_by('pesanan.id_merchant');
		$data=$this->db->get()->result();
			return $data;
	}
}