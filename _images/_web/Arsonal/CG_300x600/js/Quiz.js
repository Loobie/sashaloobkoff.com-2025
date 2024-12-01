var QuizEvent = {
    QUESTION_CHANGE: "QuizEvent_questionChange",
    QUESTION_POOL_CHANGE: "QuizEvent_questionPoolChange",
    STATE_CHANGE: "QuizEvent_stateChange",
    ADDED_TRAIT: "QuizEvent_addedTrait"
};

var QuizState = {
    STATE_GAME: "QuizState_game",
    STATE_RESULT: "QuizState_result"
};

// ======================================================================================================= //

var question_container = null;
var answer_containers = null;
var button_answers = [];
var view_state_game = null;
var view_state_result = null;

/**
 * Override quizData to apply your own questions
 */
var quizData = quizData || [
    {
        question: {text:"Question 1?"},
        answers: [
            {text: "Question 1 Answer 1", trait: "trait 1"},
            {text: "Question 1 Answer 2", trait: "trait 2"},
            {text: "Question 1 Answer 3", trait: "trait 3"}]},

    {
        question: {text:"Question 2?"},
        answers: [
            {text: "Question 2 Answer 1", trait: "trait 2"},
            {text: "Question 2 Answer 2", trait: "trait 1"},
            {text: "Question 2 Answer 3", trait: "trait 3"}]},

    {
        question: {text:"Question 3?"},
        answers: [
            {text: "Question 3 Answer 1", trait: "trait 3"},
            {text: "Question 3 Answer 2", trait: "trait 2"},
            {text: "Question 3 Answer 3", trait: "trait 1"}]}
];

// ======================================================================================================= //

(function () {

    this.QuizQuestionVO = function (question, answers) {
        this.question = question;
        this.answers = answers;
    };

    QuizQuestionVO.prototype.constructor = QuizQuestionVO;

})();

// ======================================================================================================= //

(function () {

    this.QuizModel = function (maxQuestionsLength) {
        this.observers = [];
        this.questionVO = null;
        this.questionIndex = 0;
        this.questionVOPool = [];
        this.maxQuestionsLength = maxQuestionsLength || 0;
        this.results = [];
        this.state = -1;
        this.selectedIndex = -1;
        this.isLoading = false;
    };

    QuizModel.prototype = new Notifier();
    QuizModel.prototype.constructor = QuizModel;

    QuizModel.prototype.initialize = function (data) {
        var questionPool = [];
        var answers = [];
        var questionIndecies = [];
        if(this.maxQuestionsLength === 0) {
            this.maxQuestionsLength = data.length;
        }
        var i, j = 0;
        for (i = 0; i < data.length; i++) {
            questionIndecies.push(i);
        }
        questionIndecies = shuffleArray(questionIndecies);
        for (i = 0; i < data.length; i++) {
            if (questionPool.length < this.maxQuestionsLength) {
                answers = [];
                var questionNode = data[questionIndecies[i]];
                for (j = 0; j < questionNode.answers.length; j++) {
                    answers.push({
                        text: questionNode.answers[j].text,
                        trait: questionNode.answers[j].trait
                    });
                }
                questionPool.push(new QuizQuestionVO(questionNode.question, answers));
            }
        }
        this.setQuestionVOPool(questionPool);
        this.setState(QuizState.STATE_GAME);
    };

    QuizModel.prototype.clearResultTraits = function (index) {
        this.results = [];
    };

    QuizModel.prototype.gotoQuestion = function (index) {
        this.setQuestionIndex(index);
    };

    QuizModel.prototype.addResultTrait = function (trait) {
        this.results.push(trait);
        this.sendNotification(QuizEvent.ADDED_TRAIT, {trait:trait}, this);
    };

    QuizModel.prototype.getFinalResultTrait = function () {
        return arrayFrequency(this.results);
    };

    QuizModel.prototype.getQuestionsLength = function () {
        return this.questionVOPool.length;
    };

    QuizModel.prototype.setQuestionVO = function (question, answers) {
        this.questionVO = new QuizQuestionVO(question, answers);
        this.sendNotification(QuizEvent.QUESTION_CHANGE, {vo:this.questionVO}, this);
    };

    QuizModel.prototype.getQuestionVO = function () {
        return this.questionVO;
    };

    QuizModel.prototype.setQuestionVOPool = function (value) {
        this.questionVOPool = value;
        this.sendNotification(QuizEvent.QUESTION_POOL_CHANGE, {pool: this.getQuestionVOPool()}, this);
    };

    QuizModel.prototype.getQuestionVOPool = function () {
        return this.questionVOPool;
    };

    QuizModel.prototype.setQuestionIndex = function (value) {
        if (this.questionIndex <= this.getQuestionsLength()) {
            this.questionIndex = value;
            var qpool = this.getQuestionVOPool();
            this.setQuestionVO(qpool[this.questionIndex].question, qpool[this.questionIndex].answers);
        }
    };

    QuizModel.prototype.getQuestionIndex = function () {
        return this.questionIndex;
    };

    QuizModel.prototype.getState = function() {
        return this.state;
    };

    QuizModel.prototype.setState = function(value) {
        this.state = value;
        this.sendNotification(QuizEvent.STATE_CHANGE, {state:value}, this);
    };

})();

// ======================================================================================================= //

(function () {

    this.QuizController = function (view, model) {
        this.observers = [];
        this.view = view;
        this.model = model;
    };

    QuizController.prototype = new Notifier();
    QuizController.prototype.constructor = QuizController;

    QuizController.prototype.selectAnswer = function (e) {
        if(this.model.isLoading) return;
        this.model.isLoading = true;
        this.enableAnswerListeners(false);
        for(var i = 0; i < button_answers.length; i++) {
            if(e.target === button_answers[i]) {
                this.model.selectedIndex = i;
                break;
            }
        }
        var qpool = this.model.getQuestionVOPool();
        var trait = qpool[this.model.getQuestionIndex()].answers[this.model.selectedIndex].trait;
        this.model.addResultTrait(trait);
        setTimeout(function() {
            if (this.model.getQuestionIndex() === this.model.getQuestionsLength() - 1) {
                this.view.gameover();
            } else {
                this.model.gotoQuestion(this.model.getQuestionIndex() + 1);
                this.model.isLoading = false;
            }
        }.bind(this), 1500);
    };

    QuizController.prototype.enableAnswerListeners = function (value) {
        var i = 0;
        for(i = 0; i < button_answers.length; i++) {
            try {
                button_answers[i].removeEventListener("click", this.selectAnswer.bind(this));
            } catch(e) {}
        }
        if (value) {
            for(i = 0; i < button_answers.length; i++) {
                button_answers[i].addEventListener("click", this.selectAnswer.bind(this));
            }
        }
    };

    QuizController.prototype.destroy = function () {
        this.enableAnswerListeners(false);
    };

})();

// ======================================================================================================= //

(function () {

    this.QuizView = function (maxQuestionsLength) {
        question_container = document.getElementById("question-container");
        answer_containers = document.getElementById("answer-container");
        view_state_game = document.getElementById("view-state-game");
        view_state_result = document.getElementById("view-state-result");
        button_answers = document.getElementsByClassName("button-answer");
        this.observers = [];
        this.model = new QuizModel(maxQuestionsLength);
        this.model.addObserver(this);
        this.controller = new QuizController(this, this.model);
    };

    QuizView.prototype = new Notifier();
    QuizView.prototype.constructor = QuizView;

    QuizView.prototype.initialize = function () {
        this.model.initialize(quizData);
    };

    QuizView.prototype.start = function () {
        this.model.setState(QuizState.STATE_GAME);
        this.model.clearResultTraits();
        this.model.gotoQuestion(0);
    };

    QuizView.prototype.destroy = function () {
        this.controller.destroy();
    };

    QuizView.prototype.gameover = function () {
        this.model.setState(QuizState.STATE_RESULT);
    };

    QuizView.prototype._handleChangedState = function () {
        switch (this.model.getState()) {

            case QuizState.STATE_GAME :
                view_state_game.style.display = "block";
                view_state_result.style.display = "none";
                this.model.isLoading = false;
                break;

            case QuizState.STATE_RESULT :
                view_state_game.style.display = "none";
                view_state_result.style.display = "block";
                break;
        }
    };

    QuizView.prototype.receiveNotification = function (notification) {
        var notificationData = notification.getData();
        var notificationType = notification.getType();
        switch (notificationType) {

            case QuizEvent.STATE_CHANGE:
                this._handleChangedState();
                break;

            case QuizEvent.QUESTION_CHANGE :
                var answer = null;
                question_container.innerHTML = notificationData.vo.question.text;
                for(var i = 0; i < button_answers.length; i++) {
                    answer = button_answers[i];
                    answer.innerHTML = notificationData.vo.answers[i].text;
                }
                this.controller.enableAnswerListeners(true);
                break;
        }
    };

})();

function arrayFrequency(arr) {
    var what,
        a = arr.concat(),
        ax,
        freq,
        count,
        max = 0,
        limit = a.length / 2;

    while (a.length) {
        what = a.shift();
        count = 1;
        while ((ax = a.indexOf(what)) != -1) {
            a.splice(ax, 1);
            ++count;
        }
        if (count > limit) {
            return what;
        }
        if (count > max) {
            freq = what;
            max = count;
        }
    }
    return freq;
}

function shuffleArray(dataArr) {
    var randomPlacedNumArr = [];
    var finalDataArr = [];
    var rangeLength = dataArr.length;
    var requestedLength = dataArr.length;
    var randomPos = 0;
    var valueFromArray = 0;
    var numberRand = 0;
    var i = 0;
    for(i = 0; i < rangeLength; i++) {
        randomPlacedNumArr.push(i);
    }
    for(i = 0; i < requestedLength; i++) {
        randomPos = Math.floor(Math.random() * randomPlacedNumArr.length);
        valueFromArray = randomPlacedNumArr.splice(randomPos, 1);
        numberRand = parseInt(valueFromArray);
        finalDataArr.push(numberRand);
    }
    return finalDataArr;
}