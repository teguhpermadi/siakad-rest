<?php

class Kelas_model extends CI_Model{
    
    public function getKelas($id = null)
    {
        // cek param
        if($id === null){
            // jika tidak ada param yang dikirim
            return $this->db->get('kelas')->result_array();
        } else {
            // jika ada param yang dikirm
            return $this->db->get_where('kelas', ['id' => $id])->result_array();
        }
    }

    public function deleteKelas($id)
    {
        $this->db->delete('kelas', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createKelas($data)
    {
        $this->db->insert('kelas', $data);
        return $this->db->affected_rows();
    }

    public function updateKelas($data, $id)
    {
        $this->db->update('kelas', $data, ['id' => $id]);
        return $this->db->affected_rows();        
    }
}