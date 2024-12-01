$(document).ready(function() {	

	// flag variables
	incomplete_answer_MPS = 'false';
	from_timer_MPS = 'false';

	// make sure the modal close button is always in focus 
	// so you can hit return to close
	//$('#modal_MPS').on('shown.bs.modal', function () {
	//    $('#modal_close_btn_MPS').focus();
	//});

	// create scales array (in this case, will be subject to change based on user preference)
	scale_choices_MPS = [
		 'A&#9837;', 'A', 'A&#9839;',
		 'B&#9837;', 'B', 'B&#9839;',
		 'C&#9837;', 'C', 'C&#9839;',
		 'D&#9837;', 'D', 'D&#9839;',
		 'E&#9837;', 'E', 'E&#9839;',
		 'F&#9837;', 'F', 'F&#9839;',
		 'G&#9837;', 'G', 'G&#9839;'
	];

	// make modal button cyan
    // $('#modal_close_btn_MPS').addClass('btn-cyan');

	// instructions collapse button listener
	$('button#instructions_MPS_collapse_btn').click(function(){

	    // toggle the arrow up and down
	    $('#instructions_MPS_arrow').toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
	    
	});

	// timer collapse button listener
	$('button#timer_MPS_collapse_btn').click(function(){

		// toggle the arrow up and down
		$('#timer_MPS_arrow').toggleClass('glyphicon-chevron-down glyphicon-chevron-up');

		// reset the time just in case
		timer_MPS.resetStopwatch();
		
    });

	// create cookies for keeping score
	window.guesses_MPS = 0;
	window.correct_MPS = 0;
	window.wrong_MPS = 0;
	window.percentage_MPS = 0;

	reset_exercise_MPS();

}); // END document.ready function

// reset exercise button
$('#modal_close_btn_MPS').click(function () {

	// was the answer incomplete?
	// if not, reset the exercise
	// if incomplete, set flag to false before closing window
    if (incomplete_answer_MPS == 'false'){
    	reset_exercise_MPS();
    } else {
    	incomplete_answer_MPS = 'false';
    }

    // did the timer finish?
    // if so, refresh it
    // if not, let the timer continue
    if (from_timer_MPS == 'true'){
    	// reset timer
	    timer_CC.resetStopwatch();
    } else {
    	from_timer_MPS = 'false';
    }
});


$('#skip_btn_MPS').click(function(){
	reset_exercise_MPS()
});

$('#answer_btn_MPS').click(function(){

	var answer2 = scale_obj_MPS.note2;
	answer2 = decodeHtmlEntity(answer2);
	$('#note2_MPS option[value="' + answer2 + '"]').prop('selected', true);

	var answer3 = scale_obj_MPS.note3;
	answer3 = decodeHtmlEntity(answer3);
	$('#note3_MPS option[value="' + answer3 + '"]').prop('selected', true);

	var answer4 = scale_obj_MPS.note4;
	answer4 = decodeHtmlEntity(answer4);
	$('#note4_MPS option[value="' + answer4 + '"]').prop('selected', true);

	var answer5 = scale_obj_MPS.note5;
	answer5 = decodeHtmlEntity(answer5);
	$('#note5_MPS option[value="' + answer5 + '"]').prop('selected', true);

});

function reset_exercise_MPS() {

	// #1 if an option is selected, alter the scale_choises_MPS accordingly
	if ( ( $('#whiteKeysOnly_MPS').prop('checked') === false ) && ( $('#onlyHard_MPS').prop('checked') === false ) ){

		// create scales array 
		scale_choices_MPS = [
			 'A&#9837;', 'A', 'A&#9839;',
			 'B&#9837;', 'B', 'B&#9839;',
			 'C&#9837;', 'C', 'C&#9839;',
			 'D&#9837;', 'D', 'D&#9839;',
			 'E&#9837;', 'E', 'E&#9839;',
			 'F&#9837;', 'F', 'F&#9839;',
			 'G&#9837;', 'G', 'G&#9839;'
		];

		// help achieve true random -- shuffleArray() is in scripts.js
		shuffleArray(scale_choices_MPS);

	} else if ( ( $('#whiteKeysOnly_MPS').prop('checked') === true ) && ( $('#onlyHard_MPS').prop('checked') === false ) ){	

		// create scales array 
		scale_choices_MPS = [
			'A',
			'B',
			'C',
			'D',
			'E',
			'F',
			'G'
		];

		// help achieve true random -- shuffleArray() is in scripts.js
		shuffleArray(scale_choices_MPS);
		
	} else if ( ( $('#whiteKeysOnly_MPS').prop('checked') === true ) && ( $('#onlyHard_MPS').prop('checked') === true ) ){	

		// create scales array 
		scale_choices_MPS = [
			'B',
			'C',
			'F',
			'G',
		];

		// help achieve true random -- shuffleArray() is in scripts.js
		shuffleArray(scale_choices_MPS);
		
	} else if ( ( $('#whiteKeysOnly_MPS').prop('checked') === false ) && ( $('#onlyHard_MPS').prop('checked') === true ) ){

		// create scales array 
		scale_choices_MPS = [
			 'B&#9837;', 'B', 'B&#9839;',
			 'C&#9837;', 'C', 'C&#9839;',
			 'F&#9837;', 'F', 'F&#9839;',
			 'G&#9837;', 'G', 'G&#9839;'
		];

		// help achieve true random -- shuffleArray() is in scripts.js
		shuffleArray(scale_choices_MPS);
		
	}	


	// #2
	select_scale_MPS();

	$('h1#selected_scale_MPS').html(selected_scale_MPS + 'm');

	// place first note in 1st select to save user time
	set_first_note_MPS();

	// makes sure rest of select elements are reset to label
	$('#note2_label_MPS').prop("selected", true);
	$('#note3_label_MPS').prop("selected", true);
	$('#note4_label_MPS').prop("selected", true);
	$('#note5_label_MPS').prop("selected", true);

	// #3
	// create chord object
	create_scale_obj_MPS();

	// #4
	// take care of scoring
	window.guesses_MPS = window.correct_MPS + window.wrong_MPS;

	// dividing by 0 produces a NaN so write a test
	if (window.guesses_MPS !== 0) {
		window.percentage_MPS = ((window.correct_MPS / window.guesses_MPS) * 100);
		window.percentage_MPS = roundToTwo(window.percentage_MPS);
	} else {
		window.percentage_MPS = 0;
	}

	$('p.score_MPS span#correct_MPS').html(window.correct_MPS);
	$('p.score_MPS span#guesses_MPS').html(window.guesses_MPS);
	$('p.score_MPS span#percentage_MPS').html(window.percentage_MPS);

	/*
	console.log(window.correct_MPS +' total correct so far.');
	console.log(window.guesses_MPS +' total guess so far.');
	console.log(window.percentage_MPS +' percentage so far.');
	*/
}

// click of submit button evaluate answer (look below for function)
$('#submit_btn_MPS').click(function(){

	evaluate_answer_MPS()
});

function select_scale_MPS() {
	// create an index of these 21 scales (starting at 0)
	var i = scale_choices_MPS.length - 1; 
	// console.log(scale_choices_MPS[i]);

	// pick a random index
	var random_i = Math.round(Math.random() * i);

	// use it to pick an array element (chord)
	// make that element a string
	// NOTE: since "selected_scale_MPS" is NOT delclared (with a preceeding "var")
	// it is global in scope
	return selected_scale_MPS = scale_choices_MPS[random_i].toString();
}

function set_first_note_MPS() {
	// remove "Select note" label
	//$('#note1_label_MPS').removeAttr("selected");

	// this is for safari
	// make all select options UNselected
	// '>' refers to 'children of'
	$('#note1_MPS > option').removeAttr("selected");
	$('#note2_MPS > option').removeAttr("selected");
	$('#note3_MPS > option').removeAttr("selected");
	$('#note4_MPS > option').removeAttr("selected");
	$('#note5_MPS > option').removeAttr("selected");

	// now, decode the html characters
	// weird I know, Select converts value to non-html before my comparison
	var y = selected_scale_MPS;
	y = decodeHtmlEntity(y);
	// console.log(y + ' is the html character.')

	// cool shit
	var x = '#note1_MPS option[value="' + y + '"]';
	// console.log(x + ' is the element.')
	$(x).prop('selected', true); // // .attr() would be .attr('selected');
}

function create_scale_obj_MPS() {

	// NOTE: that since the object is NOT delclared with a "var" it is global
	// if there was a var before it, it would only exist in this function
	scale_obj_MPS = new Object(selected_scale_MPS); 

	switch(selected_scale_MPS) {

	    case 'A&#9837;':
	        scale_obj_MPS.note1 = 'A&#9837;';
	        scale_obj_MPS.note2 = 'C&#9837;';
	        scale_obj_MPS.note3 = 'D&#9837;';
	        scale_obj_MPS.note4 = 'E&#9837;';
	        scale_obj_MPS.note5 = 'G&#9837;';
	        break;

	    case 'A':
	        scale_obj_MPS.note1 = 'A';
	        scale_obj_MPS.note2 = 'C';
	        scale_obj_MPS.note3 = 'D';
	        scale_obj_MPS.note4 = 'E';
	        scale_obj_MPS.note5 = 'G';
	        break;

	    case 'A&#9839;':
	        scale_obj_MPS.note1 = 'A&#9839;';
	        scale_obj_MPS.note2 = 'C&#9839;';
	        scale_obj_MPS.note3 = 'D&#9839;';
	        scale_obj_MPS.note4 = 'E&#9839;';
	        scale_obj_MPS.note5 = 'G&#9839;';
	        break;

	    case 'B&#9837;':
	        scale_obj_MPS.note1 = 'B&#9837;';
	        scale_obj_MPS.note2 = 'D&#9837;';
	        scale_obj_MPS.note3 = 'E&#9837;';
	        scale_obj_MPS.note4 = 'F';
	        scale_obj_MPS.note5 = 'A&#9837;';
	        break;

	    case 'B':
	        scale_obj_MPS.note1 = 'B';
	        scale_obj_MPS.note2 = 'D';
	        scale_obj_MPS.note3 = 'E';
	        scale_obj_MPS.note4 = 'F&#9839;';
	        scale_obj_MPS.note5 = 'A';
	        break;

	    case 'B&#9839;':
	        scale_obj_MPS.note1 = 'B&#9839;';
	        scale_obj_MPS.note2 = 'D&#9839;';
	        scale_obj_MPS.note3 = 'E&#9839;';
	        scale_obj_MPS.note4 = 'F&#9839;&#9839;';
	        scale_obj_MPS.note5 = 'A&#9839;';
	        break;

	    case 'C&#9837;':
	        scale_obj_MPS.note1 = 'C&#9837;';
	        scale_obj_MPS.note2 = 'E&#9837;&#9837;';
	        scale_obj_MPS.note3 = 'F&#9837;';
	        scale_obj_MPS.note4 = 'G&#9837;';
	        scale_obj_MPS.note5 = 'B&#9837;&#9837;';
	        break;

	    case 'C':
	        scale_obj_MPS.note1 = 'C';
	        scale_obj_MPS.note2 = 'E&#9837;';
	        scale_obj_MPS.note3 = 'F';
	        scale_obj_MPS.note4 = 'G';
	        scale_obj_MPS.note5 = 'B&#9837;';
	        break;

	    case 'C&#9839;':
	        scale_obj_MPS.note1 = 'C&#9839;';
	        scale_obj_MPS.note2 = 'E';
	        scale_obj_MPS.note3 = 'F&#9839;';
	        scale_obj_MPS.note4 = 'G&#9839;';
	        scale_obj_MPS.note5 = 'B';
	        break;

	    case 'D&#9837;':
	        scale_obj_MPS.note1 = 'D&#9837;';
	        scale_obj_MPS.note2 = 'F&#9837;';
	        scale_obj_MPS.note3 = 'G&#9837;';
	        scale_obj_MPS.note4 = 'A&#9837;';
	        scale_obj_MPS.note5 = 'C&#9837;';
	        break;

	    case 'D':
	        scale_obj_MPS.note1 = 'D';
	        scale_obj_MPS.note2 = 'F';
	        scale_obj_MPS.note3 = 'G';
	        scale_obj_MPS.note4 = 'A';
	        scale_obj_MPS.note5 = 'C';
	        break;

	    case 'D&#9839;':
	        scale_obj_MPS.note1 = 'D&#9839;';
	        scale_obj_MPS.note2 = 'F&#9839;';
	        scale_obj_MPS.note3 = 'G&#9839;';
	        scale_obj_MPS.note4 = 'A&#9839;';
	        scale_obj_MPS.note5 = 'C&#9839;';
	        break;

	    case 'E&#9837;':
	        scale_obj_MPS.note1 = 'E&#9837;';
	        scale_obj_MPS.note2 = 'G&#9837;';
	        scale_obj_MPS.note3 = 'A&#9837;';
	        scale_obj_MPS.note4 = 'B&#9837;';
	        scale_obj_MPS.note5 = 'D&#9837;';
	        break;

	    case 'E':
	        scale_obj_MPS.note1 = 'E';
	        scale_obj_MPS.note2 = 'G';
	        scale_obj_MPS.note3 = 'A';
	        scale_obj_MPS.note4 = 'B';
	        scale_obj_MPS.note5 = 'D';
	        break;

	    case 'E&#9839;':
	        scale_obj_MPS.note1 = 'E&#9839;';
	        scale_obj_MPS.note2 = 'G&#9839;';
	        scale_obj_MPS.note3 = 'A&#9839;';
	        scale_obj_MPS.note4 = 'B&#9839;';
	        scale_obj_MPS.note5 = 'D&#9839;';
	        break;

	    case 'F&#9837;':
	        scale_obj_MPS.note1 = 'F&#9837;';
	        scale_obj_MPS.note2 = 'A&#9837;&#9837;';
	        scale_obj_MPS.note3 = 'B&#9837;&#9837;';
	        scale_obj_MPS.note4 = 'C&#9837;';
	        scale_obj_MPS.note5 = 'E&#9837;&#9837;';
	        break;

	    case 'F':
	        scale_obj_MPS.note1 = 'F';
	        scale_obj_MPS.note2 = 'A&#9837;';
	        scale_obj_MPS.note3 = 'B&#9837;';
	        scale_obj_MPS.note4 = 'C';
	        scale_obj_MPS.note5 = 'E&#9837;';
	        break;

	    case 'F&#9839;':
	        scale_obj_MPS.note1 = 'F&#9839;';
	        scale_obj_MPS.note2 = 'A';
	        scale_obj_MPS.note3 = 'B';
	        scale_obj_MPS.note4 = 'C&#9839;';
	        scale_obj_MPS.note5 = 'E';
	        break;

	    case 'G&#9837;':
	        scale_obj_MPS.note1 = 'G&#9837;';
	        scale_obj_MPS.note2 = 'B&#9837;&#9837;';
	        scale_obj_MPS.note3 = 'C&#9837;';
	        scale_obj_MPS.note4 = 'D&#9837;';
	        scale_obj_MPS.note5 = 'F&#9837;';
	        break;

	    case 'G':
	        scale_obj_MPS.note1 = 'G';
	        scale_obj_MPS.note2 = 'B&#9837;';
	        scale_obj_MPS.note3 = 'C';
	        scale_obj_MPS.note4 = 'D';
	        scale_obj_MPS.note5 = 'F';
	        break;

	    case 'G&#9839;':
	        scale_obj_MPS.note1 = 'G&#9839;';
	        scale_obj_MPS.note2 = 'B';
	        scale_obj_MPS.note3 = 'C&#9839;';
	        scale_obj_MPS.note4 = 'D&#9839;';
	        scale_obj_MPS.note5 = 'F&#9839;';
	        break;
    }
}

function evaluate_answer_MPS() {

	var guess_note1_MPS = $("#note1_MPS option:selected").text();
	var guess_note2_MPS = $("#note2_MPS option:selected").text();
	var guess_note3_MPS = $("#note3_MPS option:selected").text();
	var guess_note4_MPS = $("#note4_MPS option:selected").text();
	var guess_note5_MPS = $("#note5_MPS option:selected").text();

	// weird, but you have to decode the html entity
	scale_obj_MPS.note1 = decodeHtmlEntity(scale_obj_MPS.note1);
	scale_obj_MPS.note2 = decodeHtmlEntity(scale_obj_MPS.note2);
	scale_obj_MPS.note3 = decodeHtmlEntity(scale_obj_MPS.note3);
	scale_obj_MPS.note4 = decodeHtmlEntity(scale_obj_MPS.note4);
	scale_obj_MPS.note5 = decodeHtmlEntity(scale_obj_MPS.note5);

	// console.log (guess_note1_MPS + ' was the first note selected');
	// console.log (guess_note2_MPS + ' was the 2nd note selected');
	// console.log (guess_note3_MPS + ' was the 3nd note selected');
	// console.log (guess_note4_MPS + ' was the 3nd note selected');
	// console.log (guess_note5_MPS + ' was the 3nd note selected');

	// console.log (scale_obj_MPS.note1 + ' is the first note');
	// console.log (scale_obj_MPS.note2 + ' is the second note');
	// console.log (scale_obj_MPS.note3 + ' is the third note');
	// console.log (scale_obj_MPS.note4 + ' is the third note');
	// console.log (scale_obj_MPS.note5 + ' is the third note');


	// show modal
	$('#modal_MPS').modal({
            backdrop: 'static', // makes it so you can't click outside modal to close
            keyboard: false // makes it so you can't press 'esc' to close modal
    });

	if ( guess_note1_MPS === '--' || guess_note2_MPS === '--' || guess_note3_MPS === '--' || guess_note4_MPS === '--' || guess_note5_MPS === '--' ) {
		$('#modal_header_MPS').css( "background-color", "red" );
		$('#modal_title_MPS').html('<span class="glyphicon glyphicon-remove"></span> Error');
		$('#modal_body_MPS').html('Please make sure to choose all 5 notes in the ' + selected_scale_MPS + 'm pentatonic scale');
		incomplete_answer_MPS = 'true';	
	} else if ( (guess_note1_MPS == scale_obj_MPS.note1) && (guess_note2_MPS == scale_obj_MPS.note2) && (guess_note3_MPS == scale_obj_MPS.note3) && (guess_note4_MPS == scale_obj_MPS.note4) && (guess_note5_MPS == scale_obj_MPS.note5) ) {
		$('#modal_header_MPS').css( "background-color", "green");
		$('#modal_title_MPS').html('<span class="glyphicon glyphicon-ok"></span> Good Job');
		$('#modal_body_MPS').html(selected_scale_MPS + 'm pentatonic scale consists of: ' + guess_note1_MPS + ' ' + guess_note2_MPS + ' ' + guess_note3_MPS + ' ' + guess_note4_MPS + ' ' + guess_note5_MPS);
		window.correct_MPS++;
	} else {
		$('#modal_header_MPS').css( "background-color", "red" );
		$('#modal_title_MPS').html('<span class="glyphicon glyphicon-remove"></span> Incorrect');
		$('#modal_body_MPS').html(selected_scale_MPS + 'm pentatonic scale<br />Correct answer: ' + scale_obj_MPS.note1 + ' ' + scale_obj_MPS.note2 + ' ' + scale_obj_MPS.note3  + ' ' + scale_obj_MPS.note4 + ' ' + scale_obj_MPS.note5 + '.<br/> Your answer was: ' + guess_note1_MPS + ' ' + guess_note2_MPS + ' ' + guess_note3_MPS + ' ' + guess_note4_MPS + ' ' + guess_note5_MPS );
		window.wrong_MPS++;
	}
}

// timer buttons
$('#timer_MPS_play_btn').click(function(){
    timer_MPS.Timer.play();
});

$('#timer_MPS_pause_btn').click(function(){
    timer_MPS.Timer.stop();
});

$('#timer_MPS_reset_btn').click(function(){
    timer_MPS.resetStopwatch();
});

var timer_MPS = new (function() {
    var $stopwatch_MPS; // Stopwatch element on the page
        incrementTime_MPS = 70; // Timer speed in milliseconds
        currentTime_MPS = 0; // Current time in hundredths of a second
        timer_MPS_duration_label = ''

        updateTimer_MPS = function() {
            $stopwatch_MPS.html(formatTime(currentTime_MPS)); // displays time
            currentTime_MPS += incrementTime_MPS / 10;

            // get user selected timer duration
            timer_MPS_duration = $('#timer_MPS_duration').val();

            if (currentTime_MPS >= timer_MPS_duration) {
                timer_MPS.Timer.stop();

                // round up timer display
                // send modal the timer duration
                switch(timer_MPS_duration) {
                    case ('60000'):
                        $stopwatch_MPS.html('05:00:00');
                        timer_MPS_duration_label = '10 minutes'; 
                        break;

                    case ('48000'):
                        $stopwatch_MPS.html('04:00:00');
                        timer_MPS_duration_label = '8 minutes'; 
                        break;

                    case ('36000'):
                        $stopwatch_MPS.html('04:00:00');
                        timer_MPS_duration_label = '6 minutes'; 
                        break;

                    case ('24000'):
                        $stopwatch_MPS.html('04:00:00');
                        timer_MPS_duration_label = '4 minutes'; 
                        break;

                    case ('12000'):
                        $stopwatch_MPS.html('02:00:00'); 
                        timer_MPS_duration_label = '2 minutes'; 
                        break;

                    case ('100'):
                        $stopwatch_MPS.html('00:01:00'); 
                        timer_MPS_duration_label = '1 second';
                        break;
                }
                
                /*
                Good reference for controling audio with jQuery
                http://codesamplez.com/programming/control-html5-audio-with-jquery
                */
                $('#bell_ring').trigger('play');

                // open modal - simpler: .modal('show')
                $('#modal_MPS').modal({
		            backdrop: 'static', // makes it so you can'no't click outside modal to close
		            keyboard: false // makes it so you can't press 'esc' to close modal
			    });

			    // edit text in modal
				$('#modal_header_MPS').css( "background-color", "#0F76AD");
				$('#modal_title_MPS').html('<span class="glyphicon glyphicon-hourglass"></span> Timer expired');
				$('#modal_body_MPS').html('<p>Congratulations, you have completed ' + timer_MPS_duration_label + ' of the Minor Pentatonic Scales exercise.</p>');

				// set flag that we are originating from timer stop
				from_timer_MPS = 'true';
            }
        };
        init = function() {
            $stopwatch_MPS = $('#stopwatch_MPS');
            timer_MPS.Timer = $.timer(updateTimer_MPS, incrementTime_MPS, false);
        };

    this.resetStopwatch = function() {
        currentTime_MPS = 0;
        this.Timer.stop().once();
    };

    $(init);
});
/** END jQuery Timer **/