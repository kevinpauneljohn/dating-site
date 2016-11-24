<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Myaccount extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');
    }
	
	public function confirm($key,$uname){
		echo $key."<br/>";
		echo $uname;
	
		$this->load->model('access/Registration');
		if($this->Registration->is_valid_key($key,$uname)){
			if($this->Registration->register($uname)){
				$this->db->where('temp_uname',$uname);
				$this->db->delete('temp_user_tbl');
				
			}
			redirect('login');
		}else{
			echo 'failed to complete';
		}
		
	}

	public function login(){
		$set_activity = '';
		$this->load->helper('form');
		$this->load->model('access/Login');
		
		$uname = $this->input->post('uname');
		$pword = $this->input->post('pword');
		
		$this->form_validation->set_rules('uname','Username','trim|required');
		$this->form_validation->set_rules('pword','Password','trim|required');
		
		if($this->form_validation->run() == FALSE){
			$data['result'] = validation_errors();
		}elseif($this->Login->check_access($uname,$pword) == false){
			$data['invalid'] = 'Invalid account';
		}else{
			$data = array(
				'username'		=>	$this->input->post('uname'),
				'is_logged_in'	=> true
			);
			$this->session->username = $uname;
			
			$this->session->set_userdata($data);
			$set_activity = date('m/d/Y h:i a', time());
			$this->Login->make_online($uname,1,$set_activity);
				redirect('my-dashboard');
			echo 'success';
		}
		
		$data['title'] = 'Login here';
		$this->load->view('templates/header',$data);
		$this->load->view('access/login',$data);
		$this->load->view('templates/footer');

	}
	
	public function userProfile(){
		$data['title'] = 'Welcome';
		$this->load->view('templates/header',$data);
		$this->load->view('pages/profile');
		$this->load->view('templates/footer');
	}
}