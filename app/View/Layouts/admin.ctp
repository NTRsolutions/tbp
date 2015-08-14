<?php
	$appConObj = new AppController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
		<!-- <link rel="shortcut icon" href="<?php //echo SITE_URL ?>img/logo.png"> -->
	<title>
		TaskBucksPro
	</title>
	<?php
		
		echo $this->Html->css('style');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('material.min.css');
		echo $this->Html->css('roboto.min.css');
		echo $this->Html->css('ripples.min.css');
		//echo $this->Html->css('font-awesome.min');

		echo $this->Html->script('jquery-2.1.4.min');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('ripples.min.js');
		echo $this->Html->script('material.min.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<?php
				$username=$appConObj->getLoggedInUserName();
				if($username!=""){
					echo $this->element('top_menu');
				}
			 ?>
		</div>
		<div class="row">
			<div class="col-sm-12">
		    	<div id="content">
					<?php
						echo $this->Session->flash(); 
						echo $this->fetch('content');
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<?php //echo $this->element('sql_dump'); ?>
	</div>
	
</body>
</html>
