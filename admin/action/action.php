<?php
include('database/db.php');
session_start();

// Try to sign in
if (isset($_POST['signinSubmit'])) {
    // Try to server validation checking...
    if (isset($_POST['username']) && isset($_POST['password'])) {

        $user = $_POST['username'];
        $pass = $_POST['password'];
        $role = $_POST['signinSubmit'];

        // This is for only one accept 1 or 2 value
        $role = $role == 1 ? $role : 2;

        if ($user == '' || $pass == '') {
            echo json_encode(array('error' => 'Username & Password is Required.', 'code' => '400'));
            exit;
        } else {
            //echo json_encode(array('success' => 'Username & Password is Required2222.', 'code' => '400'));
            $db = new Database();
            // TODO: MD5 Password Encription
            $sql = "select id,fullName from user_details where isActive = '1' and username = '" . $user . "' and password = '" . $pass . "' and roleId = '" . $role . "'";
            $db->select($sql);
            $row = $db->getResult();
            if (count($row) == 1) {
                if ($role == 1) {
                    // This is Admin Session
                    $_SESSION['admin_Name'] = $row[0]['fullName'];
                    $_SESSION['admin_Id'] = $row[0]['id'];
                } else {
                    // This is Student/Client Session
                    $_SESSION['student_Name'] = $row[0]['fullName'];
                    $_SESSION['student_Id'] = $row[0]['id'];
                }
                // Sign in success
                echo json_encode(array('success' => 'Your Sign In Request Successfully Verifyed.', 'code' => '200'));
            } else {
                // Sign In Faild
                echo json_encode(array('error' => 'Username or Password is not match.', 'code' => '400', 'roleID' => $role, 'usename' => $user, 'password' => $pass));
            }
        }
    } else {
        echo json_encode(array('error' => 'Username & Password is Required.', 'code' => '400'));
        exit;
    }
} else if (isset($_GET['getQuestion']) && $_GET['getQuestion'] > 0) {
    if (isset($_SESSION['student_Id'])) {
        // Try to check quiz already start yes or no.
        if (isset($_SESSION['quiz_Id'])) {
            return FN_GetQuestion($_SESSION['quiz_Id']);
        } else {
            // Create new Quiz
            date_default_timezone_set("Asia/Kathmandu");
            $datetime = date('Y-m-d h:i:s A');

            $SqlData = [
                'user_Id' => $_SESSION['student_Id'],
                'creationTime' => $datetime,
            ];

            $db = new Database();
            $db->insert('quiz_played', $SqlData);
            $result = $db->getResult();
            if ($result[0] > 0) {
                $_SESSION['quiz_Id'] = $result[0];
                return FN_GetQuestion($result[0]);
            }
        }
    } else {
        echo json_encode(array('error' => 'UNAUTHORIZED', 'code' => '401'));
    }
} else if (isset($_POST['submitAnswared'])) {
    return FN_SubmitAnswared();
} else {
    echo json_encode(array('error' => 'URL not found.', 'code' => '404'));
}
function FN_GetQuestion($quizId = 0, $isShowAnswared = false, $questionId = 0, $isCorrect = false)
{
    $sql = "select QPA.question_id as id from quiz_played as QP inner join quiz_played_answered as QPA on QP.id = QPA.quiz_Id where QPA.quiz_Id = '" . $quizId . "'";
    $db = new Database();
    $db->select($sql);
    $result = $db->getResult();
    // $sql = "select Q.id as q_Id, GROUP_CONCAT(DISTINCT O.id order by O.id SEPARATOR '|') as o_Ids, GROUP_CONCAT(DISTINCT O.optionName order by O.id SEPARATOR '|') as options, Q.question  From quiz_questions as Q INNER JOIN quiz_options as O ON Q.Id = O.question_Id where Q.isActive = '1'";
    $sql = "select Q.id as q_Id, Q.question, Q.imageUrl From quiz_questions as Q where Q.isActive = '1'";
    $filter = " and Q.id NOT IN (";
    if ($isShowAnswared == false) {
        if (count($result) > 0) {
            for ($i = 0; $i < count($result); $i++) {
                if ($i == 0) {
                    $filter .= "'" . $result[$i]['id'] . "'";
                } else {
                    $filter .= ", '" . $result[$i]['id'] . "'";
                }
            }
            $filter .= ") ORDER BY RAND() LIMIT 1";
            $sql .= $filter;
        }
    } else {
        $sql .= ' And Q.id = ' . $questionId;
    }
    $db->select($sql);
    $result = $db->getResult();
    if (count($result) > 0) {
        $sql = "select id, optionName as option" . ($isShowAnswared == true ? ',isPrimary' : '') . " from quiz_options where question_Id = '" . $result[0]['q_Id'] . "' ORDER BY id";
        $db->select($sql);
        $options = $db->getResult();
        if (count($options) > 0) {
            if ($isShowAnswared == false) {
                echo json_encode(array(
                    'success' => 'Your Next Question.', 'code' => '200', 'question' => array(
                        'questionId' => $result[0]['q_Id'],
                        'question' => $result[0]['question'],
                        'imageUrl' => $result[0]['imageUrl'],
                        'options' => $options
                    )
                ));
            } else {
                echo json_encode(array(
                    'success' => 'Your Result.', 'code' => '200', 'question' => array(
                        'questionId' => $result[0]['q_Id'],
                        'question' => $result[0]['question'],
                        'imageUrl' => $result[0]['imageUrl'],
                        'isCorrect' => $isCorrect,
                        'options' => $options
                    )
                ));
            }
            exit;
        }
        else
        {
    echo json_encode(array('error' => 'Server Error.', 'code' => '500'));
        }
    }
}
function FN_SubmitAnswared()
{
    $questionId = $_POST['questionId'];
    $answered = $_POST['answered'];
    $sql = "select Q.id from quiz_questions as Q Inner Join quiz_options as O On Q.Id = O.question_Id where O.IsPrimary = 1 And Q.Id = " . $questionId . " And O.Id = " . $answered;
    $db  = new Database();
    date_default_timezone_set("Asia/Kathmandu");
    $datetime = date('Y-m-d h:i:s A');

    $SqlData = [
        'quiz_Id' => $_SESSION['quiz_Id'],
        'creationTime' => $datetime,
        'answare_Id' => $answered,
        'question_id' => $questionId,
    ];
    $db->insert('quiz_played_answered', $SqlData);
    $db->select($sql);
    $result = $db->getResult();
    if (count($result) > 0) {
        return FN_GetQuestion($_SESSION['quiz_Id'], true, $questionId,true);
    } else {
        return FN_GetQuestion($_SESSION['quiz_Id'], true, $questionId, false);
    }
}
