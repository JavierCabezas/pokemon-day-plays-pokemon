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
<div class="content">
 	<div class="left"> 	
 		<?php echo CHtml::ajaxSubmitButton('a',Yii::app()->createUrl('site/ajaxExeggcuteCommand'),
        	  array('type'=>'POST','data'=> 'js:{"key": "z" }', 'success'=>'js:function(time){ scroll("A", "'.Yii::app()->user->name.'", time ); }' ), 
        	  array('class'=>'btn small_btn btn_main' , 'onclick' => 'disable('.Yii::app()->params['main_delay'].')' ));
		?>

		<?php
		echo CHtml::ajaxSubmitButton('b',Yii::app()->createUrl('site/ajaxExeggcuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "x" }', 'success'=>'js:function(time){ scroll("B", "'.Yii::app()->user->name.'", time ); }' ), 
        	array('class'=>'btn small_btn btn_main' , 'onclick' => 'disable('.Yii::app()->params['main_delay'].')' ));
		?>

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
  	<div class="right">
		<?php
		echo CHtml::ajaxSubmitButton('up',Yii::app()->createUrl('site/ajaxExeggcuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "w" }', 'success'=>'js:function(time){ scroll("up", "'.Yii::app()->user->name.'", time ); }' ), 
        	array('class'=>'btn small_btn btn_main' , 'onclick' => 'disable('.Yii::app()->params['main_delay'].')' ));
		?>

		<?php
		echo CHtml::ajaxSubmitButton('down',Yii::app()->createUrl('site/ajaxExeggcuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "s" }', 'success'=>'js:function(time){ scroll("down", "'.Yii::app()->user->name.'", time ); }' ), 
        	array('class'=>'btn small_btn btn_main' , 'onclick' => 'disable('.Yii::app()->params['main_delay'].')' ));
		?>

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

		<?php
		echo CHtml::ajaxSubmitButton('speed',Yii::app()->createUrl('site/ajaxExeggcuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "speed" }', 'success'=>'js:function(time){ scroll("speed", "'.Yii::app()->user->name.'", time ); }' ), 
        	array('class'=>'btn small_btn btn_speed', 'onclick' => 'disable('.Yii::app()->params['speed_delay'].')' ));
		?>
  	</div>
</div>

<script> 
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