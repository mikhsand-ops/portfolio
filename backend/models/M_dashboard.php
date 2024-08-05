<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    public function tampil_data()
    {
        $data = $this->db->query("SELECT * FROM pesanan WHERE status=2")->result();
        return $data;
    }

    public function tampil_data1()
    {
        $data = $this->db->query("SELECT * FROM merchant WHERE status_merch='Aktif'")->result();
        return $data;
    }

    public function tampil_data3()
    {
        $data = $this->db->query("SELECT * FROM merchant")->result();
        return $data;
    }

    public function tampil_data2($id)
    {
        $data = $this->db->query("SELECT * FROM menu WHERE status_menu='aktif' AND id_merchant = '".$id."'")->result();
        return $data;
    }

    public function detail_menu($id_menu)
     {
        $result = $this->db->where('id_menu', $id_menu)->get('menu');
        if($result ->num_rows() > 0){
            return $result->result();

        }else{
            return false;
        }
    }

    public function kat_makanan($value)
    {
        $data = $this->db->query("SELECT * FROM menu JOIN merchant ON merchant.id_merchant = menu.id_merchant WHERE  merchant.status_merch = 'aktif' AND status_menu='aktif' AND kategori = '".$value."'")->result();
        return $data;
    }

    public function kat_minuman($value)
    {
        $data = $this->db->query("SELECT * FROM menu JOIN merchant ON merchant.id_merchant = menu.id_merchant WHERE  merchant.status_merch = 'aktif' AND status_menu='aktif' AND kategori = '".$value."'")->result();
        return $data;
    }

    public function find($id)
    {
        $result = $this->db->where('id_menu', $id)
            ->limit(1)
            ->get('menu');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function tampil_merch($value)
    {
         $data = $this->db->query("SELECT * FROM pesanan join menu ON pesanan.id_menu = menu.id_menu WHERE pesanan.status = 2 AND pesanan.id_merchant = '".$value."'")->result();
        return $data;
    }
}
