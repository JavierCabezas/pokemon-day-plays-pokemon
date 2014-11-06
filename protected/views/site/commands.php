<div class='commands'>
	<ul class='scroller'>
		<?php foreach($commands as $command): ?>
			<li> <?php echo $command->complete ?> </li>
		<?php endforeach ?>
	</ul>
</div>


<script type="text/javascript">
  setTimeout(function () { location.reload(true); }, 3000);
</script>