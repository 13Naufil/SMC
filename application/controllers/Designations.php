<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Designations extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('designation');
		
		/*$check = isset($this->session->userdata['logged_in']) ? 1 : 0;
		if($check == 1){
			$this->load->model('division');
		}else{
			redirect('Users/login', 'refresh');
		}*/
	}

	public function index()
	{
		$records = $this->designation->fetchall();
		$data = array('designations'=>$records);
		$this->load->view("designations/list",$data);
	}

	public function create()
	{
		
		$this->form_validation->set_rules('name', 'Designation Name', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('errors', validation_errors());
			redirect('/designations/index', 'refresh');
		} else {
				$data = array(
				'name' => $this->input->post('name'),
			);

				$result = $this->designation->add($data);
				if ($result == TRUE) {
					$this->session->set_userdata('message_display', 'Designation Added Successfully !');
					redirect('designations/index', 'refresh');
				} else {
					$this->session->set_userdata('errors', 'Designation already exist!');
					redirect('designations/index', 'refresh');
				}
			
		}
	}


	public function update()
	{
		$this->form_validation->set_rules('name', 'Designation Name', 'trim|required');
		

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('errors', validation_errors());
			redirect('/designations/index', 'refresh');
		} else {

				$data = array(
				'name' => $this->input->post('name'),
			);

				$result = $this->designation->update($data,$this->input->post('id'));
				if ($result == TRUE) {
					$this->session->set_userdata('message_display', 'Designation Updated Successfully !');
					redirect('/designations/index/', 'refresh');
				} else {
					$this->session->set_userdata('errors', 'Designation already exist!');
					redirect('designations/index/', 'refresh');
				}
			
		}
	}

	public function delete($id)
	{	
		$data = array('status'=>1);
		$result = $this->designation->update($data,$id);
		if ($result == TRUE) {
			$this->session->set_userdata('message_display', 'Designation Status change Successfully !');
			redirect('designations/index', 'refresh');
		} else {
			$this->session->set_userdata('errors', 'Some Error Accur Try Again');
			redirect('designations/index', 'refresh');
		}
	}
}
