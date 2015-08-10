<head>
	<?php echo $this->Html->css('style'); ?>
	<?php echo $this->Html->script('jquery-2.1.4.min'); ?>
</head>
<div class="wrpper">
	<div class="flash_login">
		<?php echo $this->Session->flash(); ?>
	</div>
	<div class="loginsection">
		<div class="loginlogo">
			<?php //echo $this->Html->image("/img/logo.png",array('class'=>'app_logo')); ?>
		</div>
		<div class="loginformsection">
				<?php echo $this->Form->create('Admin', array('url' => array('controller' => 'Admin', 'action' => 'login'),'style'=>"align:center;margin:0px;")); ?>
				
				<div class="formRow">
					<div class="elementRow">
						<div class="formIcon">
							<?php echo $this->Html->image("/img/loginicon.png"); ?>
						</div>
						<div class="formElement">
							<?php 	echo $this->Form->input('username',array('type'=>'text','maxlength'=>'50','label'=>false,'placeholder'=>'Username'));   //text ?>
						</div>
					</div>
				</div>
				<div class="formRow">
					<div class="elementRow">
						<div class="formIcon passwordicon1">
							<?php echo $this->Html->image("/img/passwordicon.png");?>
						</div>
						<div class="formElement">
							<?php 	echo $this->Form->input('password',array('type'=>'password','maxlength'=>'50','label'=>false,'placeholder'=>'Password'));   //password		?>	
						</div>
					</div>
				</div>
					<div class="clearfix"></div>
				<div class="formRow" style="margin:0px;">
					<div class="submitbutton">
						<?php	echo $this->Form->end('LOG IN');?>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
