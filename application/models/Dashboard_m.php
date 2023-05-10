<?php defined('BASEPATH') OR exit('No direct script access allowed');?>


<?php 

class Dashboard_m extends CI_Model{


  public function CreateAdminAccount($table,$array){
    return $this->db->insert($table,$array);
 }


public function GetAllDrivers(){
  $query = $this->db->get_where('tbl_users',array('type'=>'driver'));
  return $query->result();
}
public function GetPassengers(){
  $query = $this->db->get_where('tbl_users',array('type'=>'passenger'));
  return $query->result();
}

public function resetpassword($data,$id){
   $data_password =['password'=>$data];
   $this->db->where('id',$id);
   return $this->db->update('tbl_admin_reg',$data_password);
}

public function UpdateDriver($data){
 $this->db->where('id',$data['id']);
 return $this->db->update('tbl_users',$data);
}

public function UpdatePassenger($data){
  $this->db->where('id',$data['id']);
  return $this->db->update('tbl_users',$data);
 }

public function DeleteDriver($table,$driver_id){
 $this->db->where('id',$driver_id);
 return $this->db->delete($table);
}

public function changepassword($email,$encrypt){
  $data =['password'=>$encrypt];
  $this->db->where('email',$email);
  return $this->db->update('tbl_admin_reg',$data);
}

 public function check_email_exists($data){
    $query = $this->db->get_where('tbl_admin_reg',array('email'=>$data));
    if(empty($query->row_array())){
      return true;
    }else{
      return false;
    }
  
 } 

 public function email_exists($data){
  $query = $this->db->get_where('tbl_users',array('email'=>$data));
   if(empty($query->row_array())){
    return true;
   }else{
     return false;
   }
  
 }

 public function username_check ($data){
    $query = $this->db->get_where('tbl_admin_reg',array('username'=>$data));
     if(empty($query->row_array())){
      return true;
     }else{
       return false;
     }
    
   }





}

?>