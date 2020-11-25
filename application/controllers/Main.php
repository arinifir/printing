<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model main
        $this->load->model('m_main');
        $this->load->model('m_admin');
        $this->load->helper('auth_helper');
        is_logged_in();
    }
	public function index()
	{
        $this->load->view('main/header');
        $this->load->view('main/topbar');
        $this->load->view('main/sidebar');
        $this->load->view('main/beranda');
        $this->load->view('main/footer');
    }
    public function hproduk(){
        $data['produk'] = $this->m_admin->tampilproduk();
        $this->load->view('main/header');
        $this->load->view('main/topbar');
        $this->load->view('main/sidebar');
        $this->load->view('main/vdproduk', $data);
        $this->load->view('main/footer');
    }
    public function cart(){
        $this->load->view('main/header');
        $this->load->view('main/topbar');
        $this->load->view('main/sidebar');
        $this->load->view('main/vcart');
        $this->load->view('main/footer');
    }
    public function delcart($id){
        $this->cart->remove($id);
        redirect('Main/cart');
    }
    public function pembayaran($no){
        $data['nomor'] = $no;
        $this->load->view('main/header');
        $this->load->view('main/topbar');
        $this->load->view('main/sidebar');
        $this->load->view('main/vpembayaran', $data);
        $this->load->view('main/footer');
    }
    public function final(){
        
        $id_user = $this->session->userdata('id_user');
        $tanggal = date('Y-m-d');
        $cekkode = $this->m_admin->cekno();
        $nourut = substr($cekkode, 8, 4);
        $nourut++;
        $char=date('Ymd');
        $kode = $char . sprintf("%04s", $nourut);

        $detail = $this->cart->contents();
        $array = [];
        foreach ($detail as $d){
            $dtrans = [
                'no_transaksi' => $kode,
                'kd_produk' => $d['id'],
                'jumlah' => $d['qty'],
                'subtotal' => $d['subtotal']
            ];
            $array[]=$dtrans;
        }

        $data1=[
            'no_transaksi' => $kode,
            'tanggal_transaksi' => $tanggal,
            'id_user' => $id_user,
            'status_transaksi' => ''
        ];
        $this->m_admin->addData('tb_transaksi', $data1);
        $this->db->insert_batch('tb_dtrans', $array);
        $this->cart->destroy();
        $data['detail'] = $this->m_main->getDetail($kode);
        $this->load->view('main/header');
        $this->load->view('main/topbar');
        $this->load->view('main/sidebar');
        $this->load->view('main/vnota', $data);
        $this->load->view('main/footer');
    }
    public function addcart($id)
    {
        $this->load->library('user_agent');
        $data1 = $this->db->get_where('tb_produk', ['kd_produk'=>$id])->row();
        $data = array(
            'id'      => $data1->kd_produk,
            'qty'     => $this->input->post('qty'),
            'price'   => $data1->harga_produk,
            'name'    => $data1->nama_produk
        );
        $this->cart->insert($data);
        $this->session->set_flashdata('berhasil', 'Data ditambahkan ke keranjang');
        redirect($this->agent->referrer());
    }
    public function transaksi(){
        $id = $this->session->userdata('id_user');
        $data['trans'] = $this->db->query('SELECT * from tb_transaksi where id_user='.$id)->result();
        $this->load->view('main/header');
        $this->load->view('main/topbar');
        $this->load->view('main/sidebar');
        $this->load->view('main/vtransaksi', $data);
        $this->load->view('main/footer');
    }
    public function uploadbukti(){
        $no = $this->input->post('no');
        $uploadgambar = $_FILES['bukti_pembayaran']['name'];

        if ($uploadgambar) { 
            # code...
            $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif';
            $config['max_size'] = '5000';
            $config['upload_path'] = './assets/bukti/';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bukti_pembayaran')) {
                # code...
                $img = $this->upload->data('file_name');
                $this->db->set('bukti_pembayaran', $img);
            } else {
                $this->session->set_flashdata('error', 'Upload Gambar Produk Gagal!');
                redirect('Main/pembayaran/'.$no);
            }
        }
        $data = [
            'status_transaksi' => 1
        ];
        $where = ['no_transaksi' => $no];
        $this->m_admin->editData('tb_transaksi', $data, $where);
        $this->session->set_flashdata('berhasil', 'Berhasil Upload');
        redirect('Main/transaksi'); 
    }

}