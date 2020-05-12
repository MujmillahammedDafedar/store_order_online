<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
  public function userdata(){
      if($this->input->get('email')){
                 $checkEmailExist = $this->db->get_where('store_auth', array('email_' => $this->input->get('email')))->row(); 
                 if(empty($checkEmailExist)){
                 // Array ( [name] => Muzammil Dafedar [id] => 110095427481473300751 [picture] => https://lh3.googleusercontent.com/a-/AOh14Ghl3DZMkK-TuhwMQQSDbbefgUKKyd_-PKVyK7L7yA [verified_email] => true [email] => mujmildafedaar@gmail.com )
                  //this is array format
                    $data = array(
                      'name_' => $this->input->get('name'), 
                      'google_id_' => $this->input->get('id'),                       
                      'picture_' => $this->input->get('picture'), 
                      'verified_email_' => $this->input->get('verified_email'), 
                      'email_' => $this->input->get('email'), 
                    );
                    $this->db->insert('store_auth', $data);
                    $newdata = array(
              'verified_shop'  => $this->input->get('email'),
            );
            $this->session->set_userdata($newdata);
                    
                    $this->session->set_flashdata('success', 'You have registered'); 
                    echo "account registered and loged"; 
                    redirect('Shop/homepage');

                 } else {
                    $newdata = array(
              'verified_shop'  => $checkEmailExist->email_,
            );
            $this->session->set_userdata($newdata);
            redirect('Shop/homepage');

                 }
        
      }
    }
    public function phoneAuth(){


      if($this->input->get('phoneNumber')){
                 $checkEmailExist = $this->db->get_where('store_auth', array('mobile_number' => $this->input->get('phoneNumber')))->row(); 
                 if(empty($checkEmailExist)){
                 // Array ( [name] => Muzammil Dafedar [id] => 110095427481473300751 [picture] => https://lh3.googleusercontent.com/a-/AOh14Ghl3DZMkK-TuhwMQQSDbbefgUKKyd_-PKVyK7L7yA [verified_email] => true [email] => mujmildafedaar@gmail.com )
                  //this is array format
                    $data = array(
                      'mobile_number' => $this->input->get('phoneNumber'),
                      'lastSignInTime_'=> $this->input->get('lastSignInTime'),
                      'creationTime_' => $this->input->get('creationTime')
                    );
                    $this->db->insert('store_auth', $data);
            $newdata = array(
              'verified_shop'  => $this->input->get('phoneNumber'),
            );
            $this->session->set_userdata($newdata);
                    
                    $this->session->set_flashdata('success', 'You have registered'); 
                    echo "account registered and loged"; 
                    redirect('Shop/homepage');

                 } else {
                  // echo "activate session";
                   $newdata = array(
              'verified_shop'  => $checkEmailExist->mobile_number,
            );
            $this->session->set_userdata($newdata);
            redirect('Shop/homepage');

                 }
        
      }
    }
    
    public function homepage(){
      if(!$this->session->userdata('verified_shop'))
            redirect('shop-auth');
          $val = $this->Shop_Model->CheckDataExist();
          if($val == false){
            redirect('add-details');
          }
    	$this->load->view('shop/header');
    	$this->load->view('shop/homepage');
    	$this->load->view('shop/footer');

    }
    public function profileSetting(){
      if(!$this->session->userdata('verified_shop'))
            redirect('shop-auth');
          $val = $this->Shop_Model->CheckDataExist();
          if($val == false){
            redirect('add-details');
          }
          $data['setArray']= $this->Shop_Model->getAccount();
      $this->load->view('shop/header');
      $this->load->view('shop/profile-setting',$data);
      $this->load->view('shop/footer');

    }

    public function updateshopdata(){
      if(!$this->session->userdata('verified_shop'))
            redirect('shop-auth');
          $val = $this->Shop_Model->CheckDataExist();
          if($val == false){
            redirect('add-details');
          }
          $this->Shop_Model->updateddata();
      $data['setArray'] =  $this->Shop_Model->getShopdata();
      $this->load->view('shop/header');
      $this->load->view('shop/update-shop-details',$data);
      $this->load->view('shop/footer');

    }
    public function AddShopDetails(){
          if(!$this->session->userdata('verified_shop'))
            redirect('shop-auth');

    	$this->load->view('shop/header');
    	$this->load->view('shop/details-shop');
      $this->Shop_Model->InsertShopdetails();
    	$this->load->view('shop/footer');
    }

   public function login(){
   	$this->load->view('shop/login');
   }

}
?>
