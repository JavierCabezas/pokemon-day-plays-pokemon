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
 		<?php echo CHtml::ajaxSubmitButton('a',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	  array('type'=>'POST','data'=> 'js:{"key": "z" }'), array('class'=>'btn small_btn btn_main' ));
		?>

		<?php
		echo CHtml::ajaxSubmitButton('b',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "x" }'), array('class'=>'btn small_btn btn_main' ));
		?>

		<?php
		echo CHtml::ajaxSubmitButton('L',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "l" }'), array('class'=>'btn small_btn btn_main' ));
		?>

		<?php
		echo CHtml::ajaxSubmitButton('R',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "r" }'), array('class'=>'btn small_btn btn_main' ));
		?>
		
		<?php
		echo CHtml::ajaxSubmitButton('start',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "m" }'), array('class'=>'btn small_btn btn_start' ));
		?>
		
		<?php
		echo CHtml::ajaxSubmitButton('select',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "n" }'), array('class'=>'btn small_btn btn_default' ));
		?>
	</div>
  	<div class="right">
		<?php
		echo CHtml::ajaxSubmitButton('up',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "w" }'), array('class'=>'btn small_btn btn_main' ));
		?>

		<?php
		echo CHtml::ajaxSubmitButton('down',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "s" }'), array('class'=>'btn small_btn btn_main' ));
		?>

		<?php
		echo CHtml::ajaxSubmitButton('left',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "a" }'), array('class'=>'btn small_btn btn_main' ));
		?>

		<?php
		echo CHtml::ajaxSubmitButton('right',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "d" }'), array('class'=>'btn small_btn btn_main' ));
		?>

		<?php
		echo CHtml::ajaxSubmitButton('speed',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "speed" }'), array('class'=>'btn small_btn btn_speed' ));
		?>
  	</div>
</div>

<script> 
/** 
 *	Disable all buttons for an ammount of miliseconds.
 *	It also adds the "disabled" css class to the buttons to show graphically that they are actually disabled.
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

$('.btn_speed').click(function(){
	disable(<?php echo  Yii::app()->params['speed_delay'] ?>)
});

$('.btn_main').click(function(){
	disable(<?php echo  Yii::app()->params['main_delay'] ?>)
});

$('.btn_start').click(function(){
	disable(<?php echo  Yii::app()->params['start_delay'] ?>)
});

</script>