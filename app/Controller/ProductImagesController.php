<?php  
class ProductImagesController extends AppController
{
	public $name = 'ProductImages';
	public $helpers = array('Html','Form');
	public $components = array('Flash','Session','Cookie');
	function index()
	{
		$find_condition = array(
				'fields'=>array()
		);
		$this->set('index_cotent',var_dump( $this->ProductImage->find("all",$find_condition)));
	}


}





