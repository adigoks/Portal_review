<?php
	class Layout_model extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
        }
        
        function insert($data)
        {
            $this->db->insert('portal_layout',$data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
        
        function showAll()
        {
            $this->db->select('*');
            $this->db->from('portal_layout');
            
            return $this->db->get();
        }
        
        function selectId($id)
        {
            $this->db->select('*');
            $this->db->from('portal_layout');
            $this->db->where('id',$id);
                
            return $this->db->get();
        }
        function update($data,$id)
        {
            $this->db->where('id',$id);
            $this->db->update('portal_layout',$data);
        }
        
        function delete($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('portal_layout');
        }
        function pagination($limit=array())
        {
            $this->db->select('*');
            $this->db->from('portal_layout');
            $this->db->order_by('id','asc');
            if($limit !=NULL)
            {
                $this->db->limit($limit['perpage'],$limit['offset']);
            }
            return $this->db->get();
        }
        function selectName($name)
        {
            $this->db->select('*');
            $this->db->from('portal_layout');
            $this->db->where('layout_name',$name);
                
            return $this->db->get();
        }
    }
?>