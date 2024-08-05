<?php
	

	class Mtugas extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->database('tugas');
		}

		public function input($regis)
		{
			$this->db->insert('prak',$regis);
		}

		public function login($value)
		{
			$this->db->select('username','password');
			$this->db->from('merchant');				
			$this->db->where('username', $Value);
			$return=$this->db->get()->result();
			return $return;
		}
	}
?>