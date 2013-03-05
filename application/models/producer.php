<?php

class producer extends CI_model{
	function __construct() {
		parent::__construct();
	}

	public function create($arr) {
		$this->db->insert('producers', $arr);
	}

	public function getAll() {
		$query = $this->db->select('id, name')->get('producers');
		return $query->result_array();
	}

	function getOne($id) {
		$query = $this->db
							->select('id, name')
							->where('id', $id)
							->get('producers');

		return $query->row_array();
	}

	function update($id, $producer) {
		$this->db->where('id', $id)->update('producers', $producer);
	}

	function delete($id) {
		$this->db->where('id', $id)->delete('producers');
	}
}
?>
