<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Category', 'category');
	}
	public function index()
	{
		$this->template->set_layout('default')
			->title('Movie Management', 'Categories')
			->build('categories/index', array('data' => $this->category->getAll()));
	}
	public function create()
	{
		$this->load->helper('form','assets');
		$this->load->library('form_validation', null,'validation');

		$this->validation->set_rules('name', 'Name', 'required');

		if($this->validation->run()==FALSE) {
			$this->template->set_layout('default')
			->title('Movie Management', 'Movies')
			->build('categories/create');
		}
		else {
			$this->category
					 ->create(array(
						'name' =>  $this->input->post('name')
						));
			redirect('categories/index');
		}
	}
	public function edit($id)
	{
		$category = $this->category->getOne($id);

		if (empty($category)) {
			$this->session->set_flashdata('error', 'Category does not exist!');
			redirect('categories/index');
		}

		$this->load->helper('form');
		$this->load->library('form_validation', null, 'validation');

		$this->validation->set_rules('name', 'Name', 'trim|ucfirst|required');

		if ($this->validation->run() == false) {
			$this->template->set_layout('default')
			->title('Movie Management', 'Movies')
			->build('categories/edit', array('category' => $category));
		} else {
			$id = $this->input->post('id');
			$this->category->update($id, array(
				'name' => $this->input->post('name')
			));
			redirect('categories/index');
		}
	}

	public function delete($id) {
		$category = $this->category->getOne($id);

		if (empty($category)) {
			$this->session->set_flashdata('error', 'Category does not exist!');
			redirect('categories/index');
		}

		$this->category->delete($id);
		redirect('categories/index');
	}
}