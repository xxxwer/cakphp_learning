<?php  
class MembersController extends AppController
{
	public $name = 'Members';
	public $helpers = array('Html','Form');
	public $components = array('Flash','Session','Cookie');
	function index()
	{
		$find_condition = array(
				'fields'=>array()
		);
		$this->set('index_cotent',var_dump( $this->Member->find("all",$find_condition)));
	}


}





