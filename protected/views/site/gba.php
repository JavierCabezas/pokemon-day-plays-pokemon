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

<div class="pad">
	<div class="sides">
		<?php
		echo CHtml::ajaxSubmitButton('L',Yii::app()->createUrl('site/ajaxExeggcuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "l" }', 'success'=>'js:function(time){ scroll("L", "'.Yii::app()->user->name.'", time ); }' ),  
        	array('class'=>'btn small_btn btn_main' , 'onclick' => 'disable('.Yii::app()->params['main_delay'].')' ));
		?>

		<?php
		echo CHtml::ajaxSubmitButton('R',Yii::app()->createUrl('site/ajaxExeggcuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "r" }', 'success'=>'js:function(time){ scroll("R", "'.Yii::app()->user->name.'", time ); }' ), 
        	array('class'=>'btn small_btn btn_main' , 'onclick' => 'disable('.Yii::app()->params['main_delay'].')' ));
		?>
	</div>


 	<div class="left">
 		<div class="dpad">
			<?php
			echo CHtml::ajaxSubmitButton('up',Yii::app()->createUrl('site/ajaxExeggcuteCommand'),
	        	array('type'=>'POST','data'=> 'js:{"key": "w" }', 'success'=>'js:function(time){ scroll("up", "'.Yii::app()->user->name.'", time ); }' ), 
	        	array('class'=>'btn small_btn btn_main' , 'onclick' => 'disable('.Yii::app()->params['main_delay'].')' ));
			?>

			<div class="lfrt">
				<?php
				echo CHtml::ajaxSubmitButton('left',Yii::app()->createUrl('site/ajaxExeggcuteCommand'),
		        	array('type'=>'POST','data'=> 'js:{"key": "a" }', 'success'=>'js:function(time){ scroll("left", "'.Yii::app()->user->name.'", time ); }' ), 
		        	array('class'=>'btn small_btn btn_main' , 'onclick' => 'disable('.Yii::app()->params['main_delay'].')' ));
				?>

				<?php
				echo CHtml::ajaxSubmitButton('right',Yii::app()->createUrl('site/ajaxExeggcuteCommand'),
		        	array('type'=>'POST','data'=> 'js:{"key": "d" }', 'success'=>'js:function(time){ scroll("right", "'.Yii::app()->user->name.'", time ); }' ), 
		        	array('class'=>'btn small_btn btn_main' , 'onclick' => 'disable('.Yii::app()->params['main_delay'].')' ));
				?>
			</div>

			<?php
			echo CHtml::ajaxSubmitButton('down',Yii::app()->createUrl('site/ajaxExeggcuteCommand'),
	        	array('type'=>'POST','data'=> 'js:{"key": "s" }', 'success'=>'js:function(time){ scroll("down", "'.Yii::app()->user->name.'", time ); }' ), 
	        	array('class'=>'btn small_btn btn_main' , 'onclick' => 'disable('.Yii::app()->params['main_delay'].')' ));
			?>
		</div>

		<div class="menu">
			<?php
			echo CHtml::ajaxSubmitButton('start',Yii::app()->createUrl('site/ajaxExeggcuteCommand'),
	        	array('type'=>'POST','data'=> 'js:{"key": "m" }', 'success'=>'js:function(time){ scroll("start", "'.Yii::app()->user->name.'", time ); }' ), 
	        	array('class'=>'btn small_btn btn_start' , 'onclick' => 'disable('.Yii::app()->params['start_delay'].')' ));
			?>
			
			<?php
			echo CHtml::ajaxSubmitButton('select',Yii::app()->createUrl('site/ajaxExeggcuteCommand'),
	        	array('type'=>'POST','data'=> 'js:{"key": "n" }', 'success'=>'js:function(time){ scroll("select", "'.Yii::app()->user->name.'", time ); }' ), 
	        	array('class'=>'btn small_btn btn_default' , 'onclick' => 'disable('.Yii::app()->params['default_delay'].')' ));
			?>
		</div>
	</div>

	<div class="commands">
		<ul class='scroller'>
			lalalalala
		</ul>
	</div>

  	<div class="right">
		<?php
		echo CHtml::ajaxSubmitButton('b',Yii::app()->createUrl('site/ajaxExeggcuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "x" }', 'success'=>'js:function(time){ scroll("B", "'.Yii::app()->user->name.'", time ); }' ), 
        	array('class'=>'btn small_btn btn_main' , 'onclick' => 'disable('.Yii::app()->params['main_delay'].')' ));
		?>

 		<?php echo CHtml::ajaxSubmitButton('a',Yii::app()->createUrl('site/ajaxExeggcuteCommand'),
        	  array('type'=>'POST','data'=> 'js:{"key": "z" }', 'success'=>'js:function(time){ scroll("A", "'.Yii::app()->user->name.'", time ); }' ), 
        	  array('class'=>'btn small_btn btn_main' , 'onclick' => 'disable('.Yii::app()->params['main_delay'].')' ));
		?>
  	</div>
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