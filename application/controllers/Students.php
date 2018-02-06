<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('student');
		
		/*$check = isset($this->session->userdata['logged_in']) ? 1 : 0;
		if($check == 1){
			$this->load->model('division');
		}else{
			redirect('Users/login', 'refresh');
		}*/
	}

	public function index()
	{
		$records = $this->student->fetchall();
		$data = array('students'=>$records);
		$this->load->view("students/list",$data);
	}

	public function add()
	{
		$this->load->view("students/add");
	}

	public function create()
	{
		$this->form_validation->set_rules('gr_num', 'GR Number', 'trim|required');
		$this->form_validation->set_rules('name', 'Student Name', 'trim|required');
		$this->form_validation->set_rules('father_name', 'Father Name', 'trim|required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
		$this->form_validation->set_rules('doa', 'Date of Admission', 'trim|required');
		$this->form_validation->set_rules('res_num', 'Residence Number', 'trim|required');
		$this->form_validation->set_rules('office_num', 'Office Number', 'trim|required');
		$this->form_validation->set_rules('emergency_num', 'Emergency Number', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('errors', validation_errors());
			redirect('/students/add', 'refresh');
		} else {
				$data = array(
				'gr_num' => $this->input->post('gr_num'),
				'name' => $this->input->post('name'),
				'father_name' => $this->input->post('father_name'),
				'dob' => $this->input->post('dob'),
				'doa' => $this->input->post('doa'),
				'res_num' => $this->input->post('res_num'),
				'office_num' => $this->input->post('office_num'),
				'emergency_num' => $this->input->post('emergency_num'),
				'address' => $this->input->post('address')
			);

				$result = $this->student->add($data);
				if ($result == TRUE) {
					$this->session->set_userdata('message_display', 'Student Added Successfully !');
					redirect('students/add', 'refresh');
				} else {
					$this->session->set_userdata('errors', 'Students already exist!');
					redirect('students/add', 'refresh');
				}
			
		}
	}

	public function edit($id)
	{

		$record = $this->student->fetchbyid($id);
		if($record){
			$data = array('id'=>$id,'student' => $record[0]);
			$this->load->view('students/edit',$data);
		}else{
			$this->session->set_userdata('errors', 'students not exist !');
			redirect('students/index', 'refresh');
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('gr_num', 'GR Number', 'trim|required');
		$this->form_validation->set_rules('name', 'Student Name', 'trim|required');
		$this->form_validation->set_rules('father_name', 'Father Name', 'trim|required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
		$this->form_validation->set_rules('doa', 'Date of Admission', 'trim|required');
		$this->form_validation->set_rules('res_num', 'Residence Number', 'trim|required');
		$this->form_validation->set_rules('office_num', 'Office Number', 'trim|required');
		$this->form_validation->set_rules('emergency_num', 'Emergency Number', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('errors', validation_errors());
			redirect('/students/edit/'.$this->input->post('id'), 'refresh');
		} else {

				$data = array(
				'gr_num' => $this->input->post('gr_num'),
				'name' => $this->input->post('name'),
				'father_name' => $this->input->post('father_name'),
				'dob' => $this->input->post('dob'),
				'doa' => $this->input->post('doa'),
				'res_num' => $this->input->post('res_num'),
				'office_num' => $this->input->post('office_num'),
				'emergency_num' => $this->input->post('emergency_num'),
				'address' => $this->input->post('address')
			);

				$result = $this->student->update($data,$this->input->post('id'));
				if ($result == TRUE) {
					$this->session->set_userdata('message_display', 'Student Updated Successfully !');
					redirect('/students/edit/'.$this->input->post('id'), 'refresh');
				} else {
					$this->session->set_userdata('errors', 'Student already exist!');
					redirect('students/edit/'.$this->input->post('id'), 'refresh');
				}
			
		}
	}

	public function delete($id)
	{	
		$result = $this->student->delete($id);
		if ($result == TRUE) {
			$this->session->set_userdata('message_display', 'student Deleted Successfully !');
			redirect('students/index', 'refresh');
		} else {
			$this->session->set_userdata('errors', 'Some Error Accur Try Again');
			redirect('students/index', 'refresh');
		}
	}
}
