$(document).ready(function() {

    // [ Click above to begin ] flag
    firstClick = 'true';

    // get wow.js going
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        mobile:       true//,
        // callback:     function(box) {
        //   console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        // }
      }
    );
    wow.init();

     // get wow.js going
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        mobile:       true//,
        // callback:     function(box) {
        //   console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        // }
      }
    );
    wow.init();

    // allow popovers
    $('[data-toggle="popover"]').popover();

    // hide accordian content divs
    $('#accordion-content_BC').hide();
    $('#accordion-content_CC').hide();
    $('#accordion-content_MS').hide();
    $('#accordion-content_MPS').hide();

    // flag all accordians as collapsed
    accordion_collapsed_BC='true';
    accordion_collapsed_CC='true';
    accordion_collapsed_MS='true';
    accordion_collapsed_MPS='true';

    function colapseAllAccordianPanels() {
        $('#accordion-content_BC').slideUp();
        $('#accordion-content_CC').slideUp();
        $('#accordion-content_MS').slideUp();
        $('#accordion-content_MPS').slideUp();
    }

    function resetTimers() {
        timer_BC.resetStopwatch();
        timer_CC.resetStopwatch();
        timer_MS.resetStopwatch();
        timer_MPS.resetStopwatch();
    }

    function addCopyright() {
        $('p#copyright').fadeOut(0);
        $('p#copyright').html('&copy; ' + (new Date).getFullYear() + '  <a href="mailto:sashaloobkoff@gmail.com">Sasha Loobkoff</a>')
        $('p#copyright').fadeIn(500);        
    }

    $('#accordion-btn_BC').click(function() {

        // if first click, delete instructions and add copyright
        if (firstClick === 'true') {
            firstClick = 'false';

            addCopyright();
        }

        // if (and only if) collapsed then...
        if ( accordion_collapsed_BC === 'true' ) {

            // up date flags
            accordion_collapsed_BC='false';
            accordion_collapsed_CC='true';
            accordion_collapsed_MS='true';
            accordion_collapsed_MPS='true';

            // close all panels
            colapseAllAccordianPanels();

            // reset all timers
            resetTimers();

            // give last panel a rounded bottom (corner-radius)
            $('div.inner.head.cyan').attr('id', 'rounded-bottom');

            // slide this down
            $('#accordion-content_BC').slideDown();
        }

    });

    $('#accordion-btn_CC').click(function() {

        // if first click, delete instructions and add copyright
        if (firstClick === 'true') {
            firstClick = 'false';

            addCopyright();
        }

        // if (and only if) collapsed then...
        if ( accordion_collapsed_CC === 'true' ) {

            // up date flags
            accordion_collapsed_BC='true';
            accordion_collapsed_CC='false';
            accordion_collapsed_MS='true';
            accordion_collapsed_MPS='true';

            // close all panels
            colapseAllAccordianPanels();

            // reset all timers
            resetTimers();

            // give last panel a rounded bottom (corner-radius)
            $('div.inner.head.cyan').attr('id', 'rounded-bottom');

            // slide this down
            $('#accordion-content_CC').slideDown();
        }
        
    });

    $('#accordion-btn_MS').click(function() {

        // if first click, delete instructions and add copyright
        if (firstClick === 'true') {
            firstClick = 'false';

            addCopyright();
        }

        // if (and only if) collapsed then...
        if ( accordion_collapsed_MS === 'true' ) {

            // update flags
            accordion_collapsed_BC='true';
            accordion_collapsed_CC='true';
            accordion_collapsed_MS='false';
            accordion_collapsed_MPS='true';

            // close all panels
            colapseAllAccordianPanels();

            // reset all timers
            resetTimers();

            // give last panel a rounded bottom (corner-radius)
            $('div.inner.head.cyan').attr('id', 'rounded-bottom');

            // slide this down
            $('#accordion-content_MS').slideDown();
        }
        
    });

    $('#accordion-btn_MPS').click(function() {

        // if first click, delete instructions and add copyright
        if (firstClick === 'true') {
            firstClick = 'false';

            addCopyright();
        }

        // if (and only if) collapsed then...
        if ( accordion_collapsed_MPS === 'true' ) {

            // up date flags
            accordion_collapsed_BC='true';
            accordion_collapsed_CC='true';
            accordion_collapsed_MS='true';
            accordion_collapsed_MPS='false';

            // close all panels
            colapseAllAccordianPanels();

            // reset all timers
            resetTimers();

            // REMOVE rounded bottom (corner-radius)
            $('div.inner.head.cyan').removeAttr('id');

            // slide this down
            $('#accordion-content_MPS').slideDown();
        }
        
    });

 }); // END document.ready function

// round to 2 decimal places
function roundToTwo(num) {    
    return +(Math.round(num + "e+2")  + "e-2");
}

// decode html characters
var decodeHtmlEntity = function(str) {
  return str.replace(/&#(\d+);/g, function(match, dec) {
    return String.fromCharCode(dec);
  });
};

// shuffle array to get random effect
function shuffleArray(o) {
    for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
};

// Common functions for timer
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