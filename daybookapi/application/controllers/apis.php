<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Access-Control-Allow-Origin:*");
class Apis extends CI_Controller {

	
	public function index()
	{
		$msg = array("status"=>0,"data"=>"Sorry,Type Is Not Found");

		$type = isset($_REQUEST['type'])?$_REQUEST['type']:"";
		$output = isset($_REQUEST['output'])?$_REQUEST['output']:"json";
		//这个参数主要是为了解决jsonp返回数据
		$callback = isset($_REQUEST['callback'])?$_REQUEST['callback']:"callback";
		switch ($type) {
			case 'getmusic':
				$starts = isset($_REQUEST['sCounts'])?$_REQUEST['sCounts']:0;//开始 startCounts
				$ends = isset($_REQUEST['eCounts'])?$_REQUEST['eCounts']:10;//结束  endCounts
				$result = $this->Music_model->getmusics($starts,$ends);
				$msg['status'] = 1;
				$msg['data'] = $result;
			break;
			case 'onemusic':
				$id = isset($_REQUEST['id'])?$_REQUEST['id']:0;
				$this->Music_model->findMusicById($id);
			break;
			case 'daysentence':
				$starts = isset($_REQUEST['sCounts'])?$_REQUEST['sCounts']:0;//开始 startCounts
				$ends = isset($_REQUEST['eCounts'])?$_REQUEST['eCounts']:10;//结束  endCounts
				$result = $this->Music_model->findallSentence($starts,$ends);
				$msg['status'] = 1;
				$msg['data'] = $result;
			break;
		}


		switch ($output) {
			case 'json':
				$this->convertJson($msg,$callback);
			break;
			case 'array':
				$this->convertArray($msg);
			break;
		}


	}

	/**
	*将JSON格式的数据解析成PHP原有的数据格式
	**/
	private function analysisJson($json){

		echo json_decode($json);
		exit;
	}

	/**
	*将传递过来的Array变化成JSON(default)
	*
	**/
	private function convertJson($arr,$callback = ""){
		header('Content-type: application/json');
		if($callback == ""){
			echo json_encode($arr);
		}else{
			echo $callback."(".json_encode($arr).")";
		}
		
		exit;
	}


	private function analysisArray(){

	}

	/**
	 * 将数组格式用Print_r数据格式输出
	 * **/
	private function convertArray($arr){
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
	}
}