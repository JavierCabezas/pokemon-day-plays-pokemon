<div class="content">
 	<div class="left">
		<p class="button" id="z"> a </p>
		<p> &nbsp; </p>
		<p class="button" id="x"> b </p>
		<p> &nbsp; </p>
		<p class="button" id="l"> L </p>
		<p> &nbsp; </p>
		<p class="button" id="r"> R </p>
		<p> &nbsp; </p>
		<p class="button" id="m"> start </p>
		<p> &nbsp; </p>
		<p class="button" id="n"> select </p>
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