$(document).ready(function() {


    // // make sure the modal close button is always in focus 
    // // so you can hit return to close
    // $('#modal_BC').on('shown.bs.modal', function () {
    //     $('#modal_close_btn_BC').focus();
    // });

    // $('#modal_close_btn_BC').addClass('btn-green');

	// create chords array 
    // note how ther is no declaration (in other words, "var")?
    // that makes this object (array) global in scope
	chords = [
		 'A&#9837;', 'A', 'A&#9839;', 'A&#9837;m', 'Am', 'A&#9839;m',
		 'B&#9837;', 'B', 'B&#9839;', 'B&#9837;m', 'Bm', 'B&#9839;m',
		 'C&#9837;', 'C', 'C&#9839;', 'C&#9837;m', 'Cm', 'C&#9839;m',
		 'D&#9837;', 'D', 'D&#9839;', 'D&#9837;m', 'Dm', 'D&#9839;m',
		 'E&#9837;', 'E', 'E&#9839;', 'E&#9837;m', 'Em', 'E&#9839;m',
		 'F&#9837;', 'F', 'F&#9839;', 'F&#9837;m', 'Fm', 'F&#9839;m',
		 'G&#9837;', 'G', 'G&#9839;', 'G&#9837;m', 'Gm', 'G&#9839;m'
	];

    shuffleArray(chords);
    displayChords()
 }); // END document.ready function

// close modal button
$('#modal_close_btn_BC').click(function () {
    // reset timer
    timer_BC.resetStopwatch();
});

// instructions collapse button listener
$('button#instructions_BC_collapse_btn').click(function(){

    // toggle the arrow up and down
    $('#instructions_BC_arrow').toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
    
});

// reset Barre Chord button
$('#reset_BC_btn').click(function () {
    // to reload page use this:
    // location.reload(true);

    shuffleArray(chords);
    displayChords()

    // animate
    new WOW().init();

    // reset time
    timer_BC.resetStopwatch();
});

// place chords on page
function displayChords () {
    $('h1#chord_1').html(chords[0]);
    $('h1#chord_2').html(chords[1]);
    $('h1#chord_3').html(chords[2]);
    $('h1#chord_4').html(chords[3]);
}

/**
 * jQuery Timer
 * check out https://code.google.com/p/jquery-timer/
 * there are other uses
 */

// timer buttons
$('#timer_BC_play_btn').click(function(){
    timer_BC.Timer.play();
});

$('#timer_BC_pause_btn').click(function(){
    timer_BC.Timer.stop();
});

$('#timer_BC_reset_btn').click(function(){
    timer_BC.resetStopwatch();
});

var timer_BC = new (function() {

    var $stopwatch_BC; // Stopwatch element on the page
        incrementTime_BC = 70; // Timer speed in milliseconds
        currentTime_BC = 0; // Current time in hundredths of a second

        updateTimer_BC = function() {
            $stopwatch_BC.html(formatTime(currentTime_BC)); // displays time
            currentTime_BC += incrementTime_BC / 10;

            // get user selected timer duration
            timer_BC_duration = $('#timer_BC_duration').val();

            if (currentTime_BC >= timer_BC_duration) {
                timer_BC.Timer.stop();

                // round up timer display
                // send modal the timer duration
                switch(timer_BC_duration) {
                    case ('60000'):
                        $stopwatch_BC.html('10:00:00');
                        timer_BC_duration_label = '10 minutes'; 
                        break;

                    case ('48000'):
                        $stopwatch_BC.html('08:00:00');
                        timer_BC_duration_label = '8 minutes'; 
                        break;

                    case ('36000'):
                        $stopwatch_BC.html('06:00:00');
                        timer_BC_duration_label = '6 minutes'; 
                        break;

                    case ('24000'):
                        $stopwatch_BC.html('04:00:00');
                        timer_BC_duration_label = '4 minutes'; 
                        break;

                    case ('12000'):
                        $stopwatch_BC.html('02:00:00'); 
                        timer_BC_duration_label = '2 minutes'; 
                        break;

                    case ('100'):
                        $stopwatch_BC.html('00:01:00'); 
                        timer_BC_duration_label = '1 second';
                        break;
                }
                
                /*
                Good reference for controling audio with jQuery
                http://codesamplez.com/programming/control-html5-audio-with-jquery
                */
                // audio object is sitting on the bottom of the index.html page
                $('#bell_ring').trigger('play');

                // open modal - simpler: .modal('show')
                $('#modal_BC').modal({
                    backdrop: 'static', // makes it so you can't click outside modal to close
                    keyboard: false // makes it so you can't press 'esc' to close modal
                });
            }
        };

        init = function() {
            $stopwatch_BC = $('#stopwatch_BC');
            timer_BC.Timer = $.timer(updateTimer_BC, incrementTime_BC, false);
        };

    this.resetStopwatch = function() {
        currentTime_BC = 0;
        this.Timer.stop().once();
    };
    $(init);
});
/** END jQuery Timer **/
