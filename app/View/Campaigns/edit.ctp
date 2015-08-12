<style>
	.lbl-txt {
		color: #337ab7;
		font-weight: unset;
	}
	.input-group {
		margin-bottom:20px;
	}
</style>
<?php
	//pr($this->request->data);
	$cStatus="";
	$current_page="edit";
	$campaignID = $this->request->data['Campaign']['id'];
	$Status = $this->request->data['Campaign']['status'];
	if($Status==0){
		$cStatus=1;
	}elseif($Status==1){
		$cStatus=2;
	}elseif($Status==2){
		$cStatus=1;
	}
	$this->Js->get('#Camp'.$campaignID)->event('click',$this->Js->request(
		array('action' => 'playPause', $campaignID,$cStatus,$current_page),
		array('method '=>'POST','async' => true,'update' => '#content')
	));
?>
<div class="row" style="margin-bottom: 50px;">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h1 class="panel-title">
				Edit Campaigns
				<?php
					if($Status==0){	?>
					<button id="<?php echo "Camp".$campaignID;?>" class="btn btn-warning"><span class="glyphicon glyphicon-play"></span>Activate</button>
				<?php
					}else if($Status==1){ ?>
						<button id="<?php echo "Camp".$campaignID;?>" class="btn btn-danger"><span class="glyphicon glyphicon-pause">Pause</button>
				<?php
					}else { ?>
						<button id="<?php echo "Camp".$campaignID;?>" class="btn btn-success"><span class="glyphicon glyphicon-play">Resume</button>
				<?php
					} ?>
			</h1>
		</div>
	</div>
	<div class="col-sm-10" id="custom-col">
		<div class="campaigns form">
		<?php echo $this->Form->create('Campaign',array('enctype' => 'multipart/form-data','class'=>'form-horizontal')); ?>
		<?php echo $this->Form->input('id'); ?>
    	<div class="col-sm-12">
		    <div class="col-sm-12">
		    	<label class="lbl-txt">Client</label><br>
				<?php  
				    echo $this->Form->input('client_id',array(
						'class'=>'form-control',
						'label'=>false
					));
				?>
			</div>
		</div>
		<div class="col-sm-12 ">
			<div class="col-xs-5">
				<label class="lbl-txt">Title</label><br>
	            <div class="input-group">
	                <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
	                <?php echo $this->Form->input("package_name",array(
	                			'label'=>false,
	                			'class'=>'form-control',
	                			'placeholder'=>'Title'
								)
							);
					?>
	            </div>
	        </div>
	        <div class="col-sm-5 pull-right">
				<label class="lbl-txt">Package name:</label><br>
			    <div class="input-group">
	                <span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
	                <?php echo $this->Form->input("title",array(
	                			'label'=>false,
	                			'class'=>'form-control',
	                			'placeholder'=>'Package Name'
								)
							);
					?>
	        	</div>
	         </div>
		</div>
		<div class="col-sm-12 ">
			<div class="col-xs-5">
				<label class="lbl-txt">Total Data</label><br>
	            <div class="input-group">
	                <span class="input-group-addon"><span class="fa fa-inr"></span></span>
	                <?php echo $this->Form->input("total_data",array(
	                			'label'=>false,
	                			'class'=>'form-control',
	                			'placeholder'=>'0.00'
								)
							);
					?>
	            </div>
	        </div>
	        <div class="col-sm-5 pull-right">
				<label class="lbl-txt">Daily Data Limit</label><br>
			    <div class="input-group">
	                <span class="input-group-addon"><span class="fa fa-inr"></span></span>
	                <?php echo $this->Form->input("daily_data_limit",array(
	                			'label'=>false,
	                			'class'=>'form-control',
	                			'placeholder'=>'0.00'
								)
							);
					?>
	        	</div>
	         </div>
		</div>
		<div class="col-sm-12 ">
			<div class="col-xs-5">
				<label class="lbl-txt">Campaign Priority</label><br>
	            <div class="input-group">
	                <span class="input-group-addon"><span class="glyphicon glyphicon-star-empty"></span></span>
	                <?php echo $this->Form->input("campaign_priority",array(
	                			'label'=>false,
	                			'class'=>'form-control',
	                			'placeholder'=>'0-100'
								)
							);
					?>
	            </div>
	        </div>
	        <div class="col-sm-5 pull-right">
				<label class="lbl-txt">App Download Link</label><br>
			    <div class="input-group">
	                <span class="input-group-addon"><span class="glyphicon glyphicon-download-alt"></span></span>
	                <?php echo $this->Form->input("app_download_link",array(
	                			'label'=>false,
	                			'class'=>'form-control',
	                			'placeholder'=>'http://playgoogle/app_link'
								)
							);
					?>
	        	</div>
	         </div>
		</div>
		<div class="col-sm-12 ">
			<div class="col-xs-5">
				<label class="lbl-txt">OS Start Version</label><br>
	            <div class="input-group">
	                <span class="input-group-addon"><span class="glyphicon glyphicon-ok-sign"></span></span>
	                <?php echo $this->Form->input("os_start_version",array(
	                			'label'=>false,
	                			'class'=>'form-control',
	                			'placeholder'=>'0.00'
								)
							);
					?>
	            </div>
	        </div>
	        <div class="col-sm-5 pull-right">
				<label class="lbl-txt">OS End Version</label><br>
			    <div class="input-group">
	                <span class="input-group-addon"><span class="glyphicon glyphicon-ok-sign"></span></span>
	                <?php echo $this->Form->input("os_end_version",array(
	                			'label'=>false,
	                			'class'=>'form-control',
	                			'placeholder'=>'0.00'
								)
							);
					?>
	        	</div>
	         </div>
		</div>
		<div class="col-sm-12 ">
			<div class="col-xs-5">
				<label class="lbl-txt">Campaign Start Date</label><br>
	            <div class="input-group">
	                <?php echo $this->Form->input('start_date',array('type'=>'text','label'=>false,'id'=>'startDate','placeholder'=>'yyyy-mm-dd'));?>
	            </div>
	        </div>
	        <div class="col-sm-5 pull-right">
				<label class="lbl-txt">Campaign End Date</label><br>
			    <div class="input-group">
	                <?php
	                echo $this->Form->input('end_date',array('label'=>false,'type'=>'text','id'=>'endDate','placeholder'=>'yyyy-mm-dd'));
					echo "<span id='date_error' style='color:red;'></span>";
					?>
	        	</div>
	         </div>
		</div>
		<div class="col-sm-12" style="margin-top:50px;margin-bottom: 50px;">
			<div class="col-xs-5">
				<label class="lbl-txt">App Logo</label><br>
	            <div class="input-group">
					<?php echo $this->Form->input('app_logo',array('type' => 'file','id'=>'app_logo','label'=>false)); ?>
	            </div>
	        </div>
	        <div class="col-sm-7 pull-right">
			    <div class="input-group">
	                <?php 
        				echo $this->Html->image("/Uploads/".$this->request->data['Campaign']['app_logo_name'], array('class'=>'prev_logo','alt'=>'No Logo Uploaded'));
					?>
	        	</div>
	         </div>
		</div>
		<div class="col-sm-12 space">
			<div class="col-sm-3" style="color: red;">
				<?php
					echo $this->Form->input('type', array(
						'label'=>'*Only for new Users'
					));
				?>
			</div>
		</div>
		<div class="col-sm-12">
		    <div class="col-sm-5"><br>
		       <?php echo $this->Form->submit('Submit',array('class'=>array('form-control','btn btn-success'))); ?>
		    </div>
		    <div class="col-sm-5 pull-right"><br>
				<?php echo $this->Form->Reset('Reset',array('class'=>array('form-control','btn btn-danger'))); ?>
		    </div>
		</div>
		<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
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
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#startDate").Zebra_DatePicker({
			direction: 1
		});
		
		$("#endDate").Zebra_DatePicker({
			onSelect: function() {
				var start_date = $("#startDate").val();
				var end_date = $("#endDate").val();
				if(end_date < start_date){
					var error = "<p>*End date connot be before start date</p>";
					$('#endDate').val('');
					$('#date_error').html(error);
					return false;
				}else{
					$('#date_error').html("");
				}
			}
		});
		
		/* To Preview App Logo */
		$('#app_logo').on('change', function(){
			$('.prev_logo')[0].src = window.URL.createObjectURL(this.files[0]);
		})
	});
</script>
<?php echo $this->Js->writeBuffer(); ?>
