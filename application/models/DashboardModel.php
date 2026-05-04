<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model  {

    public function checkFirstAccess($user) {
        $this->db->select('first_signin');
        $this->db->from('pf_users');
        $this->db->where('username', $user);
 
        return $this->db->get()->result();        
    }

    public function update_profile($data, $user) {
        $monthArray = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        $explode = explode("-", $data["bdate"]);
        $bday = $monthArray[ltrim($explode[1], "0") - 1] . " " . $explode[2] . ", " . $explode[0];
        $update = array(
                'first_signin' => '1',
                'full_name' => $data["full-name"],
                'address' => $data["address"],
                'contact' => $data["contact"],
                'bdate' => $bday,
                'years_exp' => $data["exp"],
                'work' => $data["work"],
                'bio' => $data["bio"],
                'facebook' => $data["facebook"],
                'twitter' => $data["twitter"],
                'instagram' => $data["instagram"],
                'pinterest' => $data["pinterest"],
                'discord' => $data["discord"],
                'others' => $data["other"],
        );
    
        $this->db->where('username', $user);
        $this->db->update('pf_users', $update);
    }

    public function fetchUserData($user) {
        $this->db->select('*');
        $this->db->from('pf_users');
        $this->db->where('username', $user);
 
        return $this->db->get()->result();        
    }

    public function add_music($data, $music_genres, $music_file, $music_banner, $user) {
        $monthArray = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        $explode = explode("-",  $data["date-released"]);
        $date = $monthArray[ltrim($explode[1], "0") - 1] . " " . $explode[2] . ", " . $explode[0];
        $insert = array(
                'user' => $user,
                'artist_name' => $data["artist-name"],
                'music_name' => $data["music-name"],
                'music_genre' => $music_genres,
                'date_released' => $date,
                'music_file' => $music_file,
                'music_banner' => $music_banner,
                'date_created' => date("F d, Y"),
        );
    
        $this->db->insert('pf_music', $insert);

    }

    public function fetch_music($user) {
        $this->db->select('*');
        $this->db->from('pf_music');
        $this->db->where('user', $user);
 
        return $this->db->get()->result();        
    }

    public function fetch_top_producers($user) {
        $this->db->select('*');
        $this->db->from('pf_users');
        $this->db->where('role', 'producer');
        $this->db->where_not_in('username', $user);
        $this->db->limit(3);
        return $this->db->get()->result();        
    }

    public function fetch_all_music() {
        $this->db->select('*');
        $this->db->from('pf_music');
        $this->db->limit(9);
        return $this->db->get()->result();        
    }

    public function fetch_all_producer_info($user) {
        $this->db->select('*');
        $this->db->from('pf_users');
        $this->db->where('role', 'producer');
        $this->db->where('first_signin', '1');
        $this->db->where_not_in('username', $user);
        return $this->db->get()->result();      
    }

    public function fetch_producer_info($user) {
        $this->db->select('*');
        $this->db->from('pf_users');
        $this->db->where('username', $user);
        return $this->db->get()->result();        
    }

    public function fetch_producer_music($user) {
        $this->db->select('*');
        $this->db->from('pf_music');
        $this->db->where('user', $user);
        return $this->db->get()->result();        
    }

    public function fetch_all_producer_music() {
        $this->db->select('*');
        $this->db->from('pf_music');
        return $this->db->get()->result();        
    }

    public function fetch_music_genre($params) {
        if($params === "all") {
            $this->db->select('*');
            $this->db->from('pf_music');
            return $this->db->get()->result();        
        } else {
            $this->db->where('genre', $params);
            $views = $this->db->get('pf_genres')->row()->views;
            $update = array(
                'views' => $views+1,
            );

            $this->db->where('genre', $params);
            $this->db->update('pf_genres', $update);
            
            $this->db->select('*');
            $this->db->from('pf_music');
            $this->db->like('music_genre', $params);
            return $this->db->get()->result();  

                
        }
    }

    public function fetch_search_music($params) {
        $match = array(
            'music_genre' => $params,
            'artist_name' => $params,
            'date_released' => $params
        );
        $this->db->select('*');
        $this->db->from('pf_music');
        $this->db->or_like($match);
        return $this->db->get()->result();        
    }

    public function update_banner($filename, $user) {
        $update = array(
            'banner' => $filename,
        );

        $this->db->where('username', $user);
        $this->db->update('pf_users', $update);
    }

    public function delete_music($params) {
        $this->db->where('id', $params);
        $this->db->delete('pf_music');
        return true;
    }

    public function fetch_random_music() {
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit(1);
        return $this->db->get('pf_music')->result();
    }

    public function savePlayedMusic($id) {
        $this->db->where('id', $id);
        $views = $this->db->get('pf_music')->row()->views;
        $update = array(
            'views' => $views+1,
        );

        $this->db->where('id', $id);
        $this->db->update('pf_music', $update);
    }

    public function saveVisitedProducer($username) {
        $this->db->where('username', $username);
        $views = $this->db->get('pf_users')->row()->views;
        $update = array(
            'views' => $views+1,
        );

        $this->db->where('username', $username);
        $this->db->update('pf_users', $update);
    }

}
