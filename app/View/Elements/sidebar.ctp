<nav id="sidebar shadow-z-5">
	<div class="row">
	    <div class="panel-group" id="accordion">
	        <div class="panel panel-info">
	            <div class="panel-heading">
	                <h4 class="panel-title">
	                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
	                    </span>Campaigns</a>
	                </h4>
	            </div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body">
						<table class="table">
							<tr class="" id="LiveC">
								<td>
									<span class="glyphicon glyphicon-fire text-danger"></span>
									<?php echo $this -> Html -> link(__(
											'Live Campaigns'),
											 array('controller' => 'campaigns', 'action' => 'index'),
											 array('class'=>'side-menu')
										  ); ?>
								</td>
							</tr>
							<tr class="" id="PauseC">
								<td>
									<span class="glyphicon glyphicon-fire text-warning"></span>
									<?php echo $this -> Html -> link(__(
											'Paused Campaigns'),
											 array('controller' => 'campaigns', 'action' => 'index',2),
											 array('class'=>'side-menu')
										  ); ?>
								</td>
							</tr>
							<tr class="" id="UnderC">
								<td>
									<span class="glyphicon glyphicon-fire text-success"></span>
									<?php echo $this -> Html -> link(__(
											'Review Campaigns'),
											 array('controller' => 'campaigns', 'action' => 'index',3),
											 array('class'=>'side-menu')
										  ); ?>
								</td>
							</tr>
							<!-- <tr class="">
								<td>
									<span class="glyphicon glyphicon-fire text-danger"></span>
									<?php echo $this -> Html -> link(__(
											'Live Campaigns'),
											 array('controller' => 'campaigns', 'action' => 'showCampaigns'),
											 array('class'=>'side-menu')
										  ); ?>
								</td>
							</tr> -->

							<tr class="">
								<td>
									<span class="glyphicon glyphicon-hand-right text-primary"></span>
									<?php echo $this->Html->link(__(
											'New Campaign'),
											 array('controller'=>'campaigns','action' => 'add'),
											 array('class'=>'side-menu')
											 ); ?>
								</td>
							</tr>
							<tr class="">
							    <td>
									<span class="glyphicon glyphicon-hand-right text-primary"></span>
									<?php echo $this->Html->link(__(
											'Campaign Records'),
											 array('controller'=>'campaigns','action' => 'campaignRecords'),
											 array('class'=>'side-menu')
											 ); ?>
							    </td>
							</tr>
						</table>
					</div>
				</div>
	        </div>
	        <div class="panel panel-info">
	            <div class="panel-heading">
	                <h4 class="panel-title">
	                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
	                    </span>Clients</a>
	                </h4>
	            </div>
	            <div id="collapseTwo" class="panel-collapse collapse in">
	                <div class="panel-body">
	                    <table class="table">
	                        <tr class="">
	                            <td>
	                                <?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?>
	                            </td>
	                        </tr>
	                        <tr class="">
	                            <td>
									<?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?>
	                            </td>
	                        </tr>
	                        <tr>
	                    </table>
	                </div>
	            </div>
	        </div>
	        <div class="panel panel-info">
	            <div class="panel-heading">
	                <h4 class="panel-title">
	                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
	                    </span>Account</a>
	                </h4>
	            </div>
	            <div id="collapseThree" class="panel-collapse collapse">
	                <div class="panel-body">
	                    <table class="table">
	                        <tr>
	                            <td>
	                                <a href="#">Change Password</a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <a href="#">Notifications</a><span class="label label-info">5</span>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <a href="#">Import/Export</a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <span class="glyphicon glyphicon-trash text-danger"></span>
	                                <a href="" class="text-danger">Delete Account</a>
	                            </td>
	                        </tr>
	                    </table>
	                </div>
	            </div>
	        </div>
	        <div class="panel panel-info">
	            <div class="panel-heading">
	                <h4 class="panel-title">
	                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
	                    </span>Reports</a>
	                </h4>
	            </div>
	            <div id="collapseFour" class="panel-collapse collapse">
	                <div class="panel-body">
	                    <table class="table">
	                        <tr>
	                            <td>
	                                <span class="glyphicon glyphicon-usd"></span>
	                                <a href="#">Sales</a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <span class="glyphicon glyphicon-user"></span>
	                                <a href="#">Customers</a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <span class="glyphicon glyphicon-tasks"></span>
	                                <a href="#">Products</a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <span class="glyphicon glyphicon-shopping-cart"></span>
	                                <a href="#">Shopping Cart</a>
	                            </td>
	                        </tr>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</nav>
<script type="text/javascript">
	$("#accordion a").each(function() {
		if (this.href == window.location.href) {
			$(this).parent().parent().addClass("active");
		}
	});
</script>