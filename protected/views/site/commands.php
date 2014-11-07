<div class='timer'>
	<h2> Modo: <span class='modo'> </span> </h2>

<div id="clock">
  <p>
    <span id="minutes"></span>
    Minutes
  </p>
  <div class="space">:</div>
  <p>
    <span id="seconds"></span>
    Seconds
  </p>
</div>
</div>

<div class='commands'>
	<ul class='scroller'>
	</ul>
</div>


<script>
anarchy 	= true;
democracy 	= false;


current_status = anarchy
	
	/** 
	 *	Calls the clock to run for some time as defined as in the params.
	 *	After finishining running for one 
	 */
	function startClock(){
		var currentDate = new Date();
	 	$('div#clock').countdown(30*100*2 + currentDate.valueOf(), function(event) {
		    $this = $(this);
			switch(event.type) {
				case "seconds":
				case "minutes" : $this.find('span#'+event.type).html(event.value); break;
			  	case "finished": startClock(); changeStatus(); break;
			}
		});
	}

	function changeStatus(){
		current_status = !current_status;
		$(".modo").html('<?php $m = new SystemStatus(); echo $m->status_words() ?>');
		alert('<?php $m = new SystemStatus(); echo $m->status_words() ?>');
		$.ajax({
				url: '<?php echo CController::createUrl("site/ajaxChangeStatus")  ?>',
				dataType : 'html',
				async: false, 
				type: 'POST',
				'success': function(response) {
					ajaxResponse = response;
				},
		});
	}

	startClock();

	if(current_status == anarchy){
		setInterval(function(){
			var ajaxResponse;
			$.ajax({
				url: '<?php echo CController::createUrl("site/ajaxUpdateCommands")  ?>',
				dataType : 'html',
				async: false, 
				type: 'POST',
				'success': function(response) {
					ajaxResponse = response;
				},
			});
			$(".scroller").html(ajaxResponse);
		}, 3000);
	}else{
		$(".scroller").html("");
	}
</script>