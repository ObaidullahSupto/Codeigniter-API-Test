<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MedApi extends CI_Controller {

	public function __construct()
	{
//	parent::__construct();
// 		$this->load->model('MedApi_model');
// 		$this->load->library('form_validation');

        parent::__construct();

		$this->load->model('MedApi_model');
		$this->load->library('form_validation');

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
	}

	function index()
	{
		$data = $this->MedApi_model->fetch_all();
		echo json_encode($data->result_array());
	}

	function insert()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
		$this->form_validation->set_rules('place', 'Place', 'required');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
		$this->form_validation->set_rules('expire_date', 'Expire Date ', 'required');

		if($this->form_validation->run())
		{
			$data = array(
				'name'	=>	$this->input->post('name'),
				'blood_group' =>	$this->input->post('blood_group'),
				'place'	=>	$this->input->post('place'),
				'phone_number'	=>	$this->input->post('phone_number'),
				'expire_date'	=>	$this->input->post('expire_date'),

			);

			$this->MedApi_model->insert_api($data);

			$array = array(
				'success'		=>	true
			);
		}
		else
		{
			$array = array(
				'error'					=>	true,
				'name_error'		=>	form_error('name'),
				'blood_group_error'		=>	form_error('blood_group'),
				'place_error'		=>	form_error('place'),
				'phone_number_error'		=>	form_error('phone_number'),
				'expire_date_error'		=>	form_error('expire_date')
			);
		}
		echo json_encode($array);
	}
	
	function fetch_single()
	{
		if($this->input->post('id'))
		{
			$data = $this->MedApi_model->fetch_single_user($this->input->post('id'));

			foreach($data as $row)
			{
				$output['name'] = $row['name'];
				$output['blood_group'] = $row['blood_group'];
				$output['place'] = $row['place'];
				$output['phone_number'] = $row['phone_number'];
				$output['expire_date'] = $row['expire_date'];
			}
			echo json_encode($output);
		}
	}

	function update()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
		$this->form_validation->set_rules('place', 'Place', 'required');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
		$this->form_validation->set_rules('expire_date', 'Expire Date ', 'required');
		if($this->form_validation->run())
		{	
			$data = array(
				'name'	=>	$this->input->post('name'),
				'blood_group' =>	$this->input->post('blood_group'),
				'place'	=>	$this->input->post('place'),
				'phone_number'	=>	$this->input->post('phone_number'),
				'expire_date'	=>	$this->input->post('expire_date'),

			);

			$this->MedApi_model->update_api($this->input->post('id'), $data);

			$array = array(
				'success'		=>	true
			);
		}
		else
		{
			$array = array(
				'error'					=>	true,
				'name_error'		=>	form_error('name'),
				'blood_group_error'		=>	form_error('blood_group'),
				'place_error'		=>	form_error('place'),
				'phone_number_error'		=>	form_error('phone_number'),
				'expire_date_error'		=>	form_error('expire_date')
			);
		}
		echo json_encode($array);
	}

	function delete()
	{
		if($this->input->post('id'))
		{
			if($this->MedApi_model->delete_single_user($this->input->post('id')))
			{
				$array = array(

					'success'	=>	true
				);
			}
			else
			{
				$array = array(
					'error'		=>	true
				);
			}
			echo json_encode($array);
		}
	}

}


?>