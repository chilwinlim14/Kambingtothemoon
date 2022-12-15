<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_peternak_model extends CI_Model {
    
    public function getDataPeternak()
    {
        $this->db->select('*');
        $this->db->from('data_peternak');
        return $this->db->get()->row();
    }
}