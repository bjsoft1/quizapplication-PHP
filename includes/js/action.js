

    //------------------------------
    //-------Star Quiz Here---------
    function QuizStart() {
      const startBody = document.getElementById('div-quiz-start'),
          quizBody = document.getElementById('full-quiz-body');

      startBody.hidden = true;
      quizBody.hidden = false;
      correctAnswerCount = 0;
      startTimer();
      resetRadioButton();
      ShowHideNextButton(false);
      GetQuestionFromServer();
    ShowHideTableBody(false);
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
                      currentQuestion = res.question.currentQuestion;
                      setQuestions();
                  }
              } else {
                  alert(res.error);
              }
          }
      });
  }

  // Load Question From Server
  function LoadQuestion(_questionName, _questionId, _options, imageURL, answeredId = 0, isPreviewMode = false) {
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

          if (isPreviewMode == true) {
              input.disabled = true;
              if (answeredId > 0) {
                  if (_options[i].id == answeredId) {
                      if (_options[i].isPrimary == 1) {
                          //label.classList.add('lb-success-options');
                          correctAnswerCount++;
                          input.checked = true;
                          SetResponseMessage(true, 'Congratulations your answared is correct', 1000, true);

                      } else {
                          SetResponseMessage(false, 'Sorry, Your answared is not correct', 1000, true);
                          label.classList.add('lb-error-options');
                      }
                  }
                  if (_options[i].isPrimary == 1) {
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
      if (btn.innerHTML == 'Submit') {
          const questionId = document.getElementById('question-id').value;
          const options = document.getElementsByName('options');
          let answered;
          options.forEach(x => {
              if (x.checked == true) {
                  answered = x.value;
              }
          })
          if (answered == undefined || answered == 0) {
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
                currentQuestion++;
                if(currentQuestion <= totalQuestion-1)
                {
                  btn.innerHTML = 'Next Question';
                }
                else
                {
                  clearInterval(globalTimer);
                  btn.innerHTML = 'View Result';
                }  
                
                  btn.disabled = false;
                  if (response == null || response == '') {
                      alert('Server Error.');
                      return;
                  }
                  console.log(response);
                  const res = JSON.parse(response);
                  if (res.hasOwnProperty("success")) {
                      if (res.hasOwnProperty('question')) {
                          LoadQuestion(res.question.question, res.question.questionId, res.question.options, res.question.imageUrl, answered, true);
                      }
                  } else {
                      alert(res.error);

                  }
              }
          });
      } else if (btn.innerHTML == 'Next Question') {
          GetQuestionFromServer();
      }
      else if('View Result')
      {
        CurrentQuizGetResult();
      }
  }


  function CurrentQuizGetResult()
  {

      $.ajax({
            url: "admin/action/action.php?GetCurrentQuizResult=1",
            type: "GET",
            //data: formdata,
            //processData: false,
            //contentType: false,
              success: function(response) {
              const res = JSON.parse(response);
              console.log(res);
              LoadDataInTable(res);
          }  
          });
  }
function LoadDataInTable(data)
{
  CloseQuiz();
  ShowHideTableBody(true);
  const tableBody = document.getElementById('table-body');
  tableBody.innerHTML = '';
  const ResultH4 = document.getElementById('h4-result');
  let c = 0;
  let e = 0;
  const t = data.length;
  for(i = 0;i<t;i++)
  {
    if(data[i].isTrue == '1')
    {
      c++;
    }
    else
    {
      e++;
    }
      const tr = document.createElement('tr');
      const sn = document.createElement('td');
      const question = document.createElement('td');
      const answared = document.createElement('td');
      const isTrue = document.createElement('td');
      const time = document.createElement('td');
      
      sn.innerHTML = (i+1).toString();
      question.innerHTML = data[i].question;
      answared.innerHTML = data[i].option;
      isTrue.innerHTML = data[i].isTrue == '0'?'Worng':'Write';
      time.innerHTML = data[i].submitTime;
      tr.appendChild(sn);
      tr.appendChild(question);
      tr.appendChild(answared);
      tr.appendChild(isTrue);
      tr.appendChild(time);
      tableBody.appendChild(tr);
  }
  ResultH4.innerHTML = `Total Question: ${t}. Currect Answared: ${c}. Worng Answared: ${e}. (${t}-${c}-${e})`;
}
function ShowHideTableBody(isShow = true)
{
  const divBody = document.getElementById('div-table-body');
  divBody.hidden = !isShow;
}





// Why this isParent variable is using here?
// this function using two side (client and admin) if admin this time role is 1 // if client/student this time role is two. and sign in function is same in `PHP action`
function onFormSubmit(username,password,isParent = false)
{
  jQuery("#btn-submit").attr("disabled", true);
  jQuery("#btn-submit").val("Loading...");
  //TODO: Validation
  
  const role = isParent === true?1:2;
  const formdata = new FormData();
  formdata.append("signinSubmit", role);
  formdata.append("username", username);
  formdata.append("password", password);
  $.ajax({
url: "admin/action/action.php",
type: "POST",
data: formdata,
processData: false,
contentType: false,
success: function(response) {
    console.log(response);
    const res = JSON.parse(response);
if (res.hasOwnProperty("success"))
{
  // Showing success message using this global funtion
  SetResponseMessage(true,res.success);

  // Why we reload this page?
  // if we reload this page this time if session is have then, automatic redirect our profile/dashboard page 
  setTimeout(function() { window.location.reload(); }, 1000);
}
else
{
  // Showing error message using this global funtion
SetResponseMessage(false,res.error);

  //---------------------------
// Is server return error this time again client try to sign in here.
// then we try to enabled button for able to clickable.
jQuery("#btn-submit").attr("disabled", false);
  jQuery("#btn-submit").val("Sign In");
  //---------------------------
}
}
});
}

function SetResponseMessage(isSuccess = true, value = 'success message',timer = 4000, isNeedMorePadding = false)
{
  const className = isSuccess === true?'success-response':'error-response';
  const h4 = document.createElement('h4');
  h4.classList.add(className);
  h4.innerHTML = value;
  const parent = document.getElementById('response-data');
  parent.innerHTML = '';
  //parent.style.height = '100px';
  //parent.style.marginTop = '100px';

  parent.appendChild(h4);
  setTimeout(function() {
  parent.innerHTML = '';
  }, timer);
  //return h4;
} 
