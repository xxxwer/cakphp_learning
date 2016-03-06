<?php
//PostsController类调用对应的PostsModel
class PostsController extends AppController{
	public $name = 'Posts';
	public $helpers = array('Html','Form');
	public $components = array('Flash','Session','Cookie');
	//index页面的行为
	public function index(){
		
		$find_condition = array(
				'fields'=>array('id','title','created')
		);
		$this->set('index_cotent',$this->Post->find("all",$find_condition));
		
		$user = array();
		$user=$this->Cookie->read('user');
		
		if(empty($user['username'])){
			$user['username'] = '游客';
		}

		$this->set('username',$user);
		
	}
	//view页面的行为
	public function view($id=NULL){
		$find_condition = array(
				'conditions' => array('id' => $id)
		);
		$this->set('view_content',$this->Post->find("all",$find_condition));
	}
	
	
	//add页面的行为
	public function add() {
		$this->checkSession();
		if($this->request->is('post'))
		{
			if($this->validate_check_check($this->request->data))	
			{	
				if($this->Post->save($this->request->data)) 
				{
					$this->Flash->set('创建成功!');
					$this->redirect(array('action' => 'index'));
				} 
				else 
				{
					$this->Flash->set('创建失败!');
				}
			}
			
		}
	}
	//edit页面的行为
	public function edit($id = null) {
		$this->checkSession();
		$this->Post->id = $id;
		if ($this->request->is('get')) 
		{
			$this->request->data = $this->Post->read();
		} 
		else 
		{
			if($this->validate_check_check($this->request->data)){
				if ($this->Post->save($this->request->data)) 
				{
					$this->Flash->set('修改成功!');
					$this->redirect(array('action' => 'index'));
				} 
				else 
				{
					$this->Flash->set('修改失败!');
				}
			}
		}
		
	}
	//delete的页面行为
	public function delete($id) {
		$this->checkSession();
		if ($this->request->is('get')) { //get访问删除是不被允许的
			throw new MethodNotAllowedException();
		}
		if ($this->Post->delete($id)) {
			$this->Flash->set('The post with id: ' . $id . ' has been deleted.');
			$this->redirect(array('action' => 'index'));
		}
	}
	//自己做post表单验证 cakephp这个死见比....
	private function validate_check_check($a){
		if(empty($a['Post']['title']) )
		{
			$this->Flash->set('标题不能为空!');
			return false;
		}
		if(empty($a['Post']['body'])){
			$this->Flash->set('内容不能为空!');
			return false;
		}
		else{
			return true;
		}
	}
	
	public function checkSession()
	{
		// If the session info hasn't been set...
		if (!$this->Session->check('User'))
		{
			// Force the user to login
			$this->redirect('/users/');
			exit();
		}
	}
	
}

