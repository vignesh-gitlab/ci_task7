<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//$this->load->library('database');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('user_model');
	}
	
	public function index()
	{
		$this->load->view('login_view');
	}
	public function register(){
		$this->load->view('register_view');
	}
	public function admin(){
		$this->load->view('admin_view');
	}
	public function user(){
		$this->load->view('user_view');
	}
	public function login(){
		$user_name=$this->input->post("user_name");
		$password=$this->input->post("password");
		$res=$this->user_model->login_validate($user_name,$password);
		if($res->user_type=="admin"){
			$this->session->set_userdata("id",$res->id);
			$this->session->set_userdata("name",$res->name);
			echo "flag1";
		}else if($res->user_type=="normal"){
			$this->session->set_userdata("id",$res->id);
			$this->session->set_userdata("name",$res->name);
			echo "flag2";
		}else{
			echo "flag3";
		}
	}
	public function register_data(){
		$data=array(
			'name'=>$this->input->post("name"),
			'user_name'=>$this->input->post("user_name"),
			'password'=>$this->input->post("password"),
			'latitude'=>$this->input->post("latitude"),
			'longitude'=>$this->input->post("longitude")
		);
		$res=$this->user_model->insert($data);
		echo json_encode($res);
	}
	public function view_users(){
		if($this->session->has_userdata('id')){
			$this->load->view('user_detail_view');
		}else{
			$this->load->view('login_view');
		}
	}
	public function get_users(){
		$result=$this->user_model->get();
		echo json_encode($result);
	}
	public function update_data(){
		$edit_id=$this->input->post("edit_id");
		$data=array(
			'name'=>$this->input->post("name"),
			'user_name'=>$this->input->post("user_name"),
			'password'=>$this->input->post("password")
		);
		$res=$this->user_model->update_data($edit_id,$data);
		echo $res;
	}
	public function delete_data(){
		$del_id=$this->input->post("del_id");
		$result=$this->user_model->delete_row($del_id);
		echo $result;
	}
	public function admin_home(){
		if($this->session->has_userdata("id")){
			$this->load->view('admin_view');
		}else{
			$this->load->view('login_view');
		}
	}
	public function log_out(){
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('name');
		$this->load->view('login_view');
	}
	
}
