<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diet_ternak_model extends CI_Model
{
    public function get_data_diet_ternak()
    {
        $this->datatables->select('b.id_diet, b.hari, b.waktu_pemberian, a.nama_kandang as kandang, b.pakan');
        $this->datatables->from('diet_ternak b');
        $this->datatables->join('master_kandang a','a.id_kandang = b.kandang');

        return $this->datatables->generate();
    }

    public function get_data_diet_ternak_byId($id_diet)
    {
        $this->db->select('id_diet, hari, waktu_pemberian, kandang, pakan');
        $this->db->from('diet_ternak');
        $this->db->where('id_diet', $id_diet);
        return $this->db->get();
    }
}
