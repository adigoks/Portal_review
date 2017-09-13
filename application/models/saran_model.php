<?php
	class Saran_model extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        function insert($data)
        {
            $this->db->insert('portal_saran',$data);
        }
        
        function showAll()
        {
            $this->db->select('*');
            $this->db->from('portal_saran');
            
            return $this->db->get();
        }
        
        function selectId($id)
        {
            $this->db->select('*');
            $this->db->from('portal_saran');
            $this->db->where('id',$id);
                
            return $this->db->get();
        }
        function update($data,$id)
        {
            $this->db->where('id',$id);
            $this->db->update('portal_saran',$data);
        }
        
        function delete($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('portal_saran');
        }
        function paginasi_unread($limit=array())
        {
            $this->db->select('*');
            $this->db->from('portal_saran');
            $this->db->order_by('saran_readed', 0, 'asc');
            $this->db->order_by('id', 'asc');
            if($limit !=NULL)
            {
                $this->db->limit($limit['perpage'],$limit['offset']);
            }
            return $this->db->get();
        }
    }
?>