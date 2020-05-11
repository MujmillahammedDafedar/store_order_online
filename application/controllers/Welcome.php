<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
	}
	public function UseHomepage()
	{
		 if(empty($this->session->userdata('_verifiedUser')) && !$this->session->userdata('_verifiedUser'))
		 	redirect(base_url().'authentication');
		$this->load->view('user/header');
		$this->load->view('user/homepage');
		$this->load->view('user/footer');
	}
	public function auth(){
		 if($this->session->userdata('_verifiedUser'))
		 	redirect(base_url().'home');
		$this->load->view('user/login');
	}
	public function newaccount(){
		$this->load->view('user/register');
	}
	public function storeDetails(){
		 if(empty($this->session->userdata('_verifiedUser')) && !$this->session->userdata('_verifiedUser'))
		 	redirect(base_url().'authentication');
		$this->load->view('user/header');
		$this->load->view('user/store_details');
		$this->load->view('user/footer');
	}
	public function chat(){
		 if(empty($this->session->userdata('_verifiedUser')) && !$this->session->userdata('_verifiedUser'))
		 	redirect(base_url().'authentication');
		$this->load->view('user/header');
		$this->load->view('user/chat');
		$this->load->view('user/footer');
	}
	public function chatList(){
		 if(empty($this->session->userdata('_verifiedUser')) && !$this->session->userdata('_verifiedUser'))
		 	redirect(base_url().'authentication');
		$this->load->view('user/header');
		$this->load->view('user/chat_list');
		$this->load->view('user/footer');
	}
	public function myOrders(){
		 if(empty($this->session->userdata('_verifiedUser')) && !$this->session->userdata('_verifiedUser'))
		 	redirect(base_url().'authentication');
		$this->load->view('user/header');
		$this->load->view('user/my_order');
		$this->load->view('user/footer');
	}
}
