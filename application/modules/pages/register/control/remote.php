<?php

header('Content-type: application/json');

$isAvailable = true;

require ("../../../../config/config.php");
include_once("../../../../class/mysql.php");
$MySQL = new MySQL($db_auth, $mysql_username, $mysql_password, $mysql_host, $mysql_port);


switch ($_POST['type']) {
    case 'email':
        $email = mysql_real_escape_string($_POST["email"]);
		$MySQL->executeSQL("SELECT * FROM account WHERE reg_mail = '$email'");
		$user_rows = $MySQL->records;
		if($user_rows != 0)
			$isAvailable = false;
    break;

    case 'username':
        $username = mysql_real_escape_string($_POST["username"]);
		$MySQL->executeSQL("SELECT * FROM account WHERE username = '$username'");
		$user_rows = $MySQL->records;
		if($user_rows != 0)
			$isAvailable = false;
        break;
	case 'recruiter':
        $recruiter = mysql_real_escape_string($_POST["recruiter"]);
		$MySQL->executeSQL("SELECT * FROM account WHERE username = '$recruiter'");
        $id = $MySQL->arrayedResult['id'];
		$MySQL->executeSQL("SELECT * FROM account WHERE id = $id");
		$user_rows = $MySQL->records;
		if($user_rows == 0)
			$isAvailable = false;
        break;
		
	default:
		$isAvailable = false;
	break;
}

// Finally, return a JSON
echo json_encode(array(
    'valid' => $isAvailable,
));
?>