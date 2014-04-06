<?php
/**
*每日歌曲
*/
class Music_model extends CI_Model {
	var $imgurl = "http://localhost/daybookapi/";

	
	/**
	*查询歌曲的方法
	***/
	public function getmusics($start = 0,$end=10){
		$return = "";
		if(!is_numeric($start)){
			$start = 0;
		}

		if(!is_numeric($end)){
			$end = 10;
		}

		$this->load->database();
		$this->db->from("book_everydaymusic");
		$this->db->order_by("showdate","DESC");
		$this->db->limit($end,$start);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->result_array();
		foreach ($result as $key => &$value) {
			$songertx = $value['songertx'];
			if(empty($songertx)){
				$value['songertx'] ="res/tx/moren.jpg";
			}
		}

		if(count($result) <= 0 ){
			$return =  "没有数据";
		}else{
			$return = $result;	
		}

		return $return;
	}

	public function findMusicById($id){

	}


	/**all sentence**/
	public function findallSentence($start = 0,$end=5){
		$return = "";
		if(!is_numeric($start)){
			$start = 0;
		}

		if(!is_numeric($end)){
			$end = 10;
		}

		$this->load->database();
		$this->db->select('sid,showdate,engsen,scsen,showimg,desc');
		$this->db->from("book_daysentence");
		$this->db->order_by("showdate","DESC");
		$this->db->limit($end,$start);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->result_array();

		if(count($result) <= 0 ){
			$return =  "没有数据";
		}else{
			$return = $result;	
		}

		return $return;


	}

}

?>
