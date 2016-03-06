<?php  
class UsersController extends AppController  
{  
	public $name = 'Users';
	public $helpers = array('Html','Form');
	public $components = array('Flash','Session','Cookie');
    function index()  
    {  
        //Don't show the error message if no data has been submitted.  
        $this->set('error', false);  
 
        // If a user has submitted form data: 
        if (!empty($this->data)) 
        { 
            // First, let's see if there are any users in the database  
            // with the username supplied by the user using the form:  
  
            $someone = $this->User->findByUsername($this->data['User']['username']);  
  
            // At this point, $someone is full of user data, or its empty.  
            // Let's compare the form-submitted password with the one in   
            // the database.  
  
            if(!empty($someone['User']['password']) && $someone['User']['password'] == $this->data['User']['password']) 
            { 
                // Note: hopefully your password in the DB is hashed,  
                // so your comparison might look more like: 
                // md5($this->data['User']['password']) == ... 
 
                // This means they were the same. We can now build some basic 
                // session information to remember this user as 'logged-in'. 
 				$this->Cookie->write('user',array('username' => $this->data['User']['username']));
                $this->Session->write('User', $someone['User']); 
 				$this->Flash->set("登陆成功");
                // Now that we have them stored in a session, forward them on 
                // to a landing page for the application.  
 
                $this->redirect('/posts'); 
            } 
            // Else, they supplied incorrect data: 
            else 
            { 
                // Remember the $error var in the view? Let's set that to true:  
                $this->set('error', true);  
            }  
        }  
    }  
  
    function logout()  
    {  
        // Redirect users to this action if they click on a Logout button.  
        // All we need to do here is trash the session information:  
  
        $this->Session->delete('User');  
  		$this->Cookie->delete('user');
        // And we should probably forward them somewhere, too...  
       
        $this->redirect('/posts');  
    }
    
    public function register()
    {
    	if($this->request->is('post'))
    	{
    		if($this->validate_check_check($this->request->data)){
    			$this->request->data['User']['create_time'] = time();
    			$this->request->data['User']['is_delete'] = 0;
	    		if($this->User->save($this->request->data))
	    		{
	    			$this->Flash->set('注册成功!');
	    			$this->redirect('/users');
	    		}
	    		else
	    		{
	    			$this->Flash->setFlash('错误');
	    		}
    		}
    	}
    }
    
    //自己做post表单验证 cakephp这个死见比....
    private function validate_check_check($a){
    	if(empty($a['User']['username']) )
    	{
    		$this->Flash->set('用户名不能为空!');
    		return false;
    	}
    	if(empty($a['User']['password'])){
    		$this->Flash->set('密码不能为空!');
    		return false;
    	}
    	else{
    		return true;
    	}
    }
}  




