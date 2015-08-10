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
<div class="">
	<ul class="nav nav-pills nav-justified">
		<li <?php if($class!="" and ($i==1)) echo "$class"; else{?>class= navMenu <?php } ?> role="presentation"><?php echo $this -> Html -> link(__('Dashboard'), array('controller' => 'admin', 'action' => 'dashboard')); ?></li>
		<li <?php if($class!="" and ($i==2)) echo "$class"; else{?>class= navMenu <?php } ?> role="presentation"><?php echo $this -> Html -> link(__('Campaigns'), array('controller' => 'campaigns', 'action' => 'index')); ?></li>
		<li <?php if($class!="" and ($i==3)) echo "$class"; else{?>class= navMenu <?php } ?> role="presentation"><?php echo $this -> Html -> link(__('Clients'), array('controller' => 'clients', 'action' => 'index')); ?></li>
		<li <?php if($class!="" and ($i==4)) echo "$class"; else{?>class= "disabled" <?php } ?> role="presentation"><a href="#" >Menu3</a></li>
		<li <?php if($class!="" and ($i==5)) echo "$class"; else{?>class= "disabled" <?php } ?> role="presentation"><a href="#" >Menu4</a></li>
		<a href="<?php echo $this -> base . "/"; ?>admin/logout"><button class="btn navbar-btn btn-danger navbar-right"> Logout</button></a>
	</ul>
</div>
