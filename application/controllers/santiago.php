<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class santiago extends CI_Controller {

    function __construct(){
        parent:: __construct();
        $this->load->model('Datamodel');
    }

    function index() {
        $this->load->view('index');
    }

    public function showAllStudent() {
        $result = $this->Datamodel->getAllStudent();
        echo json_encode($result);
    }

    function teacher() {
        $this->load->view('teacher');
    }

    public function showAllTeacher() {
        $result = $this->Datamodel->getAllTeacher();
        echo json_encode($result);
    }


    public function addstutea(){
		$result = $this->Datamodel->addstutea();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


}
