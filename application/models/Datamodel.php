<?php

class Datamodel extends CI_Model  {

public function getAllStudent()
{
   $query =  $this->db->get_where('main', array('acct_type' => 'S'));
   if($query->num_rows() > 0){
        return $query->result();
  }else{
        return false;
    }

}

public function getAllTeacher()
{
    $query =  $this->db->get_where('main', array('acct_type' => 'T'));
    if($query->num_rows() > 0){
        return $query->result();
    }else{
        return false;
    }

}


public function addstutea(){
    $query = array(
       'lname'=>$this->input->post('lastn'),
       'fname'=>$this->input->post('firstn'),
       'mi'=>$this->input->post('mid_i'),
       'address'=>$this->input->post('addr'),
       'gender'=>$this->input->post('gen'),
       'acct_ID'=>$this->input->post('acct'),
       'dob'=>$this->input->post('dofb'),
       'contact'=>$this->input->post('con'),
       'type'=>$this->input->post('typ')
   );
    $this->db->insert('main', $query);
    if($this->db->affected_rows() > 0){
     return true;
       }else{
           return false;
           }
       } 

}