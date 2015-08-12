<?php
	$url = $this -> here;
	$urlarray = explode('/', $url);
	$i = 0;
	if (in_array("dashboard", $urlarray)) {
		$class = "class=active";
		$i = 1;
	} elseif (in_array("campaigns", $urlarray) || ((in_array("campaigns", $urlarray)) && (in_array("add", $urlarray)))) {
		$class = "class=active";
		$i = 2;
	} elseif (in_array("clients", $urlarray) || ((in_array("clients", $urlarray)) && (in_array("add", $urlarray)))) {
		$class = "class=active";
		$i = 3;
	} else{
		$class = "";
	}
?>
<nav class="navbar shadow-z-2" id="topNavigation">
	<div class="container-fluid">  
    	<ul class="nav navbar-nav">
			<li <?php if($class!="" and ($i==1)) echo "$class"; else{?>class= navMenu <?php } ?> role="presentation"><?php echo $this -> Html -> link(__('Dashboard'), array('controller' => 'admin', 'action' => 'dashboard')); ?></li>
			<li <?php if($class!="" and ($i==2)) echo "$class"; else{?>class= navMenu <?php } ?> role="presentation"><?php echo $this -> Html -> link(__('Campaigns'), array('controller' => 'campaigns', 'action' => 'index')); ?></li>
			<li <?php if($class!="" and ($i==3)) echo "$class"; else{?>class= navMenu <?php } ?> role="presentation"><?php echo $this -> Html -> link(__('Clients'), array('controller' => 'clients', 'action' => 'index')); ?></li>
			<li <?php if($class!="" and ($i==4)) echo "$class"; else{?>class= "disabled" <?php } ?> role="presentation"><a href="#" >Menu3</a></li>
			<li <?php if($class!="" and ($i==5)) echo "$class"; else{?>class= "disabled" <?php } ?> role="presentation"><a href="#" >Menu4</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
        	  	<?php echo $this->Html->link(('Logout'), array('controller'=>'admin','action' => 'logout'),array('class'=>'btn btn-raised btn-danger pull-right','title'=>'Logout')); ?>
  		</ul>
	</div>
</nav>
<style>
#topNavigation {
	background-color: #616161 !important;
}
</style>