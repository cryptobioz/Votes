<?php
class Welcome extends AppModel{
	public $validate = array(
		'email' => array('rule' => 'notEmpty'),
		'code' => array('rule' => 'notEmpty')
	);
}
?>
