	<?php
/*
		echo $this->Form->input('client_id');
		echo $this->Form->input('title');
		echo $this->Form->input('package_name');
		echo $this->Form->input('total_data');
		echo $this->Form->input('daily_data_limit');
		echo $this->Form->input('campaign_priority');
		echo $this->Form->input('os_start_version');
		echo $this->Form->input('os_end_version');
		echo $this->Form->input('app_download_link');
		echo $this->Form->input('app_logo_name');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
		echo $this->Form->input('type');
		echo $this->Form->input('status');
*/
	?>
<style>
	.lbl-txt {
		color: #337ab7;
		font-weight: unset;
	}
	.input-group {
		margin-bottom:20px;
	}
</style>
<?php //echo $this->Html->script('initailize_datepicker'); ?>
<div class="row" style="margin-bottom: 10px;">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h1 class="panel-title">Add Campaign</h1>
			</div>
		</div>

		<div class="campaigns form">
		<?php echo $this->Form->create('Campaign',array('enctype' => 'multipart/form-data','class'=>'form-horizontal')); ?>
    	<div class="col-sm-12">
			<div class="col-sm-5" style="margin-top: 10px;margin-bottom: 20px;">
				<label class="lbl-txt">Client</label><br>
				<?php
					echo $this->Form->input('client_id',array(
						'class'=>'form-control',
						'label'=>false
					));
				?>
			</div>
			<div class="col-sm-5 pull-right" style="margin-top: 10px;margin-bottom: 20px;">
				<label class="lbl-txt">Campaign Data</label><br>
				<?php
					echo $this->Form->input('campaign_data',array(
						'class'=>'form-control',
						'label'=>false,
						'placeholder'=>'Campaign Data'
						
					));
				?>
			</div>
		</div>
		<div class="col-sm-12 ">
			<div class="col-xs-5">
				<label class="lbl-txt">Title</label><br>
	            <div class="input-group">
	                <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
	                <?php echo $this->Form->input("title",array(
	                			'label'=>false,
	                			'required'=>false,
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
	                <?php echo $this->Form->input("package_name",array(
	                			'label'=>false,
	                			'required'=>false,
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
	                <span class="input-group-addon"><span class="glyphicon glyphicon-tasks"></span></span>
	                <?php echo $this->Form->input("total_data",array(
	                			'label'=>false,
	                			'required'=>false,
	                			'class'=>'form-control',
	                			'placeholder'=>'Total'
								)
							);
					?>
	            </div>
	        </div>
	        <div class="col-sm-5 pull-right">
				<label class="lbl-txt">Data Limit</label><br>
			    <div class="input-group">
	                <span class="input-group-addon"><span class="glyphicon glyphicon-tasks"></span></span>
	                <?php echo $this->Form->input("daily_data_limit",array(
	                			'label'=>false,
	                			'required'=>false,
	                			'class'=>'form-control',
	                			'placeholder'=>'Limit/Day'
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
	                			'required'=>false,
	                			'class'=>'form-control',
	                			'maxlength'=>'3',
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
	                			'required'=>false,
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
	                <?php echo $this->Form->input('start_date',array(
	                		'type'=>'text',
	                		'label'=>false,
	                		'id'=>'startDate',
	                		'placeholder'=>'YYYY-MM-DD'
						));
					?>
	            </div>
	        </div>
	        <div class="col-sm-5 pull-right">
				<label class="lbl-txt">Campaign End Date</label><br>
			    <div class="input-group">
	                <?php
	                echo $this->Form->input('end_date',array(
	                		'label'=>false,
	                		'type'=>'text',
	                		'id'=>'endDate',
	                		'placeholder'=>'YYYY-MM-DD'
						));
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
	                <?php echo $this->Html->image(null, array('class'=>'prev_logo','alt'=>'No Logo Uploaded')); ?>
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
		});
	});

</script>
