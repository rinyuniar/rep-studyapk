<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('user/UserModel','userM'); //memanggil model, userM sebagai alias untuk parameter model 
		$this->load->model('question/QuestionModel','questionM');
		$this->load->model('answer/AnswerModel','answerM');
	}
	public function index(){
		$this->load->view('welcome_message');
	}

	public function show()
	{
		$this->load->view('public/header');
		$databases = $this->questionM->get(); //menampilkan data question
		if($databases) {
			$questionArray = array();  //untuk menampung nilai yang dimodifikasi
			foreach($databases as $row) {
				$questionInside = $row;

				//kondisi jika type question adalah select kemudian ouputnya akan dibentuk menjadi baris
				if($row['type']=="select"){ 
					$optionArray = explode(PHP_EOL, $row['options']); //memisahkan data string End of line "/n"
					$questionInside['option_array'] = $optionArray; 
					//['option array'] adalah nama array dari value option yang sudah dimodifikasi
				}
				$questionArray[] = $questionInside;
			}
		}

		//Pengemasan terakhir yang akan digunakan oleh view
		$bungkus['pertanyaan'] = $questionArray;
		$this->load->view('public/form',$bungkus);
		$this->load->view('public/footer');
	}

	public function proses()
	{
		$data = $this->input->post();
		/**$email = $this->input->post('email'); 
		var_dump($email);
		var_dump($data['nama_lengkap']);**/
		
		$questions = $data['question']; //ambil data question dan dimasukan kevariabel baru
		unset($data['question']);

		$create = $this->userM->create($data); //proses tambahkan data ke tabel user dengen mendeklarasikan alias dari model
		$lastId = $this->db->insert_id();
		
		//reformating questions
		$newQuestions = array();
		foreach($questions as $index=>$row) {
			$newQuestions[] = array(
				'question_id' => $index,
				'the_answer' => $row,
				'id_user' => $lastId,
			);
		}

		$insertBanyak = $this->answerM->create($newQuestions,TRUE);

		if($insertBanyak){
			echo "Sukses!!";
			//header("location:".base_url()."public/Form/tampil");
		} else {
			echo "Gagal!!!";
		}

	}

	public function tampil(){
		//$ids = array(8,9,10); select beberapa value
		//$database = $this->userM->get("yuniar","nama_lengkap"); select salah satu field
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
		
		//GET Answer
		$answer = $this->answerM->get(
			$database['id_user'],
			'id_user'
		);

		$data['answer'] = $answer;

		//GET question Id
		$questionIds = array();
		foreach($answer as $row){
			$questionIds[] = $row['question_id'];
		}

		//GET question detail
		$question = $this->questionM->get($questionIds); //select * from question where questionID IN(1,2,...)

		//Modify question index
		$questionNew = array();
		foreach($question as $row){
			$questionNew[$row['question_id']] = $row;
		}
		$data['question'] = $questionNew;
		

		$this->load->view('public/header');
		$this->load->view('public/formDetail',$data);
		$this->load->view('public/footer');
	}

}

