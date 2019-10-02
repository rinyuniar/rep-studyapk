<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuestionAdd extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('question/QuestionModel','questionM');
    }
    
	public function index(){
        $this->load->view('public/header');
        $this->load->view('question/formQuestion');
        $this->load->view('public/footer');
    }

    public function proses()
	{
		$data = $this->input->post();
		/**$email = $this->input->post('email'); 
		var_dump($email);
		var_dump($data['nama_lengkap']);**/

		$create = $this->questionM->create($data); //proses tambahkan data ke tabel user dengen mendeklarasikan alias dari model

		if($create){
			echo "Sukses!!";
			//header("location:".base_url()."public/Form/tampil");
		} else {
			echo "Gagal!!!";
		}
    }
    
    public function getJson(){
        $data = $this->questionM->get();
        echo json_encode($data);
    }

}