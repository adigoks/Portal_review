<?php
	class Post_model extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        function insert($data)
        {
            $this->db->insert('portal_post',$data);
        }
        
        function showAll()
        {
            $this->db->select('*');
            $this->db->from('portal_post');
            
            return $this->db->get();
        }
        function selectId($id)
        {
            $this->db->select('*');
            $this->db->from('portal_post');
            $this->db->where('id',$id);
                
            return $this->db->get();
        }
		
		
        function update($data,$id)
        {
            $this->db->where('id',$id);
            $this->db->update('portal_post',$data);
        }
        
        function delete($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('portal_post');
        }
        function paging($limit=array())
        {
            $this->db->select('*');
            $this->db->from('portal_post');
            $this->db->order_by('post_waktu','desc');
            if($limit !=NULL)
            {
                $this->db->limit($limit['perpage'],$limit['offset']);
            }
            return $this->db->get();
        }
    }
?>