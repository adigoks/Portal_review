<?php
	class User_model extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        function insert($data)
        {
            $this->db->insert('portal_user',$data);
        }
        
        function showAll()
        {
            $this->db->select('*');
            $this->db->from('portal_user');
            
            return $this->db->get();
        }
        
        function selectId($id)
        {
            $this->db->select('*');
            $this->db->from('portal_user');
            $this->db->where('id',$id);
                
            return $this->db->get();
        }

        function selectValidasi($validasi)
        {
            $this->db->select('*');
            $this->db->from('portal_user');
            $this->db->where('user_validation',$validasi);
                
            return $this->db->get();
        }

        function select_username($username)
        {
            $this->db->select('*');
            $this->db->from('portal_user');
            $this->db->where('user_name',$username);
                
            return $this->db->get(); 
        }

        function select_us($username, $password)
        {
            $this->db->select('*');
            $this->db->from('portal_user');
            $this->db->where('user_name', $username);
            $this->db->where('user_password', $password);
            $this->db->where('user_level < 2');

            return $this->db->get();
        }

        function select_us1($username, $password)
        {
            $this->db->select('*');
            $this->db->from('portal_user');
            $this->db->where('user_name', $username);
            $this->db->where('user_password', $password);
            $this->db->where('user_level = 2');

            return $this->db->get();
        }

        function select_admin()
        {
            $this->db->select('*');
            $this->db->from('portal_user');
            $this->db->where('user_level > 0');
                
            return $this->db->get();
        }

        function update($data,$id)
        {
            $this->db->where('id',$id);
            $this->db->update('portal_user',$data);
        }

        function update_level($data,$user)
        {
            $this->db->where('user_name',$user);
            $this->db->update('portal_user',$data);
        }
        
        function delete($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('portal_user');
        }
        function pagination($limit=array())
        {
            $this->db->select('*');
            $this->db->from('portal_user');
            $this->db->order_by('id','asc');
            if($limit !=NULL)
            {
                $this->db->limit($limit['perpage'],$limit['offset']);
            }
            return $this->db->get();
        }
        function pagination_admin($limit=array())
        {
            $this->db->select('*');
            $this->db->from('portal_user');
            $this->db->where('user_level > 0');
            $this->db->order_by('user_level','asc');
            $this->db->order_by('user_name','asc');
            if($limit !=NULL){
                $this->db->limit($limit['perpage'],$limit['offset']);
            }
            return $this->db->get();
        }

        function search($cari)
        {
            $this->db->select('user_name');
            $this->db->from('portal_user');
            $whereCondition= array('user_name'=>$cari);
            $this->db->where('$whereCondition');

            return $this->db->get();
        }
    }
?>