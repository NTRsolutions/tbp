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
		
		echo $this->Html->css('bootstrap.min');
		//echo $this->Html->css('font-awesome.min');
		echo $this->Html->css('style');

		echo $this->Html->script('jquery-2.1.4.min');
		echo $this->Html->script('bootstrap.min');

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
			<!-- <div class="col-sm-2">
				<?php //echo $this->element('sidebar'); ?>
			</div> -->
			<div class="col-sm-10">
		    	<div id="content">
					<?php
						echo $this->Session->flash(); 
						echo $this->fetch('content'); 
					?>
				</div>
		<!--	</div> -->
		</div>
	</div>
	<div class="row">
		<?php //echo $this->element('sql_dump'); ?>
	</div>
	
</body>
</html>
