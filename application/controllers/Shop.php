<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
    
    public function homepage(){
    	$this->load->view('shop/header');
    	$this->load->view('shop/homepage');
    	$this->load->view('shop/footer');

    }

   public function login(){
   	$this->load->view('shop/login');
   }

}
?>
