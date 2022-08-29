
<?php
session_start(); 
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
unset($_SESSION['user_id']);
unset($_SESSION['admin_id']);
session_destroy(); // destroy session
header("location: ../login.php");
 /*

 $link3 =  "https://ditagency.com/admin/admin.php";// "http://localhost/PROJECTS/JADON/admin/admin.php"; 

 if (isset($_SERVER['HTTP_REFERER'])) {
 	if ($_SERVER['HTTP_REFERER'] == $link3 ) {
 		header("location: ../admin/adminlogin.php");
 	} else {
 		header("location: https://ditagency.com");
 	}
 }


*/ 