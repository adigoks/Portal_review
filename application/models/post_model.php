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

        function showAll_post($id)
        {
            $this->db->select('*');
            $this->db->from('portal_post');
            $this->db->where('post_author',$id);
            
            return $this->db->get();
        }

		function showPublish()
		{
			$this->db->select('*, portal_user.id as id_user');
            $this->db->from('portal_post');
            $this->db->join('portal_user', 'portal_post.post_author = portal_user.id' );
            $this->db->where('post_published',1);
			$this->db->order_by('post_waktu','desc');
			$this->db->limit('6');
			
			return $this->db->get();
		}

		function showPublish2()
		{
			$this->db->select('*, portal_user.id as id_user');
			$this->db->from('portal_post');
            $this->db->join('portal_user', 'portal_post.post_author = portal_user.id' );
			$this->db->where('post_published',1);
			$this->db->order_by('post_waktu','desc');
			
			return $this->db->get();
		}

		function showTag($tag)
		{
			$this->db->select('*, portal_user.id as id_user');
            $this->db->from('portal_post');
            $this->db->join('portal_user', 'portal_post.post_author = portal_user.id' );
			$this->db->where('post_tag',$tag);
            $this->db->where('post_published',1);
			$this->db->order_by('post_waktu','desc');
			
			return $this->db->get();
		}

        function showAuthor($id)
        {
            $this->db->select('*, portal_user.id as id_user');
            $this->db->from('portal_post');
            $this->db->join('portal_user', 'portal_post.post_author = portal_user.id' );
            $this->db->where('user_name',$id);
            $this->db->where('post_published',1);
            $this->db->order_by('post_waktu','desc');
            
            return $this->db->get();
        }

        function showUri($uri)
        {
            $this->db->select('*, portal_user.id as id_user');
            $this->db->from('portal_post');
            $this->db->join('portal_user', 'portal_post.post_author = portal_user.id' );
            $this->db->where('post_uri', $uri);
            $this->db->order_by('post_waktu','desc');
            
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
        function paging($limit=array(), $id)
        {
            $this->db->select('*');
            $this->db->from('portal_user');
            $this->db->join('portal_post', 'portal_post.post_author = portal_user.id' );
            $this->db->where('post_author', $id);
            $this->db->order_by('post_waktu','desc');
            if($limit !=NULL)
            {
                $this->db->limit($limit['perpage'],$limit['offset']);
            }
            return $this->db->get();
        }

        function paging_super($limit=array())
        {
            $this->db->select('*');
            $this->db->from('portal_user');
            $this->db->join('portal_post', 'portal_post.post_author = portal_user.id' );
            $this->db->order_by('post_waktu','desc');
            if($limit !=NULL)
            {
                $this->db->limit($limit['perpage'],$limit['offset']);
            }
            return $this->db->get();
        }

        function paging_author($id, $limit=array())
        {
            $this->db->select('*, portal_user.id as id_user');
            $this->db->from('portal_post');
            $this->db->join('portal_user', 'portal_post.post_author = portal_user.id');
            $this->db->where('user_name', $id);
            $this->db->order_by('post_waktu', 'desc');
            if ($limit != NULL) {
                $this->db->limit($limit['perpage'], $limit['offset']);
            }
            return $this->db->get();
        }

        function paging_tag($tag, $limit=array())
        {
            $this->db->select('*, portal_user.id as id_user');
            $this->db->from('portal_post');
            $this->db->join('portal_user', 'portal_post.post_author = portal_user.id');
            $this->db->where('post_tag', $tag);
            $this->db->order_by('post_waktu', 'desc');
            if ($limit != NULL) {
                $this->db->limit($limit['perpage'], $limit['offset']);
            }
            return $this->db->get();
        }
    }
?>