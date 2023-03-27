<?php
session_start();
if (!isset($_SESSION['student_Id']) || !isset($_SESSION['student_Name'])) {
    session_destroy();
    header("Location: index.php");
    //TODO: Old History view in Student Section
    //TODO: If old Quiz cannot complected then continue stating system from Student System
    //TODO: Sign Up
    //TODO: Forgot Password
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

        </div>
        <br>          
        <br>          
        <div id="response-data">
                <!-- <h4 class="success-response">Success Data</h4> -->
                <!-- <h4 class="error-response">Success Data</h4> -->
            </div>

    </div>
    <div hidden id="div-table-body" class="center width-1000 max-width-80p">
    <h4 id="h4-result" class="text-center"></h4>
    <br>
    <table class="tbl-data">
                    <thead>
                        <th>S.N.</th>
                        <th>Questions</th>
                        <th>Selected Answared</th>
                        <th>Status</th>
                        <th>SubmitDateTime</th>
                    </thead>
                    <tbody id="table-body">
                    </tbody>
                </table>
            </div>
</body>

</html>
<style>
 
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
   

</script>

<script type="text/javascript" src="includes/js/action.js"></script>
<script type="text/javascript" src="includes/js/main.js"></script>