$(document).ready(function() {

	// flag variables
	incomplete_answer_CC = 'false';
	from_timer_CC = 'false';

	// make sure the modal close button is always in focus 
	// so you can hit return to close
	// $('#modal_CC').on('shown.bs.modal', function () {
	//     $('#modal_close_btn_CC').focus();
	// });

	// make modal button pink
    // $('#modal_close_btn_CC').addClass('btn-pink');

	// instructions collapse button listener
	$('button#instructions_CC_collapse_btn').click(function(){

	    // toggle the arrow up and down
	    $('#instructions_CC_arrow').toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
	    
	});

	// timer collapse button listener
	$('button#timer_CC_collapse_btn').click(function(){

		// toggle the arrow up and down
		$('#timer_CC_arrow').toggleClass('glyphicon-chevron-down glyphicon-chevron-up');

		// reset the time just in case
		timer_CC.resetStopwatch();
		
    });

	// create cookies for keeping score
	window.guesses_CC = 0;
	window.correct_CC = 0;
	window.wrong_CC = 0;
	window.percentage_CC = 0;
 
	// create chords array 
	chord_choices_CC = [
		 'A&#9837;', 'A', 'A&#9837;m', 'Am',
		 'B&#9837;', 'B', 'B&#9837;m', 'Bm',
		 'C', 'C&#9839;', 'Cm', 'C&#9839;m',
		 'D&#9837;', 'D', 'D&#9839;', 'D&#9837;m', 'Dm', 'D&#9839;m',
		 'E&#9837;', 'E', 'E&#9837;m', 'Em',
		 'F', 'F&#9839;', 'Fm', 'F&#9839;m',
		 'G&#9837;', 'G', 'G&#9837;m', 'Gm'
	];

	reset_exercise_CC();

}); // END document.ready function

// close modal button
$('#modal_close_btn_CC').click(function() {

	// was the answer incomplete?
	// if not, reset the exercise
	// if incomplete, set flag to false before closing window
    if (incomplete_answer_CC == 'false'){
    	reset_exercise_CC();
    } else {
    	incomplete_answer_CC = 'false';
    }

    // did the timer finish?
    // if so, refresh it
    // if not, let the timer continue
    if (from_timer_CC == 'true'){
    	// reset timer
	    timer_CC.resetStopwatch();
    } else {
    	from_timer_CC = 'false';
    }
    
});

$('#skip_btn_CC').click(function(){
	reset_exercise_CC()
});

$('#answer_btn_CC').click(function(){

	var answer2 = chord_obj_CC.note2;
	answer2 = decodeHtmlEntity(answer2);
	$('#note2_CC option[value="' + answer2 + '"]').prop('selected', true);

	var answer3 = chord_obj_CC.note3;
	answer3 = decodeHtmlEntity(answer3);
	$('#note3_CC option[value="' + answer3 + '"]').prop('selected', true);

});

function reset_exercise_CC() {

	// #1 if an option is selected, alter the scale_choises_CC accordingly
	if ( ( $('#whiteKeysOnly_CC').prop('checked') === false ) && ( $('#noMinors_CC').prop('checked') === false ) ){

		// create scales array 
		chord_choices_CC = [
			'A&#9837;', 'A', 'A&#9837;m', 'Am',
			'B&#9837;', 'B', 'B&#9837;m', 'Bm',
			'C', 'C&#9839;', 'Cm', 'C&#9839;m',
			'D&#9837;', 'D', 'D&#9839;', 'D&#9837;m', 'Dm', 'D&#9839;m',
			'E&#9837;', 'E', 'E&#9837;m', 'Em',
			'F', 'F&#9839;', 'Fm', 'F&#9839;m',
			'G&#9837;', 'G', 'G&#9837;m', 'Gm'
		];

		// help achieve true random -- shuffleArray() is in scripts.js
		shuffleArray(chord_choices_CC);

	} else if ( ( $('#whiteKeysOnly_CC').prop('checked') === true ) && ( $('#noMinors_CC').prop('checked') === false ) ){	

		// create scales array 
		chord_choices_CC = [
			'A', 'Am',
			'B', 'Bm',
			'C', 'Cm',
			'D', 'Dm',
			'E', 'Em',
			'F', 'Fm',
			'G', 'Gm'
		];

		// help achieve true random -- shuffleArray() is in scripts.js
		shuffleArray(chord_choices_CC);
		
	} else if ( ( $('#whiteKeysOnly_CC').prop('checked') === true ) && ( $('#noMinors_CC').prop('checked') === true ) ){	

		// create scales array 
		chord_choices_CC = [
			'A',
			'B',
			'C',
			'D',
			'E',
			'F',
			'G'
		];

		// help achieve true random -- shuffleArray() is in scripts.js
		shuffleArray(chord_choices_CC);
		
	} else if ( ( $('#whiteKeysOnly_CC').prop('checked') === false ) && ( $('#noMinors_CC').prop('checked') === true ) ){

		// create scales array 
		chord_choices_CC = [
			'A&#9837;', 'A', 
			'B&#9837;', 'B', 
			'C', 'C&#9839;', 
			'D&#9837;', 'D', 'D&#9839;', 
			'E&#9837;', 'E', 
			'F', 'F&#9839;', 
			'G&#9837;', 'G'
		];

		// help achieve true random -- shuffleArray() is in scripts.js
		shuffleArray(chord_choices_CC);
		
	}	

	// #2
	select_chord_CC();

	$('h1#chord_to_construct').html(chord_to_construct);

	// place first note in 1st select to save user time
	set_first_note_CC();

	// makes sure 2nd and 3rd are reset to label
	$('#note2_label_CC').prop("selected", true);
	$('#note3_label_CC').prop("selected", true);

	// #2
	// create chord object
	create_chord_obj();

	// #3
	// take care of scoring
	window.guesses_CC = window.correct_CC + window.wrong_CC;

	// dividing by 0 produces a NaN so write a test
	if (window.guesses_CC !== 0) {
		window.percentage_CC = ((window.correct_CC / window.guesses_CC) * 100);
		window.percentage_CC = roundToTwo(window.percentage_CC);
	} else {
		window.percentage_CC = 0;
	}

	$('p.score_CC span#correct_CC').html(window.correct_CC);
	$('p.score_CC span#guesses_CC').html(window.guesses_CC);
	$('p.score_CC span#percentage_CC').html(window.percentage_CC);

	/*
	console.log(window.correct_CC +' total correct so far.');
	console.log(window.guesses_CC +' total guess so far.');
	console.log(window.percentage_CC +' percentage so far.');
	*/
}

// click of submit button evaluate answer (look below for function)
$('#submit_btn_CC').click(function(){

	evaluate_answer_CC()
});

function select_chord_CC() {
	// create an index of these 30 chords (starting at 0)
	var i = chord_choices_CC.length - 1; 
	// console.log(chord_choices_CC[i]);

	// pick a random index
	var random_i = parseInt(Math.random() * i);

	// use it to pick an array element (chord)
	// make that element a string
	// NOTE: since "chord_to_construct" is NOT delclared (with a preceeding "var")
	// it is global in scope
	return chord_to_construct = chord_choices_CC[random_i].toString();
}

function set_first_note_CC() {
	// remove "Select 1st note" label
	//$('#note1_label_CC').removeAttr("selected");

	// this is for safari
	// make all select options UNselected
	// '>' refers to 'children of'
	$('#note1_CC > option').removeAttr("selected");
	$('#note2_CC > option').removeAttr("selected");
	$('#note3_CC > option').removeAttr("selected");

	// if chord is minor, take out the "m" from the note
	// (but only here... hence the y variable)
	var y = chord_to_construct;
	var z = y.length;
	var lastChar = y.substr(y.length - 1);

	if (lastChar ==='m') {
		y = y.replace(y.substring(y.length-1), "");
	}
	// end taking out the "m"

	// now, decode the html characters
	// weird I know, Select converts value to non-html before my comparison
	y = decodeHtmlEntity(y);
	// console.log(y + ' is the html character.')

	// cool shit
	var x = '#note1_CC option[value="' + y + '"]';
	// console.log(x + ' is the element.')
	$(x).prop('selected', true); // .attr() would be .attr('selected');
}

function create_chord_obj() {

	// NOTE: that since the object is NOT delclared with a "var" it is global
	// if there was a var before it, it would only exist in this function
	chord_obj_CC = new Object(chord_to_construct); 

	switch(chord_to_construct) {

	    case 'A&#9837;':
	        chord_obj_CC.note1 = 'A&#9837;';
	        chord_obj_CC.note2 = 'C';
	        chord_obj_CC.note3 = 'E&#9837;';
	        break;
			
	    case 'A':
	        chord_obj_CC.note1 = 'A';
	        chord_obj_CC.note2 = 'C&#9839;';
	        chord_obj_CC.note3 = 'E';
	        break;
			
	    case 'A&#9837;m':
	        chord_obj_CC.note1 = 'A&#9837;';
	        chord_obj_CC.note2 = 'C&#9837;';
	        chord_obj_CC.note3 = 'E&#9837;';
	        break;
			
	    case 'Am':
	        chord_obj_CC.note1 = 'A';
	        chord_obj_CC.note2 = 'C';
	        chord_obj_CC.note3 = 'E';
	        break;
			
	    case 'B&#9837;':
	        chord_obj_CC.note1 = 'B&#9837;';
	        chord_obj_CC.note2 = 'D';
	        chord_obj_CC.note3 = 'F';
	        break;
			
	    case 'B':
	        chord_obj_CC.note1 = 'B';
	        chord_obj_CC.note2 = 'D&#9839;';
	        chord_obj_CC.note3 = 'F&#9839;';
	        break;
			
	    case 'B&#9837;m':
	        chord_obj_CC.note1 = 'B&#9837;';
	        chord_obj_CC.note2 = 'D&#9837;';
	        chord_obj_CC.note3 = 'F';
	        break;
			
	    case 'Bm':
	        chord_obj_CC.note1 = 'B';
	        chord_obj_CC.note2 = 'D';
	        chord_obj_CC.note3 = 'F&#9839;';
	        break;
			
	    case 'C':
	        chord_obj_CC.note1 = 'C';
	        chord_obj_CC.note2 = 'E';
	        chord_obj_CC.note3 = 'G';
	        break;
			
	    case 'C&#9839;':
	        chord_obj_CC.note1 = 'C&#9839;';
	        chord_obj_CC.note2 = 'E&#9839;';
	        chord_obj_CC.note3 = 'G&#9839;';
	        break;
			
	    case 'Cm':
	        chord_obj_CC.note1 = 'C';
	        chord_obj_CC.note2 = 'E&#9837;';
	        chord_obj_CC.note3 = 'G';
	        break;
			
	    case 'C&#9839;m':
	        chord_obj_CC.note1 = 'C&#9839;';
	        chord_obj_CC.note2 = 'E';
	        chord_obj_CC.note3 = 'G&#9839;';
	        break;
			
	    case 'D&#9837;':
	        chord_obj_CC.note1 = 'D&#9837;';
	        chord_obj_CC.note2 = 'F';
	        chord_obj_CC.note3 = 'A&#9837;';
	        break;
			
	    case 'D':
	        chord_obj_CC.note1 = 'D';
	        chord_obj_CC.note2 = 'F&#9839;';
	        chord_obj_CC.note3 = 'A';
	        break;
			
	    case 'D&#9839;':
	        chord_obj_CC.note1 = 'D&#9839;';
	        chord_obj_CC.note2 = 'F&#9839;&#9839;';
	        chord_obj_CC.note3 = 'A&#9839;';
	        break;
			
	    case 'D&#9837;m':
	        chord_obj_CC.note1 = 'D&#9837;';
	        chord_obj_CC.note2 = 'F&#9837;';
	        chord_obj_CC.note3 = 'A&#9837;';
	        break;
			
	    case 'Dm':
	        chord_obj_CC.note1 = 'D';
	        chord_obj_CC.note2 = 'F';
	        chord_obj_CC.note3 = 'A';
	        break;
			
	    case 'D&#9839;m':
	        chord_obj_CC.note1 = 'D&#9839;';
	        chord_obj_CC.note2 = 'F&#9839;';
	        chord_obj_CC.note3 = 'A&#9839;';
	        break;
			
	    case 'E&#9837;':
	        chord_obj_CC.note1 = 'E&#9837;';
	        chord_obj_CC.note2 = 'G';
	        chord_obj_CC.note3 = 'B&#9837;';
	        break;
			
	    case 'E':
	        chord_obj_CC.note1 = 'E';
	        chord_obj_CC.note2 = 'G&#9839;';
	        chord_obj_CC.note3 = 'B';
	        break;
			
	    case 'E&#9837;m':
	        chord_obj_CC.note1 = 'E&#9837;';
	        chord_obj_CC.note2 = 'G&#9837;';
	        chord_obj_CC.note3 = 'B&#9837;';
	        break;
			
	    case 'Em':
	        chord_obj_CC.note1 = 'E';
	        chord_obj_CC.note2 = 'G';
	        chord_obj_CC.note3 = 'B';
	        break;
			
	    case 'F':
	        chord_obj_CC.note1 = 'F';
	        chord_obj_CC.note2 = 'A';
	        chord_obj_CC.note3 = 'C';
	        break;
			
	    case 'F&#9839;':
	        chord_obj_CC.note1 = 'F&#9839;';
	        chord_obj_CC.note2 = 'A&#9839;';
	        chord_obj_CC.note3 = 'C&#9839;';
	        break;
			
	    case 'Fm':
	        chord_obj_CC.note1 = 'F';
	        chord_obj_CC.note2 = 'A&#9837;';
	        chord_obj_CC.note3 = 'C';
	        break;
			
	    case 'F&#9839;m':
	        chord_obj_CC.note1 = 'F&#9839;';
	        chord_obj_CC.note2 = 'A';
	        chord_obj_CC.note3 = 'C&#9839;';
	        break;
			
	    case 'G&#9837;':
	        chord_obj_CC.note1 = 'G&#9837;';
	        chord_obj_CC.note2 = 'B&#9837;';
	        chord_obj_CC.note3 = 'D&#9837;';
	        break;
			
	    case 'G':
	        chord_obj_CC.note1 = 'G';
	        chord_obj_CC.note2 = 'B';
	        chord_obj_CC.note3 = 'D';
	        break;
			
	    case 'G&#9837;m':
	        chord_obj_CC.note1 = 'G&#9837;';
	        chord_obj_CC.note2 = 'B&#9837;&#9837;';
	        chord_obj_CC.note3 = 'D&#9837;';
	        break;
			
	    case 'Gm':
	        chord_obj_CC.note1 = 'G';
	        chord_obj_CC.note2 = 'B&#9837;';
	        chord_obj_CC.note3 = 'D';
	        break;
	    }
}

function evaluate_answer_CC() {

	var guess_note1_CC = $("#note1_CC option:selected").text();
	var guess_note2_CC = $("#note2_CC option:selected").text();
	var guess_note3_CC = $("#note3_CC option:selected").text();

	// weird, but you have to decode the html entity
	chord_obj_CC.note1 = decodeHtmlEntity(chord_obj_CC.note1);
	chord_obj_CC.note2 = decodeHtmlEntity(chord_obj_CC.note2);
	chord_obj_CC.note3 = decodeHtmlEntity(chord_obj_CC.note3);

	// console.log (guess_note1_CC + ' was the first note selected');
	// console.log (guess_note2_CC + ' was the 2nd note selected');
	// console.log (guess_note3_CC + ' was the 3nd note selected');

	// console.log (chord_obj_CC.note1 + ' is the first note');
	// console.log (chord_obj_CC.note2 + ' is the second note');
	// console.log (chord_obj_CC.note3 + ' is the third note');


	// show modal
	$('#modal_CC').modal({
            backdrop: 'static', // makes it so you can't click outside modal to close
            keyboard: false // makes it so you can't press 'esc' to close modal
    });

	if ( guess_note1_CC === '--' || guess_note2_CC === '--' || guess_note3_CC === '--' ) {
		$('#modal_header_CC').css( "background-color", "red" );
		$('#modal_title_CC').html('<span class="glyphicon glyphicon-remove"></span> Error');
		$('#modal_body_CC').html('Please make sure to choose all three notes in the triad');
		incomplete_answer_CC = 'true';	
	} else if ( (guess_note1_CC == chord_obj_CC.note1) && (guess_note2_CC == chord_obj_CC.note2) && (guess_note3_CC == chord_obj_CC.note3) ) {
		$('#modal_header_CC').css( "background-color", "green");
		$('#modal_title_CC').html('<span class="glyphicon glyphicon-ok"></span> Good Job');
		$('#modal_body_CC').html(chord_to_construct + ' consists of the triad: ' + guess_note1_CC + ' ' + guess_note2_CC + ' ' + guess_note3_CC );
		window.correct_CC++;
	} else {
		$('#modal_header_CC').css( "background-color", "red" );
		$('#modal_title_CC').html('<span class="glyphicon glyphicon-remove"></span> Incorrect');
		$('#modal_body_CC').html(chord_to_construct + '<br />Correct answer: ' + chord_obj_CC.note1 + ' ' + chord_obj_CC.note2 + ' ' + chord_obj_CC.note3 + '.<br/> Your answer was: ' + guess_note1_CC + ' ' + guess_note2_CC + ' ' + guess_note3_CC );
		window.wrong_CC++;
	}
}
/**
 * jQuery Timer
 * check out https://code.google.com/p/jquery-timer/
 * there are other uses
 */

// timer buttons
$('#timer_CC_play_btn').click(function(){
    timer_CC.Timer.play();
});

$('#timer_CC_pause_btn').click(function(){
    timer_CC.Timer.stop();
});

$('#timer_CC_reset_btn').click(function(){
    timer_CC.resetStopwatch();
});

var timer_CC = new (function() {
    var $stopwatch_CC; // Stopwatch element on the page
        incrementTime_CC = 70; // Timer speed in milliseconds
        currentTime_CC = 0; // Current time in hundredths of a second
        timer_CC_duration_label = ''

        updateTimer_CC = function() {
            $stopwatch_CC.html(formatTime(currentTime_CC)); // displays time
            currentTime_CC += incrementTime_CC / 10;

            // get user selected timer duration
            timer_CC_duration = $('#timer_CC_duration').val();

            if (currentTime_CC >= timer_CC_duration) {
                timer_CC.Timer.stop();

                // round up timer display
                // send modal the timer duration
                 switch(timer_CC_duration) {
                    case ('60000'):
                        $stopwatch_CC.html('10:00:00');
                        timer_CC_duration_label = '10 minutes'; 
                        break;

                    case ('48000'):
                        $stopwatch_CC.html('08:00:00');
                        timer_CC_duration_label = '8 minutes'; 
                        break;

                    case ('36000'):
                        $stopwatch_CC.html('06:00:00');
                        timer_CC_duration_label = '6 minutes'; 
                        break;

                    case ('24000'):
                        $stopwatch_CC.html('04:00:00');
                        timer_CC_duration_label = '4 minutes'; 
                        break;

                    case ('12000'):
                        $stopwatch_CC.html('02:00:00'); 
                        timer_CC_duration_label = '2 minutes'; 
                        break;

                    case ('100'):
                        $stopwatch_CC.html('00:01:00'); 
                        timer_CC_duration_label = '1 second';
                        break;
                }
                
                /*
                Good reference for controling audio with jQuery
                http://codesamplez.com/programming/control-html5-audio-with-jquery
                */
                $('#bell_ring').trigger('play');

                // open modal - simpler: .modal('show')
                $('#modal_CC').modal({
		            backdrop: 'static', // makes it so you can'no't click outside modal to close
		            keyboard: false // makes it so you can't press 'esc' to close modal
			    });

			    // edit text in modal
				$('#modal_header_CC').css( "background-color", "#B7366D");
				$('#modal_title_CC').html('<span class="glyphicon glyphicon-hourglass"></span> Timer expired');
				$('#modal_body_CC').html('<p>Congratulations, you have completed ' + timer_CC_duration_label + ' of the Chord Construction exercise.</p>');

				// set flag that we are originating from timer stop
				from_timer_CC = 'true';
            }
        };
        init = function() {
            $stopwatch_CC = $('#stopwatch_CC');
            timer_CC.Timer = $.timer(updateTimer_CC, incrementTime_CC, false);
        };

    this.resetStopwatch = function() {
        currentTime_CC = 0;
        this.Timer.stop().once();
    };

    $(init);
});
/** END jQuery Timer **/
