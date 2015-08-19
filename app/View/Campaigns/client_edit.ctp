<div class="panel panel-info">
	<div class="panel-heading">
		Edit Client
	</div>
</div>
<div class="clients form">
	<?php echo $this->Form->create('Client'); ?>
		<div class="col-sm-4 form-group">
	    	<div class="input-group">
				<span class="input-group-addon"><span class="mdi-action-account-box"></span></span>
				<?php
					echo $this->Form->input('client_name',array(
						'class'=>'form-control',
						'placeholder'=>'Client Name',
						'label'=>false,
					));
				?>
	        	<span class="input-group-btn">
	        		<?php echo $this->Form->submit('Save',array('class'=>array('btn btn-primary'))); ?>
	        	</span>
	    	</div>
		</div>

</div>
<!--
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Client.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Client.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('controller' => 'campaigns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->
