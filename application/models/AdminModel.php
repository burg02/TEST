<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model  {

    public function checkAccount($username, $password) {
        $this->db->select('*');
        $this->db->from('pf_admin');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
 
        $query = $this->db->get();
 
        if ($query->num_rows() > 0 ) {
             return true;
        } else {
             return false;
        }
     }

     public function countAllProducers() {
        $this->db->select('*');
        $this->db->from('pf_users');
        $this->db->where('role', 'producer');
 
        return $this->db->get()->num_rows();
     }

     public function countAllListeners() {
        $this->db->select('*');
        $this->db->from('pf_users');
        $this->db->where('role', 'listener');
 
        return $this->db->get()->num_rows();
     }

     public function countAllMusics() {
        $this->db->select('*');
        $this->db->from('pf_music');
 
        return $this->db->get()->num_rows();
     }

     public function fetchAllProducers() {
        $this->db->select('*');
        $this->db->from('pf_users');
        $this->db->where('role', 'producer');
 
        return $this->db->get()->result();
     }

     public function fetchAllListeners() {
      $this->db->select('*');
      $this->db->from('pf_users');
      $this->db->where('role', 'listener');

      return $this->db->get()->result();
   }

     public function fetchAllMusic() {
        $this->db->select('*');
        $this->db->from('pf_music');
 
        return $this->db->get()->result();
     }

      public function fetchViewMusic() {
         $this->db->select('*');
         $this->db->from('pf_music');
         $this->db->order_by('views', 'DESC');
         return $this->db->get()->result();
      }

      public function fetchViewProducers() {
         $this->db->select('*');
         $this->db->from('pf_users');
         $this->db->where('role', 'producer');
         $this->db->order_by('views', 'DESC');
         return $this->db->get()->result();
      }

      public function fetchViewGenres() {
         $this->db->select('*');
         $this->db->from('pf_genres');
         $this->db->order_by('views', 'DESC');
         return $this->db->get()->result();
      }


}
