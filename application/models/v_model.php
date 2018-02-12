<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class V_model extends CI_Model{
		public function test(){
			return $this->db->get('v_table');
		}

		public function input_data($data,$table){
			$this->db->insert($table,$data);
	   		// $insert_id = $this->db->insert_id();
   			// return  $insert_id;
		}

		public function hapus_data($where,$table){
			$this->db->where($where);
			$this->db->delete($table);
		}

		public function edit_data($where,$table){
			return $this->db->get_where($table,$where);
		}

		public function update_data($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}

		public function detail_data($where,$table){
			$this->db->select('iddetails, nama, harga,gambar_details');
			$this->db->where($where);
			$query = $this->db->get($table);

			// echo $this->db->last_query();die;
			// result() vs row();
			// print_r($query->result());die;
			return $query->result();
		}

		public function m_update($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}

		public function tambah_dt($data,$table){
			$this->db->insert($table,$data);
		}

		public function getAll($where){
			$dataAll = array();
			$dataAll['master']=$this->db->get_where('v_table',$where)->result();
			$dataAll['details']=$this->db->get_where('v_table_details',$where)->result();

			return $dataAll;
		}

	
	}
?>