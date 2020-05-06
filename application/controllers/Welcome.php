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
		 if(empty($this->session->userdata('user_id')) && !$this->session->userdata('user_id'))
		 	redirect(base_url().'authentication');
		$this->load->view('header');
		$this->load->view('homepage');
		$this->load->view('footer');
	}
	public function auth(){
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}
	public function storeDetails(){
		$this->load->view('header');
		$this->load->view('store_details');
		$this->load->view('footer');
	}
	public function chat(){
		$this->load->view('header');
		$this->load->view('chat');
		$this->load->view('footer');
	}
	public function chatList(){
		$this->load->view('header');
		$this->load->view('chat_list');
		$this->load->view('footer');
	}
}
