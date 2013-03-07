<?php

class actor extends CI_Model{
	function __construct() {
		parent::__construct();
	}

	public function create($arr) {
		$this->db->insert('actors', $arr);
	}

	public function getAll() {
		$query = $this->db->select('id, name, gender')->get('actors');
		return $query->result_array();
	}

	function getOne($id) {
		$query = $this->db
							->select('id, name, gender')
							->where('id', $id)
							->get('actors');

		return $query->row_array();
	}

	function update($id, $actor) {
		$this->db->where('id', $id)->update('actors', $actor);
	}

	function delete($id) {
		$this->db->where('id', $id)->delete('actors');
	}
}

?>
