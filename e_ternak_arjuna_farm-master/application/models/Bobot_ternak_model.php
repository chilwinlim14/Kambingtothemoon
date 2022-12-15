<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bobot_ternak_model extends CI_Model
{
    public function get_data_bobot_ternak()
    {
        $this->datatables->select('a.id_bobot, a.tanggal_timbang, a.id_ternak, a.umur_timbang, a.bobot, a.hamil, b.inisial');
        $this->datatables->from('bobot_ternak a');
        $this->datatables->join('ternak b','a.id_ternak = b.id_ternak');
        return $this->datatables->generate();
    }

    public function get_data_bobot_ternak_byId($id_bobot)
    {
        $this->db->select('*');
        $this->db->from('bobot_ternak');
        $this->db->where('id_bobot', $id_bobot);
        return $this->db->get()->row();
    }
}
