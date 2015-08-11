<?php
	$appConObj = new AppController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
		<link rel="shortcut icon" href="<?php //echo SITE_URL ?>img/logo.png">
	<title>
		TaskBucksPro
		<?php //echo $webdesription ?>
		<?php //echo $title_for_layout; ?>
	</title>
	<?php
		// echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.min');
		//echo $this->Html->css('font-awesome.min');
		echo $this->Html->css('zebra_datepicker');
		echo $this->Html->css('style');

		echo $this->Html->script('jquery-2.1.4.min');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('zebra_datepicker');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
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
			</div>
		</div>
	</div>
	<div class="row">
		<?php //echo $this->element('sql_dump'); ?>
	</div>
	
</body>
</html>
