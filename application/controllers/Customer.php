<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->helper(['form', 'url']);
		$this->load->model('customer_model', 'model', TRUE);
	}

	public function index()
	{
		$this->load->view('customer.index.php', [
			'data' => $this->model->all(),
			'notification' => $this->session->flashdata('notification')
		]);
	}

	public function get_avatar($id)
	{
		header('Content-type : image/jpeg');

		echo $this->model->get($id)->avatar;
	}

	public function get_title()
	{
		$titles = $this->model->get_title($this->input->get('q', TRUE));

		echo json_encode((object)[
			'items' => $titles
		]);
	}

	public function store()
	{
		$this->model->name = $this->input->post('name', TRUE);
		$this->model->avatar = file_get_contents($_FILES['userfile']['tmp_name']);
		$this->model->address = [];

		foreach ($this->input->post('title_id', TRUE) as $key => $value) $this->model->address[$key]['title_id'] = $value;
		foreach ($this->input->post('address', TRUE) as $key => $value) $this->model->address[$key]['address'] = $value;
		
		if ($this->model->store() === TRUE) {
			$notification = '<div class="alert alert-success">Success creating customer.</div>';
		} else {
			$notification = '<div class="alert alert-danger">Failed creating customer.</div>';
		}

		$this->session->set_flashdata('notification', $notification);

		redirect(site_url('/'), 'refresh');
	}

	public function delete($id)
	{
		if ($this->model->destroy($id))
		{
			$notification = '<div class="alert alert-success">Success to delete customer.</div>';
		} else {
			$notification = '<div class="alert alert-danger">Fail to delete customer.</div>';
		}

		$this->session->set_flashdata('notification', $notification);

		redirect(site_url('/'), 'refresh');
	}

}

/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */