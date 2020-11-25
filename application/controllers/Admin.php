<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('m_admin');
        $this->load->helper('auth_helper');
        $this->load->library('user_agent');
        is_logged_in();
    }
    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }
    public function produk()
    {
        $data['produk'] = $this->m_admin->tampilproduk();
        $data['kategori'] = $this->m_admin->tampilkategori();
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vproduk', $data);
        $this->load->view('admin/footer');
    }
    public function tambahproduk()
    {
        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_message('required', 'Isi Data!');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('Admin/produk');
        } else {
            $this->addproduk();
        }
    }
    public function addproduk()
    {
        $cekkode = $this->m_admin->cekkode();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($cekkode, 2, 4);
        $nourut++;
        $char = "P1";
        $kode = $char . sprintf("%04s", $nourut);

        $nama = $this->input->post("nama", TRUE);
        $harga = $this->input->post("harga", TRUE);
        $stok = $this->input->post("stok", TRUE);
        $kategori = $this->input->post("kategori", TRUE);
        $desk = $this->input->post("desk", TRUE);

        $uploadgambar = $_FILES['gambar_produk']['name'];

        if ($uploadgambar) { 
            # code...
            $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif';
            $config['max_size'] = '5000';
            $config['upload_path'] = './assets/product/';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar_produk')) {
                # code...
                $img = $this->upload->data('file_name');
                $this->db->set('gambar_produk', $img);
            } else {
                $this->session->set_flashdata('error', 'Upload Gambar Produk Gagal!');
                redirect('Admin/produk');
            }
        }

        $data = [
            'kd_produk' => $kode,
            'nama_produk' => $nama,
            'harga_produk' => $harga,
            'stok_produk' => $stok,
            'kategori_produk' => $kategori,
            'desk_produk' => $desk
        ];
        $this->m_admin->addData('tb_produk', $data);
        $this->session->set_flashdata('berhasil', 'Berhasil Menambahkan Data Produk.');
        redirect('Admin/produk');
    }
    public function hapusproduk($kode)
    {
        $where = [
            'kd_produk' => $kode
        ];
        $this->m_admin->delData('tb_produk', $where);
        redirect('Admin/produk');
    }
    public function editproduk()
    {
        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_message('required', 'Isi Data!');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('Admin/produk');
        } else {
            $this->simpanproduk();
        }
    }
    public function simpanproduk()
    {
        $kode = $this->input->post("kode");
        $nama = $this->input->post("nama", TRUE);
        $harga = $this->input->post("harga", TRUE);
        $stok = $this->input->post("stok", TRUE);
        $kategori = $this->input->post("kategori", TRUE);
        $desk = $this->input->post("desk", TRUE);

        $uploadgambar = $_FILES['gambar_produk']['name'];

        if ($uploadgambar) { 
            # code...
            $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif';
            $config['max_size'] = '5000';
            $config['upload_path'] = './assets/product/';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar_produk')) {
                # code...
                $img = $this->upload->data('file_name');
                $this->db->set('gambar_produk', $img);
            } else {
                $this->session->set_flashdata('error', 'Upload Gambar Produk Gagal!');
                redirect('Admin/produk');
            }
        }
        $data = [
            'nama_produk' => $nama,
            'harga_produk' => $harga,
            'stok_produk' => $stok,
            'kategori_produk' => $kategori,
            'desk_produk' => $desk
        ];
        $where = ['kd_produk' => $kode];
        $this->m_admin->editData('tb_produk', $data, $where);
        $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Data Produk.');
        redirect('Admin/produk');
    }
    public function kategori()
    {
        $data['kategori'] = $this->m_admin->tampilkategori();
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vkategori', $data);
        $this->load->view('admin/footer');
    }
    public function tambahkategori()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_message('required', 'Isi Data!');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('Admin/produk');
        } else {
            $nama = $this->input->post("nama", TRUE);
            $data = [
                'kategori' => $nama
            ];
            $this->m_admin->addData('tb_kategori', $data);
            $this->session->set_flashdata('berhasil', 'Berhasil Menambahkan Data Kategori.');
            redirect('Admin/kategori');
        }
    }
    public function editkategori()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_message('required', 'Isi Data!');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Data tidak sesuai atau data kosong!');
            redirect('Admin/produk');
        } else {
            $id = $this->input->post("id", TRUE);
            $nama = $this->input->post("nama", TRUE);
            $data = ['kategori' => $nama];
            $where = ['id_kategori' => $id];
            $this->m_admin->editData('tb_kategori', $data, $where);
            $this->session->set_flashdata('berhasil', 'Berhasil Mengubah Data Kategori.');
            redirect('Admin/kategori');
        }
    }
    public function hapuskategori($id)
    {
        $data = $this->m_admin->cekProduk($id);
        if ($data == 0) {
            $this->m_admin->delData('tb_kategori', ['id_kategori' => $id]);
            redirect('Admin/kategori');
        } else {
            $this->session->set_flashdata('error', 'Tidak Bisa Menghapus Data ini!');
            redirect('Admin/kategori');
        }
    }
    public function prokat($id)
    {
        $data['produk'] = $this->m_admin->produkById($id);
        $data['kategori'] = $this->m_admin->katById($id);
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vprokat', $data);
        $this->load->view('admin/footer');
    }
    public function pembelian()
    {
        // var_dump($_SESSION);die;
        $data['produk'] = $this->m_admin->tampilproduk();
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vpembelian', $data);
        $this->load->view('admin/footer');
    }
    public function tambahcart($id)
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
        redirect($this->agent->referrer());
    }
    public function keranjang(){
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vkeranjang');
        $this->load->view('admin/footer');
    }
    public function hapuscart($id){
        $this->cart->remove($id);
        redirect('Admin/keranjang');
    }
    public function final(){
        $cekkode = $this->m_admin->cekno();
        $nourut = substr($cekkode, 8, 4);
        $nourut++;
        $char=date('Yyyymmdd');
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
        $this->addtrans($array);
    }
    public function addtrans($array){
        
        $id_user = $this->session->userdata('id_user');
        $tanggal = date('Y-m-d');
        $cekkode = $this->m_admin->cekno();
        $nourut = substr($cekkode, 8, 4);
        $nourut++;
        $char=date('Ymd');
        $kode = $char . sprintf("%04s", $nourut);
        $data1=[
            'no_transaksi' => $kode,
            'tanggal_transaksi' => $tanggal,
            'id_user' => $id_user,
            'status_transaksi' => ''
        ];
        $this->m_admin->addData('tb_transaksi', $data1);
        $this->db->insert_batch('tb_dtrans', $array);

        $total = $this->cart->total();
        $bayar = $this->input->post('bayar');
        $data['kembali'] = $bayar-$total;
        $this->cart->destroy();
        // $this->load->view('admin/header');
        // $this->load->view('admin/topbar');
        // $this->load->view('admin/sidebar');
        $this->load->view('admin/vnota', $data);
        // $this->load->view('admin/footer');
    }
    public function htrans(){
        $data['trans']  = $this->m_admin->allTrans();
        $this->load->view('admin/header');
        $this->load->view('admin/topbar');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/vdtrans', $data);
        $this->load->view('admin/footer');
    }
}
