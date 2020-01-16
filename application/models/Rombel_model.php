<?php

class Rombel_model extends CI_Model{
    
    public function getRombel($id = null)
    {
        // cek param
        if($id === null){
            // jika tidak ada param yang dikirim
            return $this->db->get('rombel')->result_array();
        } else {
            // jika ada param yang dikirm
            return $this->db->get_where('rombel', ['id' => $id])->result_array();
        }
    }

    public function deleteRombel($id)
    {
        $this->db->delete('rombel', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createRombel($data)
    {
        $this->db->insert('rombel', $data);
        return $this->db->affected_rows();
    }

    public function updateRombel($data, $id)
    {
        $this->db->update('rombel', $data, ['id' => $id]);
        return $this->db->affected_rows();        
    }
}