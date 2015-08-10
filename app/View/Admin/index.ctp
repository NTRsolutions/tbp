<body  onload="getfocus();">
<div>
	
<div class="TitleArealoginform" ><div style="margin-top:3.5px;">Admin Control Panel</div></div>
	
	
<?php echo $this->Form->create('Admin', array('url' => array('controller' => 'Admin', 'action' => 'login'))); ?>

<?php //echo "<pre>";
	//print_r($errorusername); 
	echo $GLOBALS["errorname"];
	?>
<table class="login" >

<tr>
	<td><h1 class="txtheader"><?php //echo $pageheader; ?></h1>
	</td>
</tr>
<tr>
	<td>
		<?php 	echo $this->Form->input('username',array('maxlength'=>'50'));   //text ?>
	</td>
</tr>
<tr>
	<td>
		<?php 	echo $this->Form->input('password',array('maxlength'=>'50'));   //password		?>		
	</td>
</tr>
<tr>
	<td>
		<?php	echo $this->Form->end('Login');?>
	</td>
</tr>

</table>
</div>	
</body>	 
<script>
$(function(){
    $('#AdminUsername').focus();
});
</script>
