<?php  
class ProductsController extends AppController
{
	public $name = 'Products';
	public $helpers = array('Html','Form');
	public $components = array('Flash','Session','Cookie');
	function index()
	{
		$find_condition = array(
				'fields'=>array()
		);
		$this->set('index_cotent',var_dump( $this->Product->find("all",$find_condition)));
	}


}





