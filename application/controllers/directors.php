<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Directors extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Director', 'director');
	}

	public function index() {
		$this->load
						->view('directors/index',array('data' =>  $this->director->getAll()));
	}

	public function create() {
		$this->load->helper('form');
		$this->load->library('form_validation', null, 'validation');

		$this->validation->set_rules('name', 'Name', 'trim|ucfirst|required');

		if ($this->validation->run() == false) {
			$this->load->view('directors/create');
		}
		else {
			var_dump($this->input->post('name'));
			$this->director
					 ->create(array(
						'name' =>  $this->input->post('name')
						));
			redirect('directors/index');
		}
	}

	public function edit($id)
	{
		$director = $this->director->getOne($id);

		if (empty($director)) {
			$this->session->set_flashdata('error', 'Director does not exist!');
			redirect('directors/index');
		}

		$this->load->helper('form');
		$this->load->library('form_validation', null, 'validation');

		$this->validation->set_rules('name', 'Name', 'trim|ucfirst|required');

		if ($this->validation->run() == false) {
			$this->load->view('directors/edit', array('director' => $director));
		} else {
			$id = $this->input->post('id');
			$this->director->update($id, array(
				'name' => $this->input->post('name')
			));
			redirect('directors/index');
		}
	}

	public function delete($id) {
		$director = $this->director->getOne($id);

		if (empty($director)) {
			$this->session->set_flashdata('error', 'Director does not exist!');
			redirect('directors/index');
		}

		$this->director->delete($id);
		redirect('directors/index');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */