<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model  {

    public function checkUserEmail($user, $email) {
       $this->db->select('*');
       $this->db->from('pf_users');
       $this->db->where('username', $user);
       $this->db->where('email', $email);

       $query = $this->db->get();

       if ($query->num_rows() > 0 ) {
            return true;
       } else {
            return false;
       }
    }

    public function insertUserL($data) {
          $insert = array(
               'role' => $data["role"],
               'username' => $data["username"],
               'email' => $data["email"],
               'password' => md5($data["password"]),
               'date_created' => date("F d, Y")
          );

          $query = $this->db->insert('pf_users', $insert);

          if($query) {
               return true;
          } else {
               return false;
          }
    }

    public function insertUserP($data, $filename) {
          $insert = array(
               'first_signin' => '0',
               'role' => $data["role"],
               'username' => $data["username"],
               'email' => $data["email"],
               'password' => md5($data["password"]),
               'genre' => $data["genre"],
               'profile' => $filename,
               'banner' => 'default.jpg',
               'date_created' => date("F d, Y"),
          );

          $query = $this->db->insert('pf_users', $insert);

          if($query) {
               return true;
          } else {
               return false;
          }
     }


     public function checkAccount($username, $password) {
          $this->db->select('*');
          $this->db->from('pf_users');
          $this->db->where('username', $username);
          $this->db->where('password', md5($password));

          $query = $this->db->get();

          if ($query->num_rows() > 0 ) {
               $_SESSION["username"] = $username;
               $_SESSION["role"] = $query->row('role');
               return true;
          } else {
               return false;
          }
     }    

}
