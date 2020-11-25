<?php

class M_main extends CI_Model
{
    public function getDetail($no){
        $this->db->select('*');
        $this->db->from('tb_dtrans');
        $this->db->join('tb_produk', 'tb_produk.kd_produk = tb_dtrans.kd_produk');
        $this->db->where(['tb_dtrans.no_transaksi' => $no]);
        return $this->db->get()->result();
    }

}