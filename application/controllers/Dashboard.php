<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function  __construct(){
        parent::__construct();
        $this->load->database();
		$this->load->helper(array('form', 'url','text'));
		$this->data['allusers'] = $this->db->get('tbl_users')->result();
		$this->load->model(array('dashboard_m'));
        $this->load->library('form_validation');


		    if(isset($_SESSION['locked'])){
				// $difference = time() - $_SESSION['locked'];
				$difference = time() - $_SESSION['locked'];
				if($difference > 10){
					unset($_SESSION['locked']);
					unset($_SESSION['login_attempt']);
				}
		   } 
    }

	public function index(){
		if($this->session->logged_in==TRUE){
			$this->data['title'] = " Dashboard";
			$this->data['page_title'] ="dashboard";
			$this->load->view('layout/index',$this->data);
		}else{
		   return redirect(base_url('dashboard/admin_login'));
		}
		
	}

	public function enroll(){
		if($_POST){
			$this->form_validation->set_rules('fullname','Full Name','required');
			$this->form_validation->set_rules('email','Email','required|callback_email_exists');
			$this->form_validation->set_rules('type','Type','required');
			if($this->form_validation->run()== TRUE){
			$email = $this->input->post('email');
	         $data = array(
				'fullname'=>$this->input->post('fullname'),
				'email'=>$this->input->post('email'),
				'type'=>$this->input->post('type')
			 );
			 $this->session->set_flashdata('created',' User Created Successfully');
			 $this->db->insert('tbl_users',$data);
			 return redirect(base_url('dashboard/enroll'));
			}else{
				
				$this->data['title'] = "Enroll Drivers ";
				$this->data['page_title'] = "enroll";
				$this->load->view('layout/index',$this->data);
			}
		}else{
			$this->data['title'] = " Create Users ";
			$this->data['page_title'] = "enroll";
			$this->load->view('layout/index',$this->data);
		}
	  
	} 

	public function resetpassword(){
		if($_POST){
			$id = $this->session->id;
			$getpass = $this->db->get_where('tbl_admin_reg',array('id'=>$id))->row()->password;
			$this->data['oldpassword']= $this->myhash($this->input->post('oldpassword'));
			$confpass = $this->input->post('confpassword');
			if($this->data['oldpassword'] == $getpass && $this->input->post('password') == $confpass){
				$this->session->set_flashdata('changed','<div class="alert alert-info text-center"> Password Changed Successfully  </div>');
				$this->dashboard_m->resetpassword($this->myhash($this->input->post('password')),$id);
				return redirect(base_url('dashboard/resetpassword'));
			}elseif($this->input->post('password') != $confpass){
				$this->session->set_flashdata('changed','<div class="alert alert-warning text-center"> Sorry! The  New Password Does Not Match The  Confirm Password </div>');
				return redirect(base_url('dashboard/resetpassword'));
			}
			else{
				$this->session->set_flashdata('changed','<div class="alert alert-danger text-center"> Password Not Recorgnized, Please Check Password And Try Again </div>');
			   $_SESSION['mismatch'] = " Sorry! The Both Password Does Not Match ";
			   return redirect(base_url('dashboard/resetpassword'));
			}
		
		}else{
			$this->data['title'] = " Reset your password  ";
			$this->data['page_title'] = "resetpass";
			$this->load->view('layout/index',$this->data);
		}
		
	  }
 
	 public function forgetpassword(){
		if($_POST){
			$this->data['email'] = $this->input->post('email');
			$this->data['password'] = $this->input->post('password');
			$this->data['confpassword'] = $this->input->post('confpassword');
			$chechemail =  $this->db->get_where('tbl_admin_reg',array('email'=>$this->data['email']))->row();
			if($chechemail){
				if($this->data['password'] == $this->data['confpassword']){
					$ncrypt = $this->myhash($this->data['password']);
					 $this->session->set_flashdata('change','<div class="alert alert-success text-center"> Password Changed Successfully,Please Logni  </div>');
				     $this->dashboard_m->changepassword($this->data['email'],$ncrypt);
					//return redirect(base_url('dashboard/resetpassword'));
					redirect(base_url(''));
				}else{
					$this->session->set_flashdata('error','<div class="alert alert-danger text-center"> The password does not  Match the confirm password  </div>');
					return redirect(base_url('dashboard/forgetpassword'));
				}
			   
			}else{
				$this->session->set_flashdata('error','<div class="alert alert-danger text-center"> Email Not Found  </div>');
				return redirect(base_url('dashboard/forgetpassword'));
			}
				$enc_pass = $this->myhash($this->data['confpassword']);
				$this->dashboard_m->resetpassword($enc_pass);
	
		
		}else{
			$this->data['title'] = " Change Password ";
			$this->data['page_title'] ="forgetpassword";
			$this->load->view('layout/index2',$this->data);
		}
		
	  }

	  // API
	   public function enroll2(){
		    if($_POST){
				  $data = array(
					'fullname'=>$this->input->post('fullname'), 
					'email'=>$this->input->post('email'),
					'type'=>$this->input->post('type') 
				 );
				if($data['fullname']=="" || $data['email']=="" ||  $data['type']==""){
					echo json_encode(array("status"=>204,"message"=>"please fill all the feilds"));
				}elseif(!empty($data)){
					$checkemail = $this->db->get_where('tbl_users',array('email'=>$this->input->post('email')))->row();
				    if($checkemail){
					  echo json_encode(array("status"=>302,"message"=>"Sorry! this  user already exist"));
				    }else{
						if($data['type']=="passenger"){
							$this->db->insert('tbl_users',$data);
							echo json_encode(array('status'=>201,'message'=>'passenger account created successfully'));
						}elseif($data['type']=="driver"){
							$this->db->insert('tbl_users',$data);
							echo json_encode(array('status'=>201,'message'=>'driver  account created successfully'));
						 }else{
							echo json_encode(array('status'=>400,'message'=>'wrong data supplied, please check your data'));
						}
						
					}
				}
				
				
		    }
		
        }

    public function all_drivers(){
		if($_POST){
		   $data =[
			'id'=>$this->input->post('id'),
			'fullname'=>$this->input->post('fullname'),
			'email'=>$this->input->post('email')
		   ];
		    $this->dashboard_m->UpdateDriver($data);
			$this->session->set_flashdata('msg_update',' Drivers Record Updated ');
			return redirect('dashboard/all_drivers');
		}else{
			$this->data['title'] = " View All Drivers ";
			$this->data['alldrivers'] = $this->dashboard_m->GetAllDrivers();
			$this->data['page_title'] = "all_drivers";
			$this->load->view('layout/index',$this->data);
		}
		
	}

	public function passengers(){
		if($_POST){
		   $data =[
			'id'=>$this->input->post('id'),
			'fullname'=>$this->input->post('fullname'),
			'email'=>$this->input->post('email')
		   ];
		    $this->dashboard_m->UpdatePassenger($data);
			$this->session->set_flashdata('msg_update',' Passengers Record Updated ');
			return redirect('dashboard/passengers');
		}else{
			$this->data['title'] = " View All Passengers ";
			$this->data['allpassengers'] = $this->dashboard_m->GetPassengers();
			$this->data['page_title'] = "passengers";
			$this->load->view('layout/index',$this->data);
		}
		
	}

	public function searchusers(){
      $this->data['title'] = " Search For User";
	  $this->data['page_title'] = "searchusers";
	  $this->load->view('layout/index',$this->data);
	}

   public function deletedriver (){
     $driver_id = $this->uri->segment(3);
	 $this->dashboard_m->DeleteDriver('tbl_users',$driver_id);
	 return redirect('dashboard/all_drivers');
	 
   }

   public function deletepassenger (){
		$driver_id = $this->uri->segment(3);
		$this->dashboard_m->DeleteDriver('tbl_users',$driver_id);
		return redirect('dashboard/passengers');
	
   }

  

	public function reg_admin(){
			if($_POST){
				$this->form_validation->set_rules('firstname',' Firstname','required');
				$this->form_validation->set_rules('othernames',' Othernames','required');
				$this->form_validation->set_rules('email',' Email','required|callback_check_email_exists');
				$this->form_validation->set_rules('username','Username','required|callback_username_check');
				$this->form_validation->set_rules('password','Password','required');
				$this->form_validation->set_rules('confpassword',' Confirm Password','matches[password]');
				if($this->form_validation->run() == FALSE) {
					$this->data['title'] = " Admin Registration";
					$this->load->view('layout/pages/reg_admin',$this->data);
				
				}else{

				
					//image upload------------------------------------
						$config['upload_path'] = './assets/uploads/';
						$config['allowed_types'] ='gif|jpg|png|jpeg|pdf';
						$config['max_size'] ='2048';
						$config['max_width'] = '5000';
						$config['max_height'] ='60000';
						$config['file_name'] = time().$this->input->post('othernames').$_FILES['userfile']['name'];
						$this->load->library('upload',$config);
						if(!$this->upload->do_upload()){
							$errors = array('error'=>$this->upload->display_errors());
							$userfile = 'noimage.jpg';
							var_dump($errors);die;
						}else{
							$data = array('upload_data'=>$this->upload->data());
							// $userfile = $_FILES['userfile']['name'];
							$userfile = $config['file_name'];
						
						}
					//close image upload ---------------------------
					$email = $this->input->post('email');
						$data_array = array(
							'firstname'=>$this->input->post('firstname'),
							'othernames'=>$this->input->post('othernames'),
							'email'=>$this->input->post('email'),
							'username'=>$this->input->post('username'),
							'password'=>$this->myhash($this->input->post('password')),
							'passport'=>$userfile
						);
						$this->session->set_flashdata('success',' Account Created Successfully! Please Login');
						$this->dashboard_m->CreateAdminAccount('tbl_admin_reg',$data_array);
						return redirect(base_url('dashboard/admin_login'));
				}
			}else{
				$this->data['title'] = " Admin Registration";
				$this->load->view('layout/pages/reg_admin',$this->data);
			}

		
		}

	public function admin_login(){
		if($_POST){

			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
			if($this->form_validation->run()== TRUE){
				$username = $this->input->post('username');
				$password =  $this->input->post('password');
                $enc_crypt_pass = $this->myhash($password);
				$checklogin = $this->db->get_where('tbl_admin_reg',array('username'=>$username,'password'=>$enc_crypt_pass))->row();
				if($checklogin){
					$data_arr = array(
						'id'=>$checklogin->id,
						'firstname'=>$checklogin->firstname,
						'othernames'=>$checklogin->othernames,
						'username'=>$checklogin->username,
						'email'=>$checklogin->email,
						'passport'=>$checklogin->passport,
						'logged_in'=>TRUE
					);
					$this->session->set_userdata($data_arr);
				    return redirect(base_url('dashboard'));
				}else{
				  $_SESSION['login_attempt'] +=1;
				 $this->session->set_flashdata('change','<div class="alert alert-danger text-center"> Incorrect Login Details  </div>');
				 return redirect(base_url('dashboard/admin_login'));
				}
			}else{
				$this->data['title'] = " Admin Login ";
				$this->load->view('layout/pages/admin_login',$this->data);
			}
		}else{
			$this->data['title'] = " Admin Login ";
			$this->load->view('layout/pages/admin_login',$this->data);
		}
     
   }



   public function check_email_exists($email){
	   $this->form_validation->set_message('check_email_exists','that email already exist');
	   if($this->dashboard_m->check_email_exists($email)){
	     return true;
	   }else{
	     return false;
	   }
   }

   public function email_exists($email){
		$this->form_validation->set_message('email_exists','This User Already exist');
		if($this->dashboard_m->email_exists($email)){
		return true;
		}else{
		return false;
		}
   }

   public function username_check($data_array){
	$this->form_validation->set_message('username_check','that username '.$data_array.' already exist');
	if($this->dashboard_m->username_check($data_array)){
	  return true;
	}else{
	  return false;
	}
}






public function logout(){
	session_destroy();
	// $this->session->unset_userdata('username');
	// $this->session->unset_userdata('logged_in');

	// // clear all flash messages
	// $this->session->unset_userdata('success');
	// $this->session->unset_userdata('login_error');
	// $this->session->unset_userdata('created');
	return redirect(base_url('dashboard/admin_login'));
   
   }



public function myhash($string){
	return  hash("sha512", $string . config_item("encryption_key"));
 }



}
