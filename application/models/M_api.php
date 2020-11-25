<?php

class M_api extends CI_Model
{
    //untuk menampilkan seluruh data pasa tabel admin
    function checkuser($table, $field1){
        return $this->db->get_where($table, ['email_user'=>$field1])->row_array();
    }
}
?>