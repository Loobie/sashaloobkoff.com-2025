// Initialize shadowbox
var options = {
  //overlayColor: '#fff',
  //counterType: 'skip'
};

Shadowbox.init(options);

//////////////////////////////////////////////////
// Scrolling & Browser Resizing JavaScript

//////////////////////////////////////////////////
// some initial functions

// set starting browser window width & height
function getBrowserDimensions() {
  $browserWindowWidth = $(window).width();
  $browserWindowHeight = $(window).height();
  //console.log("The browser window is: " + $browserWindowWidth + " pixels wide & " + $browserWindowHeight + " pixels tall.");
}

function getNumberOfVisibleRows() {

  // get browser window dimensions from function
  getBrowserDimensions();

  if ($browserWindowHeight >= 741) {
    $numberOfVisibleRows = 3;
    $scrollArrowLocation=486;
  } else if (($browserWindowHeight <= 740) && ($browserWindowHeight >= 537)) {
    $numberOfVisibleRows = 2;
    $scrollArrowLocation=298;
  } else if ($browserWindowHeight <= 536) {
    $numberOfVisibleRows = 1;
    $scrollArrowLocation=100;
  }
  //console.log("The number of visible rows is: " + $numberOfVisibleRows + ".");

}

function resetScrolling() {
  if ($('#viewing_pane').scrollTop()!='0') {
    $('#viewing_pane').stop().animate({scrollTop: '0'}, 1000,'easeInOutExpo');
  }
    $('div.scroll_arrows').css({top: $scrollArrowLocation});
    // console.log('the scroll location is ' + $scrollArrowLocation + '.')
    $web_row_position = 1;
    $mobile_row_position = 1;
    $print_row_position = 1;
    $motion_row_position = 1;
}

//////////////////////////////////////////////////
// set up some stuff on page load

$(document).ready(function() {
  // make nav_bar and footer invisible initially
  $('#nav_bar, #footer').fadeOut(0);

  // scroll all the way to the left for stupid ie
  $('#viewing_pane').stop().animate({scrollLeft: 0}, 1000,'easeInOutExpo');

  // hide IE alert
  $('a#close_alert').click( function() { $('div#alert').hide(); });

  // create scroll location variable at start
  $scrollLocation="home"
  //console.log("The scroll location is: " + $scrollLocation + ".");

  // get number of visible rows
  getNumberOfVisibleRows();

  // $('#country').hide();

});

// using resize function, determine if the browser window has been resized
$(window).resize(function() {

    $browserWindowWidth = $(this).width();
    //console.log("The browser window is: " + $browserWindowWidth + " pixels wide.");
    //console.log("The scroll location is: " + $scrollLocation + ".");

    $destination = "#" + $scrollLocation;
    $('#viewing_pane').scrollLeft($($destination).position().left);
    //console.log("The scroll destination is: " + $destination + ".");

    // get number of visible rows
    getNumberOfVisibleRows();

    //place scroll arrows in proper location vertically on resize
    resetScrolling();

});

$('.home_btn, .home_btm_btn').click(function() {

  if ($('#viewing_pane').scrollTop()!='0') {
    $('#viewing_pane').animate({scrollTop: '0'}, 1000,'easeInOutExpo');
    $('div.scroll_arrows').animate({top: $scrollArrowLocation}, 1000,'easeInOutExpo');
    $web_row_position = 1;
    $mobile_row_position = 1;
    $print_row_position = 1;
    $motion_row_position = 1;
  }

  $('#mask').animate({opacity:1}, 1000,'easeInOutExpo');
  $('#viewing_pane').animate({scrollLeft: 0}, 1000,'easeInOutExpo');

  // set scroll location variable
  $scrollLocation="home";

});



$('.enter_sm_btn').click(function() {
  $('#mask').animate({opacity:0}, 1000,'easeInOutExpo');
  $('#viewing_pane').animate({scrollLeft: $('#about').position().left}, 1000,'easeInOutExpo');

  // set scroll location variable
  $scrollLocation="about";
});


$('.about_btn, .about_btm_btn').click(function() {
if ($('#viewing_pane').scrollTop()!='0') {
  $('#viewing_pane').animate({scrollTop: '0'}, 1000,'easeInOutExpo');
  $('div.scroll_arrows').animate({top: $scrollArrowLocation}, 1000,'easeInOutExpo');
  $web_row_position = 1;
  $mobile_row_position = 1;
  $print_row_position = 1;
  $motion_row_position = 1;
}

  $('#viewing_pane').animate({scrollLeft: $('#about').position().left}, 1000,'easeInOutExpo');

  // set scroll location variable
  $scrollLocation="about";
  /*
  $msg="You have scrolled to " + $scrollLocation + ".";
  window.alert($msg);
  */
});



$('.web_btn, .web_btm_btn').click(function() {
if ($('#viewing_pane').scrollTop()!='0') {
  $('#viewing_pane').animate({scrollTop: '0'}, 1000,'easeInOutExpo');
  $('div.scroll_arrows').animate({top: $scrollArrowLocation}, 1000,'easeInOutExpo');
  $web_row_position = 1;
  $mobile_row_position = 1;
  $print_row_position = 1;
  $motion_row_position = 1;
}

  $('#viewing_pane').animate({scrollLeft: $('#web').position().left}, 1000,'easeInOutExpo');

  // set scroll location variable
  $scrollLocation="web";

});

$('.print_btn, .print_btm_btn').click(function() {
if ($('#viewing_pane').scrollTop()!='0') {
  $('#viewing_pane').animate({scrollTop: '0'}, 1000,'easeInOutExpo');
  $('div.scroll_arrows').animate({top: $scrollArrowLocation}, 1000,'easeInOutExpo');
  $web_row_position = 1;
  $mobile_row_position = 1;
  $print_row_position = 1;
  $motion_row_position = 1;
}

  $('#viewing_pane').animate({scrollLeft: $('#print').position().left}, 1000,'easeInOutExpo');

  // set scroll location variable
  $scrollLocation="print";
});

$('.mobile_btn, .mobile_btm_btn').click(function() {
if ($('#viewing_pane').scrollTop()!='0') {
  $('#viewing_pane').animate({scrollTop: '0'}, 1000,'easeInOutExpo');
  $('div.scroll_arrows').animate({top: $scrollArrowLocation}, 1000,'easeInOutExpo');
  $web_row_position = 1;
  $mobile_row_position = 1;
  $print_row_position = 1;
  $motion_row_position = 1;
}
  $('#viewing_pane').animate({scrollLeft: $('#mobile').position().left}, 1000,'easeInOutExpo');

  // set scroll location variable
  $scrollLocation="mobile";

});

$('.motion_btn, .motion_btm_btn').click(function() {
if ($('#viewing_pane').scrollTop()!='0') {
  $('#viewing_pane').animate({scrollTop: '0'}, 1000,'easeInOutExpo');
  $('div.scroll_arrows').animate({top: $scrollArrowLocation}, 1000,'easeInOutExpo');
  $web_row_position = 1;
  $mobile_row_position = 1;
  $print_row_position = 1;
  $motion_row_position = 1;
}

  $('#viewing_pane').animate({scrollLeft: $('#motion').position().left}, 1000,'easeInOutExpo');

  // set scroll location variable
  $scrollLocation="motion";

});

/****************** vertical scrolling ******************/

/***** #1 function to count # of first child elements in section *****/
/* example - $(#web.section:first > a).length */

function countSectionElements(sectionName) {
  var x = $(sectionName + '.section:first > a').length;

  /* DATA DUMP: display all elements in section in console
  $(sectionName + '.section:first > a').each(function () {
      console.log($(this).attr('class'));
  });
  */

  /* for some reason this function counts the scroll arrows so subtract 2 */
  x = x-2;
  //console.log('There are ' + x + ' items in the ' + sectionName + ' section.');

  return x;
}


/***** #2 function to set # of extra section columns that limits the number of down scroll clicks *****/
function getExtraRowCount(sectionElementCount) {
    if ($browserWindowWidth > 1080) {
      var extra_row_count = Math.ceil(sectionElementCount/4) - $numberOfVisibleRows;  // # of rows below the fold on 4 col
      //console.log(extra_row_count + ' extra rows');
      return extra_row_count;
    } else if ($browserWindowWidth < 1061 && $browserWindowWidth > 799) {
      var extra_row_count = Math.ceil(sectionElementCount/3) - $numberOfVisibleRows;  // # of rows below the fold on 3 col
      //console.log(extra_row_count + ' extra rows');
      return extra_row_count;
    } else if ($browserWindowWidth < 800 && $browserWindowWidth > 567) {
      var extra_row_count = Math.ceil(sectionElementCount/2) - $numberOfVisibleRows;  // # of rows below the fold on 2 col
      //console.log(extra_row_count + ' extra rows');
      return extra_row_count;
    } else if ($browserWindowWidth < 568) {
      var extra_row_count = Math.ceil(sectionElementCount/1) - $numberOfVisibleRows;  // # of rows below the fold on 2 col
      //console.log(extra_row_count + ' extra rows');
      return extra_row_count;
    }
}

/****************** web ******************/
/* make sure go to far up or down*/

var $web_row_position = 1;

$('a#web.scroll_arrow_up').click(function() {
  if ($web_row_position > 1) {
    $('#viewing_pane').stop().animate({scrollTop: '-=197'}, 1000,'easeInOutExpo');
    $('div#web.scroll_arrows').stop().animate({top: '-=197'}, 1000,'easeInOutExpo');
    $web_row_position -=1;
  }
});

$('a#web.scroll_arrow_down').click(function() {

  // call function to get the # of elements in this section
  var webSectionElementCount = countSectionElements('#web');

  // call function (with element count) to get # of extra rows so it stops scrolling at right place
  var $web_extra_row_count = getExtraRowCount(webSectionElementCount);

  if ($web_row_position < ($web_extra_row_count + 1)) {
    $('#viewing_pane').stop().animate({scrollTop: '+=197'}, 1000,'easeInOutExpo');
    $('div#web.scroll_arrows').stop().animate({top: '+=197'}, 1000,'easeInOutExpo');
    $web_row_position +=1;
  }
});

/****************** print ******************/
/* make sure go to far up or down*/
  var $print_extra_row_count = 4;  // set this everytime you increase the row count
  var $print_row_position = 1;

$('a#print.scroll_arrow_up').click(function() {
  if ($print_row_position > 1) {
    $('#viewing_pane').animate({scrollTop: '-=197'}, 1000,'easeInOutExpo');
    $('div#print.scroll_arrows').animate({top: '-=197'}, 1000,'easeInOutExpo');
    $print_row_position -=1;
  }
});

$('a#print.scroll_arrow_down').click(function() {

  // call function to get the # of elements in this section
  var printSectionElementCount = countSectionElements('#print');

  // call function (with element count) to get # of extra rows so it stops scrolling at right place
  var $print_extra_row_count = getExtraRowCount(printSectionElementCount);

  if ($print_row_position < ($print_extra_row_count + 1)) {
    $('#viewing_pane').animate({scrollTop: '+=197'}, 1000,'easeInOutExpo');
    $('div#print.scroll_arrows').animate({top: '+=197'}, 1000,'easeInOutExpo');
    $print_row_position +=1;
  }
});

/****************** mobile ******************/
/* make sure go to far up or down*/
  var $mobile_extra_row_count = 1;  // set this everytime you increase the row count
  var $mobile_row_position = 1;

$('a#mobile.scroll_arrow_up').click(function() {
  if ($mobile_row_position > 1) {
    $('#viewing_pane').animate({scrollTop: '-=197'}, 1000,'easeInOutExpo');
    $('div#mobile.scroll_arrows').animate({top: '-=197'}, 1000,'easeInOutExpo');
    $mobile_row_position -=1;
  }
});

$('a#mobile.scroll_arrow_down').click(function() {

  // call function to get the # of elements in this section
  var mobileSectionElementCount = countSectionElements('#mobile');

  // call function (with element count) to get # of extra rows so it stops scrolling at right place
  var $mobile_extra_row_count = getExtraRowCount(mobileSectionElementCount);

  if ($mobile_row_position < ($mobile_extra_row_count + 1)) {
    $('#viewing_pane').animate({scrollTop: '+=197'}, 1000,'easeInOutExpo');
    $('div#mobile.scroll_arrows').animate({top: '+=197'}, 1000,'easeInOutExpo');
    $mobile_row_position +=1;
  }
});

/****************** motion ******************/
/* make sure go to far up or down*/
  var $motion_extra_row_count = 4;  // set this everytime you increase the row count
  var $motion_row_position = 1;

$('a#motion.scroll_arrow_up').click(function() {
  if ($motion_row_position > 1) {
    $('#viewing_pane').animate({scrollTop: '-=197'}, 1000,'easeInOutExpo');
    $('div#motion.scroll_arrows').animate({top: '-=197'}, 1000,'easeInOutExpo');
    $motion_row_position -=1;
  }
});

$('a#motion.scroll_arrow_down').click(function() {

  // call function to get the # of elements in this section
  var motionSectionElementCount = countSectionElements('#motion');

  // call function (with element count) to get # of extra rows so it stops scrolling at right place
  var $motion_extra_row_count = getExtraRowCount(motionSectionElementCount);

  if ($motion_row_position < ($motion_extra_row_count + 1)) {
    $('#viewing_pane').animate({scrollTop: '+=197'}, 1000,'easeInOutExpo');
    $('div#motion.scroll_arrows').animate({top: '+=197'}, 1000,'easeInOutExpo');
    $motion_row_position +=1;
  }
});
