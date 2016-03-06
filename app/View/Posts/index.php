<!-- 开始访问这个目录时并访问index.ctp 文件，
就会访问到对应的PostsController类，在Controller目录下，并调用index()方法 
一个文件夹对应一个Controller类，一个页面对应一个类中的方法
 -->
<h1>blog test</h1>
<p><?php echo $this->Html->link("添加文章", array('controller' => 'posts','action' => 'add')); ?></p>
<p><?php echo $this->Html->link("注销", array('controller' => 'users','action' => 'logout')); ?></p>
<p><?php echo $username['username']; ?>,你好</p>
<p><?php echo time();?><p>
<p><?php echo date('Y-m-d 星期N H:i:s');?><p>

<table>
	<tr>
		<th>id</th>
		<th>title</th>
		<th>delete</th>
		<th>edit</th>
		<th>created</th>
		
	</tr>
	
	<?php foreach ($index_cotent as $post): ?>
	<tr>
		<td><?php echo  $post['Post']['id']?></td>
		<td>
			<?php echo $this->Html->link($post['Post']['title'],array('controller' => 'posts','action'=>'view',$post['Post']['id']));
				//由于这里的链接 action是view ，这个链接会调用PostsController下的view方法,访问View/posts下的view.ctp 
			?>	
		</td>
		<td>
		<?php echo $this->Form->postLink(  
                'Delete',  
                array('action' => 'delete', $post['Post']['id']),  
                array('confirm' => "是否删除第".$post['Post']['id']."条记录?")); ?>
        </td>  
		<td> 
			<?php echo $this->Html->link('edit',array('controller' => 'posts','action'=>'edit',$post['Post']['id']));?>	  
        </td>  
		<td><?php  echo $post['Post']['created'];?></td>
	</tr>
	<?php endforeach;?>
</table>