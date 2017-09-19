<?php
	class Komentar_model extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        function insert($data)
        {
            $this->db->insert('portal_komentar',$data);
        }
        
        function showAll()
        {
            $this->db->select('*');
            $this->db->from('portal_komentar');
            
            return $this->db->get();
        }

        function show_limit7()
        {
            $this->db->select('komen_post');
            $this->db->from('portal_komentar');
            $this->db->where('komen_waktu >= DATE_SUB(NOW(),INTERVAL 1 DAY)');

            return $this->db->get();
        }

        function selectpost($id)
        {
            $this->db->select('*');
            $this->db->from('portal_komentar');
            $this->db->where('komen_post',$id);
                
            return $this->db->get();
        }

        function select_komentar_post($id)
        {
            $this->db->select('*, portal_komentar.id as komentar_id');
            $this->db->from('portal_komentar');
            $this->db->join('portal_user', 'portal_user.id = portal_komentar.komen_user_id');
            $this->db->order_by('komen_waktu','desc');
            $this->db->where('komen_post', $id);
            $this->db->where('komen_parent', 0);
                
            return $this->db->get();
        }

        function select_komentar_balas()
        {
            $this->db->select('*, portal_komentar.id as komentar_id');
            $this->db->from('portal_komentar');
            $this->db->join('portal_user', 'portal_user.id = portal_komentar.komen_user_id');
            $this->db->order_by('komen_waktu','desc');
                
            return $this->db->get();
        }

        function update($data,$id)
        {
            $this->db->where('id',$id);
            $this->db->update('portal_komentar',$data);
        }
        
        function delete($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('portal_komentar');
        }
        function paging_komen($limit=array(), $id)
        {
            $this->db->select('*, portal_komentar.id as komentar_id');
            $this->db->from('portal_komentar');
            $this->db->join('portal_user', 'portal_user.id = portal_komentar.komen_user_id');
            $this->db->where('komen_post', $id);
            $this->db->where('komen_parent', 0);
            $this->db->order_by('komen_waktu','desc');
            if($limit !=NULL)
            {
                $this->db->limit($limit['perpage'],$limit['offset']);
            }
            return $this->db->get();
        }
        function edit_komentar($id)
        {
            $this->db->select('*, portal_komentar.id as komentar_id');
            $this->db->from('portal_komentar');
            $this->db->join('portal_user', 'portal_user.id = portal_komentar.komen_user_id');
            $this->db->where('komen_post', $id);
            $this->db->where('komen_parent', 0);
            $this->db->order_by('komen_waktu','desc');
            return $this->db->get();
        }

        function select_parent($id)
        {
            $this->db->select('*');
            $this->db->from('portal_komentar');
            $this->db->where('komen_parent',$id);
                
            return $this->db->get();   
        }
        function delete_child($id){
            $this->db->where('id',$id);
            $this->db->delete('portal_komentar');   
        }
    }
?>