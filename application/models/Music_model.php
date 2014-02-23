<?php
/**
*每日歌曲
*/
class Music_model extends CI_Model{


	//先查询5条记录

	public function findtopfive($sortType ='DESC' ,$start =0,$end=10){
		$this->load->database();
		$sql = "select * from book_everydaymusic order by showdate ".$sortType." limit ".$start.",".$end;
		$query = $this->db->query($sql);
		return $query->result_array();
	}

}

?>
