<div class="panel panel-info">
	<div class="panel-heading">List of Clients</div>
	<div class="panel-body">
		<div class="table-responsive-vertical">
		    <table class="table table-hover table-bordered">
			<thead>
			<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('client_name'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($clients as $client): ?>
			<tr>
				<td><?php echo h($client['Client']['id']); ?>&nbsp;</td>
				<td><?php echo h($client['Client']['client_name']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'clientView', $client['Client']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'clientEdit', $client['Client']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'clientDelete', $client['Client']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $client['Client']['id']))); ?>
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
	</div>		
</div>
<!-- <nav class="navbar navbar-default sidebar" role="navigation">
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Client'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('controller' => 'campaigns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?> </li>
	</ul>
</div>
</nav> -->