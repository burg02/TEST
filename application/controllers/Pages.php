<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('DashboardModel'); 
		$this->load->model('AdminModel'); 
		error_reporting(1);
    }

	public function index()
	{
		$data["title"] = "Welcome ProdFinder | Home";
        $this->load->view('templates/header', $data);
		$this->load->view('index');
		$this->load->view('templates/footer');
	}

	public function dashboard() {
		if(!isset($_SESSION["username"])) {
			redirect("/");
		} else if($this->DashboardModel->checkFirstAccess($_SESSION["username"])[0]->first_signin == 0 && $_SESSION["role"] === "producer") {
			redirect("/profile");
		} else {
			$data["title"] = "Dashboard";
			$data["top_producers"] = $this->DashboardModel->fetch_top_producers($_SESSION["username"]);
			$data["random_music"] = $this->DashboardModel->fetch_random_music();
			$data["all_music"] = $this->DashboardModel->fetch_all_music();
			$this->load->view('templates/header-2', $data);
			$this->load->view('dashboard');
			$this->load->view('templates/footer-2');
		}
	}

	public function producers() {
		if(!isset($_SESSION["username"])) {
			redirect("/");
		} else if($this->DashboardModel->checkFirstAccess($_SESSION["username"])[0]->first_signin == 0 && $_SESSION["role"] === "producer") {
			redirect("/profile");
		} else {
			$data["title"] = "All Producers";
			$data["producer_info"] = $this->DashboardModel->fetch_all_producer_info($_SESSION["username"]);
			$this->load->view('templates/header-2', $data);
			$this->load->view('producers');
			$this->load->view('templates/footer-2');
		}
	}

	public function releases() {
		if(!isset($_SESSION["username"])) {
			redirect("/");
		} else if($this->DashboardModel->checkFirstAccess($_SESSION["username"])[0]->first_signin == 0 && $_SESSION["role"] === "producer") {
			redirect("/profile");
		} elseif ($this->input->server('REQUEST_METHOD') === 'GET') {
            $data["title"] = "All Music Releases";
			$data["musicdata"] = $this->DashboardModel->fetch_all_producer_music();
			$this->load->view('templates/header-2', $data);
			$this->load->view('music-releases');
			$this->load->view('templates/footer-2');
         } elseif ($this->input->server('REQUEST_METHOD') === 'POST') {
            $postdata = $this->input->post();
			if(empty($postdata["search"])) {
				redirect("/music-releases");
			} else {
				$data["title"] = "Seaching " . $postdata["search"] . " | Music Releases";
				$data["musicdata"] = $this->DashboardModel->fetch_search_music($postdata["search"]);
				$this->load->view('templates/header-2', $data);
				$this->load->view('music-releases');
				$this->load->view('templates/footer-2');
			}
		}
	}

	public function genres($params) {
		if(!isset($_SESSION["username"])) {
			redirect("/");
		} else if($this->DashboardModel->checkFirstAccess($_SESSION["username"])[0]->first_signin == 0 && $_SESSION["role"] === "producer") {
			redirect("/profile");
		}  else {
			$data["title"] = "All Music Genres";
			$data["currentgenre"] = $params;
			$data["musicdata"] = $this->DashboardModel->fetch_music_genre($params);
			$this->load->view('templates/header-2', $data);
			$this->load->view('genres');
			$this->load->view('templates/footer-2');
		}
	}

	public function profile() {
		if(!isset($_SESSION["username"])) {
			redirect("/");
		} else {
			$data["title"] = "My Profile";
			$data["userdata"] = $this->DashboardModel->fetchUserData($_SESSION["username"]);
			$data["musicdata"] = $this->DashboardModel->fetch_music($_SESSION["username"]);
			$this->load->view('templates/header-2', $data);
			$this->load->view('profile');
			$this->load->view('templates/footer-2');
		}
	}

	public function view_producer($user) {
		if(!isset($_SESSION["username"])) {
			redirect("/");
		} else if($this->DashboardModel->checkFirstAccess($_SESSION["username"])[0]->first_signin == 0 && $_SESSION["role"] === "producer") {
			redirect("/profile");
		}  else {
			$data["title"] = "Visit Producer Profile";
			$data["producer_info"] = $this->DashboardModel->fetch_producer_info($user);
			$data["producer_music"] = $this->DashboardModel->fetch_producer_music($user);
			$this->load->view('templates/header-2', $data);
			$this->load->view('view-producer');
			$this->load->view('templates/footer-2');
			$this->DashboardModel->saveVisitedProducer($user);
		}
	} 

	public function login() {
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $data["title"] = "Login Admin Panel";
			$this->load->view('templates/header-3', $data);
			$this->load->view('admin/login');
			$this->load->view('templates/footer-3');
         } elseif ($this->input->server('REQUEST_METHOD') === 'POST') {
            $postdata = $this->input->post();	
			$data["title"] = "Login Admin Panel";
			$message = [];
			$error = 0;
			if(empty($postdata["username"]) || empty($postdata["password"])) {
				$error .= $error + 1;
				array_push($message, "Username and Password must be filled");
			} else if ($this->AdminModel->checkAccount($postdata["username"], $postdata["password"]) === true) {
				$error = 0;
			} else {
				$error .= $error + 1;
				array_push($message, "Username and Password are Incorrect");
			}


			if($error === 0) {
				$_SESSION["admin"] = $postdata["username"];
				redirect('admin/dashboard');
			} else {
				$data["title"] = "Login Failed!";
				$data["message"] = $message;
				$this->load->view('templates/header-3', $data);
				$this->load->view('admin/login');
				$this->load->view('templates/footer-3');
			}
			
		 }
    }

    public function logout() {
		unset($_SESSION["admin"]);
		redirect("/");
    }

	public function admin_dashboard() {
        if(!isset($_SESSION["admin"])) {
			redirect("admin/login");
		} else {
			$data["title"] = "Admin Dashboard";
			$data["count_listeners"] = $this->AdminModel->countAllListeners();
			$data["count_producers"] = $this->AdminModel->countAllProducers();
			$data["count_musics"] = $this->AdminModel->countAllMusics();
			$this->load->view('templates/header-3', $data);
			$this->load->view('admin/index');
			$this->load->view('templates/footer-3');
		}
    }

    public function all_users() {
		if(!isset($_SESSION["admin"])) {
			redirect("admin/login");
		} else {
			$data["title"] = "All Users Dashboard";
			$data["producer_users"] = $this->AdminModel->fetchAllProducers();
			$data["listener_users"] = $this->AdminModel->fetchAllListeners();
			$this->load->view('templates/header-3', $data);
			$this->load->view('admin/all-users');
			$this->load->view('templates/footer-3');
		}
    }

	public function all_music() {
		if(!isset($_SESSION["admin"])) {
			redirect("admin/login");
		} else {
			$data["title"] = "All Users Dashboard";
			$data["all_music"] = $this->AdminModel->fetchAllMusic();
			$this->load->view('templates/header-3', $data);
			$this->load->view('admin/all-music');
			$this->load->view('templates/footer-3');
		}
    }

    public function most_visited() {
		if(!isset($_SESSION["admin"])) {
			redirect("admin/login");
		} else {
			$data["title"] = "All Users Dashboard";
			$data["view_music"] = $this->AdminModel->fetchViewMusic();
			$data["view_producers"] =  $this->AdminModel->fetchViewProducers();
			$data["view_genres"] =  $this->AdminModel->fetchViewGenres();
			$this->load->view('templates/header-3', $data);
			$this->load->view('admin/most-visited');
			$this->load->view('templates/footer-3');
		}
    }

	public function savePlayedMusic() {
		$postdata = $this->input->post();	
		$this->DashboardModel->savePlayedMusic($postdata["id"]);
	}

}
