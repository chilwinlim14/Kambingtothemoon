<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal_ternak_model extends CI_Model
{
    public function get_data_jurnal_ternak()
    {
        $this->datatables->select('a.id_jurnal, a.tanggal,a.catatan_jurnal, b.nomor_tag');
        $this->datatables->from('jurnal_ternak a');
        $this->datatables->join('ternak b','a.id_ternak = b.id_ternak');
        return $this->datatables->generate();
    }


    

    public function get_data_jurnal_ternak_byId($id_jurnal)
    {
        $this->db->select('*');
        $this->db->from('jurnal_ternak');
        $this->db->where('id_jurnal', $id_jurnal);
        return $this->db->get()->row();
    }
}
