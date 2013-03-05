<?php

class director extends CI_Model{
	function __construct() {
		parent::__construct();
	}

	public function create($arr) {
		$this->db->insert('directors', $arr);
	}

	public function getAll() {
		$query = $this->db->select('id, name')->get('directors');
		return $query->result_array();
	}

	function getOne($id) {
		$query = $this->db
							->select('id, name')
							->where('id', $id)
							->get('directors');

		return $query->row_array();
	}

	function update($id, $director) {
		$this->db->where('id', $id)->update('directors', $director);
	}

	function delete($id) {
		$this->db->where('id', $id)->delete('directors');
	}
}

?>
