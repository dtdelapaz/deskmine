<?php 


	class signup_Controller extends CI_Controller {

		function __construct()
		{
	        parent::__construct();
	        $this->load->model('user_model');
		}

		public function signup()
		{
			$this->form_validation->set_message('required', '%s is required');
			$this->form_validation->set_message('matches', 'Passwords did not match');
			$this->form_validation->set_message('is_unique', 'That %s already exists');
			$this->form_validation->set_message('min_length', 'The password must be atleast 6 characters');

			$this->form_validation->set_rules('in_firstname', 'First Name', 'required');
			$this->form_validation->set_rules('in_lastname', 'Last Name', 'required');
			$this->form_validation->set_rules('in_username', 'Username', 'required|is_unique[users.username]');
			$this->form_validation->set_rules('in_password', 'Password', 'required|min_length[6]');
			$this->form_validation->set_rules('in_confirmpassword', 'Password Confirmation', 'required|matches[in_password]');
			$this->form_validation->set_rules('security_answer', 'Security Answer', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('pages/login');
			}
			else
			{
				$in_firstname = $this->input->post('in_firstname');
				$in_lastname = $this->input->post('in_lastname');
				$in_image = $this->input->post('in_image');
				$in_dob = $this->input->post('in_year')."-".$this->input->post('in_month')."-".$this->input->post('in_day');
				$in_gender = $this->input->post('in_gender');
				$in_email = $this->input->post('in_email');
				$in_contact_num = $this->input->post('in_contact_num');
				$in_username = $this->input->post('in_username');
				$in_password = $this->input->post('in_password');
				$in_sq = $this->input->post('security_question');
				$in_sa = $this->input->post('security_answer');

				$this->user_model->add_user($in_firstname, $in_lastname, $in_image, $in_dob, $in_gender, $in_email, $in_contact_num, $in_username, $in_password, $in_sq, $in_sa);

				$this->load->view('pages/login');
			}
		}

	}
 ?>