<?php
/* /app/View/Helper/LienHelper.php */
App::uses('AppHelper', 'View/Helper');

class VotesHelper extends AppHelper {
    public function check_date_end($date_end) {
    	if($date_end != 0){
      		return $date_end;
    	} else{
      		return " N/D ";
    	}
    }
}
?>