<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daymobile extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('mobile_main');
	}


	public function lists(){
	    $this->load->view('list');
	}

	//加载音乐
	public function firstloadmusic(){
		$sort = isset($_POST['sort'])?$_POST['sort']:'DESC';//排序
		$starts = isset($_POST['sCounts'])?$_POST['sCounts']:0;//开始 startCounts
		$ends = isset($_POST['eCounts'])?$_POST['eCounts']:10;//结束  endCounts
		
		$this->load->model('music_model');
		$showData = $this->music_model->findtopfive($sort,$starts,$ends);
		if(count($showData) <= 0 ){
			$emptymsg = array("msg"=>"没有数据");
			echo json_encode($emptymsg);
		}else{
			echo json_encode($showData);	
		}
		
	}
	
}

/* End of file daymobile.php */
/* Location: ./application/controllers/daymobile.php */