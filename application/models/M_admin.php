<?php

class M_admin extends CI_Model
{
    //untuk menampilkan seluruh data pasa tabel admin
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
    public function addData($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function tampilproduk()
    {
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_kategori', 'tb_produk.kategori_produk = tb_kategori.id_kategori');
        return $this->db->get()->result();
    }
    public function tampilkategori()
    {
        return $this->db->get('tb_kategori')->result();
    }
    public function cekkode(){ 
        $query = $this->db->query("SELECT MAX(kd_produk) as kd_produk from tb_produk");
        $hasil = $query->row();
        return $hasil->kd_produk;
    }
    public function cekno(){
        $query = $this->db->query("SELECT MAX(no_transaksi) as no_transaksi from tb_transaksi");
        $hasil = $query->row();
        return $hasil->no_transaksi;
    }
    public function delData($table, $data){
        $this->db->delete($table, $data);
    }
    public function editData($table, $data, $where){
        $this->db->where($where);
		$this->db->update($table,$data);
    }
    public function cekProduk($id){
        return $this->db->get_where('tb_produk', ['tb_produk.kategori_produk'=>$id])->num_rows();
    }
    public function produkById($id){
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_kategori', 'tb_produk.kategori_produk = tb_kategori.id_kategori');
        $this->db->where(['kategori_produk'=>$id]);
        return $this->db->get()->result();
    }
    public function katById($id){
        return $this->db->get_where('tb_kategori', ['id_kategori'=>$id])->row();
    }
    public function allTrans(){
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_user', 'tb_user.id_user = tb_transaksi.id_user');
        return $this->db->get()->result();
    }
    public function detailByNo($no){
        
    }

}
?>