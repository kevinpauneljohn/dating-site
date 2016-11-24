<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginpage extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){
        $this->load->helper('form');

        $data['title'] = "Register";

        $this->load->view('templates/header',$data);
        $this->load->view('access/form');
        $this->load->view('templates/footer');
    }

    public function registration(){
        $this->load->helper('form');
        $this->load->model('access/Registration');
		$key = md5(uniqid());
		
        $this->form_validation->set_rules('uname','Username','trim|required|callback_check_uname|callback_temp_uname');
        $this->form_validation->set_rules('pword','Password','required');
        $this->form_validation->set_rules('conpword','Confirm Password','required|matches[pword]');
        $this->form_validation->set_rules('email','Email Address','trim|required|valid_email|callback_check_email|callback_temp_email');
        $this->form_validation->set_rules('gender','Gender','trim|required|callback_checkValue');
        $this->form_validation->set_rules('interest','Interested In','trim|required|callback_checkValue');
        $this->form_validation->set_rules('bday','Date of birth','required|callback_checkDate');

        if($this->form_validation->run() == FALSE){
            $data['result'] = validation_errors();
        }
        else{
            if($this->Registration->temp_register($key)):
			
            	 
			   	$this->load->library('email',array('mailtype' => 'html'));

		        $this->email->from('johnkevin.paunel@aptelehub.com','Kevin');
		        $this->email->to($this->input->post('email'));
				$this->email->subject('Confirm your account');
		        
		        $message = '<p>Thank you for signing up!</p>';
				$message .= 'to complete the registration please click the link below. <br/>';
				$message .= '<a href="'.base_url('/confirm/'.$key.'/'.$this->input->post('uname')).'">Confirm</a>';

		        $this->email->message($message);
		        $this->email->send();
		
            redirect('thankyou');
            else: echo "failed";
                endif;
        }

        $data['title'] = "Register Step 1";

        $this->load->view('templates/header',$data);
        $this->load->view('access/form',$data);
        $this->load->view('templates/footer');
    }

	
	public function thankyou(){
						
		$data['title'] = "Please confirm your email address";
		$this->load->view('templates/header',$data);
		$this->load->view('pages/confirm-email');
		$this->load->view('templates/footer');
	}

    public function checkValue($value){
        if($value == 'select'){
            $this->form_validation->set_message('checkValue','Please select another value');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function checkDate($date){
        $date_today = date("m/d/Y");
        if($date == $date_today){
            $this->form_validation->set_message('checkDate','please set your date of birth');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function check_email($req_email){
        $this->load->model('access/Registration');
        $email = $this->Registration->checkEmail($req_email);

        if($email == true){
            $this->form_validation->set_message('check_email','email is not available');
            return false;
        }else{
            return true;

        }
    }
	public function temp_email($req_email){
		$this->load->model('access/Registration');
		$email = $this->Registration->check_temp_email($req_email);
		if($email == true){
			$this->form_validation->set_message('temp_email','email is not available');
			return false;
		}else{
			return true;
		}
	}

    public function check_uname($req_uname){
        $this->load->model('access/Registration');
        $uname = $this->Registration->checkUname($req_uname);

        if($uname == true){
            $this->form_validation->set_message('check_uname','username is not available');
            return false;
        }else{
            return true;
        }
    }
	
	public function temp_uname($req_uname){
		$this->load->model('access/Registration');
		$uname = $this->Registration->check_temp_uname($req_uname);
		
		if($uname == true){
			$this->form_validation->set_message('temp_uname','username is not available');
			return false;
		}else{
			return true;
		}
	}
	

}