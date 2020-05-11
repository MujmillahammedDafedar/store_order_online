<?php
	class Users extends CI_Controller
	{
		public function userdata(){
			if($this->input->get('email')){
                 $checkEmailExist = $this->db->get_where('firebase_auth', array('email_' => $this->input->get('email')))->row(); 
                 if(empty($checkEmailExist)){
                 //	Array ( [name] => Muzammil Dafedar [id] => 110095427481473300751 [picture] => https://lh3.googleusercontent.com/a-/AOh14Ghl3DZMkK-TuhwMQQSDbbefgUKKyd_-PKVyK7L7yA [verified_email] => true [email] => mujmildafedaar@gmail.com )
                 	//this is array format
                 		$data = array(
                 			'name_' => $this->input->get('name'), 
                 			'google_id_' => $this->input->get('id'),                       
                 			'picture_' => $this->input->get('picture'), 
                 			'verified_email_' => $this->input->get('verified_email'), 
                 			'email_' => $this->input->get('email'), 
                 		);
                 		$this->db->insert('firebase_auth', $data);
                 		$newdata = array(
							'_verifiedUser'  => $this->input->get('email'),
						);
						$this->session->set_userdata($newdata);
                 		
                 		$this->session->set_flashdata('success', 'You have registered'); 
                 		echo "account registered and loged"; 
                 		redirect('home');

                 } else {
                 	  $newdata = array(
							'_verifiedUser'  => $checkEmailExist->email_,
						);
						$this->session->set_userdata($newdata);
						redirect('home');

                 }
				
			}
		}
		public function phoneAuth(){

			if($this->input->get('phoneNumber')){
                 $checkEmailExist = $this->db->get_where('firebase_auth', array('mobile_number' => $this->input->get('phoneNumber')))->row(); 
                 if(empty($checkEmailExist)){
                 //	Array ( [name] => Muzammil Dafedar [id] => 110095427481473300751 [picture] => https://lh3.googleusercontent.com/a-/AOh14Ghl3DZMkK-TuhwMQQSDbbefgUKKyd_-PKVyK7L7yA [verified_email] => true [email] => mujmildafedaar@gmail.com )
                 	//this is array format
                 		$data = array(
                 			'mobile_number' => $this->input->get('phoneNumber'),
                 			'lastSignInTime_'=> $this->input->get('lastSignInTime'),
                 			'creationTime_' => $this->input->get('creationTime')
                 		);
                 		$this->db->insert('firebase_auth', $data);
						$newdata = array(
							'_verifiedUser'  => $this->input->get('phoneNumber'),
						);
						$this->session->set_userdata($newdata);
                 		
                 		$this->session->set_flashdata('success', 'You have registered'); 
                 		echo "account registered and loged"; 
                 		redirect('home');

                 } else {
                 	// echo "activate session";
                 	 $newdata = array(
							'_verifiedUser'  => $checkEmailExist->mobile_number,
						);
						$this->session->set_userdata($newdata);
						redirect('home');

                 }
				
			}
		}

		public function dashboard(){
			if(!$this->session->userdata('_verifiedUser')) {
				redirect('users/login');
			}
			$data['title'] = 'Dashboard';

			$this->load->view('templates/header');
			$this->load->view('users/dashboard', $data);
			$this->load->view('templates/footer');
		}

		// Register User
		public function register(){
			if($this->session->userdata('login')) {
				redirect('posts');
			}

			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			}else{
				//Encrypt Password
				$encrypt_password = md5($this->input->post('password'));

				$this->User_Model->register($encrypt_password);

				//Set Message
				$this->session->set_flashdata('user_registered', 'You are registered and can log in.');
				redirect('posts');
			}
		}

		// Log in User
		public function login(){
			$this->input->post('email'); 
			redirect('home');
			//$data['title'] = 'Sign In';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('user/login');
			}else{
				// get username and Encrypt Password
				$username = $this->input->post('username');
				$encrypt_password = md5($this->input->post('password'));

				$user_id = $this->User_Model->login($username, $encrypt_password);
				
				if ($user_id) {
					//Create Session
					$user_data = array(
								'user_id' => $user_id->uni_id,
				 				'email' => $user_id->_username,
				 				'login' => true
				 	);

				 	$this->session->set_userdata($user_data);

					//Set Message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in.');
					redirect(base_url());
				}else{
					//echo "<script>alert();</script>";
					$this->session->set_flashdata('login_failed', 'Login is invalid.');
					redirect('users/login?auth=failed');
				}
				
			}
		}

		// log user out
		public function logout(){
			// unset user data
			$this->session->unset_userdata('_verifiedUser');
			
			//Set Message
			$this->session->set_flashdata('user_loggedout', 'You are logged out.');
			redirect('authentication');
		}

		// Check user name exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is already taken, Please choose a different one.');

			if ($this->User_Model->check_username_exists($username)) {
				return true;
			}else{
				return false;
			}
		}


		// Check Email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'This email is already registered.');

			if ($this->User_Model->check_email_exists($email)) {
				return true;
			}else{
				return false;
			}
		}
	}