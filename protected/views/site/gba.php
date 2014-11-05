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
 	
 		<?php
		echo CHtml::ajaxSubmitButton('a',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "z" }'), array('class'=>'small_btn' ));
		?>

		<?php
		echo CHtml::ajaxSubmitButton('b',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "x" }'), array('class'=>'small_btn' ));
		?>

		<?php
		echo CHtml::ajaxSubmitButton('L',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "l" }'), array('class'=>'small_btn' ));
		?>

		<?php
		echo CHtml::ajaxSubmitButton('R',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "r" }'), array('class'=>'small_btn' ));
		?>
		
		<?php
		echo CHtml::ajaxSubmitButton('start',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "m" }'), array('class'=>'small_btn' ));
		?>
		
		<?php
		echo CHtml::ajaxSubmitButton('select',Yii::app()->createUrl('site/ajaxExcecuteCommand'),
        	array('type'=>'POST','data'=> 'js:{"key": "n" }'), array('class'=>'small_btn' ));
		?>

	</div>
  	<div class="right">
		<p class="button" id="s"> v </p>
		<p> &nbsp; </p>
		<p class="button" id="w"> ^ </p>
		<p> &nbsp; </p>
		<p class="button" id="a"> -> </p>
		<p> &nbsp; </p>
		<p class="button" id="d"> <- </p>
		<p> &nbsp; </p>
		<p class="button" id="speed"> Speed </p>
  	</div>
</div>




<script>
/**
 *	Does an ajax call 
 */
function ajaxCallKey(key){
	var ajaxResponse;
	 $.ajax({
	    	url: '<?php echo $this->createAbsoluteUrl("ajaxExcecuteCommand") ?>',
	    	dataType : 'html',
	    	async: false, 
	    	type: 'POST',
	    	data: 
	    	{
	    		key: key
	    	},
	    	'success': function(response) {
				ajaxResponse = response;
	    	},
	});
	return ajaxResponse;
}


$(".button").click(function(){
	key = this.id;
	ajaxCallKey(key)
});	
</script>