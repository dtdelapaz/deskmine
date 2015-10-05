<?php
class Login_Controller extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
	}
	
	public function login()
	{
		$data['title'] = "Login";

		
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');

		$this->form_validation->set_message('required', '%s is required');

		$this->form_validation->set_rules('username', 'Username', 'trim');
		$this->form_validation->set_rules('password', 'Password', 'trim|callback_check_user');

		if($this->form_validation->run() == FALSE){
			$this->load->view('pages/login', $data);
		}
		else{
			redirect('home', 'refresh');
		}
		
	}

	public function check_user($password){

		$username = $this->input->post('username');

		$validation = $this->user_model->get_user($username, $password);

		if($validation){
			return TRUE;
		}
		else{
			$this->form_validation->set_message('check_user', 'Invalid Username or Password');
			return false;
		}
	}


}
?>