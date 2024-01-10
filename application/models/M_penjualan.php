<?php
defined('BASEPATH') or exit ('No Direct Script Access Allowed');

class M_Penjualan extends CI_Model{
	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function get_data($table){
		return $this->db->get($table);
	}

	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function kode_otomatis($unik){
		$this->db->select('RIGHT(motor.kode_motor,4) as kode', false);
		$this->db->order_by('kode_motor', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('motor'); // mengecek apakah sudah ada di kode_motor dalam tabel motor

		if($query->num_rows() <> 0){
			//jika sudah ada
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}
		else{
			//jika kode belom ada
			$kode = 1;
		}

		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); //ANGKA 4 menunjukan jumlah digit angka 0
		$kodejadi = $unik.$kodemax;
		return $kodejadi;
	}

	function kode_otomatis_trx($unik){
		$this->db->select('RIGHT(trx_cash.kode_trx,4) as kode', false);
		$this->db->order_by('kode_trx', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('trx_cash'); // mengecek apakah sudah ada di kode_motor dalam tabel motor

		if($query->num_rows() <> 0){
			//jika sudah ada
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}
		else{
			//jika kode belom ada
			$kode = 1;
		}

		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); //ANGKA 4 menunjukan jumlah digit angka 0
		$kodejadi = $unik.$kodemax;
		return $kodejadi;
	}

}
?>