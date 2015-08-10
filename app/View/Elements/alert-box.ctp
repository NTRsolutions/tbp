<div class="alert <?php echo $class;?>">
    <?php echo $message; ?>
    <a href="#" class="close" onclick="$(this).parent().fadeOut();return false;">&times;</a>
</div>
<style>
	.alert {
		z-index: -1000 !important;
	}
</style>
<script>
	$(document).ready(function(){
		$('.alert').animate({opacity: 1.0}, 3000).fadeOut();
	});
</script>