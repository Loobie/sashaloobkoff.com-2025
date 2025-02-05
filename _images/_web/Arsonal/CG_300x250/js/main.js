var todaysDate = new Date();
var releaseDate = new Date(2016, 0, 7);
var dateDescription = "";
var sizmek_sync_block = null;
var button_clicktag_2 = null;
var button_clicktag_3 = null;
var button_clicktag_4 = null;
var button_cta = null;
var hand = null;
var chain = null;
var flash = null;
var tunein_2 = null;
var resolve = null;
var quizGame = null;
var score = 0;
var isMobileDevice = false;
var isTabletDevice = false;
var isTakeQuizEnabled = true;

function loadEB() {
    if (EB.isInitialized()) {
        initialize();
    } else {
        EB.addEventListener(EBG.EventName.EB_INITIALIZED, initialize);
    }
}

function initialize() {
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
    button_clicktag_2 = document.getElementById("button-clicktag-2");
    button_clicktag_3 = document.getElementById("button-clicktag-3");
    button_clicktag_4 = document.getElementById("button-clicktag-4");
    button_cta = document.getElementById("button-cta");
    hand = document.getElementById("hand");
    chain = document.getElementById("chain");
    flash = document.getElementById("flash");
    tunein_2 = document.getElementById("tunein-resolve");

    // TODO DATE SWAP
    if (todaysDate.getFullYear() === 2016) {
        if (todaysDate.getMonth() === releaseDate.getMonth()) {
            if (todaysDate.getDate() === releaseDate.getDate()-1) {
                dateDescription = "day-before";
            } else if (todaysDate.getDate() === releaseDate.getDate()) {
                dateDescription = "day-of";
            } else if (todaysDate.getDate() >= 1 && todaysDate.getDate() <= 5) {
                dateDescription = "lead-in";
            } else {
                dateDescription = "post";
            }
        } else {
            dateDescription = "post";
        }
    } else if (todaysDate.getFullYear() === 2015) {
        dateDescription = "pre";
    }
    console.log("dateDescription: " + dateDescription);
    switch (dateDescription) {

        case "pre" :
            document.getElementById("tunein").classList.add("tunein-ddt");
            document.getElementById("tunein-resolve").classList.add("tunein-ddt-resolve");
            break;

        case "lead-in" :
            document.getElementById("tunein").classList.add("tunein-ddt");
            document.getElementById("tunein-resolve").classList.add("tunein-ddt-resolve");
            break;

        case "day-before" :
            document.getElementById("tunein").classList.add("tunein-tomorrow");
            document.getElementById("tunein-resolve").classList.add("tunein-tomorrow-resolve");
            break;

        case "day-of" :
            document.getElementById("tunein").classList.add("tunein-tonight");
            document.getElementById("tunein-resolve").classList.add("tunein-tonight-resolve");
            break;

        case "post" :
            document.getElementById("tunein").classList.add("tunein-ddt");
            document.getElementById("tunein-resolve").classList.add("tunein-ddt-resolve");
            break;
    }

    button_clicktag_2.addEventListener("click", clicktagHandler, false);
    button_clicktag_3.addEventListener("click", clicktagHandler, false);
    button_clicktag_4.addEventListener("click", clicktagHandler, false);

    button_cta.addEventListener("click", clicktag2Handler, false);

    quizGame = new QuizView(5); // 5 // quizData.length
    quizGame.model.addObserver(this);
    quizGame.initialize();
    document.getElementById("button-take-quiz").addEventListener("click", takeQuiz, false);

    callResolveAnimation();
    sizmek_sync_block.style.display = "block";
}

function callResolveAnimation() {
    if(resolve.style.visibility === "visible") return false;
    resolve.style.visibility = "visible";

    flash.style.opacity = 0;
    flash.style.filter = "alpha(opacity=0)";

    // PULL CHAIN 1
    setTimeout(function() {
        removeAnimationClasses(flash);
        flash.style.opacity = 1;
        flash.style.filter = "alpha(opacity=100)";
        flash.classList.add("alpha-in");
    }.bind(this), 1000);

    setTimeout(function() {
        if(hand.classList.contains("pull-chain")) {
            hand.classList.remove("pull-chain");
        }
        hand.offsetWidth = hand.offsetWidth;
        hand.classList.add("pull-chain");
    }.bind(this), 1000);

    setTimeout(function() {
        removeAnimationClasses(hand);
        if(hand.classList.contains("pull-chain")) {
            hand.classList.remove("pull-chain");
        }
        hand.offsetWidth = hand.offsetWidth;
        hand.classList.add("pull-chain");
    }.bind(this), 2000);

    setTimeout(function() {
        removeAnimationClasses(flash);
        flash.style.opacity = 0;
        flash.style.filter = "alpha(opacity=0)";
        if(flash.classList.contains("alpha-out")) {
            flash.classList.remove("alpha-out");
        }
        flash.offsetWidth = flash.offsetWidth;
        flash.classList.add("alpha-out");
    }.bind(this), 2200);

    // PULL CHAIN 2
    setTimeout(function() {
        removeAnimationClasses(flash);
        flash.style.opacity = 1;
        flash.style.filter = "alpha(opacity=100)";
        flash.classList.add("alpha-in");
    }.bind(this), 3000);

    setTimeout(function() {
        if(hand.classList.contains("pull-chain")) {
            hand.classList.remove("pull-chain");
        }
        hand.offsetWidth = hand.offsetWidth;
        hand.classList.add("pull-chain");
    }.bind(this), 3000);

    setTimeout(function() {
        removeAnimationClasses(hand);
        if(hand.classList.contains("pull-chain")) {
            hand.classList.remove("pull-chain");
        }
        hand.offsetWidth = hand.offsetWidth;
        hand.classList.add("pull-chain");
    }.bind(this), 4000);

    setTimeout(function() {
        removeAnimationClasses(flash);
        flash.style.opacity = 0;
        flash.style.filter = "alpha(opacity=0)";
        if(flash.classList.contains("alpha-out")) {
            flash.classList.remove("alpha-out");
        }
        flash.offsetWidth = flash.offsetWidth;
        flash.classList.add("alpha-out");
    }.bind(this), 4200);

    // PULL CHAIN 3
    setTimeout(function() {
        removeAnimationClasses(flash);
        flash.style.opacity = 1;
        flash.style.filter = "alpha(opacity=100)";
        flash.classList.add("alpha-in");
    }.bind(this), 5000);

    setTimeout(function() {
        if(hand.classList.contains("pull-chain")) {
            hand.classList.remove("pull-chain");
        }
        hand.offsetWidth = hand.offsetWidth;
        hand.classList.add("pull-chain");
    }.bind(this), 5000);

    setTimeout(function() {
        removeAnimationClasses(hand);
        if(hand.classList.contains("pull-chain")) {
            hand.classList.remove("pull-chain");
        }
        hand.offsetWidth = hand.offsetWidth;
        hand.classList.add("pull-chain");
    }.bind(this), 6000);

    setTimeout(function() {
        removeAnimationClasses(flash);
        flash.style.opacity = 0;
        flash.style.filter = "alpha(opacity=0)";
        if(flash.classList.contains("alpha-out")) {
            flash.classList.remove("alpha-out");
        }
        flash.offsetWidth = flash.offsetWidth;
        flash.classList.add("alpha-out");
    }.bind(this), 6200);
    return true;
}

function takeQuiz(e) {
    if(! isTakeQuizEnabled) return;
    isTakeQuizEnabled = false;

    if(callResolveAnimation()) {
        document.getElementById("view-state-landing").style.display = "none";
        quizGame.start();
        return;
    }

    EB.userActionCounter("TakeQuiz");
    document.getElementById("button-take-quiz").removeEventListener("click", takeQuiz, false);

    removeAnimationClasses(hand);
    hand.classList.add("pull-chain");

    setTimeout(function() {
        removeAnimationClasses(flash);
        flash.style.opacity = 1;
        flash.style.filter = "alpha(opacity=100)";
        flash.classList.add("alpha-in");
    }.bind(this), 400);

    setTimeout(function() {
        document.getElementById("view-state-landing").style.display = "none";
        quizGame.start();
    }.bind(this), 1000);
}

function clicktagHandler(e) {
    callResolveAnimation();
    EB.clickthrough();
}

function clicktag2Handler(e) {
    callResolveAnimation();
    EB.clickthrough("clickTag2");
}

function receiveNotification(notification) {
    var data = notification.data;
    var type = notification.type;
    var i = 0;
    switch(type) {

        case QuizEvent.QUESTION_CHANGE:
            for(i = 0; i < button_answers.length; i++) {
                if(button_answers[i].classList.contains("answer-correct")) {
                    button_answers[i].classList.remove("answer-correct");
                }
                if(button_answers[i].classList.contains("answer-wrong")) {
                    button_answers[i].classList.remove("answer-wrong");
                }
                if(button_answers[i].classList.contains("answer-not-selected")) {
                    button_answers[i].classList.remove("answer-not-selected");
                }
                if(button_answers[i].classList.contains("answer-default")) {
                    button_answers[i].classList.remove("answer-default");
                }
                button_answers[i].offsetWidth = button_answers[i].offsetWidth;
                button_answers[i].classList.add("answer-default");
                button_answers[i].style.fontSize = data.vo.answers[i].fontSize;
                button_answers[i].style.top = data.vo.answers[i].top;
                removeAnimationClasses(button_answers[i]);
                button_answers[i].style.opacity = 0;
                button_answers[i].style.filter = "alpha(opacity=0)";
                button_answers[i].style.backgroundColor = "transparent";
                removeAnimationClasses(button_answers[i].parentNode);
                button_answers[i].parentNode.style.width = "0px";
                setTimeout(function(i) {
                    button_answers[i].style.opacity = 1;
                    button_answers[i].style.filter = "alpha(opacity=100)";
                    button_answers[i].classList.add("alpha-in");
                    button_answers[i].parentNode.style.width = "300px";
                    button_answers[i].parentNode.classList.add("mask-in");
                    button_answers[i].parentNode.classList.add("slide-in");
                }.bind(this, i), ((i + 1) * 300));
            }
            question_container.style.fontSize =  data.vo.question.fontSize;
            question_container.style.top = data.vo.question.top;
            removeAnimationClasses(question_container);
            question_container.style.opacity = 1;
            question_container.style.filter = "alpha(opacity=100)";
            question_container.classList.add("alpha-in");
            break;

        case QuizEvent.ADDED_TRAIT:
            var correct = false;
            if(data.trait === "1") {
                score++;
                correct = true;
                if(score > 5) {
                    score = 5;
                }
            }
            EB.userActionCounter("answer");
            for(i = 0; i < button_answers.length; i++) {
                removeAnimationClasses(button_answers[i]);
                if(button_answers[i].classList.contains("answer-default")) {
                    button_answers[i].classList.remove("answer-default");
                }
                button_answers[i].offsetWidth = button_answers[i].offsetWidth;
                if(i === quizGame.model.selectedIndex) {
                    if(correct) {
                        button_answers[i].classList.add("answer-correct");
                        button_answers[i].classList.add("background-color-flash");
                    } else {
                        button_answers[i].classList.add("answer-wrong");
                        button_answers[i].classList.add("scramble");
                    }
                } else {
                    button_answers[i].classList.add("answer-not-selected");
                }
            }
            setTimeout(function() {
                for(i = 0; i < button_answers.length; i++) {
                    button_answers[i].style.opacity = 0;
                    button_answers[i].style.filter = "alpha(opacity=0)";
                    button_answers[i].classList.add("alpha-out");
                }
                removeAnimationClasses(question_container);
                question_container.style.opacity = 0;
                question_container.style.filter = "alpha(opacity=0)";
                question_container.classList.add("alpha-out");
            }, 800);
            setTimeout(function() {
                for(i = 0; i < button_answers.length; i++) {
                    removeAnimationClasses(button_answers[i]);
                }
            }, 1500);
            break;

        case QuizEvent.STATE_CHANGE:
            switch(quizGame.model.getState()) {

                case QuizState.STATE_RESULT:
                    var result_copy_1 = document.getElementById("result-copy-1");
                    var result_copy_2 = document.getElementById("result-copy-2");
                    var result_copy_3 = document.getElementById("result-copy-3");
                    result_copy_1.innerHTML = score + " out of " + (resultsArr.length-1);
                    result_copy_2.innerHTML = resultsArr[score].title;
                    result_copy_3.innerHTML = resultsArr[score].description;
                    result_copy_1.style.opacity = 1;
                    result_copy_1.style.filter = "alpha(opacity=100)";
                    result_copy_1.classList.add("alpha-in");
                    result_copy_2.style.fontSize = resultsArr[score].fontSize;
                    result_copy_2.style.opacity = 0;
                    result_copy_2.style.filter = "alpha(opacity=0)";
                    result_copy_3.style.opacity = 0;
                    result_copy_3.style.filter = "alpha(opacity=0)";
                    button_cta.style.opacity = 0;
                    button_cta.style.filter = "alpha(opacity=0)";
                    setTimeout(function() {
                        result_copy_2.style.opacity = 1;
                        result_copy_2.style.filter = "alpha(opacity=100)";
                        result_copy_2.classList.add("alpha-in");
                    }, 300);
                    setTimeout(function() {
                        result_copy_3.style.opacity = 1;
                        result_copy_3.style.filter = "alpha(opacity=100)";
                        result_copy_3.classList.add("alpha-in");
                    }, 600);
                    setTimeout(function() {
                        button_cta.style.opacity = 1;
                        button_cta.style.filter = "alpha(opacity=100)";
                        button_cta.classList.add("alpha-in");
                    }, 900);
                    break;
            }
            break;
    }
}

function removeAnimationClasses(element) {
    if(element.classList.contains("alpha-out")) {
        element.classList.remove("alpha-out");
    }
    if(element.classList.contains("alpha-in")) {
        element.classList.remove("alpha-in");
    }
    if(element.classList.contains("mask-in")) {
        element.classList.remove("mask-in");
    }
    if(element.classList.contains("scramble")) {
        element.classList.remove("scramble");
    }
    if(element.classList.contains("slide-in")) {
        element.classList.remove("slide-in");
    }
    if(element.classList.contains("pull-chain")) {
        element.classList.remove("pull-chain");
    }
    if(element.classList.contains("background-color-flash")) {
        element.classList.remove("background-color-flash");
    }
    element.offsetWidth = element.offsetWidth; /* replay css3 animation hack */
}

var quizData = [
    {
        question: {text:"In which organ is bile produced?", fontSize:"27px", top:"18px"},
        answers: [
            {text:"Liver", trait:"1", fontSize:"24px", top:"0px"},
            {text:"Kidney", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Pancreas", trait:"0", fontSize:"24px", top:"0px"}
        ]},
    {
        question: {text:"What is the fastest mammal on land?", fontSize:"22px", top:"18px"},
        answers: [
            {text:"Road Runner", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Gazelle", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Cheetah", trait:"1", fontSize:"24px", top:"0px"}
        ]},
    {
        question: {text:"What are deer antlers made of?", fontSize:"27px", top:"18px"},
        answers: [
            {text:"Cartilage", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Bone", trait:"1", fontSize:"24px", top:"0px"},
            {text:"Hair", trait:"0", fontSize:"24px", top:"0px"}
        ]},
    {
        question: {text:"Who was the 2nd US President?", fontSize:"27px", top:"18px"},
        answers: [
            {text:"Ben Franklin", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Thomas Jefferson", trait:"0", fontSize:"24px", top:"0px"},
            {text:"John Adams", trait: "1", fontSize:"24px", top:"0px"}
        ]},
    {
        question: {text:"Sing is to song as paint is to _______", fontSize:"25px", top:"18px"},
        answers: [
            {text:"Picture", trait:"1", fontSize:"24px", top:"0px"},
            {text:"Brush", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Color", trait:"0", fontSize:"24px", top:"0px"}
        ]},
    {
        question: {text:"Buy is sell as borrow is to:", fontSize:"27px", top:"18px"},
        answers: [
            {text:"Donate", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Lend", trait:"1", fontSize:"24px", top:"0px"},
            {text:"Pinch", trait:"0", fontSize:"24px", top:"0px"}
        ]},
    {
        question: {text:"What is the thinnest layer of the earth?", fontSize:"22px", top:"18px"},
        answers: [
            {text:"Mantle", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Crust", trait:"1", fontSize:"24px", top:"0px"},
            {text:"Outer Core", trait:"0", fontSize:"24px", top:"0px"}
        ]},
    {
        question: {text:"Who wrote<br/>Moby Dick?", fontSize:"27px", top:"18px"},
        answers: [
            {text:"Herman Melville", trait:"1", fontSize:"24px", top:"0px"},
            {text:"Mark Twain", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Charles Dickens", trait:"0", fontSize:"24px", top:"0px"}
        ]},
    {
        question: {text:"Who wrote Gulliver’s Travels?", fontSize:"24px", top:"18px"},
        answers: [
            {text:"Jonathan Swift", trait:"1", fontSize:"24px", top:"0px"},
            {text:"James Joyce", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Oscar Wilde", trait:"0", fontSize:"24px", top:"0px"}
        ]},
    {
        question: {text:"What is the largest lizard in the world?", fontSize:"22px", top:"18px"},
        answers: [
            {text:"Iguana", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Komodo Lizard", trait:"1", fontSize:"24px", top:"0px"},
            {text:"Chameleon", trait:"0", fontSize:"24px", top:"0px"}
        ]},
    {
        question: {text:"Cat is to kitten as cow is to:", fontSize:"27px", top:"18px"},
        answers: [
            {text:"Milk", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Cub", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Calf", trait:"1", fontSize:"24px", top:"0px"}
        ]},
    {
        question: {text:"Who created the first printing press?", fontSize:"21px", top:"18px"},
        answers: [
            {text:"Thomas Edison", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Gutenberg", trait:"1", fontSize:"24px", top:"0px"},
            {text:"Henry Ford", trait:"0", fontSize:"24px", top:"0px"}
        ]},
    {
        question: {text:"Who wrote the 1850 novel Emma?", fontSize:"27px", top:"18px"},
        answers: [
            {text:"Sylvia Plath", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Jane Austen", trait:"1", fontSize:"24px", top:"0px"},
            {text:"Virginia Woolf", trait:"0", fontSize:"24px", top:"0px"},
        ]},
    {
        question: {text:"Who painted the work \"Sunflowers\"?", fontSize:"22px", top:"18px"},
        answers: [
            {text:"Monet", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Rembrandt", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Van Gogh", trait:"1", fontSize:"24px", top:"0px"}
        ]},
    {
        question: {text:"Literacy is to English as numeracy is to:", fontSize:"22px", top:"18px"},
        answers: [
            {text:"Measuring", trait:"0", fontSize:"24px", top:"0px"},
            {text:"Math", trait: "1", fontSize:"24px", top:"0px"},
            {text:"French", trait:"0", fontSize:"24px", top:"0px"}
        ]}
];

var resultsArr = [
    {title:"Nice try!", description:"Watch Child Genius to improve your score!", fontSize:"20px"},
    {title:"Nice try!", description:"Watch Child Genius to improve your score!", fontSize:"20px"},
    {title:"Good effort!", description:"Watch Child Genius to improve your score!", fontSize:"20px"},
    {title:"You’re on the right track!", description:"Watch Child Genius to improve your score!", fontSize:"17px"},
    {title:"Well done!", description:"Watch Child Genius to continue to test your knowledge!", fontSize:"20px"},
    {title:"You’re brilliant!", description:"Watch Child Genius to continue to test your knowledge!", fontSize:"20px"}
];
