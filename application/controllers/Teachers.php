<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('teacher');
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
		$records = $this->teacher->fetchall();
		$data = array('teachers'=>$records);
		$this->load->view("teachers/list",$data);
	}

	public function add()
	{
		$records = $this->designation->fetchall();
		$data = array('designations'=>$records);
		$this->load->view("teachers/add",$data);
	}

	public function create()
	{
		$this->form_validation->set_rules('name', 'Student Name', 'trim|required');
		$this->form_validation->set_rules('designation', 'Designation', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('nic', 'Nic', 'trim|required');
		$this->form_validation->set_rules('contact_num', 'Contact No.', 'trim|required');
		$this->form_validation->set_rules('emergency_num', 'Emergency Number', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('errors', validation_errors());
			redirect('/students/add', 'refresh');
		} else {
				$data = array(
				'name' => $this->input->post('name'),
				'designation' => $this->input->post('designation'),
				'email' => $this->input->post('email'),
				'nic' => $this->input->post('nic'),
				'contact_num' => $this->input->post('contact_num'),
				'emergency_num' => $this->input->post('emergency_num'),
				'address' => $this->input->post('address')
			);

				$result = $this->teacher->add($data);
				if ($result == TRUE) {
					$this->session->set_userdata('message_display', 'Teacher Added Successfully !');
					redirect('teachers/add', 'refresh');
				} else {
					$this->session->set_userdata('errors', 'Teacher already exist!');
					redirect('teachers/add', 'refresh');
				}
			
		}
	}

	public function edit($id)
	{
		$designations = $this->designation->fetchall();
		$record = $this->teacher->fetchbyid($id);
		
		if($record){
			$data = array('id'=>$id,'teacher' => $record[0],'designations'=>$designations);
			$this->load->view('teachers/edit',$data);
		}else{
			$this->session->set_userdata('errors','teacher not exist !');
			redirect('teachers/index', 'refresh');
		}
		
	}

	public function update()
	{
		$this->form_validation->set_rules('name', 'Student Name', 'trim|required');
		$this->form_validation->set_rules('designation', 'Designation', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('nic', 'Nic', 'trim|required');
		$this->form_validation->set_rules('contact_num', 'Contact No.', 'trim|required');
		$this->form_validation->set_rules('emergency_num', 'Emergency Number', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('errors', validation_errors());
			redirect('/teachers/edit/'.$this->input->post('id'), 'refresh');
		} else {

				$data = array(
					'name' => $this->input->post('name'),
					'designation' => $this->input->post('designation'),
					'email' => $this->input->post('email'),
					'nic' => $this->input->post('nic'),
					'contact_num' => $this->input->post('contact_num'),
					'emergency_num' => $this->input->post('emergency_num'),
					'address' => $this->input->post('address')
				);

				$result = $this->teacher->update($data,$this->input->post('id'));
				if ($result == TRUE) {
					$this->session->set_userdata('message_display', 'Teacher Updated Successfully !');
					redirect('/teachers/edit/'.$this->input->post('id'), 'refresh');
				} else {
					$this->session->set_userdata('errors', 'Teacher already exist!');
					redirect('teachers/edit/'.$this->input->post('id'), 'refresh');
				}
		}
	}

	public function delete($id)
	{	
		$result = $this->teacher->delete($id);
		if ($result == TRUE) {
			$this->session->set_userdata('message_display', 'teacher Deleted Successfully !');
			redirect('teachers/index', 'refresh');
		} else {
			$this->session->set_userdata('errors', 'Some Error Accur Try Again');
			redirect('teachers/index', 'refresh');
		}
	}
}
