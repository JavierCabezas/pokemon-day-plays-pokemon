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

<object class = "gba" data="<?php echo Yii::app()->baseUrl.'/images' ?>/gba.svg" type="image/svg+xml"></object>

<div class="scroller">
hikusdsa
</div>
<script>

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

	/**
	 *	Disable all buttons for an ammount of miliseconds.
	 *	It also adds the "disabled" css class to the buttons to get a graphic feedback to know that the buttons are actually disabled.
	 *	@param integer milliseconds the ammount of ms that the buttons are to remain disabled.
	 */
	function disable(milliseconds){
		$(".btn").attr("disabled", "disabled");
		$(".btn").addClass("disabled");
		setTimeout(function(){
			$(".btn").removeAttr("disabled");
			$(".btn").removeClass("disabled");
		}, milliseconds);
	}
</script>