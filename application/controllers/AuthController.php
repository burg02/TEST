<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('AuthModel'); 
    }


	public function signupListener()
	{

		$data = $this->input->post();
        $error = 0;
        $message = [];
        foreach ($data as $key => $value) {
            if(empty($value)) {
                $error .= $error + 1;
                array_push($message, ucfirst($key) . " must be filled");
            }
        }

        if($error > 0) {
            echo json_encode(array('success' => 'false', 'message' => $message[0]));
        } else if($data["password"] != $data["confirmPassword"]) {
            echo json_encode(array('success' => 'false', 'message' => 'Passwords do not match'));
        } else {
            $userExists = $this->AuthModel->checkUserEmail($data["username"], $data["email"]);

            if($userExists === true) {
                echo json_encode(array('success' => 'false', 'message' => 'Username or Email already taken'));
            } else {
                $insert = $this->AuthModel->insertUserL($data);
                if($insert === true) {
                    echo json_encode(array('success' => 'true', 'message' => 'Listener Account Created Successfully'));
                } else {
                    echo json_encode(array('success' => 'false', 'message' => 'Something went wrong'));
                }
            }
        }

	}

    public function signupProducer()
	{

		$data = $this->input->post();

        $error = 0;
        $message = [];
        $allowedFileExt = array('jpg', 'png', 'gif', 'jpeg');

        foreach ($data as $key => $value) {
            if(empty($value)) {
                $error .= $error + 1;
                array_push($message, ucfirst($key) . " must be filled");
            }
        }

        if(empty($_FILES["file_profile"])) {
            $error .= $error + 1;
            array_push($message, "Account profile must be filled");
        }

        if($error > 0) {
            echo json_encode(array('success' => 'false', 'message' => $message[0]));
        } else if($data["password"] != $data["confirmPassword"]) {
            echo json_encode(array('success' => 'false', 'message' => 'Passwords do not match'));
        } else {
            $userExists = $this->AuthModel->checkUserEmail($data["username"], $data["email"]);
            if($userExists === true) {
                echo json_encode(array('success' => 'false', 'message' => 'Username or Email already taken'));
            } else {
                if(isset($_FILES["file_profile"])) {
                    $filename = $_FILES["file_profile"]["name"];
                    $filetype = explode(".", $filename);
                    $fileext = strtolower(end($filetype));
                    
                    if(in_array($fileext, $allowedFileExt)) {
                        if($_FILES["file_profile"]["size"] > 10000000) {
                            echo json_encode(array('success' => 'false', 'message' => 'Maximum file must be 20mb'));
                        } else if ($_FILES["file_profile"]["error"] != 0){
                            echo json_encode(array('success' => 'false', 'message' => 'An error occurred while uploading file'));
                        } else {
                            $newfilename = time() . $filetype[0] . "." . $fileext;
    
                            $insert = $this->AuthModel->insertUserP($data, $newfilename);
    
                            if($insert === true) {
                                $fileDestination = "./assets/uploads/profile/".$newfilename;
                                move_uploaded_file($_FILES["file_profile"]["tmp_name"], $fileDestination);
                                echo json_encode(array('success' => 'true', 'message' => 'Producer Account Created Successfully'));
                            } else {
                                echo json_encode(array('success' => 'false', 'message' => 'Something went wrong'));
                            }
    
                        }
                    } else {
                        echo json_encode(array('success' => 'false', 'message' => 'Invalid File Type (upload only jpg, jpeg, png and gif)'));
                    }
                }
            }
        }
	}

    public function signin() {

        $data = $this->input->post();
        $error = 0;
        $message = [];

        foreach ($data as $key => $value) {
            if(empty($value)) {
                $error .= $error + 1;
                array_push($message, ucfirst($key) . " must be filled");
            }
        }

        $result = $this->AuthModel->checkAccount($data["username"], $data["password"]);

        if($result === true) {
            echo json_encode(array('success' => 'true', 'message' => 'Account signed in successfully', 'redirect' => '/dashboard'));
        } else {
            echo json_encode(array('success' => 'false', 'message' => 'Invalid username or password'));
        }

    }

	public function signout() {
		unset($_SESSION["username"]);
		redirect("/");
	}


}
