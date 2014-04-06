<?php

interface MusicInterface_model{

	public function getmusics($start = 0,$end=10);

	public function findMusicById($id = 0);	
}	

?>