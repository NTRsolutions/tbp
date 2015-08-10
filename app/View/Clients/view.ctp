<div class="clients view">
<h2><?php echo __('Client'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($client['Client']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client Name'); ?></dt>
		<dd>
			<?php echo h($client['Client']['client_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Client'), array('action' => 'edit', $client['Client']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Client'), array('action' => 'delete', $client['Client']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $client['Client']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('controller' => 'campaigns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Campaigns'); ?></h3>
	<?php if (!empty($client['Campaign'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Client Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Package Name'); ?></th>
		<th><?php echo __('Total Data'); ?></th>
		<th><?php echo __('Daily Data Limit'); ?></th>
		<th><?php echo __('Campaign Priority'); ?></th>
		<th><?php echo __('Os Start Version'); ?></th>
		<th><?php echo __('Os End Version'); ?></th>
		<th><?php echo __('App Download Link'); ?></th>
		<th><?php echo __('App Logo Name'); ?></th>
		<th><?php echo __('Start Date'); ?></th>
		<th><?php echo __('End Date'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($client['Campaign'] as $campaign): ?>
		<tr>
			<td><?php echo $campaign['id']; ?></td>
			<td><?php echo $campaign['client_id']; ?></td>
			<td><?php echo $campaign['title']; ?></td>
			<td><?php echo $campaign['package_name']; ?></td>
			<td><?php echo $campaign['total_data']; ?></td>
			<td><?php echo $campaign['daily_data_limit']; ?></td>
			<td><?php echo $campaign['campaign_priority']; ?></td>
			<td><?php echo $campaign['os_start_version']; ?></td>
			<td><?php echo $campaign['os_end_version']; ?></td>
			<td><?php echo $campaign['app_download_link']; ?></td>
			<td><?php echo $campaign['app_logo_name']; ?></td>
			<td><?php echo $campaign['start_date']; ?></td>
			<td><?php echo $campaign['end_date']; ?></td>
			<td><?php echo $campaign['type']; ?></td>
			<td><?php echo $campaign['status']; ?></td>
			<td><?php echo $campaign['created']; ?></td>
			<td><?php echo $campaign['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'campaigns', 'action' => 'view', $campaign['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'campaigns', 'action' => 'edit', $campaign['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'campaigns', 'action' => 'delete', $campaign['id']), array('confirm' => __('Are you sure you want to delete # %s?', $campaign['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
