<?php
session_start();
if (!isset($_SESSION['student_Id']) || !isset($_SESSION['student_Name'])) {
    session_destroy();
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Application</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="includes/css/style.css" />
</head>

<body>
    <a class="btn-signout flex" title="Sign Out" href="signOut.php"><i class='fas fa-sign-out-alt'></i></a>
    <div class="profile-body">
        <br>
        <br>
        <br>
        <h2 class="text-center">Welcome <?php echo $_SESSION['student_Name']; ?> !!!</h2>
    </div>
    <div class="div-quiz-start" id="div-quiz-start">
        <br>
        <h4 class="text-center">Would you like to start Quiz</h4>
        <br>
        <div class="force-center"><button class="btn-start border-none outline-none" onclick="QuizStart();">Start Now</button></div>

    </div>
    <br>
    <br>
    <div hidden id="full-quiz-body" class="center width-1000 max-width-80p">
        <div class="div-head width-100p flex">
            <div class="head-1">
                <h5>Quizzes</h5>
            </div>

            <div class="head-2 flex">
                <div class="div-progressbar">
                    <div id="div-progressbar"></div>
                </div>
                <p class="p-quizzes">Questions 1 of 10</p>
            </div>

            <div class="head-3">
                <button class="btn-close border-none outline-none" onclick="CloseQuiz();">Close <i class="fas fa-times"></i></button>
            </div>
        </div>
        <br>
        <h4 id="timer" style="text-align:right;">00:00:00</h4>
        <br>
        <h4 class="text-center" id="h4-question"></h4>
        <div class="div-image force-center" id="image-Body">
            <br>
            <img src="" alt="" id="image">
        </div>
        <div class="div-options-body">
            <br>
            <br>
            <h5 class="text-center">Options</h5>
            <br>
            <input type="hidden" id="question-id">
            <div class="flex div-options" id="div-options">
                <!-- Here Append Child using JavaScript -->
            </div>
        </div>
        <div id="div-next" hidden>
            <br>
            <br>
            <div class="force-center"><button class="btn-start border-none outline-none" onclick="SubmitAnswere()" id="btn-next">Submit</button></div>
            <br>
            <div id="response-data">
          <!-- <h4 class="success-response">Success Data</h4> -->
          <!-- <h4 class="error-response">Success Data</h4> -->
        </div>

        </div>
    </div>

</body>

</html>
<style>
    .btn-start {
        padding: 10px 40px;
        background-color: #4681f4;
        cursor: pointer;
        color: white;
        border-radius: 5px;
    }

    .div-head {
        background-color: rgb(240, 240, 240);
        padding: 0px 10px;
    }

    .div-head .head-1 {
        width: 55px;
    }

    .div-head .head-2 {
        width: calc(100% - 120px);
    }

    .div-head .head-3 {
        width: 60px;
    }

    .div-head .head-3 .btn-close {
        height: 20px;
        background-color: transparent;
        font-size: 16px;
        height: 40px;
        cursor: pointer;
    }

    .div-progressbar {
        width: calc(100% - 200px);
        max-width: 550px;
        background-color: rgb(200, 200, 200);
        height: 10px;
        margin-right: 10px;
        border-radius: 20px;
        overflow: hidden;
    }

    .div-progressbar div {
        width: 10%;
        height: 30px;
        background-color: #4681f4;
    }

    .div-image {
        width: 60%;
        max-width: 100px;
    }

    .div-image img {
        width: 100%;
        height: 100%;
    }

    .div-options .options {
        margin: 0px 10px;
    }

    .rb-option+.lb-option {
        background-color: rgb(240, 240, 240);
        padding: 10px;
        height: 40px;
        border-radius: 5px;
        cursor: pointer;
    }

    .rb-option:checked+.lb-option {
        background-color: #4681f4;
        color: white;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }
    .rb-option+.lb-error-options
    {
        background-color: darkred;
        color: white;
    }
    .rb-option+.lb-success-options
    {
        background-color: darkgreen;
        color: white;
    }
</style>
</style>
<script>
    //------------------------------
    //------Global Variables--------
    let totalQuestion = 10;
    let currentQuestion = 0;
    let correctAnswerCount = 0;
    let globalTimer;
    let starDateTime;
    //------Global Variables--------
    //------------------------------


    //------------------------------
    //-------Star Quiz Here---------
    function QuizStart() {
        const startBody = document.getElementById('div-quiz-start'),
            quizBody = document.getElementById('full-quiz-body');

        startBody.hidden = true;
        quizBody.hidden = false;
        totalQuestion = 10;
        currentQuestion = 0;
        correctAnswerCount = 0;
        startTimer();
        resetRadioButton();
        ShowHideNextButton(false);
        GetQuestionFromServer();
        setQuestions();
    }
    //-------Star Quiz Here---------
    //------------------------------


    function GetQuestionFromServer() {
        $.ajax({
            url: "admin/action/action.php?getQuestion=1",
            type: "GET",
            //data: formdata,
            //processData: false,
            //contentType: false,
            success: function(response) {
                const res = JSON.parse(response);
                if (res.hasOwnProperty("success")) {
                    if (res.hasOwnProperty('question')) {
                        LoadQuestion(res.question.question, res.question.questionId, res.question.options, res.question.imageUrl);
        const btn = document.getElementById('btn-next');
                        btn.innerHTML = 'Submit';
                    }
                } else {
                    alert(res.error);
                }
            }
        });
    }

    // Load Question From Server
    function LoadQuestion(_questionName, _questionId, _options, imageURL,answeredId = 0, isPreviewMode = false) {
        const question = document.getElementById('h4-question');
        question.innerHTML = _questionName;
        const optionsBody = document.getElementById('div-options');
        optionsBody.innerHTML = '';
        const questionId = document.getElementById('question-id');
        questionId.value = _questionId;
        for (let i = 0; i < _options.length; i++) {
            const option = document.createElement('div');
            option.classList.add('options');
            option.classList.add('options-0' + i.toString());
            const input = document.createElement('input');
            input.setAttribute('type', 'radio');
            input.value = _options[i].id;
            input.setAttribute('id', 'options0' + i.toString());
            input.setAttribute('name', 'options');
            input.classList.add('display-none');
            input.classList.add('rb-option');
            input.addEventListener('change', ShowHideNextButton);
            option.appendChild(input);
            const label = document.createElement('label');
            label.classList.add('lb-option');
            label.setAttribute('for', 'options0' + i.toString());
            label.innerHTML = _options[i].option;
            
            if(isPreviewMode == true)
            {
                input.disabled = true;
                if(answeredId >0 )
                {
                    if(_options[i].id == answeredId)
                    {
                        if(_options[i].isPrimary == 1)
                        {
                            //label.classList.add('lb-success-options');
                            correctAnswerCount++;
                            input.checked = true;
  SetResponseMessage(true,'Congratulations your answared is correct',3000,true);

                        }
                        else
                        {
                            SetResponseMessage(false,'Sorry, Your answared is not correct',3000,true);
                            label.classList.add('lb-error-options');
                        }
                    }
                    if(_options[i].isPrimary == 1)
                    {
                        label.style.border = '2px solid green';
                    }
                }
            }
            option.appendChild(label);
            optionsBody.appendChild(option);
            ShowHideNextButton(isPreviewMode);

        }
        const imageBody = document.getElementById('image-Body');
        if (imageURL == undefined || imageURL == null || imageURL == '') {
            imageBody.hidden = true;
        } else {
            imageBody.hidden = false;
            const image = document.getElementById('image');
            image.setAttribute('src', imageURL);
        }
        console.log(imageURL);
        currentQuestion++;
        if(totalQuestion< currentQuestion)
                        {
window.location.reload();
                        }
        setQuestions();
    }



    //------------------------------
    //-------Stop Quiz Here---------
    function CloseQuiz() {
        clearInterval(globalTimer);
        const startBody = document.getElementById('div-quiz-start'),
            quizBody = document.getElementById('full-quiz-body');
        startBody.hidden = false;
        quizBody.hidden = true;
        totalQuestion = 10;
        currentQuestion = 0;
        correctAnswerCount = 0;
        const time = document.getElementById('timer');
        time.innerHTML = '00:00:00';
        resetRadioButton();
    }
    //-------Stop Quiz Here---------
    //------------------------------


    //------------------------------
    // Next Buttons Visible if Anyone options is checked
    function ShowHideNextButton(show = true) {
        const nextBody = document.getElementById('div-next');
        nextBody.hidden = !show;
    }
    // Next Buttons Visible if Anyone options is checked
    //------------------------------


    //------------------------------
    // Give informations of total question and how many question is remaing
    function setQuestions() {
        const p = document.getElementsByClassName('p-quizzes');
        p[0].innerHTML = `Questions ${currentQuestion} of ${totalQuestion}`;
        SetProgressBar();
    }
    // Give informations of total question and how many question is remaing
    //------------------------------


    //-------------------------
    // Start timer and set start TimeDate in our global Variables
    function startTimer() {
        startTime = new Date();
        globalTimer = setInterval(updateTimer, 1000);
    }
    // Start timer and set start TimeDate in our global Variables
    //-------------------------


    //------------------------
    // Update How many times using. Update this function Every one seconds
    function updateTimer() {
        const time = document.getElementById('timer');
        const timeSpan = new Date() - startTime;
        const seconds = Math.floor(timeSpan / 1000);
        const minutes = Math.floor(seconds / 60);
        const hours = Math.floor(minutes / 60);
        time.innerHTML = `${needZeroNumber(hours)}:${needZeroNumber(minutes - hours * 60)}:${needZeroNumber(seconds - minutes  * 60)}`;
    }

    function needZeroNumber(number = 0) {
        return number <= 9 ? '0' + number.toString() : number.toString();
    }
    // Update How many times using. Update this function Every one seconds
    //------------------------


    //---------------------------
    // this function for, if I selected anyone options this. then if i try to stop this quiz this time my selected options is need to deselected.  
    function resetRadioButton() {
        const options = document.getElementsByName('options');
        options.forEach(x => {
            x.checked = false;
        });
    }

    function SetProgressBar() {
        const progress = document.getElementById('div-progressbar');
        const process = (currentQuestion == 0 || totalQuestion == 0) ? 0 : (currentQuestion / totalQuestion * 100);
        //console.log(`${currentQuestion}, ${totalQuestion}`)
        progress.style.width = process.toString() + '%';
    }
    // this function for, if I selected anyone options this. then if i try to stop this quiz this time my selected options is need to deselected.  
    //---------------------------


    // Try to submit answered
    function SubmitAnswere() {
        const btn = document.getElementById('btn-next');
if(btn.innerHTML == 'Submit')
{
    const questionId = document.getElementById('question-id').value;
        const options = document.getElementsByName('options');
        let answered;
        options.forEach(x => {
            if (x.checked == true) {
                answered = x.value;
            }
        })
        if(answered == undefined || answered == 0)
        {
            alert('Please select anyone options.');
            return;
        }
        btn.innerHTML = 'Loading...';
        btn.disabled = true;
  const formdata = new FormData();
  formdata.append("questionId", questionId);
  formdata.append("answered", answered);
  formdata.append("submitAnswared", 1);
        $.ajax({
            url: "admin/action/action.php",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(response) {
                btn.innerHTML = 'Next Question';
                        btn.disabled = false;    
                        if(response == null || response == '')
                        {
alert('Server Error.');
return;
                        }                
                console.log(response);
                const res = JSON.parse(response);
                if (res.hasOwnProperty("success")) {
                    if (res.hasOwnProperty('question')) {
                        LoadQuestion(res.question.question, res.question.questionId, res.question.options, res.question.imageUrl,answered,true);
                    }
                } else {
                    alert(res.error);

                }
            }
        });
}
else if(btn.innerHTML == 'Next Question')
{
    GetQuestionFromServer();
}
    }
</script>

<script type="text/javascript" src="includes/js/action.js"></script>
<script type="text/javascript" src="includes/js/main.js"></script>