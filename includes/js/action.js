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
