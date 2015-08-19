<?php echo $this->Html->css('login'); ?>
<div class="login-container">
    <div id="output"></div>
    <div class="avatar"></div>
    <div class="form-box">
    	<div style="padding-top:30px" class="panel-body" >
			<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
				<?php echo $this->Form->create('Client', array('url' => array('controller' => 'Clients', 'action' => 'login'),array('id'=>'loginform','class'=>'form-horizontal','role'=>'form'))); ?>
					<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<?php echo $this->Form->input('username', array(
								'placeholder' => 'Username',
								'id' => 'login-username',
								'class' => 'form-control',
								'label'=>false,
                                                                'maxlength'=>'20'
							)); ?>
					</div>

					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<?php echo $this->Form->input('password', array(
							'placeholder' => 'Password',
							'id' => 'login-password',
							'class' => 'form-control',
							'maxlength'=>'10',
							'label' => false
						)); ?>
					</div>
					<div style="margin-top:10px" class="form-group">
						<!-- Button -->
						<div class="col-sm-12 controls">
						<?php
							echo $this->Form->submit('Login', array(
								'id'=>'btn-login',
								'class'=>'btn btn-success',
							));
						?>
							<!-- <a id="btn-login" href="#" class="btn btn-success">Login  </a> -->
						</div>
					</div>
				<?php	echo $this->Form->end();?>
			</div>
		</div>
	</div>