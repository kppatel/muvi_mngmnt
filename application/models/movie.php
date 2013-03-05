<?php

class movie extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function getAll()
	{
		 $query = $this->db
		  ->select('m.id, m.title, m.released_date, pm.producer_id, pm.movie_id, dm.director_id, d.name As director, c.name As category, p.name As producer' )
		  ->join('categories c', 'c.id = m.category_id')
		  ->join('producers_movies pm', 'pm.movie_id = m.id')
		  ->join('directors_movies dm', 'dm.movie_id = m.id')
			->join('directors d', 'd.id=dm.director_id')
		  ->join('producers p', 'p.id = pm.producer_id')
		  ->get('movies m');

		return $query->result_array();
	}

	public function getOne($id)
	{
		 $query = $this->db
		  ->select('m.id, m.title, m.released_date, pm.producer_id, pm.movie_id, dm.director_id, m.category_id, d.name As director, c.name As category, p.name As producer' )
		  ->join('categories c', 'c.id = m.category_id')
		  ->join('producers_movies pm', 'pm.movie_id = m.id')
		  ->join('directors_movies dm', 'dm.movie_id = m.id')
			->join('directors d', 'd.id=dm.director_id')
		  ->join('producers p', 'p.id = pm.producer_id')
			->where('m.id', $id)
		  ->get('movies m');

		return $query->row_array();
	}

	public function create($arr) {
		$movie = array(
				'title' => $arr['title'],
				'category_id' => $arr['category_id'],
				'released_date' => $arr['released_date']
		);
		$this->db->insert('movies',$movie);

		$mid = $this->db->insert_id();
		$dir=array(
				'movie_id' => $mid,
				'director_id' => $arr['director']
		);
		$pro = array(
				'producer_id' => $arr['producer'],
				'movie_id' => $mid
		);

		$this->db->insert('producers_movies',$pro);
		$this->db->insert('directors_movies', $dir);
	}

	public function edit($arr)
	{
		$movie = array(
				'title' => $arr['title'],
				'category_id' => $arr['category_id'],
				'released_date' => $arr['released_date']
		);
		
		$this->db->where('id', $arr['id'])->update('movies', $movie);

		$this->db->where('movie_id', $arr['id'])
						->update('producers_movies', array('producer_id' => $arr['producer']));

		$this->db->where('movie_id', $arr['id'])
						->update('directors_movies', array('director_id' => $arr['director']));
	}
}

?>
