<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actors extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Actor', 'actor');
	}
	public function index()
	{
		$this->template->set_layout('default')
			->title('Movie Management', 'Actors')
			->build('actors/index', array('data' => $this->actor->getAll()));
	}
	public function create()
	{
		$this->load->helper('form','assets');
		$this->load->library('form_validation', null,'validation');

		$this->validation->set_rules('name', 'Name', 'required');

		if($this->validation->run()==FALSE) {
			$this->template->set_layout('default')
			->title('Movie Management', 'Actors')
			->build('actors/create');
		}
		else {
			$this->actor
					 ->create(array(
						'name' =>  $this->input->post('name'),
						'gender' => $this->input->post('gender')
						));
			redirect('actors/index');
		}
	}
	public function edit($id)
	{
		$actor = $this->actor->getOne($id);

		if (empty($actor)) {
			$this->session->set_flashdata('error', 'Actor does not exist!');
			redirect('actors/index');
		}

		$this->load->helper('form');
		$this->load->library('form_validation', null, 'validation');

		$this->validation->set_rules('name', 'Name', 'trim|ucfirst|required');

		if ($this->validation->run() == false) {
			$this->template->set_layout('default')
			->title('Movie Management', 'Actors')
			->build('actors/edit', array('actor' => $actor));
		} else {
			$id = $this->input->post('id');
			$this->actor->update($id, array(
				'name' => $this->input->post('name'),
				'gender' => $this->input->post('gender')
			));
			redirect('actors/index');
		}
	}

	public function delete($id) {
		$actor = $this->actor->getOne($id);

		if (empty($actor)) {
			$this->session->set_flashdata('error', 'Actor does not exist!');
			redirect('actors/index');
		}

		$this->actor->delete($id);
		redirect('actors/index');
	}
}
