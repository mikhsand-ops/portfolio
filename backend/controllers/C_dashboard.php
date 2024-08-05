<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_dashboard');
        $this->load->model('M_transaksi');
    }


    public function index()
    {
        $data['title'] = 'Choose Merchant';
        $data['merchant'] = $this->M_dashboard->tampil_data1();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('konsumen/dashboard', $data);
        $this->load->view('templates/dashboard_footer');
    }

    public function cmenu($id_merchant)
    {
        $data['title'] = 'Choose Menu';
        $where = $id_merchant;
        $data['menu'] = $this->M_dashboard->tampil_data2($where);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('konsumen/menu', $data);
        $this->load->view('templates/dashboard_footer');

    }

    public function kat_makanan()
    {
        $data['title'] = 'Choose Menu';
        $where = "makanan";
        $data['menu'] = $this->M_dashboard->kat_makanan($where);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('konsumen/dashboard_makanan', $data);
        $this->load->view('templates/dashboard_footer');
    }

    public function kat_minuman()
    {
       $data['title'] = 'Choose Menu';
        $where = "minuman";
        $data['menu'] = $this->M_dashboard->kat_minuman($where);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('konsumen/dashboard_minuman', $data);
        $this->load->view('templates/dashboard_footer'); 
    }

    public function tambah_keranjang($id)
    {

        $data = $this->cart->contents();
        $menu = $this->M_dashboard->find($id);
        // echo "<pre>";
        // print_r ($data);
        // echo "</pre>";

        if (count($data)!==0) {

            foreach ($data as $m) {
                $id_merchant_cart = $m['id_merchant'];
            }

            
                $data = array(
                    'id'      => $menu->id_menu,
                    'id_merchant' => $menu->id_merchant,
                    'name'    => $menu->nama_menu,
                    'qty'     => 1,
                    'price'   => $menu->harga,
                    'subtotal'   => $menu->total       

                );

                $this->cart->insert($data);
                redirect('C_dashboard/index');
        
        }
        else{
            $data = array(
                'id'      => $menu->id_menu,
                'id_merchant' => $menu->id_merchant,
                'name'    => $menu->nama_menu,
                'qty'     => 1,
                'price'   => $menu->harga,
                'subtotal'   => $menu->total       
            );

            $this->cart->insert($data);
             redirect('C_dashboard/index');
        }       
        
    }
    public function detail_keranjang()
    {
        $data['title'] = 'Keranjang';
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('konsumen/keranjang', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('C_dashboard/index');
    }
    public function pembayaran()
    {
        $data['title'] = 'Form Pesanan';  
        $this->load->view('templates/dashboard_header', $data );
        $this->load->view('templates/sidebar', $data );
        $this->load->view('konsumen/pembayaran', $data );
        $this->load->view('templates/dashboard_footer');
    }

    public function detail($id_menu)
       {
        $data['title'] = 'Choose Merchant';
        $data['menu'] = $this->M_dashboard->detail_menu($id_menu);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('konsumen/detail_menu', $data);
        $this->load->view('templates/dashboard_footer');
    }
    
    public function proses_pesanan()
    {
        $code = rand();
        $cek = 0;
        $jmlhanj = 0;
        $keranjang=$this->cart->contents();
        foreach ($keranjang as $s) {
            $cek = count($keranjang);
            
        }
        foreach ($keranjang as $a) {
            $id=$a['id'];
            $merch=$a['id_merchant'];
            $harga=$a['price'];
            $total=$a['subtotal'];

        $pesanan = array(
            'total_harga' => $harga,
        );
        $jmlhanj = $jmlhanj + $pesanan['total_harga'];

        /*$cek = $cek + array('total_harga' =>$total);*/
        if($cek==1){
            $arrayKeranjang = array(
                'grand_total' =>$jmlhanj,
                'code' =>$code
                 );
            $this->M_transaksi->keranjang($arrayKeranjang);
        }else{
            $cek=$cek-1;
        }
 
        }
        foreach ($keranjang as $x) {
            $id=$x['id'];
            $merch=$x['id_merchant'];
            $harga=$x['price'];
            $total=$x['subtotal'];

        date_default_timezone_set('Asia/Jakarta');
        $nama_pemesan = $this->input->post('nama_pemesan');
        $nomor_meja = $this->input->post('nomor_meja');
        $nomor_hp = $this->input->post('nomor_hp');
        $metode_pembayaran = $this->input->post('metode_pembayaran');
        $kode = $this->M_transaksi->select_keranjang($code);

        $pesanan = array(
            'id_menu' => $id,
            'id_merchant' => $merch,
            'id_keranjang' => $kode[0]->id_keranjang,
            'nama_pemesan' => $nama_pemesan,
            'nomor_meja' => $nomor_meja,
            'nomor_hp' => $nomor_hp,
            'metode_pembayaran' => $metode_pembayaran,
            'total_harga' => $harga,
            'tgl_trans' => date('Y-m-d H:i:s')
        );
        $this->M_transaksi->index($pesanan);
        }

        $kode1['id'] = $this->M_transaksi->select_keranjang($code);
        $this->load->view('templates/dashboard_header');
        $this->load->view('templates/sidebar');
        $this->load->view('konsumen/proses_pesanan',$kode1);
        $this->load->view('templates/dashboard_footer');
        $this->cart->destroy();
    }
}
