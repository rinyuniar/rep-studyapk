<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('user/UserModel','userM');
	}
	public function index(){
		$this->load->view('welcome_message');
	}

	public function show()
	{
		//echo "Registrasi <br>";
		$this->load->view('public/header');
		$this->load->view('public/form');
		$this->load->view('public/footer');
	}

	public function proses()
	{
		$data = $this->input->post();
		/**$email = $this->input->post('email'); 
		echo "<pre>";
		var_dump($data);
		var_dump($email);
		var_dump($data['nama_lengkap']);**/
		
		$create = $this->userM->create($data);
		if($create){
			header("location:".base_url()."public/Form/tampil");
		} else {
			echo "Gagal!!!";
		}

	}

	public function tampil(){
		//$ids = array(8,9,10);
		//$database = $this->userM->get("yuniar","nama_lengkap");
		//$database = $this->userM->get($ids);
		//echo "<pre>";
		//var_dump($database);
		$database = $this->userM->get();
		$data['list'] = $database;
		$this->load->view('public/header');
		$this->load->view('public/userList',$data);
		$this->load->view('public/footer');
	}

	public function detail($id){

		$database = $this->userM->get($id)[0];
		$data['detail'] = $database;
		//echo "<pre>";
		//var_dump($data);
		$this->load->view('public/header');
		$this->load->view('public/formDetail',$data);
		$this->load->view('public/footer');
	}

}

