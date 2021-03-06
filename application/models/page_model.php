<?php
	class Page_model extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        function insert($data)
        {
            $this->db->insert('portal_page',$data);
        }
        
        function showAll()
        {
            $this->db->select('*');
            $this->db->from('portal_page');
            
            return $this->db->get();
        }
        
        function selectId($id)
        {
            $this->db->select('*');
            $this->db->from('portal_page');
            $this->db->where('id',$id);
                
            return $this->db->get();
        }
        function select_judul($judul)
        {
            $this->db->select('*');
            $this->db->from('portal_page');
            $this->db->where('page_judul',$judul);
                
            return $this->db->get();
        }

        function update($data,$id)
        {
            $this->db->where('id',$id);
            $this->db->update('portal_page',$data);
        }
        
        function delete($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('portal_page');
        }
        function pagination($limit=array())
        {
            $this->db->select('*');
            $this->db->from('portal_page');
            $this->db->order_by('page_name','asc');
            if($limit !=NULL)
            {
                $this->db->limit($limit['perpage'],$limit['offset']);
            }
            return $this->db->get();
        }
    }
?>