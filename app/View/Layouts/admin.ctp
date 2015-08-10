<?php
	$appConObj = new AppController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<!--	<link rel="shortcut icon" href="<?php //echo SITE_URL ?>img/logo.png"> -->
	<title>
		TaskBucksPro
		<?php //echo $webdesription ?>
		<?php //echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->css('style');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('font-awesome.min');
		
		echo $this->Html->script('jquery-2.1.4.min');
		echo $this->Html->script('bootstrap.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>-->
</head>
<body>
	<div id="container-fluid">
		<div class="col-sm-12">
			<?php
				$username=$appConObj->getLoggedInUserName();
			if($username!=""){
				echo $this->element('top_menu');
			}
			
			?>
		</div>
		<div class="container">
			<div class="clearfix"></div>
			<div class="container-fluid">
				<?php echo $this->Session->flash(); ?>
			</div>
			<div class="col-sm-12">
		    	<div id="content">
					<?php
						echo $this->fetch('content'); 
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
