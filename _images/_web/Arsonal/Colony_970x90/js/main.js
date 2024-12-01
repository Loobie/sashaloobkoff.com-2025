var todaysDate = new Date();
var releaseDate = new Date(2016, 0, 14);
var dateDescription = "pre";
var sizmek_sync_block = null;
var button_clicktag_1 = null;
var button_clicktag_2 = null;
var button_clicktag_3 = null;
var watch_cta = null;
var button_cta = null;
var image_sequence_1_image_container = null;
var imageSequenceTotalFrames = 179;
var imageSequenceFrame = 0;
var imageSequenceImages = [];
var resolve = null;
var isMobileDevice = false;
var isTabletDevice = false;
var button_video_1 = null;
var button_video_2 = null;
var button_video_3 = null;
var button_play_video = null;
var button_pause_video = null;
var button_unmute_video = null;
var button_mute_video = null;
var button_click_to_play_video = null;
var button_click_to_replay_video = null;
var video_2_container = null;
var current_video_vo = null;
var custom_video_1_component = null;
var custom_video_2_component = null;
var custom_video_3_component = null;
var current_custom_video_component = null;
var closeBtn = null;
var selectedButtonId = "";
var expandDuration = 0;
var collapseDuration = expandDuration;
var pushdownSettings = {
    pushDown: true,
    expandDuration: expandDuration || 0,
    collapseDuration: collapseDuration || 0
};
var video_1_vo = {
    id : "video-2-component",
    elementId : "video-2",
    element : null,
    videoDuration: 5000,
    sourceMP4 : "",
    sourceWEBM : ""
};
var video_2_vo = {
    id : "video-3-component",
    elementId : "video-2",
    element : null,
    videoDuration: 5000,
    sourceMP4 : "",
    sourceWEBM : ""
};
var video_3_vo = {
    id : "video-4-component",
    elementId : "video-2",
    element : null,
    videoDuration: 5000,
    sourceMP4 : "",
    sourceWEBM : ""
};


function initEB() {
    if (!EB.isInitialized()) {
        EB.addEventListener(EBG.EventName.EB_INITIALIZED, startAd);
    } else {
        startAd();
    }
}

function startAd() {
    EB._sendMessage("resizecontainer", pushdownSettings);

    if(deviceDetector.device == 'desktop') {
    } else {
        if(deviceDetector.device == 'tablet') {
            isTabletDevice = true;
            isMobileDevice = true
        } else {
            isMobileDevice = true
        }
    }
    // console.log("deviceDetector.device: " + deviceDetector.device);
    // TODO TEST MOBILE
    // isMobileDevice = true;
    // isTabletDevice = true;

    sizmek_sync_block = document.getElementById("sizmek_sync_block");
    resolve = document.getElementById("resolve");
    button_clicktag_1 = document.getElementById("button-clicktag-1");
    button_clicktag_2 = document.getElementById("button-clicktag-2");
    button_clicktag_3 = document.getElementById("button-clicktag-3");
    watch_cta = document.getElementById("watch-cta");
    button_cta = document.getElementById("button-cta");
    button_play_video = document.getElementById("button-play-video");
    button_pause_video = document.getElementById("button-pause-video");
    button_unmute_video = document.getElementById("button-unmute-video");
    button_mute_video = document.getElementById("button-mute-video");
    button_click_to_play_video = document.getElementById("button-click-to-play-video");
    button_click_to_replay_video = document.getElementById("button-click-to-replay-video");
    button_video_1 = document.getElementById("button-video-1");
    button_video_2 = document.getElementById("button-video-2");
    button_video_3 = document.getElementById("button-video-3");
    video_2_container = document.getElementById("video-2-container");
    content_expand = document.getElementById("content-expand");
    closeBtn = document.getElementById("panel-closeBtn");

    current_video_vo = video_1_vo;


    // TODO DATE SWAP
    if (todaysDate.getFullYear() === 2016) {
        dateDescription = "post";
        if (todaysDate.getMonth() === releaseDate.getMonth()) {
            if (todaysDate.getDate() === 13) {
                dateDescription = "day-before";
            } else if (todaysDate.getDate() === releaseDate.getDate()) {
                dateDescription = "day-of";
            } else if (todaysDate.getDate() >= 1 && todaysDate.getDate() <= 12) {
                dateDescription = "lead-in-2";
            } else if (todaysDate.getDate() >= 15 && todaysDate.getDate() <= 21) {
                dateDescription = "lead-in-3";
            }
        }
    } else if (todaysDate.getFullYear() === 2015) {
        dateDescription = "pre";
        if (todaysDate.getMonth() === 11) {
            if (todaysDate.getDate() >= 14 && todaysDate.getDate() <= 31) {
                dateDescription = "lead-in-1";
            } else if (todaysDate.getDate() < 14) {
                dateDescription = "pre";
            }
        }
    }
    console.log("dateDescription: " + dateDescription);
    switch (dateDescription) {
        case "pre" :
            document.getElementById("tunein").classList.add("tunein-ddt");
            document.getElementById("tunein-expand").classList.add("tunein-ddt");
            video_1_vo.sourceMP4 = "videos/Colony_Trailer_THURS_JAN_14_530x418.mp4";
            video_1_vo.sourceWEBM = "videos/Colony_Trailer_THURS_JAN_14_530x418.webm";

            video_2_vo.sourceMP4 = "videos/Colony_Geronimo_THUR_JAN_14_530x418.mp4";
            video_2_vo.sourceWEBM = "videos/Colony_Geronimo_THUR_JAN_14_530x418.webm";

            video_3_vo.sourceMP4 = "videos/Colony_Survival_THURS_JAN_14_530x418.mp4";
            video_3_vo.sourceWEBM = "videos/Colony_Survival_THURS_JAN_14_530x418.webm";

            $('#button-cta').css('background-image', 'url("images/button-cta.png")');
            break;

        case "lead-in-1" :
            document.getElementById("tunein").classList.add("tunein-ddt");
            document.getElementById("tunein-expand").classList.add("tunein-ddt");

            video_1_vo.sourceMP4 = "videos/Colony_Trailer_THURS_JAN_14_530x418.mp4";
            video_1_vo.sourceWEBM = "videos/Colony_Trailer_THURS_JAN_14_530x418.webm";

            video_2_vo.sourceMP4 = "videos/Colony_Geronimo_THUR_JAN_14_530x418.mp4";
            video_2_vo.sourceWEBM = "videos/Colony_Geronimo_THUR_JAN_14_530x418.webm";

            video_3_vo.sourceMP4 = "videos/Colony_Survival_THURS_JAN_14_530x418.mp4";
            video_3_vo.sourceWEBM = "videos/Colony_Survival_THURS_JAN_14_530x418.webm";

            $('#button-cta').css('background-image', 'url("images/button-cta.png")');
            break;

        case "lead-in-2" :
            document.getElementById("tunein").classList.add("tunein-lead-in-2");
            document.getElementById("tunein-expand").classList.add("tunein-lead-in-2");

            video_1_vo.sourceMP4 = "videos/Colony_Trailer_THURS_JAN_14_530x418.mp4";
            video_1_vo.sourceWEBM = "videos/Colony_Trailer_THURS_JAN_14_530x418.webm";

            video_2_vo.sourceMP4 = "videos/Colony_Geronimo_THUR_JAN_14_530x418.mp4";
            video_2_vo.sourceWEBM = "videos/Colony_Geronimo_THUR_JAN_14_530x418.webm";

            video_3_vo.sourceMP4 = "videos/Colony_Survival_THURS_JAN_14_530x418.mp4";
            video_3_vo.sourceWEBM = "videos/Colony_Survival_THURS_JAN_14_530x418.webm";

            $('#button-cta').css('background-image', 'url("images/watch-pilot-cta.png")');
            break;

        case "lead-in-3" :
            document.getElementById("tunein").classList.add("tunein-lead-in-3");
            document.getElementById("tunein-expand").classList.add("tunein-lead-in-3");

            video_1_vo.sourceMP4 = "videos/Colony_Trailer_THURS_530x418.mp4";
            video_1_vo.sourceWEBM = "videos/Colony_Trailer_THURS_530x418.webm";

            video_2_vo.sourceMP4 = "videos/Colony_Geronimo_THUR_530x418.mp4";
            video_2_vo.sourceWEBM = "videos/Colony_Geronimo_THUR_530x418.webm";

            video_3_vo.sourceMP4 = "videos/Colony_Survival_THURS_530x418.mp4";
            video_3_vo.sourceWEBM = "videos/Colony_Survival_THURS_530x418.webm";

            $('#button-cta').css('background-image', 'url("images/watch-pilot-cta.png")');
            break;

        case "day-before" :
            document.getElementById("tunein").classList.add("tunein-tomorrow");
            document.getElementById("tunein-expand").classList.add("tunein-tomorrow");

            video_1_vo.sourceMP4 = "videos/Colony_Trailer_TOM_530x418.mp4";
            video_1_vo.sourceWEBM = "videos/Colony_Trailer_TOM_530x418.webm";

            video_2_vo.sourceMP4 = "videos/Colony_Geronimo_TOM_530x418.mp4";
            video_2_vo.sourceWEBM = "videos/Colony_Geronimo_TOM_530x418.webm";

            video_3_vo.sourceMP4 = "videos/Colony_Survival_TOM_530x418.mp4";
            video_3_vo.sourceWEBM = "videos/Colony_Survival_TOM_530x418.webm";

            $('#button-cta').css('background-image', 'url("images/watch-pilot-cta.png")');
            break;

        case "day-of" :
            document.getElementById("tunein").classList.add("tunein-tonight");
            document.getElementById("tunein-expand").classList.add("tunein-tonight");

            video_1_vo.sourceMP4 = "videos/Colony_Trailer_TON_530x418.mp4";
            video_1_vo.sourceWEBM = "videos/Colony_Trailer_TON_530x418.webm";

            video_2_vo.sourceMP4 = "videos/Colony_Geronimo_TON_530x418.mp4";
            video_2_vo.sourceWEBM = "videos/Colony_Geronimo_TON_530x418.webm";

            video_3_vo.sourceMP4 = "videos/Colony_Survival_TON_530x418.mp4";
            video_3_vo.sourceWEBM = "videos/Colony_Survival_TON_530x418.webm";

            $('#button-cta').css('background-image', 'url("images/choose-side-cta.png")');
            break;

        case "post" :
            document.getElementById("tunein").classList.add("tunein-lead-in-2");
            document.getElementById("tunein-expand").classList.add("tunein-lead-in-2");

            video_1_vo.sourceMP4 = "videos/Colony_Trailer_THURS_530x418.mp4";
            video_1_vo.sourceWEBM = "videos/Colony_Trailer_THURS_530x418.webm";

            video_2_vo.sourceMP4 = "videos/Colony_Geronimo_THUR_530x418.mp4";
            video_2_vo.sourceWEBM = "videos/Colony_Geronimo_THUR_530x418.webm";

            video_3_vo.sourceMP4 = "videos/Colony_Survival_THURS_530x418.mp4";
            video_3_vo.sourceWEBM = "videos/Colony_Survival_THURS_530x418.webm";

            $('#button-cta').css('background-image', 'url("images/watch-pilot-cta.png")');
            break;
    }


    button_play_video.addEventListener("click", pausePlayVideoHandler, false);
    button_pause_video.addEventListener("click", pausePlayVideoHandler, false);
    button_unmute_video.addEventListener("click", muteUnmuteVideoHandler, false);
    button_mute_video.addEventListener("click", muteUnmuteVideoHandler, false);
    button_click_to_play_video.addEventListener("click", clickToPlayVideoHandler, false);
    button_click_to_replay_video.addEventListener("click", clickToReplayVideoHandler, false);
    button_clicktag_1.addEventListener("click", clicktagHandler, false);
    button_clicktag_2.addEventListener("click", video2ClicktagHandler, false);
    button_clicktag_3.addEventListener("click", video2ClicktagHandler, false);
    watch_cta.addEventListener("click", expand, false);
    button_cta.addEventListener("click", video2ClicktagHandler, false);
    closeBtn.addEventListener("click", closeButtonHandler, false);


    button_video_1.addEventListener("click", callVideoHandler, false);
    button_video_1.addEventListener("mouseover", videoButtonMouseOverHandler, false);
    button_video_1.addEventListener("mouseout", videoButtonMouseOutHandler, false);

    button_video_2.addEventListener("click", callVideoHandler, false);
    button_video_2.addEventListener("mouseover", videoButtonMouseOverHandler, false);
    button_video_2.addEventListener("mouseout", videoButtonMouseOutHandler, false);

    button_video_3.addEventListener("click", callVideoHandler, false);
    button_video_3.addEventListener("mouseover", videoButtonMouseOverHandler, false);
    button_video_3.addEventListener("mouseout", videoButtonMouseOutHandler, false);

    if((isMobileDevice && ! isTabletDevice)) {
        button_unmute_video.style.display = "none";
        button_mute_video.style.display = "none";
        button_play_video.style.display = "none";
        button_pause_video.style.display = "none";
    }
    if(isMobileDevice) {
        button_unmute_video.style.display = "none";
        button_mute_video.style.display = "none";
    }

    sizmek_sync_block.style.display = "block";

}

function videoPlaying(e) {
    switch(current_video_vo.id) {
        case video_1_vo.id :
        case video_2_vo.id :
        case video_3_vo.id :
            document.getElementById("video-2-loader").style.display = "none";
            button_play_video.style.opacity = 1;
            button_pause_video.style.opacity = 1;
            button_mute_video.style.opacity = 1;
            button_unmute_video.style.opacity = 1;
            break;
    }
    if (current_custom_video_component.isVideoMuted) {
        button_mute_video.style.visibility = "hidden";
        button_unmute_video.style.visibility = "visible";
    } else {
        button_mute_video.style.visibility = "visible";
        button_unmute_video.style.visibility = "hidden";
    }
    switch(current_video_vo.id) {

        case video_1_vo.id :
            selectedButtonId = button_video_1.id;
            button_video_1.style.backgroundPosition = "0px -34px";
            button_video_2.style.backgroundPosition = "0px 0px";
            button_video_3.style.backgroundPosition = "0px 0px";
            break;

        case video_2_vo.id :
            selectedButtonId = button_video_2.id;
            button_video_1.style.backgroundPosition = "0px 0px";
            button_video_2.style.backgroundPosition = "0px -34px";
            button_video_3.style.backgroundPosition = "0px 0px";
            break;

        case video_3_vo.id :
            selectedButtonId = button_video_3.id;
            button_video_1.style.backgroundPosition = "0px 0px";
            button_video_2.style.backgroundPosition = "0px 0px";
            button_video_3.style.backgroundPosition = "0px -34px";
            break;
    }
}

function pausePlayVideoHandler(e) {
    if (! current_custom_video_component.isVideoPlaying) {
        current_custom_video_component.play();
        button_pause_video.style.visibility = "visible";
        button_play_video.style.visibility = "hidden";
    } else {
        current_custom_video_component.pause();
        button_pause_video.style.visibility = "hidden";
        button_play_video.style.visibility = "visible";
    }
}

function muteUnmuteVideoHandler(e) {
    if (current_custom_video_component.isVideoMuted) {
        current_custom_video_component.unmute();
        button_mute_video.style.visibility = "visible";
        button_unmute_video.style.visibility = "hidden";
    } else {
        current_custom_video_component.mute();
        button_mute_video.style.visibility = "hidden";
        button_unmute_video.style.visibility = "visible";
    }
}

function videoComplete() {
    exitFullScreenFromMobile();
    switch(current_video_vo.id) {
        case video_1_vo.id :
            button_click_to_replay_video.style.display = "block";
            button_click_to_play_video.style.display = "none";
            button_pause_video.style.visibility = "hidden";
            button_play_video.style.visibility = "visible";
            break;
        case video_2_vo.id :
            button_click_to_replay_video.style.display = "block";
            button_click_to_play_video.style.display = "none";
            button_pause_video.style.visibility = "hidden";
            button_play_video.style.visibility = "visible";
            break;
        case video_3_vo.id :
            button_click_to_replay_video.style.display = "block";
            button_click_to_play_video.style.display = "none";
            button_pause_video.style.visibility = "hidden";
            button_play_video.style.visibility = "visible";
            break;
    }
}

function imageSequence1Complete(e) {
    callResolveAnimation();
}

function videoEndFullscreen() {
    switch(current_video_vo.id) {
        case video_1_vo.id :
            button_click_to_replay_video.style.display = "none";
            button_click_to_play_video.style.display = "block";
            button_pause_video.style.visibility = "hidden";
            button_play_video.style.visibility = "visible";
            break;
        case video_2_vo.id :
            button_click_to_replay_video.style.display = "none";
            button_click_to_play_video.style.display = "block";
            button_pause_video.style.visibility = "hidden";
            button_play_video.style.visibility = "visible";
            break;
        case video_3_vo.id :
            button_click_to_replay_video.style.display = "none";
            button_click_to_play_video.style.display = "block";
            button_pause_video.style.visibility = "hidden";
            button_play_video.style.visibility = "visible";
            break;
    }
}

function callResolveAnimation() {
    exitFullScreenFromMobile();
    if(resolve.style.visibility === "visible") return;
    resolve.style.visibility = "visible";
    document.getElementById("initial").style.display = "none";
    document.getElementById("resolve").style.visibility = "visible";
    switch(current_video_vo.id) {
        case video_1_vo.id :
            if (isMobileDevice) {
                APP.destroy();
                document.getElementById("image-sequence-1").style.visibility = "hidden";
            } else {
                current_custom_video_component.destroy();
            }
            break;
    }
}

function setVideoComponent(videoObject, autoplay) {
    if(current_custom_video_component) {
        current_custom_video_component.destroy();
    }
    current_video_vo = videoObject;


    switch(current_video_vo.id) {
        case video_1_vo.id :
            custom_video_1_component = new ArsonalSizmekVideo(current_video_vo.id, current_video_vo.elementId, "video-2-container", current_video_vo.sourceMP4, current_video_vo.sourceWEBM, current_video_vo.videoDuration, autoplay, false);
            custom_video_1_component.addObserver(this);
            custom_video_1_component.initialize();
            current_custom_video_component = custom_video_1_component;
            current_video_vo.element = document.getElementById(current_video_vo.elementId);
            break;
        case video_2_vo.id :
            custom_video_2_component = new ArsonalSizmekVideo(current_video_vo.id, current_video_vo.elementId, "video-2-container", current_video_vo.sourceMP4, current_video_vo.sourceWEBM, current_video_vo.videoDuration, autoplay, false);
            custom_video_2_component.addObserver(this);
            custom_video_2_component.initialize();
            current_custom_video_component = custom_video_2_component;
            current_video_vo.element = document.getElementById(current_video_vo.elementId);
            break;
        case video_3_vo.id :
            custom_video_3_component = new ArsonalSizmekVideo(current_video_vo.id, current_video_vo.elementId, "video-2-container", current_video_vo.sourceMP4, current_video_vo.sourceWEBM, current_video_vo.videoDuration, autoplay, false);
            custom_video_3_component.addObserver(this);
            custom_video_3_component.initialize();
            current_custom_video_component = custom_video_3_component;
            current_video_vo.element = document.getElementById(current_video_vo.elementId);
            break;
    }
    if(autoplay) {
        document.getElementById("video-2-loader").style.display = "block";
        button_play_video.style.opacity = 0;
        button_pause_video.style.opacity = 0;
        button_mute_video.style.opacity = 0;
        button_unmute_video.style.opacity = 0;
        button_click_to_play_video.style.display = "none";
        button_click_to_replay_video.style.display = "none";
        button_mute_video.style.visibility = "visible";
        button_unmute_video.style.visibility = "hidden";
        button_play_video.style.visibility = "hidden";
        button_pause_video.style.visibility = "visible";
    } else {
        button_click_to_play_video.style.display = "block";
        button_click_to_replay_video.style.display = "none";
    }
}

function videoButtonMouseOverHandler(e) {
    if(e.currentTarget.id === selectedButtonId) return;
    e.currentTarget.style.backgroundPosition = "0px -34px";
}

function videoButtonMouseOutHandler(e) {
    if(e.currentTarget.id === selectedButtonId) return;
    e.currentTarget.style.backgroundPosition = "0px 0px";
}

function collapse() {
    isExpanded = false;
    content_expand.style.display = "none";
    EB.collapse();

    if (current_custom_video_component.isVideoPlaying) {
        if(current_video_vo.element) {
            current_custom_video_component.mute();
            current_custom_video_component.pause();
        }
        button_click_to_play_video.style.display = "block";
        button_click_to_replay_video.style.display = "none";
    }
}

function expand() {
    isExpanded = true;
    content_expand.style.display = "block";
    EB.expand();

    setVideoComponent(video_1_vo, true);
}

function clickToPlayVideoHandler(e) {
    document.getElementById("video-2-loader").style.display = "block";
    button_play_video.style.opacity = 0;
    button_pause_video.style.opacity = 0;
    button_mute_video.style.opacity = 0;
    button_unmute_video.style.opacity = 0;
    current_custom_video_component.unmute();
    current_custom_video_component.play();
    button_click_to_play_video.style.display = "none";
    button_click_to_replay_video.style.display = "none";
    button_mute_video.style.visibility = "visible";
    button_unmute_video.style.visibility = "hidden";
    button_play_video.style.visibility = "hidden";
    button_pause_video.style.visibility = "visible";
}

function clickToReplayVideoHandler(e) {
    current_video_vo.element.currentTime = 0;
    current_video_vo.element.play();
    button_play_video.style.visibility = "hidden";
    button_pause_video.style.visibility = "visible";
    button_mute_video.style.visibility = "visible";
    button_unmute_video.style.visibility = "hidden";
    button_click_to_play_video.style.display = "none";
    button_click_to_replay_video.style.display = "none";
}

function closeButtonHandler(e) {
    collapse();
}

function clicktagHandler(e) {
    switch (dateDescription) {
        case "pre" :
            EB.clickthrough("clickTag1");
            break;

        case "lead-in-1" :
            EB.clickthrough("clickTag1");
            break;

        case "lead-in-2" :
            EB.clickthrough("clickTag2");
            break;

        case "lead-in-3" :
            EB.clickthrough("clickTag2");
            break;

        case "day-before" :
            EB.clickthrough("clickTag2");
            break;

        case "day-of" :
            EB.clickthrough("clickTag2");
            break;

        case "post" :
            EB.clickthrough("clickTag1");
            break;
    }

    collapse();
}

function video2ClicktagHandler() {
    if (current_custom_video_component.isVideoPlaying) {
        if(current_video_vo.element) {
            current_custom_video_component.mute();
            current_custom_video_component.pause();
        }
        button_click_to_play_video.style.display = "block";
        button_click_to_replay_video.style.display = "none";
    }
    switch (dateDescription) {
        case "pre" :
            EB.clickthrough("clickTag1");
            break;

        case "lead-in-1" :
            EB.clickthrough("clickTag1");
            break;

        case "lead-in-2" :
            EB.clickthrough("clickTag2");
            break;

        case "lead-in-3" :
            EB.clickthrough("clickTag2");
            break;

        case "day-before" :
            EB.clickthrough("clickTag2");
            break;

        case "day-of" :
            EB.clickthrough("clickTag2");
            break;

        case "post" :
            EB.clickthrough("clickTag1");
            break;
    }

    collapse();
}

function callVideoHandler(e) {
    switch(e.currentTarget.id) {
        case "button-video-1" :
            setVideoComponent(video_1_vo, true);
            break;
        case "button-video-2" :
            setVideoComponent(video_2_vo, true);
            break;
        case "button-video-3" :
            setVideoComponent(video_3_vo, true);
            break;
    }
}

function exitFullScreenFromMobile() {
    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
    }
}

window.APP = window.APP || {};
APP.isPaused = true;
APP.accumulator = 0;
APP.seconds = 0;
APP.counter = 0;
APP.dt = (1000 / 30);

APP.testCrowseBrowserLoopPrefered = function () {
    try {
        window.requestAnimationFrame(function () {});
    } catch (e) {
        return "setInterval";
    }
    return "window.requestAnimationFrame";
};

APP.pause = function () {
    APP.isPaused = true;
    if (APP.testCrowseBrowserLoopPrefered() === "window.requestAnimationFrame") {
        window.cancelAnimationFrame(APP.core.animationFrame);
    } else {
        clearInterval(APP.core.animationFrame);
    }
};

APP.play = function () {
    APP.isPaused = false;
    APP.core.then = Date.now();
    // trace("using preferred loop: " + APP.testCrowseBrowserLoopPrefered());
    if (APP.testCrowseBrowserLoopPrefered() === "window.requestAnimationFrame") {
        APP.core.frame();
    } else {
        APP.core.animationFrame = setInterval(APP.core.frameInterval, 1000 / 30);
    }
};

APP.destroy = function () {
    APP.pause();
    if (APP.testCrowseBrowserLoopPrefered() === "window.requestAnimationFrame") {
        APP.core.frame = function () {};
    } else {
        clearInterval(APP.core.animationFrame);
    }
};

APP.core = {
    frame: function () {
        if (APP.isPaused) return;
        APP.core.setDelta();
        APP.core.update();
        // APP.core.render();
        APP.seconds = Math.floor(APP.accumulator);
        APP.core.animationFrame = window.requestAnimationFrame(APP.core.frame);
    },
    frameInterval: function () {
        if (APP.isPaused) return;
        APP.core.setDelta();
        APP.core.update();
        APP.core.render();
        APP.seconds = Math.floor(APP.accumulator);
    },
    setDelta: function () {
        APP.core.now = Date.now();
        APP.core.delta = (APP.core.now - APP.core.then) / 1000; // seconds since last frame
        APP.core.then = APP.core.now;
        APP.accumulator += APP.core.delta;
    },
    update: function () {},
    render: function () {}
};

APP.core.update = function () {
    if (APP.counter % 4 === 0) {
        image_sequence_1_image_container.setAttribute("src", imageSequenceImages[imageSequenceFrame]);
        if (imageSequenceFrame === imageSequenceTotalFrames) {
            imageSequence1Complete(null);
        }
        imageSequenceFrame++;
    }
    APP.counter = ++APP.counter % 30;
};

APP.core.render = function () {};

function receiveNotification(notification) {
    var data = notification.data;
    var type = notification.type;
    switch(type) {
        case "playing" :
            videoPlaying();
            break;
        case "progress" :
            break;
        case "ended" :
            videoComplete();
            break;
        case "fullscreenchange" :
            videoEndFullscreen();
            break;
    }
}
