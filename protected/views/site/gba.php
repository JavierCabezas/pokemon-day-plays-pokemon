<object class = "gba" data="<?php echo Yii::app()->baseUrl.'/images' ?>/gba.svg" type="image/svg+xml"></object>

<!--<div class="scroller">lalala</div>-->

<?php 
/** 
 * GBA KEY -> KEYBOARD KEY
 *	a 		-> z
 * 	b 		-> x
 *	L 		-> l
 *	R 		-> r
 *	start 	-> m
 *	select  -> n
 *	up 		-> w
 *	down 	-> s
 *	left 	-> a
 *	right 	-> d
 *	speed   -> This is a special case and we send "speed" to the script.
 */

?>
<script>

	function pressKey(id_key){
		switch(id_key) {
			case 'a': apretar= 'z'; break;
			case 'b': apretar= 'x'; break;
			case 'down': apretar= 's'; break;
			case 'up': apretar= 'w'; break;
			case 'left': apretar= 'a'; break;
			case 'right': apretar= 'd'; break;
			case 'start': apretar= 'm'; break;
			case 'select': apretar= 'n'; break;
			case 'l': apretar= 'l'; break;
			default: apretar= 'r'; break;
		} 
		
		$.ajax({
			url: '<?php echo CController::createUrl("site/ajaxExeggcuteCommand")  ?>',
			dataType: 'html',
			type: 'POST',
			data: {
				key: apretar
			}
		});
	}

	function actualizarComandos(){
		$.ajax({
			url: '<?php echo CController::createUrl("site/ajaxUpdateCommands")  ?>',
			dataType: 'html',
			type: 'POST',
			'success': function (response) {
				$(".scroller").html(response)
			}
		});
	};

	setInterval(actualizarComandos, 6000);
	
</script>