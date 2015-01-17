<div class='commands'>
    <h2> Últimos comandos </h2>
	<ul class='sceroller'>
	</ul>
</div>


<script>

        function actualizarComandos(){
            $.ajax({
                url: '<?php echo CController::createUrl("site/ajaxUpdateCommands")  ?>',
                dataType: 'html',
                type: 'POST',
                'success': function (response) {
                    $(".sceroller").html(response);
                }
            });
        }

        setInterval(actualizarComandos, 1000)

</script>