<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producers extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Producer', 'producer');
	}

	public function index()
	{
		$this->load
				 ->view('producers/index', array(
						'data' =>$this->producer->getAll()
						));
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation', null, 'validation');

		$this->validation->set_rules('name', 'Name', 'trim|ucfirst|required');

		if ($this->validation->run() == false) {
			$this->load->view('producers/create');
		}
		else {
			var_dump($this->input->post('name'));
			$this->producer
					 ->create(array(
						'name' =>  $this->input->post('name')
						));

			redirect('producers/index');
		}
	}
	public function edit($id)
	{
		$producer = $this->producer->getOne($id);

		if (empty($producer)) {
			$this->session->set_flashdata('error', 'Producer does not exist!');
			redirect('producers/index');
		}

		$this->load->helper('form');
		$this->load->library('form_validation', null, 'validation');

		$this->validation->set_rules('name', 'Name', 'trim|ucfirst|required');

		if ($this->validation->run() == false) {
			$this->load->view('producers/edit', array('producer' => $producer));
		} else {
			$id = $this->input->post('id');
			$this->producer->update($id, array(
				'name' => $this->input->post('name')
			));
			redirect('producers/index');
		}
	}

	public function delete($id) {
		$producer = $this->producer->getOne($id);

		if (empty($producer)) {
			$this->session->set_flashdata('error', 'Producer does not exist!');
			redirect('producer/index');
		}

		$this->producer->delete($id);
		redirect('producers/index');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */