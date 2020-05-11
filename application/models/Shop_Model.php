<?php
	class Shop_Model extends CI_Model{

       public function InsertShopdetails(){
          if($this->input->post('email')){
          	if (!empty($_FILES['image']['name'])) {
		        $config['upload_path']   = './upload';
		        $config['allowed_types'] = 'gif|jpg|png';
		        $config['max_size']      = 6000;
		        $config['file_name']     = $_FILES['image']['name'];
		        
		        $this->load->library('upload', $config);
		        $this->upload->initialize($config);
		        
		        if (!$this->upload->do_upload('image')) {
		          $error = array(
		            'error' => $this->upload->display_errors()
		          );
		          $this->session->set_flashdata('fail', 'Something went wrong. Please upload gif | jpg | png file');
		        } else {
		          $data     = $this->upload->data();
		          $filename = $data['file_name'];
		        }
      }
             $data  = array(
             	  'by_' => $this->session->userdata('verified_shop'),
                  'email_' => $this->input->post('email'),
                  'shop_category_' => $this->input->post('category'),
                  'shop_con_num_' => $this->input->post('shopnumber'),
                  'owner_name_' => $this->input->post('ownername'),
                  'owner_con_num_' => $this->input->post('ownernumber'),
                  'adhar_num_' => $this->input->post('adharnumber'),
                  'state_' => $this->input->post('state'),
                  'city_' => $this->input->post('city'),
                  'address_' => $this->input->post('address'),

                  'landmark_' => $this->input->post('landmark'),
                  'image_' => $filename,
             );
             $this->db->insert('_shop_details', $data);
       
          }
          

       }	
       public function CheckDataExist(){
       			if($this->session->userdata('verified_shop')){
       				$checkQuery = $this->db->get_where('_shop_details', array('by_' => $this->session->userdata('verified_shop')))->row(); 
       					if(empty($checkQuery)){
       						return false;
       					} else {
       						return true;
       					}


       			}
       }
	}
	?>