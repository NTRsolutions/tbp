<div class="table">
<h2><?php echo __('Campaigns'); ?></h2>
	<table class="table table-bordered table-responsive table-striped">
		<tbody>
		<tr class="something">
			<td class="col-md-2"><strong><?php echo __('Id'); ?></strong></td>
			<td><?php echo h($campaign['Campaign']['id']); ?>&nbsp;</td>
		</tr>
		<tr class="something">
		<td class="col-md-2"><strong><?php echo __('Client'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($campaign['Client']['id'], array('controller' => 'clients', 'action' => 'view', $campaign['Client']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr class="something">
		<td class="col-md-2"><strong><?php echo __('Title'); ?></strong></td>
		<td>
			<?php echo h($campaign['Campaign']['title']); ?>
			&nbsp;
		</td>
		</tr>
		<tr class="something">
		<td class="col-md-2"><strong><?php echo __('Package Name'); ?></strong></td>
		<td>
			<?php echo h($campaign['Campaign']['package_name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr class="something">
		<td class="col-md-2"><strong><?php echo __('Total Data'); ?></strong></td>
		<td>
			<?php echo h($campaign['Campaign']['total_data']); ?>
			&nbsp;
		</td>
		</tr>
		<tr class="something">
		<td class="col-md-2"><strong><?php echo __('Daily Data Limit'); ?></strong></td>
		<td>
			<?php echo h($campaign['Campaign']['daily_data_limit']); ?>
			&nbsp;
		</td>
		</tr>
		<tr class="something">
		<td class="col-md-2"><strong><?php echo __('Campaign Priority'); ?></strong></td>
		<td>
			<?php echo h($campaign['Campaign']['campaign_priority']); ?>
			&nbsp;
		</td>
		</tr>
		<tr class="something">
		<td class="col-md-2"><strong><?php echo __('Os Start Version'); ?></strong></td>
		<td>
			<?php echo h($campaign['Campaign']['os_start_version']); ?>
			&nbsp;
		</td>
		</tr>
		<tr class="something">
		<td class="col-md-2"><strong><?php echo __('Os End Version'); ?></strong></td>
		<td>
			<?php echo h($campaign['Campaign']['os_end_version']); ?>
			&nbsp;
		</td>
		</tr>
		<tr class="something">
		<td class="col-md-2"><strong><?php echo __('App Download Link'); ?></strong></td>
		<td>
			<?php echo h($campaign['Campaign']['app_download_link']); ?>
			&nbsp;
		</td>
		</tr>
		<tr class="something">
		<td class="col-md-2"><strong><?php echo __('App Logo Name'); ?></strong></td>
		<td>
			<?php echo h($campaign['Campaign']['app_logo_name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr class="something">
		<td class="col-md-2"><strong><?php echo __('Start Date'); ?></strong></td>
		<td>
			<?php echo h($campaign['Campaign']['start_date']); ?>
			&nbsp;
		</td>
		</tr>
		<tr class="something">
		<td class="col-md-2"><strong><?php echo __('End Date'); ?></strong></td>
		<td>
			<?php echo h($campaign['Campaign']['end_date']); ?>
			&nbsp;
		</td>
		</tr>
		<tr class="something">
		<td class="col-md-2"><strong><?php echo __('Type'); ?></strong></td>
		<td>
			<?php echo h($campaign['Campaign']['type']); ?>
			&nbsp;
		</td>
		</tr>
		<tr class="something">
		<td class="col-md-2"><strong><?php echo __('Status'); ?></strong></td>
		<td>
			<?php echo h($campaign['Campaign']['status']); ?>
			&nbsp;
		</td>
		</tr>
		<tr class="something">
		<td class="col-md-2"><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($campaign['Campaign']['created']); ?>
			&nbsp;
		</td>
		</tr>
		<tr class="something">
		<td class="col-md-2"><strong><?php echo __('Modified'); ?></dt>
		<td>
			<?php echo h($campaign['Campaign']['modified']); ?>
			&nbsp;
		</td>
		</tr>
		</tbody>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Campaign'), array('action' => 'edit', $campaign['Campaign']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Campaign'), array('action' => 'delete', $campaign['Campaign']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $campaign['Campaign']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
