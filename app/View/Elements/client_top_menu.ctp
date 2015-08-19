<nav class="navbar shadow-z-1" id="topNavigation">
	<div class="container-fluid">  
    	<ul class="nav navbar-nav navbar-left">
            <?php echo $this -> Html -> link(__('Reports'), array('controller' => 'clients', 'action' => 'reports'),array('id'=>'exp_btn','class'=>'btn btn-raised pull-left','title'=>'Export to Excel')); ?>
	</ul>
	<ul class="nav navbar-nav navbar-right">
            <?php	echo $this->Html->link(__('Export Excel'), array('action' => 'exportExcel'),array('id'=>'exp_btn','class'=>'btn btn-raised pull-left','title'=>'Export to Excel'));?>
            <?php	echo $this->Html->link(__('Export CSV'), array('action' => 'exportCSV'),array('id'=>'exp_btn','class'=>'btn btn-raised pull-left','title'=>'Export to CSV'));?>
            <?php	echo $this->Html->link(__('Export PDF'), array('action' => 'exportPDF'),array('id'=>'exp_btn','class'=>'btn btn-raised pull-left','title'=>'Export to PDF'));?>
            <?php       echo $this->Html->link(('Change Password'), array('controller'=>'clients','action' => 'changePassword'),array('class'=>'btn btn-danger pull-right','title'=>'Change Password')); ?>
            <?php       echo $this->Html->link(('Logout'), array('controller'=>'clients','action' => 'clientLogout'),array('class'=>'btn btn-danger pull-right','title'=>'Logout')); ?>
  	</ul>
	</div>
</nav>
<style>
#topNavigation {
	background-color: #616161 !important;
}
</style>