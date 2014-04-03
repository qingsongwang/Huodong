	<?php $nodes =$this->user->getUserNodes();?>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="index">爱活动<i class="icon-home"></i></a>
          <div class="nav-collapse collapse"> 
          	<ul class="nav">
          	<?php if (isset($nodes)):?>
          	<?php foreach($nodes as $node):?>
          		<li class="dropdown">
              	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
              	 <?php echo $node['parent_name'];?>
              	  <span class="caret"></span>
             	</a>
              	<ul class="dropdown-menu">
              	  <?php foreach($node as $sub_node):?>
              	  <?php if(is_array($sub_node)):?>
              	  <li><?php echo anchor($sub_node['url'], $sub_node['name']);?>
              	  <?php endif;?>
              	  <?php endforeach;?>
              	</ul>
          	</li>
          	<?php endforeach;?>
          	<?php endif;?>
          </ul>
        </div>
        <div class="pull-right">
          <ul class="nav">
          	 
			<li><?php echo anchor('member/index', "$name ，你好")?></li> 
          	<li><?php echo anchor('member/logout', "注销")?></li>
			
          </ul>
      	</div>
    </div>
   </div>
  </div>