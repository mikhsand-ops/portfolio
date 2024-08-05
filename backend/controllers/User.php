<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_pengelola');
        $this->load->model('M_dashboard');
        /*if(!$this->session->userdata('email'))
        {
            redirect('auth');
        }*/
    }

    public function index()
    {
        //ambil data keyword searching
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $data['title'] = 'Admin ORSA';
        //config pagination
        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('nama_merchant', $data['keyword']);
        $this->db->or_like('alamat', $data['keyword']);
        $this->db->or_like('nomor_kios', $data['keyword']);
        $this->db->from('merchant');
        $config['base_url'] = 'http://localhost/ci/user/index';
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 3;

        //initialize
        $this->pagination->initialize($config);

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['start'] = $this->uri->segment(3);
        $data['merchant'] = $this->M_pengelola->search($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/pengelola', $data);
        $this->load->view('templates_admin/footer', $data);
    }

     public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data );
        $this->load->view('admin/profile', $data);
        $this->load->view('templates_admin/footer', $data);
    }

     public function edit_profile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //echo 'selamat datang '.$data['user']['name'];
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data );
        $this->load->view('admin/edit_profile', $data);
        $this->load->view('templates_admin/footer', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah diperbarui!</div>');
            redirect('user');
        }
    }

    public function change_password()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data );
        $this->load->view('admin/change_password', $data);
        $this->load->view('templates_admin/footer', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password sebelumnya salah!</div>');
                redirect('user/change_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak bolehsam dengan password sebelumnya</div>');
                    redirect('user/change_password');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah diperbarui!</div>');
                    redirect('user/change_password');
                }
            }
        }
    }
    public function data_merchant()
    {

       //ambil data keyword searching
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $data['title'] = 'Data merchant';

        //config pagination
        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('nama_merchant', $data['keyword']);
        $this->db->or_like('alamat', $data['keyword']);
        $this->db->or_like('nomor_kios', $data['keyword']);

        $this->db->from('merchant');
        $config['base_url'] = 'http://localhost/ci/User/data_merchant';
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 3;

        //initialize
        $this->pagination->initialize($config);


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['start'] = $this->uri->segment(3);
        $data['merchant'] = $this->M_pengelola->search($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/data_merchant', $data);
        $this->load->view('templates_admin/footer');
    }

    public function hapus_merchant($id)
    {
        $this->db->delete('merchant', array('id_merchant' => $id));
        redirect('admin/pengelola');
    }



public function registration()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Registration merchant';
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/tambah_merchant', $data);
        $this->load->view('templates_admin/footer');

        /*$this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('user', 'User', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[merchant.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont matches!',
            'min_length' => 'password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        
        $this->form_validation->set_rules('nomor_kios', 'nomor kios', 'required|trim|is_unique[merchant.nomor_kios]', [
            'is_unique' => 'This kios has already registered!'
        ]);

        if ($this->form_validation->run() == ) {
       $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Registration merchant';
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/tambah_merchant', $data);
        $this->load->view('templates_admin/footer');

        } else {
            $dataa = array(
                'nama' => $this->input->post('name'),
                'username_merchant' => $this->input->post('user'),
                'nama_merchant' => $this->input->post('nama_merchant'),
                'pass_merchant' => $this->input->post('password1'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
                'tanggal_kontrak' => $this->input->post('tanggal_kontrak'),
                'nomor_kios' => $this->input->post('nomor_kios'),
                'logo_merchant' => 'default.jpg',
                'role_id' => 2,
                'status_merch' => 2);

            $this->M_pengelola->daftarMerchant('merchant', $dataa);
            $this->session->set_flashdata('pesanDataTerbuat', '<div class="alert alert-success" role="alert">
                Congratulation! your account has been created. Please Login</div>');
            redirect('User/index');
        }*/
    }

    public function proses_tambah()
    {
        $dataa = array(
                'nama' => $this->input->post('name'),
                'username_merchant' => $this->input->post('user'),
                'nama_merchant' => $this->input->post('nama_merchant'),
                'pass_merchant' => $this->input->post('password1'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
                'tanggal_kontrak' => $this->input->post('tanggal_kontrak'),
                'nomor_kios' => $this->input->post('nomor_kios'),
                'logo_merchant' => 'default.jpg',
                'role_id' => 2,
                'status_merch' => "Aktif");

            $this->M_pengelola->daftarMerchant('merchant', $dataa);
            $this->session->set_flashdata('pesanDataTerbuat', '<div class="alert alert-success" role="alert">
                Congratulation! your account has been created. Please Login</div>');
            redirect('User/index');
    }
  


    public function editmerchant($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id_merchant' => $id);
        $data['merchant'] = $this->M_pengelola->edit_merchant($where, 'merchant')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/edit_merchant', $data);
        $this->load->view('templates_admin/footer');
    }

    
    public function update()
    {
        $id              = $this->input->post('id_merchant');
        $name            = $this->input->post('name');
        $nama_merchant   = $this->input->post('nama_merchant');
        $alamat          = $this->input->post('alamat');
        $tanggal_kontrak = $this->input->post('tanggal_kontrak');
        $nomor_kios      = $this->input->post('nomor_kios');
        $status          = $this->input->post('status');

        $data = array(
            'nama'            => $name,
            'nama_merchant'   => $nama_merchant,
            'alamat'          => $alamat,
            'tanggal_kontrak' => $tanggal_kontrak,
            'nomor_kios'      => $nomor_kios,
            'status_merch'          => $status
        );
        $where = array(
            'id_merchant' => $id
        );
        $this->M_pengelola->update_merchant($where, $data, 'merchant');
        redirect('user/index');
    }
    public function hapusmerchant($id)
    {
        $this->M_pengelola->hapus_merchant($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data merchant dihapus!</div>');
        redirect('user/index');
    }
       public function hapus_kecamatan($id)
    {
        $this->Mitra_model->hapusDataKecamatan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Mitra Dihapus!</div>');
        redirect('olahan_pangan/kecamatan');
    }

         public function transaksi()
    {
        $data['title'] = 'report';
        $data['transaksi'] = $this->M_dashboard->tampil_data();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data );
        $this->load->view('admin/transaksi', $data);
        $this->load->view('templates_admin/footer', $data);
    }

    public function tampilmerch()
    {
        $data['title'] = 'tampil_merch';
            $data['merchant'] = $this->M_transaksi->tampilmerch();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data );
        $this->load->view('admin/tampil_merch', $data);
        $this->load->view('templates_admin/footer', $data);
    }

    public function transaksi_merch($value)
        {
            $data['title'] = 'report_merch';
            $data['merchant'] = $this->M_dashboard->tampil_merch($value);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data );
        $this->load->view('admin/transaksi_merch', $data);
        $this->load->view('templates_admin/footer', $data);
        }    

}