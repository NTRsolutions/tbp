<center><div class="flash_error">
	<?php echo h($message); ?>
</div></center>
<style>
.flash_error { 
	
    background: -moz-linear-gradient(247deg, rgba(77,0,0,1) 0%, rgba(255,0,0,1) 51%, rgba(77,0,0,1) 100%); /* ff3.6+ */
    background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, rgba(77,0,0,1)), color-stop(49%, rgba(255,0,0,1)), color-stop(100%, rgba(77,0,0,1))); /* safari4+,chrome */
    background: -webkit-linear-gradient(247deg, rgba(77,0,0,1) 0%, rgba(255,0,0,1) 51%, rgba(77,0,0,1) 100%); /* safari5.1+,chrome10+ */
    background: -o-linear-gradient(247deg, rgba(77,0,0,1) 0%, rgba(255,0,0,1) 51%, rgba(77,0,0,1) 100%); /* opera 11.10+ */
    background: -ms-linear-gradient(247deg, rgba(77,0,0,1) 0%, rgba(255,0,0,1) 51%, rgba(77,0,0,1) 100%); /* ie10+ */
    background: linear-gradient(203deg, rgba(77,0,0,1) 0%, rgba(255,0,0,1) 51%, rgba(77,0,0,1) 100%); /* w3c */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4D0000', endColorstr='#4D0000',GradientType=0 ); /* ie6-9 */
	border:2px solid #9e0b0f !important;
	padding:10px !important;
	font-weight:bold !important;
	margin-bottom:20px !important;	
	margin-top:20px !important;	
	width: 99% !important;
}
</style>
<script>
	$(document).ready(function(){
		$('.flash_error').animate({opacity: 1.0}, 3000).fadeOut();
	});
</script>