<?php
// TODO: Admin, Dashboard, Create/Update Quiz, View Student Quiz History, List Question
// TODO: Create Admin, Update Admin, Change Password, 
session_start();
if (!isset($_SESSION['admin_Id']) || !isset($_SESSION['admin_Name'])) {
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
    <link rel="stylesheet" href="../includes/css/style.css" />
</head>

<body>
    <a class="btn-signout flex" title="Sign Out" href="signOut.php"><i class='fas fa-sign-out-alt'></i></a>

    <div hidden class="div-popup-body flex" id="div-popup-body">
        <div class="flex width-100-vw height-100-vh">
            <div class="box-shadow width-600 max-width-80p form-padding" style="background-color:white">
                <form action="" autocomplete="off" id="signInForm">
                    <h3 class="text-center">Add New Question</h3>
                    <br>
                    <div class="input-group width-100-p">
                        <label class="lb-label">Question <span class="required font-bold">*</span></label>
                        <input type="text" id="tx_question" class="tx-input outline-none" placeholder="Username *" minlength="5" maxlength="1000" required value="user1">
                        <small class="small-error required"></small>
                    </div>

                    <div class="input-group width-100-p">
                        <label class="lb-label">Options <span class="required font-bold">*</span></label>
                        <div class="div-options-list">
                            <div class="flex">
                                <input type="text" class="tx-input2 outline-none"> <input type="radio">
                            </div>
                        </div>
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
    </div>
    <div class="profile-body">
        <br>
        <br>
        <br>
        <h2 class="text-center">Welcome <?php echo $_SESSION['admin_Name']; ?> !!!</h2>
    </div>
    <div id="div-table-body" class="center width-1000 max-width-80p">
        <br>
        <button class="btn-add outline-none border-none" onclick="ShowPopupModel(true)">Add Question</button>
        <h4 id="h4-result" class="text-center"></h4>
        <br>
        <table class="tbl-data">
            <thead>
                <th>S.N.</th>
                <th>Questions</th>
                <th>Options</th>
                <th>Status</th>
                <th>CreateTime</th>
                <th>Action</th>
            </thead>
            <tbody id="table-body">
            </tbody>
        </table>
    </div>

</body>
<script>
    function ShowPopupModel(isAddForm = true, id = 0) {
        const popupModel = document.getElementById('div-popup-body');
        popupModel.hidden = false;
        popupModel.style.display = 'block';
    }
</script>

</html>
<style>
    .div-popup-body {
        width: 100vw;
        height: 100vh;
        position: fixed;
        z-index: 100;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
    }
</style>