<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('DashboardModel'); 
        
    }

    public function update_banner() {
        if(isset($_FILES["file-banner"])) {

            $error = 0;
            $message = [];

            if(empty($_FILES["file-banner"]["name"])) {
                $error = $error + 1;
                array_push($message, "Banner file must be filled");
            } else {

                $allowedExt = ["jpg", "jpeg", "gif", "png"];
                $filename = $_FILES["file-banner"]["name"];
                $fileExplode = explode(".", $filename);
                $fileExt = strtolower(end($fileExplode));
                $fileTmp = $_FILES["file-banner"]["tmp_name"];
                $fileSize = $_FILES["file-banner"]["size"];
                $fileError = $_FILES["file-banner"]["error"];

                if(in_array($fileExt, $allowedExt)) {
                    if($fileSize < 10000000 ) {
                        if($fileError === 0) {
                            $profile_banner = trim(time() . $filename);
                        } else {
                            $error = $error + 1;
                            array_push($message, "Error encountered while uploading file");
                        }
                    } else {
                        $error = $error + 1;
                        array_push($message, "Banner file is too large (Maximum of 10 mb)");
                    }
                } else {
                    $error = $error + 1;
                    array_push($message, "Invalid banner file (only accepts jpg, jpeg, gif, png)");
                }
            }

            if($error > 0) {
                $data["title"] = "My Profile";
                $data["status"] = "error";
                $data["message"] = $message;
                $data["userdata"] = $this->DashboardModel->fetchUserData($_SESSION["username"]);
                $data["musicdata"] = $this->DashboardModel->fetch_music($_SESSION["username"]);
                $this->load->view('templates/header-2', $data);
                $this->load->view('profile');
                $this->load->view('templates/footer-2');
            } else {
                $this->DashboardModel->update_banner($profile_banner, $_SESSION["username"]);
                $data["title"] = "My Profile";
                $data["status"] = "success";
                $data["userdata"] = $this->DashboardModel->fetchUserData($_SESSION["username"]);
                $data["musicdata"] = $this->DashboardModel->fetch_music($_SESSION["username"]);
                $data["message"] = "Banner Updated Successfully";
                
                $profileBannerDestination = "./assets/uploads/profile-banner/".$profile_banner;
                move_uploaded_file($_FILES["file-banner"]["tmp_name"], $profileBannerDestination);
                $this->load->view('templates/header-2', $data);
                $this->load->view('profile');
                $this->load->view('templates/footer-2');
            }   
        } else {
            redirect('profile');
        }
    }

    public function update_profile() {

        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            redirect('profile');
         } elseif ($this->input->server('REQUEST_METHOD') === 'POST') {
            $postdata = $this->input->post();

            $error = 0;
            $message = [];
            foreach ($postdata as $key => $value) {
                if(empty($value)) {
                    $error = $error + 1;
                    array_push($message, ucwords(str_replace("-", " ", $key)) . " must be filled");
                }
            }
    
            if($error > 0) {
                $data["title"] = "My Profile";
                $data["status"] = "error";
                $data["message"] = $message;
                $data["userdata"] = $this->DashboardModel->fetchUserData($_SESSION["username"]);
                $data["musicdata"] = $this->DashboardModel->fetch_music($_SESSION["username"]);
                $this->load->view('templates/header-2', $data);
                $this->load->view('profile');
                $this->load->view('templates/footer-2');
            } else {
                    $this->DashboardModel->update_profile($postdata, $_SESSION["username"]);
                    $data["title"] = "My Profile";
                    $data["status"] = "success";
                    $data["userdata"] = $this->DashboardModel->fetchUserData($_SESSION["username"]);
                    $data["musicdata"] = $this->DashboardModel->fetch_music($_SESSION["username"]);
                    $data["message"] = "Profile Updated Successfully";
                    $this->load->view('templates/header-2', $data);
                    $this->load->view('profile');
                    $this->load->view('templates/footer-2');
            }  
         }
    }

    public function upload_music() {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            redirect('profile');
         } elseif ($this->input->server('REQUEST_METHOD') === 'POST') {
            
            $postdata = $this->input->post();

            $error = 0;
            $message = [];
            foreach ($postdata as $key => $value) {
                if(empty($value)) {
                    $error = $error + 1;
                    array_push($message, ucwords(str_replace("-", " ", $key)) . " must be filled");
                }
            }

            if(empty($postdata["genre"])) {
                $error = $error + 1;
                array_push($message, "Music genre must be filled");
            }

            if(isset($_FILES["file-music"])) {
                $allowedExt = ["mp3", "m4a", "wav"];
                $filename = $_FILES["file-music"]["name"];
                $fileExplode = explode(".", $filename);
                $fileExt = strtolower(end($fileExplode));
                $fileTmp = $_FILES["file-music"]["tmp_name"];
                $fileSize = $_FILES["file-music"]["size"];
                $fileError = $_FILES["file-music"]["error"];

                if(in_array($fileExt, $allowedExt)) {
                    if($fileSize < 11000000 ) {
                        if($fileError === 0) {
                            $music_file = trim(time() . $filename);
                        } else {
                            $error = $error + 1;
                            array_push($message, "Error encountered while uploading file");
                        }
                    } else {
                        $error = $error + 1;
                        array_push($message, "Music file is too large");
                    }
                } else {
                    $error = $error + 1;
                    array_push($message, "Invalid music file (only accepts mp3, m4a, wav)");
                }
            } else {
                $error = $error + 1;
                array_push($message, "Music file must be filled");
            }

            if(isset($_FILES["file-banner"])) {
                $allowedExt = ["jpg", "jpeg", "png", "gif"];
                $filename = $_FILES["file-banner"]["name"];
                $fileExplode = explode(".", $filename);
                $fileExt = strtolower(end($fileExplode));
                $fileTmp = $_FILES["file-banner"]["tmp_name"];
                $fileSize = $_FILES["file-banner"]["size"];
                $fileError = $_FILES["file-banner"]["error"];

                if(in_array($fileExt, $allowedExt)) {
                    if($fileSize > 20000) {
                        if($fileError === 0) {
                            $music_banner = trim(time() . $filename);
                        } else {
                            $error = $error + 1;
                            array_push($message, "Error encountered while uploading file");
                        }
                    } else {
                        $error = $error + 1;
                        array_push($message, "Music file is too large (Maximum of 10 mb)");
                    }
                } else {
                    $error = $error + 1;
                    array_push($message, "Invalid music banner file (only accepts jpg, jpeg, png, gif)");
                }
            } else {
                $error = $error + 1;
                array_push($message, "Music banner must be filled");
            }
            
            if($error > 0) {
                $data["title"] = "My Profile";
                $data["status"] = "error";
                $data["message"] = $message;
                $data["userdata"] = $this->DashboardModel->fetchUserData($_SESSION["username"]);
                $data["musicdata"] = $this->DashboardModel->fetch_music($_SESSION["username"]);
                $this->load->view('templates/header-2', $data);
                $this->load->view('profile');
                $this->load->view('templates/footer-2');
            } else {

                    $music_genres = "";

                    foreach($postdata["genre"] as $value) {
                        $music_genres .= $value . ", ";
                    }

                    $music_genres = substr($music_genres, 0 , -2);

                    $this->DashboardModel->add_music($postdata, $music_genres, $music_file, $music_banner, $_SESSION["username"]);
                    $data["title"] = "My Profile";
                    $data["status"] = "success";
                    $data["userdata"] = $this->DashboardModel->fetchUserData($_SESSION["username"]);
                    $data["musicdata"] = $this->DashboardModel->fetch_music($_SESSION["username"]);
                    $data["message"] = "Music Added Successfully";
                    
                    $musicFileDestination = "./assets/uploads/music-file/".$music_file;
                    $musicBannerDestination = "./assets/uploads/music-banner/".$music_banner;
                    move_uploaded_file($_FILES["file-music"]["tmp_name"], $musicFileDestination);
                    move_uploaded_file($_FILES["file-banner"]["tmp_name"], $musicBannerDestination);
                    $this->load->view('templates/header-2', $data);
                    $this->load->view('profile');
                    $this->load->view('templates/footer-2');
            }  

         }
    }

    public function delete_music($id) {
        $error = 0;
        $message = [];
        
        if($this->DashboardModel->delete_music($id) === true) {
            $data["title"] = "Delete Music | Profile";
            $data["status"] = "success";
            $data["message"] = "Music id " . $id . " deleted successfully";
            $data["userdata"] = $this->DashboardModel->fetchUserData($_SESSION["username"]);
            $data["musicdata"] = $this->DashboardModel->fetch_music($_SESSION["username"]);
            $this->load->view('templates/header-2', $data);
            $this->load->view('profile');
            $this->load->view('templates/footer-2');    
        } else {
            array_push($message, "Music " . $id . " does not exist");
            $data["title"] = "Delete Music | Profile";
            $data["status"] = "error";
            $data["message"] = $message;
            $data["userdata"] = $this->DashboardModel->fetchUserData($_SESSION["username"]);
            $data["musicdata"] = $this->DashboardModel->fetch_music($_SESSION["username"]);
            $this->load->view('templates/header-2', $data);
            $this->load->view('profile');
            $this->load->view('templates/footer-2');    
        }
    }

}
