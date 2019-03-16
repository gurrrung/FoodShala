<?php
  class User_model extends CI_Model{

    public function get_user_type($user_id) {
      $this->db->where('id', $user_id);
      $result = $this->db->get('users');
      if($result->num_rows() == 1){
        return $result->row(0)->type;
      } else {
        return false;
      }
    }

    public function get_user_name($user_id) {
      $this->db->where('id', $user_id);
      $result = $this->db->get('users');
      if($result->num_rows() == 1){
        return $result->row(0)->name;
      } else {
        return false;
      }
    }

    public function get_user_vegan($user_id) {
      $this->db->where('id', $user_id);
      $result = $this->db->get('users');
      if($result->num_rows() == 1){
        return $result->row(0)->vegan;
      } else {
        return false;
      }
    }

    public function login($email, $password){
      $this->db->where('email', $email);
      $this->db->where('password', $password);
      $result = $this->db->get('users');
      if($result->num_rows() == 1){
        return $result->row(0)->id;
      } else {
        return false;
      }
    }

    public function register($encrypt_password) {
      // User data in form of array
      $data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'password' => $encrypt_password,
        'type' => true,
        'vegan' => $this->input->post('vegan')
      );

      //Insert User
      return $this->db->insert('users', $data);
    }

    public function register_restaurant($encrypt_password) {
      // User data in form of array
      $data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'password' => $encrypt_password,
        'type' => false
      );

      //Insert User
      return $this->db->insert('users', $data);
    }

  }
