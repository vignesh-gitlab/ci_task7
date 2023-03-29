<?php

class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function login_validate($user_name,$password){
        $result=$this->db->where("user_name",$user_name)->where("password",$password)->get("users")->row();
        return $result;
    }
    public function insert($data){
        $this->db->insert("users",$data);
        return true;
    }
    public function get(){
        $data=$this->db->where("user_type","normal")->get("users");
        return $data->result();
    }
    public function update_data($edit_id,$data){
        $this->db->where("id",$edit_id);
        $this->db->update("users",$data);
        return true;
    }
    public function delete_row($del_id){
        $res=$this->db->where("id",$del_id)->delete("users");
        return $res;
    }
}

?>