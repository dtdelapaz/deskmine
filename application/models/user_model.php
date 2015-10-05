<?php 

	class User_model extends MY_Model 
	{	
		public function add_user($firstname, $lastname, $image, $dob, $gender, $email, $contact_num, $username, $password, $sq, $sa){
			if($image == NULL){
				$image = "no image";
			}

			$data = array(
				'first_name' => $firstname,
				'last_name' => $lastname,
				'image' => $image,
				'dob' => $dob, 
				'gender' => $gender,
				'email' => $email,
				'contact_num' => $contact_num,
				'username' => $username,
				'password' => $password,
				'security_question' => $sq,
				'security_answer' => $sa
				);

			$this->db->insert('users', $data);
		}

		public function get_user($username, $password){
			$this-> db ->select('id', 'first_name', 'last_name', 'image', 'dob', 'gender', 'email', 'contact_num', 'username', 'password', 'security_question', 'security_answer');
			$this-> db ->from('users');
			$this -> db -> where('username', $username);
			$this -> db -> where('password', $password);
			$this -> db -> limit(1);
			$query = $this -> db -> get();

			if($query -> num_rows() == 1)
	 	    {
				return $query->result();
			}
		    else
			{
				return false;
		    }
		}

	}


?>