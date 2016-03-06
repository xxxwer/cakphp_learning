<h1>Register New Account</h1>  
<?php  
    echo $this->Form->create('User');  
    echo $this->Form->input('username');  
    echo $this->Form->input('password');   
    echo $this->Form->end('Register');  
?>  