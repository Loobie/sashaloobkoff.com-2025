/**
 * ArsonalVideoCuepoint
 */
(function () {

    this.ArsonalVideoCuepoint = function(id, time) {
        this.id = id;
        this.time = time;
        this.enabled = true;
    };

    ArsonalVideoCuepoint.prototype.constructor = ArsonalVideoCuepoint;

})();

/**
 * ArsonalSizmekVideo
 */
(function () {

    this.ArsonalSizmekVideo = function(id, elementId, videoContainerId, sourceMP4, sourceWEBM, videoDuration, autoplay, automuted) {
        this.observers = [];
        this.id = id;
        this.elementId = elementId;
        this.videoContainerId = videoContainerId;
        this.sourceMP4 = sourceMP4;
        this.sourceWEBM = sourceWEBM;
        this.videoDuration = videoDuration;
        this.time = 0;
        this.autoplay = false || autoplay;
        this.isVideoPlaying = this.autoplay;
        this.isVideoComplete = false;
        this.automuted = false || automuted;
        this.isVideoMuted = this.automuted;
        this.videoPlaybackInterval = 0;
        this.videoComponent = null;
        this.videoContainer = document.getElementById(this.videoContainerId);
        this.cuepoints = [];
    };

    ArsonalSizmekVideo.prototype = new Notifier();
    ArsonalSizmekVideo.prototype.constructor = ArsonalSizmekVideo;

    ArsonalSizmekVideo.prototype.initialize = function() {
        if(this.videoComponent) return;
        if(this.autoplay) {
            this.videoContainer.innerHTML = "<video id='" + this.elementId + "' autoplay><source src='" + this.sourceMP4 + "' type='video/mp4'><source src='" + this.sourceWEBM + "' type='video/webm'> Your browser does not support the <code>video</code> videoComponent.</video><div id='sdk-video-player' class='sdk-video-player'><div id='sdk-video-play-button' class='sdk-video-player-button centered'></div></div>";
        } else {
            this.videoContainer.innerHTML = "<video id='" + this.elementId + "'><source src='" + this.sourceMP4 + "' type='video/mp4'><source src='" + this.sourceWEBM + "' type='video/webm'> Your browser does not support the <code>video</code> videoComponent.</video><div id='sdk-video-player' class='sdk-video-player'><div id='sdk-video-play-button' class='sdk-video-player-button centered'></div></div>";
        }
        this.videoComponent = document.getElementById(this.elementId);
        var sdkPlayerVideoFormat = "mp4";
        var useSDKVideoPlayer = false;
        var videoTrackingModule = null;
        var sdkData = EB.getSDKData();
        if (sdkData !== null) {
            if (sdkData.SDKType === "MRAID" && sdkData.version > 1) {
                document.body.classList.add("sdk");
                var sourceTags = this.videoComponent.getElementsByTagName("source");
                var videoSource = "";
                for(var i = 0; i < sourceTags.length; i++) {
                    if (sourceTags[i].getAttribute("type")) {
                        if (sourceTags[i].getAttribute("type").toLowerCase() === "video/" + sdkPlayerVideoFormat) {
                            videoSource = sourceTags[i].getAttribute("src");
                        }
                    }
                }
                useSDKVideoPlayer = true;
            }
        }
        if (! useSDKVideoPlayer) {
            videoTrackingModule = new EBG.VideoModule(this.videoComponent);
        }
        if(this.autoplay) {
            this.play();
        }
        if(this.automuted) {
            this.mute();
        } else {
            this.unmute();
        }
        this.removeCuepoints();
        this.addVideoEvents();
    };

    ArsonalSizmekVideo.prototype.videoPlaying = function() {
        this.isVideoComplete = false;
        clearInterval(this.videoPlaybackInterval);
        this.videoPlaybackInterval = setInterval(this.videoProgress.bind(this), 100);
        this.videoComponent.style.visibility = "visible";
        this.sendNotification('playing', {}, this);
    };

    ArsonalSizmekVideo.prototype.videoProgress = function() {
        if(! this.videoComponent.currentTime) return;
        var i = 0;
        if(this.time > this.videoComponent.currentTime) {
            for(i = 0; i < this.cuepoints.length; i++) {
                this.cuepoints[i].enabled = true;
            }
        }
        this.time = parseFloat(this.videoComponent.currentTime).toFixed(2);
        for(i = 0; i < this.cuepoints.length; i++) {
            if(this.cuepoints[i].enabled) {
                if(((parseFloat(this.time) - 0.1) < this.cuepoints[i].time &&
                    (parseFloat(this.time) + 0.1) > this.cuepoints[i].time) ||
                    this.time === this.cuepoints[i].time) {

                    this.cuepoints[i].enabled = false;
                    this.sendNotification(this.cuepoints[i].id, { time: this.cuepoints[i].time }, this);
                }
            }
        }
        this.sendNotification("progress", { time: this.videoComponent.currentTime, duration: this.videoDuration }, this);
    };

    ArsonalSizmekVideo.prototype.videoComplete = function() {
        if(this.isVideoComplete) return;
        this.isVideoComplete = true;
        this.videoComponent.style.visibility = "hidden";
        this.rewind();
        setTimeout(function() {
            this.sendNotification("ended", {}, this);
        }.bind(this), 10);
    };

    ArsonalSizmekVideo.prototype.videoEndFullscreen = function() {
        this.rewind();
        this.sendNotification("fullscreenchange", {}, this);
    };

    ArsonalSizmekVideo.prototype.rewind = function() {
        if(this.isVideoComplete) return;
        this.isVideoPlaying = false;
        this.videoComponent.currentTime = 0;
        this.videoComponent.pause();
        clearInterval(this.videoPlaybackInterval);
    };

    ArsonalSizmekVideo.prototype.play = function() {
        this.isVideoPlaying = true;
        this.videoComponent.play();
        clearInterval(this.videoPlaybackInterval);
        this.videoPlaybackInterval = setInterval(this.videoProgress.bind(this), 100);
    };

    ArsonalSizmekVideo.prototype.pause = function() {
        this.isVideoPlaying = false;
        this.videoComponent.pause();
        clearInterval(this.videoPlaybackInterval);
    };

    ArsonalSizmekVideo.prototype.replay = function() {
        this.rewind();
        this.unmute();
        this.play();
    };

    ArsonalSizmekVideo.prototype.mute = function() {
        this.isVideoMuted = true;
        this.videoComponent.volume = 0.0;
    };

    ArsonalSizmekVideo.prototype.unmute = function() {
        this.isVideoMuted = false;
        this.videoComponent.volume = 1.0;
    };

    ArsonalSizmekVideo.prototype.addCuepoint = function(id, time) {
        var c = new ArsonalVideoCuepoint(id, time);
        this.cuepoints.push(c);
    };

    ArsonalSizmekVideo.prototype.removeCuepoints = function(id, time) {
        this.cuepoints = []
    };

    ArsonalSizmekVideo.prototype.destroy = function(id, time) {
        if(!this.videoComponent) return;
        this.removeVideoEvents();
        this.pause();
        delete(this.videoComponent);
        this.videoComponent = null;
        this.videoContainer.innerHTML = "";
    };

    ArsonalSizmekVideo.prototype.addVideoEvents = function() {
        this.videoComponent.addEventListener("playing", this.videoPlaying.bind(this), false);
        this.videoComponent.addEventListener('ended', this.videoComplete.bind(this), false);
        this.videoComponent.addEventListener("fullscreenchange", this.videoEndFullscreen.bind(this), false);
        this.videoComponent.addEventListener("mozfullscreenchange", this.videoEndFullscreen.bind(this), false);
        this.videoComponent.addEventListener("webkitfullscreenchange", this.videoEndFullscreen.bind(this), false);
        this.videoComponent.addEventListener("fullscreenchange", this.videoEndFullscreen.bind(this), false);
        this.videoComponent.addEventListener("mozfullscreenchange", this.videoEndFullscreen.bind(this), false);
        this.videoComponent.addEventListener("webkitendfullscreen", this.videoEndFullscreen.bind(this), false);
        this.videoComponent.addEventListener("webkitfullscreenchange", this.videoEndFullscreen.bind(this), false);
    };

    ArsonalSizmekVideo.prototype.removeVideoEvents = function() {
        try {
            this.videoComponent.removeEventListener("playing", this.videoPlaying.bind(this), false);
            this.videoComponent.removeEventListener('ended', this.videoComplete.bind(this), false);
            this.videoComponent.removeEventListener("fullscreenchange", this.videoEndFullscreen.bind(this), false);
            this.videoComponent.removeEventListener("mozfullscreenchange", this.videoEndFullscreen.bind(this), false);
            this.videoComponent.removeEventListener("webkitfullscreenchange", this.videoEndFullscreen.bind(this), false);
            this.videoComponent.removeEventListener("fullscreenchange", this.videoEndFullscreen.bind(this), false);
            this.videoComponent.removeEventListener("mozfullscreenchange", this.videoEndFullscreen.bind(this), false);
            this.videoComponent.removeEventListener("webkitendfullscreen", this.videoEndFullscreen.bind(this), false);
            this.videoComponent.removeEventListener("webkitfullscreenchange", this.videoEndFullscreen.bind(this), false);
        } catch(e) {}
    };

})();


/* ================================================================
    EXAMPLE

// TODO Construct the video object
custom_video_1_component = new ArsonalSizmekVideo(
    video_1_vo.id, // identifier for tracking purposes
    video_1_vo.elementId, // video videoComponent id
    "video-1-container", // video container
    video_1_vo.sourceMP4, // mp4 url
    video_1_vo.sourceWEBM, // webm url
    video_1_vo.videoDuration, // video length
    true, // autoplay
    true, // auto muted
    false // use browser video controls
);

// TODO Listen for video events from "this" scope. Which then relays events to the "receiveNotification" method
custom_video_1_component.addObserver(this);

// TODO Creates the video player. Be sure to have loaded the doubleclick module "studio.module.ModuleId.RAD_VIDEO" first before calling.
custom_video_1_component.initialize();

// TODO OVERRIDE THIS CALLBACK METHOD TO LISTEN FOR VIDEO EVENTS
function receiveNotification(notification) {
    console.log("OVERRIDE THIS CALLBACK METHOD TO LISTEN FOR VIDEO EVENTS");
    var data = notification.data;
    var type = notification.type;
    switch(type) {
        case "playing" :
            break;
        case "progress" :
            console.log(data.time);
            console.log(data.duration);
            break;
        case "ended" :
            break;
        case "fullscreenchange" :
            break;
        case "cue1" :
            console.log(data.time);
            break;
    }
}

*/
