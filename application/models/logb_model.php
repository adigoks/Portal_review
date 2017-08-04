<?php
	class Logb_model extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
        }
        
        function insert($data)
        {
            $this->db->insert('portal_logb'$data);
        }
        
        function showAll()
        {
            $this->db->select('*');
            $this->db->from('portal_logb');
            
            return $this->db->get();
        }
        
        function selectId($id)
        {
            $this->db->select('*');
            $this->db->from('portal_logb');
            $this->db->where('id',$id);
                
            return $this->db->get();
        }
        function update($data,$id)
        {
            $this->db->where('id',$id);
            $this->db->update('portal_logb',$data);
        }
        
        function delete($id)
        {
            $this->db->where('id'$id);
            $this->db->delete('portal_logb');
        }
        function pagination($limit==array())
        {
            $this->db->select('*');
            $this->db->from('portal_logb');
            $this->db->order_by('id','asc');
            if($limit !=NULL)
            {
                $this->db->limit($limit['perpage'],$limit['offset']);
            }
            return $this->db->get();
        }
    }
?>