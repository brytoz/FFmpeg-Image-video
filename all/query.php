<?php
date_default_timezone_set('Africa/lagos');
ob_start();
session_start();
require('conn.php');
 
 


function signup($conn){

	if (isset($_POST['submit'])) {

	if (isset($_POST["username"]) && isset($_POST["fullname"]) && isset($_POST["password"]) && isset($_POST["bgroup"]) && isset($_POST["genotype"]) ) {

		if (!empty($_POST["username"]) && !empty($_POST["fullname"]) && !empty($_POST["dob"]) && !empty($_POST["password"]) && !empty($_POST["bgroup"]) && !empty($_POST["genotype"])) {
			

			$username = $_POST["username"];
			$fullname = $_POST["fullname"];
			$dob = $_POST["dob"];
			$bgroup = $_POST["bgroup"];
			$genotype = $_POST["genotype"];
			$password = $_POST["password"]; 
			

			//password hashing
			$treat = sha1(md5($password)).'^#|!@#$%%vZsQ2lB8g0s'; 
			$password_hash = md5($password.$treat);


			$sql_username = "SELECT `username`  FROM users WHERE username LIKE '".mysqli_real_escape_string($conn, $username)."'";

			
			$usernameResult = mysqli_query($conn, $sql_username); 

			//check for similar users
			if (mysqli_num_rows($usernameResult) === 1) {
				echo '<script>document.getElementById("error").innerHTML = "Username already exist!";</script>';
			} else {
				
				//INSERTING
			//i am here
			$insert = "INSERT INTO users (`id`, `username`, `fullname`, `dob`, `bgroup`, `genotype`, `password`) VALUES ( NULL, 
			'".mysqli_real_escape_string($conn, $username)."',
			'".mysqli_real_escape_string($conn, $fullname)."',
			'".mysqli_real_escape_string($conn, $dob)."',
			'".mysqli_real_escape_string($conn, $bgroup)."',
			'".mysqli_real_escape_string($conn, $genotype)."',
			'".mysqli_real_escape_string($conn, $password_hash)."')";


			$insert_query =  mysqli_query($conn, $insert);


				if ($insert_query == true) {

					echo '<script>document.getElementById("error").innerHTML = "Redirecting...";</script>';
					echo'<script> window.location.replace("login.php")</script>';

				} else{
					echo '<script> alert("Sorry, we couldn\'t Register you this time please try again later");</script>';
					echo'<script> window.location.replace("register.php")';
				}
			}


		} else {
			echo'<script> alert("Please fill in all fields "); </script>';
			echo'<script> window.location.replace("register.php")</script>';
		}

	} else {
		echo'<script> alert("Please fill in all fields"); </script>';
		echo'<script> window.location.replace("register.php")</script>';
	}

}



}



function login($conn){

	if (isset($_POST['submit'])) {
		if(isset($_POST['username']) && isset($_POST['password'])){

			$username = $_POST["username"];
			$password = $_POST["password"]; 
			//crypt the password
			$salt = sha1(md5($password)).'^#|!@#$%%vZsQ2lB8g0s'; 
			$password_hash = md5($password.$salt);

			if (!empty($username) &&!empty($password)){

				$sql_select = "SELECT `id` FROM users WHERE username LIKE 
				'".mysqli_real_escape_string($conn, $username)."' AND password LIKE 
				'".mysqli_real_escape_string($conn, $password_hash)."'";

				$login_query = mysqli_query($conn, $sql_select);
				$rows = mysqli_num_rows($login_query);

				if ($rows==0) {
					echo '<script>document.getElementById("error").innerHTML = "Incorrect username or password!";</script>';
				}else if ($rows==1) {

					$count = mysqli_fetch_row($login_query);
					$user_id = $count[0];
						//set cookie 
					setcookie('username', $username, time() + 28800, '/');
					setcookie('password', $password_hash, time() + 28800, '/');
					
					$_SESSION['user_id'] = $user_id;

					
					header('Location: dashboard.php');
				}
				

			} else {
				echo '<script>document.getElementById("error").innerHTML = "Fields are empty!"; </script>';
			}
		}
	}

}









//logged in function
function loggedin() {
	if (isset($_COOKIE['username']) && isset($_COOKIE['password']) && isset($_SESSION['user_id'])) {
		return true;
	} else {
		return false; 
	}
}


 



function falova($conn){

	if (isset($_POST['submit'])) {

		if (isset($_POST["salt"]) && isset($_POST["alcohol"]) && isset($_POST["osa"]) && isset($_POST["chestpain"]) && isset($_POST["urine"]) && isset($_POST["nausea"]) && isset($_POST["dizzy"])  && isset($_POST["fatigue"]) && isset($_POST["vision"]) && isset($_POST["gda"]) && isset($_POST["headache"]) ) {

			$salt =  $_POST["salt"];
			$alcohol = $_POST["alcohol"];
			$gda = $_POST["gda"];

			$nausea =  $_POST["nausea"];
			$headache = $_POST["headache"];
			$dizzy =  $_POST["dizzy"];
			$chestpain = $_POST["chestpain"];
			$fatigue = $_POST["fatigue"];
			$osa = $_POST["osa"];
			$vision = $_POST["vision"];
			$urine = $_POST["urine"];

					$hyper = 'Possible stage 2 Hypertension ';
					$posHyper = 'Possible Stage 1 Hypertension';
					$posHypo = 'Possible Hypotension';
					$hypo = 'Possible Orthostatic Hypotension';
					$free = 'Hyper/Hypotension -ve';
					$stress = 'Too much Stress';

					$username = $_COOKIE['username'];
					$time = date('Y-m-d  H:i:s');

			//Arrays likeTerms

			if ($gda > 4 && $salt && $alcohol == 3 && $nausea && $headache  && $fatigue && $osa && $vision && $dizzy && $chestpain && $urine == no ) {
				// code... no hyper/hypo
					 

					$insert = "INSERT INTO results (`id`, `username`, `status`, `dateTime`) VALUES ( NULL, 
					'".mysqli_real_escape_string($conn, $username)."',
					'".mysqli_real_escape_string($conn, $free)."',
					'".mysqli_real_escape_string($conn, $time)."')";



					$insert_query =  mysqli_query($conn, $insert);

					header("Location: results/one.php ");


			} else if ($gda < 3 && $nausea && $headache && $osa && $vision && $dizzy && $chestpain && $fatigue && $urine == 'yes' || 'maybe' && $salt && $alcohol > 2  ) {
				// code...yes hyper

					$insert = "INSERT INTO results (`id`, `username`, `status`, `dateTime`) VALUES ( NULL, 
					'".mysqli_real_escape_string($conn, $username)."',
					'".mysqli_real_escape_string($conn, $hyper)."',
					'".mysqli_real_escape_string($conn, $time)."')";



					$insert_query =  mysqli_query($conn, $insert);
							header("Location: results/two.php ");

			} else if ($gda < 3 && $nausea && $headache &&  $fatigue && $dizzy == 'yes' && $osa && $vision && $chestpain && $urine == 'no' || 'maybe' && $salt && $alcohol < 3 ) {
				// code yes hypo

				$insert = "INSERT INTO results (`id`, `username`, `status`, `dateTime`) VALUES ( NULL, 
					'".mysqli_real_escape_string($conn, $username)."',
					'".mysqli_real_escape_string($conn, $hypo)."',
					'".mysqli_real_escape_string($conn, $time)."')";



					$insert_query =  mysqli_query($conn, $insert);
							header("Location: results/three.php ");
			

			} else if ($salt && $alcohol > 2 && $fatigue && $headache && $chestpain == 'yes' && $gda < 4 &&  $osa && $nausea && $vision && $dizzy && $urine == 'no'  ) {
				// code... potential hypertension


						$insert = "INSERT INTO results (`id`, `username`, `status`, `dateTime`) VALUES ( NULL, 
					'".mysqli_real_escape_string($conn, $username)."',
					'".mysqli_real_escape_string($conn, $posHyper)."',
					'".mysqli_real_escape_string($conn, $time)."')";



					$insert_query =  mysqli_query($conn, $insert);
							header("Location: results/four.php ");

			} else if ($salt && $alcohol > 2 && $fatigue && $headache == 'yes' && $gda < 4 &&  $osa && $vision && $dizzy && $chestpain && $urine == 'yes' || 'maybe' ) {
				// code...hypertension

				$insert = "INSERT INTO results (`id`, `username`, `status`, `dateTime`) VALUES ( NULL, 
					'".mysqli_real_escape_string($conn, $username)."',
					'".mysqli_real_escape_string($conn, $hyper)."',
					'".mysqli_real_escape_string($conn, $time)."')";



					$insert_query =  mysqli_query($conn, $insert);
							header("Location: results/five.php ");

			} else if ($salt && $alcohol < 3 && $fatigue && $headache && $dizzy == 'yes' && $gda < 4 &&  $osa && $nausea && $vision  && $urine == 'no'  ) {
				// code... potential hypotension

				$insert = "INSERT INTO results (`id`, `username`, `status`, `dateTime`) VALUES ( NULL, 
					'".mysqli_real_escape_string($conn, $username)."',
					'".mysqli_real_escape_string($conn, $posHypo)."',
					'".mysqli_real_escape_string($conn, $time)."')";



					$insert_query =  mysqli_query($conn, $insert);

							header("Location: results/six.php ");

			} else if ($salt && $alcohol < 3 && $fatigue && $headache == 'yes' && $gda < 4 && $nausea && $vision && $dizzy == 'yes' &&  $osa  && $chestpain  == 'no' || 'maybe'  ) {
				// code...  hypotension

				$insert = "INSERT INTO results (`id`, `username`, `status`, `dateTime`) VALUES ( NULL, 
					'".mysqli_real_escape_string($conn, $username)."',
					'".mysqli_real_escape_string($conn, $hypo)."',
					'".mysqli_real_escape_string($conn, $time)."')";



					$insert_query =  mysqli_query($conn, $insert);
							header("Location: results/seven.php ");

			} else if ($salt && $alcohol && $gda < 3 && $fatigue && $headache == 'yes'  && $nausea && $vision && $dizzy == 'yes' &&  $osa  && $chestpain && $urine == 'no' || 'maybe'  ) {
				// code... potential hypotension

					$insert = "INSERT INTO results (`id`, `username`, `status`, `dateTime`) VALUES ( NULL, 
					'".mysqli_real_escape_string($conn, $username)."',
					'".mysqli_real_escape_string($conn, $posHypo)."',
					'".mysqli_real_escape_string($conn, $time)."')";



					$insert_query =  mysqli_query($conn, $insert);
							header("Location: results/eight.php ");

			} else if ($salt && $alcohol  > 2 && $gda < 3 && $headache == 'yes'  && $nausea  && $dizzy == 'no' &&  $osa  && $chestpain && $urine && $vision == 'yes' || 'maybe'  ) {
				// code... hypertension

					$insert = "INSERT INTO results (`id`, `username`, `status`, `dateTime`) VALUES ( NULL, 
					'".mysqli_real_escape_string($conn, $username)."',
					'".mysqli_real_escape_string($conn, $hyper)."',
					'".mysqli_real_escape_string($conn, $time)."')";



					$insert_query =  mysqli_query($conn, $insert);

							header("Location: results/nine.php ");

			} else if ($salt && $alcohol > 0 && $gda > 1 && $headache && $fatigue && $nausea == 'yes' || 'maybe'  &&  $vision && $dizzy  &&  $osa  && $chestpain && $urine == 'no'  ) {
				// code... most likely stress


					$insert = "INSERT INTO results (`id`, `username`, `status`, `dateTime`) VALUES ( NULL, 
					'".mysqli_real_escape_string($conn, $username)."',
					'".mysqli_real_escape_string($conn, $stress)."',
					'".mysqli_real_escape_string($conn, $time)."')";



					$insert_query =  mysqli_query($conn, $insert);

							header("Location: results/ten.php ");

			} else {
				header("Location: 404.php ");
			}

		}

		}

	}
