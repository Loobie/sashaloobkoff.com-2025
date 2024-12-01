$(document).ready(function() {	

	// flag variables
	incomplete_answer_MS = 'false';
	from_timer_MS = 'false';

	// make sure the modal close button is always in focus 
	// so you can hit return to close
	// $('#modal_MS').on('shown.bs.modal', function () {
	//     $('#modal_close_btn_MS').focus();
	// });

	// make modal button orange
    // $('#modal_close_btn_MS').addClass('btn-orange');

	// instructions collapse button listener
	$('button#instructions_MS_collapse_btn').click(function(){

	    // toggle the arrow up and down
	    $('#instructions_MS_arrow').toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
	    
	});

	// timer collapse button listener
	$('button#timer_MS_collapse_btn').click(function(){

		// toggle the arrow up and down
		$('#timer_MS_arrow').toggleClass('glyphicon-chevron-down glyphicon-chevron-up');

		// reset the time just in case
		timer_MS.resetStopwatch();
		
    });

	// create cookies for keeping score
	window.guesses_MS = 0;
	window.correct_MS = 0;
	window.wrong_MS = 0;
	window.percentage_MS = 0;

	// create scales array 
	scale_choices_MS = [
		 'A&#9837;', 'A',
		 'B&#9837;', 'B',
		 'C&#9837;', 'C',
		 'D&#9837;', 'D',
		 'E&#9837;', 'E',
		 'F', 'F&#9839;',
		 'G&#9837;', 'G',
	];

	reset_exercise_MS();

}); // END document.ready function

// reset exercise button
$('#modal_close_btn_MS').click(function () {

	// was the answer incomplete?
	// if not, reset the exercise
	// if incomplete, set flag to false before closing window
    if (incomplete_answer_MS == 'false'){
    	reset_exercise_MS();
    } else {
    	incomplete_answer_MS = 'false';
    }

    // did the timer finish?
    // if so, refresh it
    // if not, let the timer continue
    if (from_timer_MS == 'true'){
    	// reset timer
	    timer_CC.resetStopwatch();
    } else {
    	from_timer_MS = 'false';
    }
});

$('#skip_btn_MS').click(function(){
	reset_exercise_MS()
});

$('#answer_btn_MS').click(function(){

	var answer2 = scale_obj_MS.note2;
	answer2 = decodeHtmlEntity(answer2);
	$('#note2_MS option[value="' + answer2 + '"]').prop('selected', true);

	var answer3 = scale_obj_MS.note3;
	answer3 = decodeHtmlEntity(answer3);
	$('#note3_MS option[value="' + answer3 + '"]').prop('selected', true);

	var answer4 = scale_obj_MS.note4;
	answer4 = decodeHtmlEntity(answer4);
	$('#note4_MS option[value="' + answer4 + '"]').prop('selected', true);

	var answer5 = scale_obj_MS.note5;
	answer5 = decodeHtmlEntity(answer5);
	$('#note5_MS option[value="' + answer5 + '"]').prop('selected', true);

	var answer6 = scale_obj_MS.note6;
	answer6 = decodeHtmlEntity(answer6);
	$('#note6_MS option[value="' + answer6 + '"]').prop('selected', true);

	var answer7 = scale_obj_MS.note7;
	answer7 = decodeHtmlEntity(answer7);
	$('#note7_MS option[value="' + answer7 + '"]').prop('selected', true);

});

function reset_exercise_MS() {

	// #1
	select_scale_MS();

	$('h1#selected_scale_MS').html(selected_scale_MS);

	// place first note in 1st select to save user time
	set_first_note_MS();

	// makes sure rest of select elements are reset to label
	$('#note2_label_MS').prop("selected", true);
	$('#note3_label_MS').prop("selected", true);
	$('#note4_label_MS').prop("selected", true);
	$('#note5_label_MS').prop("selected", true);
	$('#note6_label_MS').prop("selected", true);
	$('#note7_label_MS').prop("selected", true);

	// #2
	// create chord object
	create_scale_obj_MS();

	// #3
	// take care of scoring
	window.guesses_MS = window.correct_MS + window.wrong_MS;

	// dividing by 0 produces a NaN so write a test
	if (window.guesses_MS !== 0) {
		window.percentage_MS = ((window.correct_MS / window.guesses_MS) * 100);
		window.percentage_MS = roundToTwo(window.percentage_MS);
	} else {
		window.percentage_MS = 0;
	}

	$('p.score_MS span#correct_MS').html(window.correct_MS);
	$('p.score_MS span#guesses_MS').html(window.guesses_MS);
	$('p.score_MS span#percentage_MS').html(window.percentage_MS);

	/*
	console.log(window.correct_MS +' total correct so far.');
	console.log(window.guesses_MS +' total guess so far.');
	console.log(window.percentage_MS +' percentage so far.');
	*/
}

// click of submit button evaluate answer (look below for function)
$('#submit_btn_MS').click(function(){

	evaluate_answer_MS()
});

function select_scale_MS() {
	// create an index of these 21 scales (starting at 0)
	var i = scale_choices_MS.length - 1; 
	// console.log(scale_choices_MS[i]);

	// pick a random index
	var random_i = Math.round(Math.random() * i);


	// help achieve true random -- shuffleArray() is in scripts.js
	//shuffleArray(scale_choices_MS);

	// use it to pick an array element (chord)
	// make that element a string
	// NOTE: since "selected_scale_MS" is NOT delclared (with a preceeding "var")
	// it is global in scope
	return selected_scale_MS = scale_choices_MS[random_i].toString();
}

function set_first_note_MS() {

	// this is for safari
	// make all select options UNselected
	// '>' refers to 'children of'
	$('#note1_MS > option').removeAttr("selected");
	$('#note2_MS > option').removeAttr("selected");
	$('#note3_MS > option').removeAttr("selected");
	$('#note4_MS > option').removeAttr("selected");
	$('#note5_MS > option').removeAttr("selected");
	$('#note6_MS > option').removeAttr("selected");
	$('#note7_MS > option').removeAttr("selected");

	// now, decode the html characters
	// weird I know, Select converts value to non-html before my comparison
	var y = selected_scale_MS;
	y = decodeHtmlEntity(y);
	// console.log(y + ' is the html character.')

	// cool shit
	var x = '#note1_MS option[value="' + y + '"]';
	// console.log(x + ' is the element.')
	$(x).prop('selected', true); // // .attr() would be .attr('selected');
}

function create_scale_obj_MS() {

	// NOTE: that since the object is NOT delclared with a "var" it is global
	// if there was a var before it, it would only exist in this function
	scale_obj_MS = new Object(selected_scale_MS); 

	switch(selected_scale_MS) {

	    case 'A&#9837;':
	        scale_obj_MS.desc = 'The A&#9837; scale has 4 &#9837;s'
	        scale_obj_MS.note1 = 'A&#9837;';
	        scale_obj_MS.note2 = 'B&#9837;';
	        scale_obj_MS.note3 = 'C';
	        scale_obj_MS.note4 = 'D&#9837;';
	        scale_obj_MS.note5 = 'E&#9837;';
	        scale_obj_MS.note6 = 'F';
	        scale_obj_MS.note7 = 'G';
	        break;

	    case 'A':
	        scale_obj_MS.desc = 'The A scale has 3 &#9839;s'
	        scale_obj_MS.note1 = 'A';
	        scale_obj_MS.note2 = 'B';
	        scale_obj_MS.note3 = 'C&#9839;';
	        scale_obj_MS.note4 = 'D';
	        scale_obj_MS.note5 = 'E';
	        scale_obj_MS.note6 = 'F&#9839;';
	        scale_obj_MS.note7 = 'G&#9839;';
	        break;

	    case 'B&#9837;':
	        scale_obj_MS.desc = 'The B&#9837; scale has 2 &#9837;s'
	        scale_obj_MS.note1 = 'B&#9837;';
	        scale_obj_MS.note2 = 'C';
	        scale_obj_MS.note3 = 'D';
	        scale_obj_MS.note4 = 'E&#9837;';
	        scale_obj_MS.note5 = 'F';
	        scale_obj_MS.note6 = 'G';
	        scale_obj_MS.note7 = 'A';
	        break;

	    case 'B':
	        scale_obj_MS.desc = 'The B scale has 5 &#9839;s'
	        scale_obj_MS.note1 = 'B';
	        scale_obj_MS.note2 = 'C&#9839;';
	        scale_obj_MS.note3 = 'D&#9839;';
	        scale_obj_MS.note4 = 'E';
	        scale_obj_MS.note5 = 'F&#9839;';
	        scale_obj_MS.note6 = 'G&#9839;';
	        scale_obj_MS.note7 = 'A&#9839;';
	        break;

	    case 'C&#9837;':
	        scale_obj_MS.desc = 'The C&#9837; scale has 7 &#9837;s'
	        scale_obj_MS.note1 = 'C&#9837;';
	        scale_obj_MS.note2 = 'D&#9837;';
	        scale_obj_MS.note3 = 'E&#9837;';
	        scale_obj_MS.note4 = 'F&#9837;';
	        scale_obj_MS.note5 = 'G&#9837;';
	        scale_obj_MS.note6 = 'A&#9837;';
	        scale_obj_MS.note7 = 'B&#9837;';
	        break;

	    case 'C':
	        scale_obj_MS.desc = 'The C scale has no &#9839;s or &#9837;s'
	        scale_obj_MS.note1 = 'C';
	        scale_obj_MS.note2 = 'D';
	        scale_obj_MS.note3 = 'E';
	        scale_obj_MS.note4 = 'F';
	        scale_obj_MS.note5 = 'G';
	        scale_obj_MS.note6 = 'A';
	        scale_obj_MS.note7 = 'B';
	        break;

	    case 'C&#9839;':
	        scale_obj_MS.desc = 'The C&#9839; scale has 7 &#9839;s'
	        scale_obj_MS.note1 = 'C&#9839;';
	        scale_obj_MS.note2 = 'D&#9839;';
	        scale_obj_MS.note3 = 'E&#9839;';
	        scale_obj_MS.note4 = 'F&#9839;';
	        scale_obj_MS.note5 = 'G&#9839;';
	        scale_obj_MS.note6 = 'A&#9839;';
	        scale_obj_MS.note7 = 'B&#9839;';
	        break;

	    case 'D&#9837;':
	        scale_obj_MS.desc = 'The D&#9837; scale has 5 &#9837;s'
	        scale_obj_MS.note1 = 'D&#9837;';
	        scale_obj_MS.note2 = 'E&#9837;';
	        scale_obj_MS.note3 = 'F';
	        scale_obj_MS.note4 = 'G&#9837;';
	        scale_obj_MS.note5 = 'A&#9837;';
	        scale_obj_MS.note6 = 'B&#9837;';
	        scale_obj_MS.note7 = 'C';
	        break;

	    case 'D':
	        scale_obj_MS.desc = 'The D scale has 2 &#9839;s'
	        scale_obj_MS.note1 = 'D';
	        scale_obj_MS.note2 = 'E';
	        scale_obj_MS.note3 = 'F&#9839;';
	        scale_obj_MS.note4 = 'G';
	        scale_obj_MS.note5 = 'A';
	        scale_obj_MS.note6 = 'B';
	        scale_obj_MS.note7 = 'C&#9839;';
	        break;

	    case 'E&#9837;':
	        scale_obj_MS.desc = 'The E&#9837; scale has 3 &#9837;s'
	        scale_obj_MS.note1 = 'E&#9837;';
	        scale_obj_MS.note2 = 'F';
	        scale_obj_MS.note3 = 'G';
	        scale_obj_MS.note4 = 'A&#9837;';
	        scale_obj_MS.note5 = 'B&#9837;';
	        scale_obj_MS.note6 = 'C';
	        scale_obj_MS.note7 = 'D';
	        break;

	    case 'E':
	        scale_obj_MS.desc = 'The E scale has 4 &#9839;s'
	        scale_obj_MS.note1 = 'E';
	        scale_obj_MS.note2 = 'F&#9839;';
	        scale_obj_MS.note3 = 'G&#9839;';
	        scale_obj_MS.note4 = 'A';
	        scale_obj_MS.note5 = 'B';
	        scale_obj_MS.note6 = 'C&#9839;';
	        scale_obj_MS.note7 = 'D&#9839;';
	        break;

	    case 'F':
	        scale_obj_MS.desc = 'The F scale has 1 &#9837;'
	        scale_obj_MS.note1 = 'F';
	        scale_obj_MS.note2 = 'G';
	        scale_obj_MS.note3 = 'A';
	        scale_obj_MS.note4 = 'B&#9837;';
	        scale_obj_MS.note5 = 'C';
	        scale_obj_MS.note6 = 'D';
	        scale_obj_MS.note7 = 'E';
	        break;

	    case 'F&#9839;':
	        scale_obj_MS.desc = 'The F&#9839; scale has 6 &#9839;s'
	        scale_obj_MS.note1 = 'F&#9839;';
	        scale_obj_MS.note2 = 'G&#9839;';
	        scale_obj_MS.note3 = 'A&#9839;';
	        scale_obj_MS.note4 = 'B';
	        scale_obj_MS.note5 = 'C&#9839;';
	        scale_obj_MS.note6 = 'D&#9839;';
	        scale_obj_MS.note7 = 'E&#9839;';
	        break;

	    case 'G&#9837;':
	        scale_obj_MS.desc = 'The G&#9837; scale has 6 &#9837;s'
	        scale_obj_MS.note1 = 'G&#9837;';
	        scale_obj_MS.note2 = 'A&#9837;';
	        scale_obj_MS.note3 = 'B&#9837;';
	        scale_obj_MS.note4 = 'C&#9837;';
	        scale_obj_MS.note5 = 'D&#9837;';
	        scale_obj_MS.note6 = 'E&#9837;';
	        scale_obj_MS.note7 = 'F';
	        break;

	    case 'G':
	        scale_obj_MS.desc = 'The G scale has 1 &#9839;'
	        scale_obj_MS.note1 = 'G';
	        scale_obj_MS.note2 = 'A';
	        scale_obj_MS.note3 = 'B';
	        scale_obj_MS.note4 = 'C';
	        scale_obj_MS.note5 = 'D';
	        scale_obj_MS.note6 = 'E';
	        scale_obj_MS.note7 = 'F&#9839;';
	        break;
    }
}

function evaluate_answer_MS() {

	var guess_note1_MS = $("#note1_MS option:selected").text();
	var guess_note2_MS = $("#note2_MS option:selected").text();
	var guess_note3_MS = $("#note3_MS option:selected").text();
	var guess_note4_MS = $("#note4_MS option:selected").text();
	var guess_note5_MS = $("#note5_MS option:selected").text();
	var guess_note6_MS = $("#note6_MS option:selected").text();
	var guess_note7_MS = $("#note7_MS option:selected").text();

	// weird, but you have to decode the html entity
	scale_obj_MS.note1 = decodeHtmlEntity(scale_obj_MS.note1);
	scale_obj_MS.note2 = decodeHtmlEntity(scale_obj_MS.note2);
	scale_obj_MS.note3 = decodeHtmlEntity(scale_obj_MS.note3);
	scale_obj_MS.note4 = decodeHtmlEntity(scale_obj_MS.note4);
	scale_obj_MS.note5 = decodeHtmlEntity(scale_obj_MS.note5);
	scale_obj_MS.note6 = decodeHtmlEntity(scale_obj_MS.note6);
	scale_obj_MS.note7 = decodeHtmlEntity(scale_obj_MS.note7);

	// show modal
	$('#modal_MS').modal({
            backdrop: 'static', // makes it so you can't click outside modal to close
            keyboard: false // makes it so you can't press 'esc' to close modal
    });

	if ( guess_note1_MS === '--' || guess_note2_MS === '--' || guess_note3_MS === '--' || guess_note4_MS === '--' || guess_note5_MS === '--' || guess_note6_MS === '--' || guess_note7_MS === '--' ) {
		$('#modal_header_MS').css( "background-color", "red" );
		$('#modal_title_MS').html('<span class="glyphicon glyphicon-remove"></span> Error');
		$('#modal_body_MS').html('Please make sure to choose all 7 notes in the ' + selected_scale_MS + ' scale');
		incomplete_answer_MS = 'true';	
	} else if ( (guess_note1_MS == scale_obj_MS.note1) && (guess_note2_MS == scale_obj_MS.note2) && (guess_note3_MS == scale_obj_MS.note3) && (guess_note4_MS == scale_obj_MS.note4) && (guess_note5_MS == scale_obj_MS.note5) && (guess_note6_MS == scale_obj_MS.note6) && (guess_note7_MS == scale_obj_MS.note7) ) {
		$('#modal_header_MS').css( "background-color", "green");
		$('#modal_title_MS').html('<span class="glyphicon glyphicon-ok"></span> Good Job');
		$('#modal_body_MS').html(scale_obj_MS.desc + '<br />It consists of: ' + guess_note1_MS + ' ' + guess_note2_MS + ' ' + guess_note3_MS + ' ' + guess_note4_MS + ' ' + guess_note5_MS + ' ' + guess_note6_MS + ' ' + guess_note7_MS);

		window.correct_MS++;
	} else {
		$('#modal_header_MS').css( "background-color", "red" );
		$('#modal_title_MS').html('<span class="glyphicon glyphicon-remove"></span> Incorrect');
		$('#modal_body_MS').html(selected_scale_MS + ' scale<br />Correct answer: ' + scale_obj_MS.desc + '<br />' + scale_obj_MS.note1 + ' ' + scale_obj_MS.note2 + ' ' + scale_obj_MS.note3  + ' ' + scale_obj_MS.note4 + ' ' + scale_obj_MS.note5 + ' ' + scale_obj_MS.note6 + ' ' + scale_obj_MS.note7 + '<br/> Your answer was:<br />' + guess_note1_MS + ' ' + guess_note2_MS + ' ' + guess_note3_MS + ' ' + guess_note4_MS + ' ' + guess_note5_MS + ' ' + guess_note6_MS + ' ' + guess_note7_MS );

		window.wrong_MS++;
	}
}

// timer buttons
$('#timer_MS_play_btn').click(function(){
    timer_MS.Timer.play();
});

$('#timer_MS_pause_btn').click(function(){
    timer_MS.Timer.stop();
});

$('#timer_MS_reset_btn').click(function(){
    timer_MS.resetStopwatch();
});

var timer_MS = new (function() {
    var $stopwatch_MS; // Stopwatch element on the page
        incrementTime_MS = 70; // Timer speed in milliseconds
        currentTime_MS = 0; // Current time in hundredths of a second
        timer_MS_duration_label = ''

        updateTimer_MS = function() {
            $stopwatch_MS.html(formatTime(currentTime_MS)); // displays time
            currentTime_MS += incrementTime_MS / 10;

            // get user selected timer duration
            timer_MS_duration = $('#timer_MS_duration').val();

            if (currentTime_MS >= timer_MS_duration) {
                timer_MS.Timer.stop();

                // round up timer display
                // send modal the timer duration
                 switch(timer_MS_duration) {
                    case ('60000'):
                        $stopwatch_MS.html('10:00:00');
                        timer_MS_duration_label = '10 minutes'; 
                        break;

                    case ('48000'):
                        $stopwatch_MS.html('08:00:00');
                        timer_MS_duration_label = '8 minutes'; 
                        break;

                    case ('36000'):
                        $stopwatch_MS.html('06:00:00');
                        timer_MS_duration_label = '6 minutes'; 
                        break;

                    case ('24000'):
                        $stopwatch_MS.html('04:00:00');
                        timer_MS_duration_label = '4 minutes'; 
                        break;

                    case ('12000'):
                        $stopwatch_MS.html('02:00:00'); 
                        timer_MS_duration_label = '2 minutes'; 
                        break;

                    case ('100'):
                        $stopwatch_MS.html('00:01:00'); 
                        timer_MS_duration_label = '1 second';
                        break;
                }
                
                /*
                Good reference for controling audio with jQuery
                http://codesamplez.com/programming/control-html5-audio-with-jquery
                */
                $('#bell_ring').trigger('play');

                // open modal - simpler: .modal('show')
                $('#modal_MS').modal({
		            backdrop: 'static', // makes it so you can'no't click outside modal to close
		            keyboard: false // makes it so you can't press 'esc' to close modal
			    });

			    // edit text in modal
				$('#modal_header_MS').css( "background-color", "#F66F00");
				$('#modal_title_MS').html('<span class="glyphicon glyphicon-hourglass"></span> Timer expired');
				$('#modal_body_MS').html('<p>Congratulations, you have completed ' + timer_MS_duration_label + ' of the Major Scales exercise.</p>');

				// set flag that we are originating from timer stop
				from_timer_MS = 'true';
            }
        };
        init = function() {
            $stopwatch_MS = $('#stopwatch_MS');
            timer_MS.Timer = $.timer(updateTimer_MS, incrementTime_MS, false);
        };

    this.resetStopwatch = function() {
        currentTime_MS = 0;
        this.Timer.stop().once();
    };

    $(init);
});
/** END jQuery Timer **/