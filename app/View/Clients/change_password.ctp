<style>
    .lbl-txt {
        color: #337ab7;
        font-weight: unset;
    }
    .input-group {
        margin-bottom:20px;
    }
    .input-group-addon{color:#03A9F4;}
</style>
<div class="panel panel-info">
    <div class="panel-heading">
        <h1 class="panel-title">Change Password</h1>
    </div>
</div>
<div class="changepassword form">
		<?php echo $this->Form->create('client',array('enctype' => 'multipart/form-data','class'=>'form-horizontal')); ?>
    <div class="col-sm-12">
        <div class="col-sm-5">
            <label class="lbl-txt">Old Password :</label><br>
            <div class="input-group">
                <span class="input-group-addon"><span class="mdi-action-https"></span></span>
					<?php
						echo $this->Form->input('password',array(
							'class'=>'form-control',
							'placeholder'=>'Enter Old Password',
							'label'=>false,
                                                        'maxlength'=>'10'
						));
					?>
            </div>
        </div>
        
    </div>
    <div class="col-sm-12 ">
        <div class="col-xs-5">
            <label class="lbl-txt">New Password :</label><br>
            <div class="input-group">
                <span class="input-group-addon"><span class="mdi-action-https"></span></span>
	                <?php echo $this->Form->input("new_password",array(
                                                'maxlength'=>'10',
                                                'type'=>'password',
	                			'label'=>false,
	                			'required'=>false,
	                			'class'=>'form-control',
	                			'placeholder'=>'Enter New Password'
								)
							);
					?>
            </div>
        </div>
    </div>
    <div class="col-sm-12 ">
        <div class="col-xs-5">
            <label class="lbl-txt">Confirm New Password :</label><br>
            <div class="input-group">
                <span class="input-group-addon"><span class="mdi-action-https"></span></span>
	                <?php echo $this->Form->input("confirm_new_password",array(
                                                'maxlength'=>'10',
                                                'type'=>'password',
	                			'label'=>false,
	                			'required'=>false,
	                			'class'=>'form-control',
	                			'placeholder'=>'Enter Confirm New Password'
								)
							);
					?>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-5"><br>
		       <?php echo $this->Form->submit('Change',array('class'=>array('form-control','btn btn-success'))); ?>
        </div>
        <div class="col-sm-5 pull-right"><br>
				<?php echo $this->Form->Reset('Reset',array('class'=>array('form-control','btn btn-danger'))); ?>
        </div>
    </div>
		<?php echo $this->Form->end(); ?>
</div>
<script type="text/javascript">

   
</script>
