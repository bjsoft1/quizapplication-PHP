<div class="flex width-100-vw height-100-vh">
     <div class="box-shadow width-600 max-width-80p form-padding">
      <br>
     <form action="" autocomplete="off" id="signInForm">
        <h3 class="text-center">Sign in to continue</h3>
        <br>
        <div class="input-group width-100-p">
          <label class="lb-label">Username <span class="required font-bold">*</span></label>
          <input type="text" id="tx_username" class="tx-input outline-none" placeholder="Username *" minlength="5" maxlength="30" required value="user1">
          <small class="small-error required"></small>
        </div>

        <div class="input-group width-100-p">
          <label class="lb-label">Password <span class="required font-bold">*</span></label>
          <input type="password" id="tx_password" class="tx-input outline-none" placeholder="Password *" minlength="5" maxlength="20" required value="user1">
          <small class="small-error required"></small>
        </div>
        <div id="response-data">
          <!-- <h4 class="success-response">Success Data</h4> -->
          <!-- <h4 class="error-response">Success Data</h4> -->
        </div>
        <div class="input-group width-100-p">
          <input type="submit" id="btn-submit" class="btn-submit outline-none border-none" value="Sign In">
        </div>
      </div>
     </form>
  </div>
