<?php  
class ProductContentsController extends AppController
{
	public $name = 'ProductContents';
	public $helpers = array('Html','Form');
	public $components = array('Flash','Session','Cookie');
	function index()
	{
		$find_condition = array(
				'fields'=>array()
		);
		$this->set('index_cotent',var_dump( $this->ProductContent->find("all",$find_condition)));
	}


}





