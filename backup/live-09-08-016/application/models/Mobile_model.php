<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mobile_model extends CI_model {
	
	/* ---insert insert --- */
	public function insertUser($data) {
        return $this->insertData($this->user, $data);
    }
	
	/*
      function for logging in user
     */
	
	public function validateUser($email, $password) {
		
		//get login id from session Data
		$this->db->select('*');
        $this->db->from('');
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $this->db->where('status', 1);

        $data = $this->db->get()->result_array();
        $dataCount = count($data);

        if ($dataCount > 0) {
            return $data[0];
        } else {
            return $dataCount;
        }
    }

    /*
      for checcking email existence
     */

    function isEmailExist($email) {

        $this->db->select('*');
        $this->db->from($this->user);
        $this->db->where('email', $email);
        $count = $this->db->count_all_results();
        //return $this->db->get_compiled_select();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*
      for checcking phone number existence
     */

    function isPhoneExist($phone) {

        $this->db->select('*');
        $this->db->from($this->user);
        $this->db->where('phone', $phone);
        $count = $this->db->count_all_results();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }


    /*
      Insert otp into password
     */

    public function insertOtp($number = null, $msg = '') {

        $this->db->where('phone', $number);
        $this->db->update($this->user, array('user_otp' => $msg));
    }

    /*
      Check otp from db
     */

    public function checkOtp($otp, $phone = '') {

        $this->db->select('*');
        $this->db->from($this->user);
        $this->db->like('user_otp', $otp);
        $this->db->like('phone', $phone);
        //return $this->db->get_compiled_select();
        $count = $this->db->count_all_results();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*
      Update password
     */

    public function updatePwd($newpwd, $number) {

        $this->db->where('phone', $number);
        return $this->db->update($this->user, array('password' => md5($newpwd)));
    }

    function saveAlert() {
        $data = array(
            'person_name' => $this->input->post('person_name'),
            'email_id' => $this->input->post('email_id'),
            'mobile_no' => $this->input->post('countrycode') . $this->input->post('mobile_no'),
            'query' => $this->input->post('query'),
        );
        $this->db->insert($this->alert, $data);
    }

}

?>
