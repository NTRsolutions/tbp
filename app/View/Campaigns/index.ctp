<div class="">
	<h2><?php echo __('Campaigns'); ?></h2>
	<table class="table table-responsive-vertical table-hover">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('total_data'); ?>(in MBs)</th>
			<th><?php echo $this->Paginator->sort('daily_data_limit','Data/day'); ?>(in MBs)</th>
			<th><?php echo $this->Paginator->sort('campaign_priority'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
			
			<!-- <th><?php echo $this->Paginator->sort('package_name'); ?></th> -->
			<!-- <th><?php echo $this->Paginator->sort('os_start_version'); ?></th> -->
			<!-- <th><?php echo $this->Paginator->sort('os_end_version'); ?></th> -->
			<!-- <th><?php echo $this->Paginator->sort('app_download_link'); ?></th> -->
			<!-- <th><?php echo $this->Paginator->sort('app_logo_name'); ?></th> -->
			<!-- <th><?php echo $this->Paginator->sort('type'); ?></th> -->
			<!-- <th><?php echo $this->Paginator->sort('status'); ?></th> -->
			<!-- <th><?php echo $this->Paginator->sort('modified'); ?></th> -->
		</tr>
	</thead>
	<tbody>
	<?php foreach ($campaigns as $campaign): ?>
	<tr>
		<td><?php echo h($campaign['Campaign']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($campaign['Client']['client_name'], array('controller' => 'clients', 'action' => 'view', $campaign['Client']['id'])); ?></td>
		<td><?php echo h($campaign['Campaign']['title']); ?>&nbsp;</td>
		<td><?php echo h($campaign['Campaign']['total_data']); ?>&nbsp;</td>
		<td><?php echo h($campaign['Campaign']['daily_data_limit']); ?>&nbsp;</td>
		<td><?php echo h($campaign['Campaign']['campaign_priority']); ?>&nbsp;</td>
		<td><?php echo h($campaign['Campaign']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($campaign['Campaign']['end_date']); ?>&nbsp;</td>
		<td><?php echo h(date('Y-m-d',strtotime($campaign['Campaign']['created']))); ?>&nbsp;</td>
		<!-- <td><?php echo h($campaign['Campaign']['package_name']); ?>&nbsp;</td> -->
		<!-- <td><?php echo h($campaign['Campaign']['os_start_version']); ?>&nbsp;</td> -->
		<!-- <td><?php echo h($campaign['Campaign']['os_end_version']); ?>&nbsp;</td> -->
		<!-- <td><?php echo h($campaign['Campaign']['app_download_link']); ?>&nbsp;</td> -->
		<!-- <td><?php echo h($campaign['Campaign']['app_logo_name']); ?>&nbsp;</td> -->
		<!-- <td><?php echo h($campaign['Campaign']['type']); ?>&nbsp;</td> -->
		<!-- <td><?php echo h($campaign['Campaign']['status']); ?>&nbsp;</td> -->
		<!-- <td><?php echo h($campaign['Campaign']['modified']); ?>&nbsp;</td> -->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $campaign['Campaign']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $campaign['Campaign']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $campaign['Campaign']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $campaign['Campaign']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<!-- <nav class="navbar navbar-default sidebar" role="navigation">
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Campaign'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
</nav> -->
