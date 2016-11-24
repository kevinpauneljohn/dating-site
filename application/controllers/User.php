<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		///$load = array('form','url','file');
		$this->load->helper(array('form', 'url','smiley'));
		$this->load->library(array('form_validation','table'));
		
		$this->load->model('access/Profile');
 		date_default_timezone_set('Asia/Manila');
		if($this->session->userdata('is_logged_in') == false){
			//redirect('login');
		}
		$this->if_session_destroyed();
		$str = 'Here are some smileys: :-) ;-) :vampire: :snake: :cheese:';
		$str = parse_smileys($str, base_url('assets/smileys/'));
		//echo $str;
		//$this->gettingdata();
		
	}
	
	public function user_dashboard(){
		
 		$userId = '';
		$uname = $this->session->userdata('username');
		if(isset($uname) && $this->session->userdata('is_logged_in') == true){
			$this->session->userId = $this->Profile->get_userId($uname);
			$userId = $this->session->userId;
		}
		if($this->Profile->checkUserIdMeta($userId) == TRUE){
		$row = $this->Profile->get_profile_data($userId);
				
			$data = array(
						'User'			=> $this,
						'success'			=> '',
						'error'				=> '',
						'motto'				=> $row['motto'],
						'about'				=> $row['about'],
						'hobby'				=> $row['hobby'],
						'body_type'			=> $row['body_type'],
						'height'			=> $row['height'],
						'weight'			=> $row['weight'],
						'relationship' 		=> $row['relationship'],
						'ethnicity' 		=> $row['ethnicity'],
						'education'			=> $row['education'],
						'job' 				=> $row['job'],
						'salary' 			=> $row['salary'],
						'religion' 			=> $row['religion']
					);
		}
		else{
			$data = array(
						'User'			=> $this,
						'success'			=> '',
						'error'				=> '',
						'motto'				=> 'Update your motto',
						'about'				=> 'Update your description',
						'hobby'				=> 'Update your hobby',
						'body_type'			=> 'Update your body type',
						'height'			=> 'Update your height',
						'weight'			=> 'Update your weight',
						'relationship' 		=> 'Update your relationship',
						'ethnicity' 		=> 'Update your ethnicity',
						'education'			=> 'Update your education',
						'job' 				=> 'Update your job',
						'salary' 			=> 'Update your salary',
						'religion' 			=> 'Update your religion'
					);
		}
		
		if($this->session->userdata('is_logged_in') == true){
		$data['title'] = 'My Account';
		$data['error'] = '';
		
			$this->load->view('templates/header',$data);
			///$this->load->view('userProfile/user-dashboard',array('error'=>''),$data);
			$this->load->view('userProfile/user-dashboard',$data);
			
			$this->load->view('templates/footer');
		}
		else{
			///redirect('login');
		}
		
	}
	public function uploadPic(){
				$config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
				$config['overwrite']			= TRUE;
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
               // $config['max_height']           = 768;

                $this->load->library('upload', $config);
				///$this->load->model('access/Profile');
				

                if ( ! $this->upload->do_upload('fileInput'))
                {
                        $data = $this->upload->display_errors();
						$success = '';
                }
                else
                {
                        $data = '';
						$success = $this->upload->data();
				}
				
				if($this->Profile->checkUserIdMeta($this->get_user_id()) == TRUE){
				$row = $this->Profile->get_profile_data($this->get_user_id());
						
					$data = array(
						'User'			=> $this,
						'success'			=> $success,
						'error'				=> $data,
						'motto'				=> $row['motto'],
						'about'				=> $row['about'],
						'hobby'				=> $row['hobby'],
						'body_type'			=> $row['body_type'],
						'height'			=> $row['height'],
						'weight'			=> $row['weight'],
						'relationship' 		=> $row['relationship'],
						'ethnicity' 		=> $row['ethnicity'],
						'education'			=> $row['education'],
						'job' 				=> $row['job'],
						'salary' 			=> $row['salary'],
						'religion' 			=> $row['religion']
					);
				}
				else{
					$data = array(
						'User'			=> $this,
						'success'			=> $success,
						'error'				=> $data,
						'motto'				=> 'Update your motto',
						'about'				=> 'Update your description',
						'hobby'				=> 'Update your hobby',
						'body_type'			=> 'Update your body type',
						'height'			=> 'Update your height',
						'weight'			=> 'Update your weight',
						'relationship' 		=> 'Update your relationship',
						'ethnicity' 		=> 'Update your ethnicity',
						'education'			=> 'Update your education',
						'job' 				=> 'Update your job',
						'salary' 			=> 'Update your salary',
						'religion' 			=> 'Update your religion'
					);
				}
				
				$data['title'] = 'My Account';
						$this->load->view('templates/header',$data);
                        $this->load->view('userProfile/user-dashboard', $data);
						$this->load->view('templates/footer');
	}
	
	public function updateProfile(){
        ///$this->load->model('access/Profile');
 		$userId = '';
		$uname = $this->session->userdata('username');
		if(isset($uname) && $this->session->userdata('is_logged_in') == true){
			$this->session->userId = $this->Profile->get_userId($uname);
			$userId = $this->session->userId;
		}
		
		
		
        $this->form_validation->set_rules('motto','Motto','trim|max_length[500]');
        $this->form_validation->set_rules('about','About me','trim|max_length[500]');
        $this->form_validation->set_rules('hobby','Hobbies','trim|max_length[300]');
        $this->form_validation->set_rules('body_type','Body type','trim');
        $this->form_validation->set_rules('height','Height');
        $this->form_validation->set_rules('weight','Weight');
        $this->form_validation->set_rules('relationship','Open for relationship','trim|required');
        $this->form_validation->set_rules('ethnicity','Ethnicity');
        $this->form_validation->set_rules('habit','Drinking Habit');
        $this->form_validation->set_rules('educ','Education');
        $this->form_validation->set_rules('job','Job');
        $this->form_validation->set_rules('salary','Salary');
        $this->form_validation->set_rules('religion','Religion');
        if($this->form_validation->run() == FALSE){
            $data['result'] = validation_errors();
        }else{
			if($this->Profile->checkUserIdMeta($userId) == true){
				$this->Profile->update_profile($userId);
				$this->session->set_flashdata('success','successfully updated');
			}
			else{
				if($this->Profile->profile_details()):
	                unset($_SESSION['userId']);
	                echo "successful";
	            else: echo "failed";
	                endif;
			}
        }
        $data['title'] = "Registration Step 2";
		$data['User'] = $this;
        $this->load->view('templates/header',$data);
        $this->load->view('access/formmeta',$data);
        $this->load->view('templates/footer');
    }
	
	public function logout(){
		$this->load->model('access/Login');
		$this->load->model('access/Login');
		$last_activity = date('m/d/Y h:i a', time());
		$this->Login->make_online($this->session->username,0,$last_activity);
		
    	$logoutUser = array('username','is_logged_in');
		$this->session->unset_userdata($logoutUser);
		redirect('login');
	}
	
	public function get_user_id(){
		//$this->load->model('access/Profile');
 		$userId = '';
		$uname = $this->session->userdata('username');
		if(isset($uname) && $this->session->userdata('is_logged_in') == true){
			$this->session->userId = $this->Profile->get_userId($uname);
			$userId = $this->session->userId;
		}
		
		return $userId;
	}
	public function if_session_destroyed(){
		if($this->session->userdata('is_logged_in') == FALSE){
			$this->load->model('access/Login');
			$last_activity = date('m/d/Y h:i a', time());
			$this->Login->make_online($this->session->username,0,$last_activity);
		}
	}
	
	public function gettingdata(){
	
		print_r( $this->session->all_userdata());
		$time = $this->session->userdata('__ci_last_regenerate');
		echo date('m-d-Y h:i a',$time)."<br/>";
		//echo $this->session->userdata('session_id');
		$this->load->database();
		$user = $this->db->get('ci_sessions');
		foreach($user->result() as $val){
			///print_r( $val->data);
			//echo "<hr/>";
		}
	}
	public function update_user_status(){
		$uname = $this->input->post('username');
		$status = $this->input->post('stats');
		$last_activity = $this->input->post('activity');
		$this->load->model('access/Login');
		$this->Login->make_online($uname,$status,$last_activity);
		echo $uname." ".$status." ".$last_activity;
	}
	
	public function script_status_updater(){
		?>
						<script>
		  $(document).ready(function(){
				
				function format_time(date_obj) {
				  var currentDate = date_obj.getDate();     // Get current date
				  var month       = date_obj.getMonth() + 1; // current month
				  var year        = date_obj.getFullYear();
				  // formats a javascript Date object into a 12h AM/PM time string
				  var hour = date_obj.getHours();
				  var minute = date_obj.getMinutes();
				  var amPM = (hour > 11) ? "pm" : "am";
				  if(hour > 12) {
				    hour -= 12;
				  } else if(hour == 0) {
				    hour = "12";
				  }
				  if(minute < 10) {
				    minute = "0" + minute;
				  }
				  return month+"/"+currentDate+"/"+year+" "+ hour + ":" + minute +" "+ amPM;
				}
				

		        var uname = '<?php echo $this->session->userdata("username");?>';
		        var status = 1;		
				
					
		        function dopage_update(){
			        $.post('<?php echo base_url("update-user-status");?>',{
			            username: uname,
			            stats: status,
			            activity: format_time(new Date())
			        },function(data){
			            //alert(data);
			            setTimeout(function(){dopage_update();}, 5000);
			        })
			    }
				dopage_update();
		    });
		</script>
		<?php
	}
	
	public function display_users(){
	$this->load->helper('date');
		$data['title'] = '';
		$this->load->view('templates/header',$data);
		$this->load->view('sample');
		///$user = $this->Profile->check_online_user();	
	}
	public function check_online_user(){
		if($this->input->post('action') == 'check'){
			$user = $this->Profile->check_online_user();
			foreach($user as $row){
				if($this->get_minutes($row->last_activity) == TRUE){
					$this->Profile->update_online_status($row->ds_userId);
					echo $row->ds_uname.", ";
				}
			}
		}
	}
	
	public function get_minutes($date1){
		$date2 = date('m/d/Y h:i a', time()); 

		$to_time = strtotime($date2);
		$from_time = strtotime($date1);
		$minutes = round(abs($to_time - $from_time) / 60,2);
		 if($minutes >= 5){
		 	return TRUE;
		 }else{
		 	return FALSE;
		 }
	}
	public function compare_last_activity($last_activity){
		$date1 = $last_activity; 

		$date2 = date('m/d/Y h:i a', time()); 

		$diff = abs(strtotime($date2) - strtotime($date1)); 

		$years   = floor($diff / (365*60*60*24)); 
		$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
		$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

		$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 

		$minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 

		$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 

		printf("%d years, %d months, %d days, %d hours, %d minuts\n, %d seconds\n", $years, $months, $days, $hours, $minuts, $seconds);
	}
}
?>