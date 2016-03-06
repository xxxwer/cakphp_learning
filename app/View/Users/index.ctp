<h1>login</h1>  
<?php  
    echo $this->Form->create('User');  
    echo $this->Form->input('username');  
    echo $this->Form->input('password');  
    echo $this->Form->end('登陆');  
?>  
<br/>

<?php echo $this->Html->link('注册',array('controller' => 'users','action'=>'register'));?> 