<?php if(empty($status)){ $status ="";}
        if(empty($campstatus)){ $campstatus ="";}
        $current_page = $this->Paginator->current();
	$this->Paginator->options(array(
			'update' => '#content',
			'evalScripts' => true
		));
	
	$Title = "";
	$ClientID = "";
	$CreatedON = "";
	if(!empty($valueTitle)){
		$Title = $valueTitle;
	}
	if(!empty($client_id)){
		$ClientID = $client_id;
	}
	if(!empty($created_on)) {
		$CreatedON = $created_on;
	}
	$CmpStatus = $campaigns[0]['Campaign']['status'];
?>
<div class="campaigns index" >
	<div class="table panel panel-info">
		<div class="panel-heading">
			<?php if($status==2 || $campstatus==2){ ?>
				<h1 class="panel-title">Paused Campaigns</h1>
			<?php }else if($status==3 || $campstatus==3){ ?>
				<h1 class="panel-title">Under Review Campaigns</h1>
			<?php }else {?>
				<h1 class="panel-title">Live Campaigns</h1>
			<?php } ?>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="row">
            <?php echo "<span id='date_error' style='color:red;'></span>";?>
			<?php echo $this->Form->create('Campaign',array('url'=>array('controller'=>'campaigns','action' => 'index'),'type'=>'get')); ?>
			<?php echo $this->Form->hidden('campStatus',array(
					'label'=>false,
					'id'=>'campStatus',
					'value'=>'1'
			)); ?>
	            <div class="col-xs-3 block">
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
						<?php echo $this->Form->input("title",array('required'=>false,'label'=>false,'class'=>'form-control','placeholder'=>'Campaign Title','value'=>$Title)); ?>
	                </div>
	            </div>
	            <div class="col-xs-3">
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
        				<?php echo $this->Form->input("client_id",array('required'=>false,'empty' => 'Client Name','label'=>false,'selected'=>$ClientID,'class'=>'form-control')); ?>
	                </div>
	            </div>
	            <div class="col-xs-3">
	                <input type="text" name="created" class="form-control" placeholder="Created ON" value="<?php echo $CreatedON; ?>" id="createdON">
	            </div>
	            <div class="col-xs-3">
	                <input type="submit" id="searchCampaigns" onclick="return validate();" class="btn btn-default btn-raised">
	            </div>
			<?php echo $this->Form->end();?>
		</div>
	</div></br></br>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-sm-4 pull-right" id="export-camp">
			<?php echo $this->Html->link(__('Export'), array('action' => 'exportCampaigns',$CmpStatus),array('class'=>'btn btn-info fa fa-upload pull-right','title'=>'Export to Excel')); ?>
			
		</div>
	</div>
	<div class="table-responsive" id="contentTable">
		<table class="table">
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
			</tr>
			<?php if(count($campaigns)>0) {?>
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
                            <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $campaign['Campaign']['id'])); ?>
                                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $campaign['Campaign']['id'])); ?>
                                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $campaign['Campaign']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $campaign['Campaign']['id']))); ?>
                            </td>
			</tr>
			<?php
			endforeach;
			}else { ?>
				<tr><td colspan="10" align="center">No Record Found</td></tr>
			<?php }	?>
			
		</table>
	</div>
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
<?php echo $this->Html->script('custom_script'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		
		/*For DatePicker*/
		$("#createdON").Zebra_DatePicker({});
		var camp_type	= "<?php echo  $this->Session->read('Camp.Status') ?>";
		if(camp_type!=""){
			$('#campStatus').val(camp_type);
			if(camp_type==1){
				$('#LiveC').addClass("active");
			}else if(camp_type==2){
				$('#PauseC').addClass("active");
			}else if(camp_type==3){
				$('#UnderC').addClass("active");
			}
		}
		
		/*	For Campaign Priority	*/
		
		
		
	});
</script>
<style type="text/css">
	#createdON{
		/*width:200px !important;*/
		width: auto !important;
	}
</style>
<?php echo $this->Js->writeBuffer(); ?>