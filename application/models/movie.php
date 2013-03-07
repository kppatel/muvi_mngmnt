<?php

class movie extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function getAll()
	{
		 $query = $this->db
		  ->select('m.id, m.title, m.released_date, pm.producer_id, p.name As producer, dm.director_id, d.name As director, m.category_id, c.name As category, am.actor_id, a.name As actor')
		  ->join('categories c', 'c.id = m.category_id')
		  ->join('producers_movies pm', 'pm.movie_id = m.id')
			->join('producers p', 'p.id = pm.producer_id')
		  ->join('directors_movies dm', 'dm.movie_id = m.id')
			->join('directors d', 'd.id=dm.director_id')
			->join('actors_movies am', 'am.movie_id = m.id')
			->join('actors a', 'a.id = am.actor_id')
			->get('movies m');

		return $query->result_array();
	}

	public function getOne($id)
	{
		 $query = $this->db
		  ->select('m.id, m.title, m.released_date, pm.producer_id, p.name As producer, dm.director_id, d.name As director, m.category_id, c.name As category, am.actor_id, a.name As actor' )
		  ->join('categories c', 'c.id = m.category_id')
		  ->join('producers_movies pm', 'pm.movie_id = m.id')
			->join('producers p', 'p.id = pm.producer_id')
		  ->join('directors_movies dm', 'dm.movie_id = m.id')
			->join('directors d', 'd.id=dm.director_id')
			->join('actors_movies am', 'am.movie_id = m.id')
			->join('actors a', 'a.id = am.actor_id')
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
		$act = array(
				'actor_id' => $arr['actor'],
				'movie_id' => $mid
		);

		$this->db->insert('producers_movies',$pro);
		$this->db->insert('directors_movies', $dir);
		$this->db->insert('actors_movies', $act);
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

		$this->db->where('movie_id', $arr['id'])
						->update('actors_movies', array('actor_id' => $arr['actor']));
	}

	function delete($id) {
		$this->db->where('movie_id',$id)->delete('directors_movies');
		$this->db->where('movie_id',$id)->delete('producers_movies');
		$this->db->where('movie_id',$id)->delete('actors_movies');
		$this->db->where('id', $id)->delete('movies');
	}
}
?>