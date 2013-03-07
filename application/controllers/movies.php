<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movies extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Producer', 'producer');
		$this->load->model('Director', 'director');
		$this->load->model('Category', 'category');
		$this->load->model('Movie', 'movie');
		$this->load->model('Actor', 'actor');
	}

	public function index()	{
		$this->template->set_layout('default')
			->title('Movie Management', 'Movies')
			->build('movies/index', array('data' => $this->movie->getAll()));
	}

	public function create() {
		$data = array(
			'producer' => $this->assoc2numeric($this->producer->getAll()),
			'director' => $this->assoc2numeric($this->director->getAll()),
			'category' => $this->assoc2numeric($this->category->getAll()),
		  'actor' => $this->assoc2numeric($this->actor->getAll())
		);
		$this->load->helper('form');
		$this->load->library('form_validation', null, 'validation');

		$this->validation
						->set_rules('title', 'Title', 'required')
						->set_rules('released_date', 'Released Date', 'required');

		if ($this->validation->run() == false) {
			$this->template->set_layout('default')
			->title('Movie Management', 'Movies')
			->build('movies/create', $data);
		}
		else {
			$marr = array(
					'title' => $this->input->post('title'),
					'category_id' => $this->input->post('category'),
					'released_date' => $this->input->post('released_date'),
					'description' => $this->input->post('description'),
					'director' => $this->input->post('director'),
					'producer' => $this->input->post('producer'),
					'actor' => $this->input->post('actor'),
			);
			$this->movie->create($marr);
			redirect('movies/index');
		}
	}

	public function edit($id) {
			$data = array(
			'movie' => $this->movie->getOne($id),
			'producer' => $this->assoc2numeric($this->producer->getAll()),
			'director' => $this->assoc2numeric($this->director->getAll()),
			'category' => $this->assoc2numeric($this->category->getAll()),
		  'actor' => $this->assoc2numeric($this->actor->getAll())
		);
		$this->load->helper('form');
		$this->load->library('form_validation', null, 'validation');

		$this->validation
						->set_rules('title', 'Title', 'required')
						->set_rules('released_date', 'Released Date', 'required');

		if ($this->validation->run() == false) {
			$this->template->set_layout('default')
			->title('Movie Management', 'Movies')
			->build('movies/edit', $data);
		}
		else {
			$marr = array(
					'id' => $this->input->post('id'),
					'title' => $this->input->post('title'),
					'category_id' => $this->input->post('category'),
					'released_date' => $this->input->post('released_date'),
					'director' => $this->input->post('director'),
					'producer' => $this->input->post('producer'),
					'actor' => $this->input->post('actor'),
			);
			$this->movie->edit($marr);
			redirect('movies/index');
		}
	}

	public function delete($id) {
		$movie = $this->movie->getOne($id);

		if (empty($movie)) {
			$this->session->set_flashdata('error', 'Movie does not exist!');
			redirect('movies/index');
		}

		$this->movie->delete($id);
		redirect('movies/index');
	}

	private function assoc2numeric(array $assoc) {
		$numeric = array();

		foreach ($assoc as $a) {
			$numeric[$a['id']] = $a['name'];
		}

		return $numeric;
	}
}