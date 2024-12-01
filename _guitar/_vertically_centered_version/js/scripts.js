$(document).ready(function() {

	$('#refresh_btn').click(function () {
	    location.reload(true);
	});    // reload page on button click

    // get wow.js going
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        mobile:       true,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();

	// create chords array 
	var chords = [
		 'A&#9837;', 'A', 'A&#9839;', 'A&#9837m', 'Am', 'A&#9839;m',
		 'B&#9837;', 'B', 'B&#9839;', 'B&#9837m', 'Bm', 'B&#9839;m',
		 'C&#9837;', 'C', 'C&#9839;', 'C&#9837m', 'Cm', 'C&#9839;m',
		 'D&#9837;', 'D', 'D&#9839;', 'D&#9837m', 'Dm', 'D&#9839;m',
		 'E&#9837;', 'E', 'E&#9839;', 'E&#9837m', 'Em', 'E&#9839;m',
		 'F&#9837;', 'F', 'F&#9839;', 'F&#9837m', 'Fm', 'F&#9839;m',
		 'G&#9837;', 'G', 'G&#9839;', 'G&#9837m', 'Gm', 'G&#9839;m'
	];


    function shuffleArray(o) {
        for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
        return o;
    };

	// place chords on page
    function showChords () {
    	$('h1#chord_1').html(chords[0]);
    	$('h1#chord_2').html(chords[1]);
    	$('h1#chord_3').html(chords[2]);
    	$('h1#chord_4').html(chords[3]);
    }

    shuffleArray(chords);
    showChords()

    // setTimeout(showChords(), 1000);

});

/**
 * jQuery Timer
 * check out https://code.google.com/p/jquery-timer/
 * there are other uses
 */
var Example1 = new (function() {
    var $stopwatch, // Stopwatch element on the page
        incrementTime = 70, // Timer speed in milliseconds
        currentTime = 0, // Current time in hundredths of a second
        updateTimer = function() {
            $stopwatch.html(formatTime(currentTime)); // displays time
            currentTime += incrementTime / 10;

           if (currentTime >= 12000) {
                $stopwatch.html('02:00:00'); 
                ion.sound.play("beer_can_opening");
                ion.sound.play("bell_ring");
                alert("Congratulations,\nyou have completed 2 minutes of this exercise.\n\nClick the refresh button above to start an a new session.");
                Example1.Timer.stop();
            }
        },
        init = function() {
            $stopwatch = $('#stopwatch');
            Example1.Timer = $.timer(updateTimer, incrementTime, false);
        };
    this.resetStopwatch = function() {
        currentTime = 0;
        this.Timer.stop().once();
    };
    $(init);
});

// Common functions
function pad(number, length) {
    var str = '' + number;
    while (str.length < length) {str = '0' + str;}
    return str;
}
function formatTime(time) {
    var min = parseInt(time / 6000),
        sec = parseInt(time / 100) - (min * 60),
        hundredths = pad(time - (sec * 100) - (min * 6000), 2);
    return (min > 0 ? pad(min, 2) : "00") + ":" + pad(sec, 2) + ":" + hundredths;
}