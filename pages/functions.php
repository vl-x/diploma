<?php



function connect(	//функция подключения к БД
		$dbhost='localhost',
		$dbuser='root',
		$dbpass='root',
		$dbname='sumki')
{
	$link=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('connection error'); //подключиться к БД с параметрами host, user, pass, dbname или умереть (выдав ошибку)
	//mysql_query("set names 'utf8'"); //задать параметры БД

	//проверяем успешность подключения
	if (mysqli_connect_error()) {
		die ("Connection failed".mysqli_connect_errno().")");
	} //else echo "DB connected";

	return $link;
}

//$users = 'pages/users.txt'; //временно оставляем для проверки (существует ли такой пользователь в списке при попытке регистрации нового)

function register($login, $pass, $pass2, $email) {// создаем функцию с тремя аргументами 
$messages = array('e_status' => NULL);

	if(isset($_POST["regbtn"])) {
		
		//login	
		$login=trim($login);
		$login=strip_tags($login); // вырезаем теги
	        //конвертируем специальные символы в мнемоники HTML
		$login=htmlspecialchars($login,ENT_QUOTES);
	        /* на некоторых серверах
	         * автоматически добавляются
	         * обратные слеши к кавычкам, вырезаем их */
		$login=stripslashes($login);

		//pass	
		$pass=trim($pass);
		$pass=strip_tags($pass); // вырезаем теги
	        //конвертируем специальные символы в мнемоники HTML
		$pass=htmlspecialchars($pass,ENT_QUOTES);
	        /* на некоторых серверах
	         * автоматически добавляются
	         * обратные слеши к кавычкам, вырезаем их */
		$pass=stripslashes($pass);

		//pass2	
		$pass2=trim($pass2);
		$pass2=strip_tags($pass2); // вырезаем теги
	        //конвертируем специальные символы в мнемоники HTML
		$pass2=htmlspecialchars($pass2,ENT_QUOTES);
	        /* на некоторых серверах
	         * автоматически добавляются
	         * обратные слеши к кавычкам, вырезаем их */
		$pass2=stripslashes($pass2);

		//login	
		$email=trim($email);
		$email=strip_tags($email); // вырезаем теги
	        //конвертируем специальные символы в мнемоники HTML
		$email=htmlspecialchars($email,ENT_QUOTES);
	        /* на некоторых серверах
	         * автоматически добавляются
	         * обратные слеши к кавычкам, вырезаем их */
		$email=stripslashes($email);



		if ((strlen($login)<3)||(strlen($login)>30)) {
			$e1 = "Field 'Login' should contain not less 3 and not more 30 chars!<br>";
			$messages['e1'] = $e1;
			//echo $e1;
			//echo "<a href='index.php?page=5'>Click to return back to Registration</a>";
			//header("Location:index.php?page=5?e1=".$e1);
		} elseif (strlen($pass)==0) {
			$e2 = "Fill the field 'Password'<br>";
			$messages['e2'] = $e2;
			//echo $e2;
			//echo "<a href='index.php?page=5'>Click to return back to Registration</a>";
			//header("Location:index.php?page=5?e2=".$e2);
		} elseif (strlen($pass2)==0) {
			$e3 = "Fill the field 'Password'<br>";
			$messages['e3'] = $e3;
			//echo $e3;
			//echo "<a href='index.php?page=5'>Click to return back to Registration</a>";
			//header("Location:index.php?page=5?e3=".$e3);
		} elseif ($pass !== $pass2) {
			$e4 = "Passwords you entered did not match each other!<br>";
			$messages['e4'] = $e4;
			//echo "<a href='index.php?page=5'>Click to return back to Registration</a>";
			//header("Location:index.php?page=5&e4=".$e4);
		} elseif (strlen($email)==0) {
			$e5 = "Fill the field 'Email'<br>";
			$messages['e5'] = $e5;
			//echo $e5;
			//echo "<a href='index.php?page=5'>Click to return back to Registration</a>";
			//header("Location:index.php?page=5?e5=".$e5);
		} else {

		$link = connect();
		//$link = mysqli_query('SET NAMES "UTF-8"'); //кодируем запрос в utf-8

		$sel="select * from admins where login='$login'
		and pass='$pass'";

		$result=mysqli_query($link, $sel);
		//print_r($result);
		if($row=mysqli_fetch_array($result,MYSQL_ASSOC)){
			$_SESSION['rlogin']=$login;
			//var_dump($row);
			//die();

			//echo "<h3/><span style='color:red;'>User already exists!</span><h3/>";
			$e_status = "<h3/><span style='color:red;'>User already exists!</span><h3/>";
			$messages['e_status'] = false;
			$messages['e_status_message'] = $e_status;
		}
		else{
			$sel="INSERT INTO admins (login, pass, email, roleid) VALUES ('$login', '$pass', '$email', '2')";
			$result=mysqli_query($link, $sel);

			//echo "<h3/><span style='color:green;'>New user ".$login." registered</span><h3/>";
			$e_status = "<h3/><span style='color:green;'>New user ".$login." registered</span><h3/>";
			$messages['e_status'] = true;
			$messages['e_status_message'] = $e_status;
		}

		}

	}

return $messages;

}

function login($login, $pass) {

//die('x');

$messages = array();
	
	if(isset($_POST["submitbtn"])) {
		
		//login	
		$login=trim($login);
		$login=strip_tags($login);
		$login=htmlspecialchars($login,ENT_QUOTES);
		$login=stripslashes($login);

		//pass	
		$pass=trim($pass);
		$pass=strip_tags($pass);
		$pass=htmlspecialchars($pass,ENT_QUOTES);
		$pass=stripslashes($pass);

	if ((strlen($login)<3)||(strlen($login)>30)) {
			$e1 = "Field 'Login' should contain not less 3 and not more 30 chars!<br>";
			$messages['e1'] = $e1;

		} elseif (strlen($pass)==0) {
			$e2 = "Fill the field 'Password'<br>";
			$messages['e2'] = $e2;

		} else {

			$link = connect();
			//$link = mysqli_query('SET NAMES "UTF-8"'); //кодируем запрос в utf-8

			$sel="select * from admins where login='$login'
			and pass='$pass'";
			//var_dump($link);
			//die();
			$result=mysqli_query($link, $sel);
			//print_r($result);
			if($row=mysqli_fetch_array($result,MYSQL_ASSOC)){
				$_SESSION['user']=$row;
				//var_dump($row);
				//die();

				unset($_POST['login']);
				header('Location: index.php?page=7');
				die();

				if($_SESSION['user']['roleid']==1)
				{
					//var_dump($row[5]);
					//die();

					echo "<h3/><span style='color:green;'>User logged in as admin!</span><h3/>";

					//$e_auth =  "<h3/><span style='color:green;'>User logged in as admin!</span><h3/>";
					//$messages['e_auth'] = $e_auth;
				} elseif($_SESSION['user']['roleid']==2) {
					echo "<h3/><span style='color:green;'>User logged in as user!</span><h3/>";
					//$e_auth = "<h3/><span style='color:green;'>User logged in as user!</span><h3/>";
					//$messages['e_auth'] = $e_auth;
				}

				return true;
			}
			else{
				echo "<h3/><span style='color:red;'>No Such User!</span><h3/>";
				return false;
			}

		}

		return $messages;
	}

//return $messages;

}