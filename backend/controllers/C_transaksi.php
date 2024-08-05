<?php 

class C_transaksi extends CI_Controller{


	public function index()
	{
		$data['title'] = 'Report Transaksi';
		$data['pesanan'] = $this->M_transaksi->tampil_pesanan();
	    $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('konsumen/transaksi', $data);
        $this->load->view('templates/dashboard_footer', $data);
    }
	    public function hapus($id)
    {
        $this->db->delete('pesanan', array('id_pesanan' => $id));
        redirect('C_transaksi/index');
}
}