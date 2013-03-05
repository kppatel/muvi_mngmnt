<?php

class category extends CI_Model{
	function __construct() {
		parent::__construct();
	}

	public function create($arr) {
		$this->db->insert('categories', $arr);
	}

	public function getAll() {
		$query = $this->db->select('id, name')->get('categories');
		return $query->result_array();
	}

	function getOne($id) {
		$query = $this->db
							->select('id, name')
							->where('id', $id)
							->get('categories');

		return $query->row_array();
	}

	function update($id, $category) {
		$this->db->where('id', $id)->update('categories', $category);
	}

	function delete($id) {
		$this->db->where('id', $id)->delete('categories');
	}
}

?>
