<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengelola extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pengelola');
	}

	public function countAllMerchant()
	{
		return $this->db->get('merchant')->num_rows();
	}
	public function search($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('nama', $keyword);
			$this->db->or_like('nama_merchant', $keyword);
			$this->db->or_like('alamat', $keyword);
			$this->db->or_like('nomor_kios', $keyword);
		}
		return $this->db->get('merchant', $limit, $start)->result_array();
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
	public function tampiltrans()
	{
		$data = $this->db->query("SELECT menu.nama_menu,merchant.nama_merchant,
			tgl_trans,freport(pesanan.status) as keterangan,total_harga  from pesanan  
			JOIN menu ON menu.id_menu = pesanan.id_menu
			JOIN merchant ON merchant.id_merchant = pesanan.id_merchant 
			WHERE pesanan.status = 2 AND tgl_trans=DATE(now()) GROUP BY id_trans")->result();
		return $data;
	}
	public function login($value)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $value);
		$return = $this->db->get()->result();
		return $return;
	}
	public function detail_merchant($id_merchant)
	{
		$result = $this->db->where('id_merchant', $id_merchant)->get('merchant');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function getprofil($value)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $value);
		$return = $this->db->get()->result();
		return $return;
	}
	public function daftarMerchant($table, $data)
	{
		$this->db->insert($table, $data);
	}
	public function tampil_data()
	{
		return $this->db->get('merchant');
	}
	public function tampil_merchant()
	{
		return $this->db->get('merchant');
	}
	public function edit_merchant($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	public function update_merchant($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function hapus_merchant($id)
	{
		$this->db->delete('merchant', ['id_merchant' => $id]);
	}

	public function cariDataKecamatan()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->or_like('kecamatan', $keyword);
		return $this->db->get('kecamatan')->result_array();
	}
	public function cariDataMitra()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->or_like('kecamatan', $keyword);
		$this->db->or_like('nama', $keyword);
		$this->db->join('kecamatan', 'data_mitra.id_kec = kecamatan.id_kec');
		return $this->db->get('data_mitra')->result_array();
	}
}
