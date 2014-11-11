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

    <div class="votes">
    </div>
</div>


<script>
anarchy 	= parseInt(<?php echo SystemStatus::ANARCHY ?>)
democracy 	= parseInt(<?php echo SystemStatus::DEMOCRACY ?>)
current_status = anarchy
	
	/** 
	 *	Calls the clock to run for some time as defined as in the params.
	 *	After finishining running for one 
	 */
	function startClock(){
		var currentDate = new Date();
	 	$('div#clock').countdown(<?php echo Yii::app()->params['time_per_status'] ?> + currentDate.valueOf(), function(event) {
		    $this = $(this);
			switch(event.type) {
				case "seconds":
				case "minutes" : $this.find('span#'+event.type).html(event.value); break;
			  	case "finished": startClock(); changeStatus(); break;
			}
		});
	}
    startClock();

	function changeStatus(){
		current_status = (current_status == anarchy)?democracy:anarchy
        var ajaxResponse;
		$.ajax({url: '<?php echo CController::createUrl("site/ajaxChangeStatus")  ?>',
				dataType : 'html', async: false, type: 'POST', 'success': function(response) {ajaxResponse = response; }});
        $(".modo").html(ajaxResponse);

        //Show the commands and hide the votes on anarchy mode and viceversa.
        if(current_status == anarchy){
            $(".scroller").show();
            $(".votes").hide();
        }else{
            $(".scroller").hide();
            $(".votes").show();
        }

	}

    setInterval(function(){
        if(current_status == anarchy) {
            var ajaxResponse;
            $.ajax({ url: '<?php echo CController::createUrl("site/ajaxUpdateCommands")  ?>',
                dataType: 'html', async: false, type: 'POST', 'success': function (response) { ajaxResponse = response;}
            });
            $(".scroller").html(ajaxResponse)
        }else{ //Democracy

            setInterval(function () {
                if(current_status == democracy) {
                    $.ajax({url: '<?php echo CController::createUrl("site/ajaxFinishRun")  ?>', dataType: 'html', type: 'POST'});
                }
            }, <?php echo Yii::app()->params['time_per_status']/Yii::app()->params['democracy_per_status'] ?>);
        }
	}, <?php echo Yii::app()->params['time_per_status'] ?>);



</script>