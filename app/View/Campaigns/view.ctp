<div class="campaigns view">
<h2><?php echo __('Campaign'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaign['Client']['id'], array('controller' => 'clients', 'action' => 'view', $campaign['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Package Name'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['package_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Data'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['total_data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Daily Data Limit'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['daily_data_limit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Campaign Priority'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['campaign_priority']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Os Start Version'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['os_start_version']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Os End Version'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['os_end_version']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('App Download Link'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['app_download_link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('App Logo Name'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['app_logo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
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
