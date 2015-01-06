<div class='commands'>
	<ul class='scroller'>
	</ul>
</div>


<script>

        function actualizarComandos(){
            $.ajax({
                url: '<?php echo CController::createUrl("site/ajaxUpdateCommands")  ?>',
                dataType: 'html',
                type: 'POST',
                'success': function (response) {
                    ajaxResponse = response;
                }
            });
        }

        setInterval(actualizarComandos, 60000)

</script>