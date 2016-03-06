<?php  
class CategoriesController extends AppController
{
	public $name = 'Categories';
	public $helpers = array('Html','Form');
	public $components = array('Flash','Session','Cookie');
	function index()
	{
		$find_condition = array(
				'fields'=>array()
		);
		$this->set('index_cotent',var_dump( $this->Category->find("all",$find_condition)));
	}


}




