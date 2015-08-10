<center><div class="flash_good">
	<?php echo h($message); ?>
</div></center>
<style>
.flash_good {
	border:1px solid #000;  
    font-weight: bold;
    margin-bottom: 20px;
    margin-top: 20px;
    padding: 10px;
    width: 98%;
    color:#FFF;
    background: #8fc800; /* Old browsers */
	background: -moz-linear-gradient(left,  #8fc800 0%, #8fc800 53%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, right top, color-stop(0%,#8fc800), color-stop(53%,#8fc800)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(left,  #8fc800 0%,#8fc800 53%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(left,  #8fc800 0%,#8fc800 53%); /* Opera 11.10+ */
	background: -ms-linear-gradient(left,  #8fc800 0%,#8fc800 53%); /* IE10+ */
	background: linear-gradient(to right,  #8fc800 0%,#8fc800 53%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8fc800', endColorstr='#8fc800',GradientType=1 ); /* IE6-9 */

}
</style>
<script>
	$(document).ready(function(){
		$('.flash_good').animate({opacity: 1.0}, 3000).fadeOut();
	});
</script>