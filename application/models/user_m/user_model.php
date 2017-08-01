<?php
	class user extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
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
		
		
	}
?>