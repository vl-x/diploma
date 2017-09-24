<?php 

session_start();
//unset($_SESSION);

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'logout') {
		unset($_SESSION['user']);
		session_destroy();
		header("Location: index.php?page=6");
	}
}

include_once('pages/functions.php');  // подключаем файл с функциями


if(isset($_POST['submitbtn'])) {
	if (!empty($_POST["login"]) && !empty($_POST["pass"])) {
	    $res = login($_POST["login"],$_POST["pass"]);
	}
}
					
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- режим совместимости с IE-->
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Для правильного отображения на устройствах -->
	<title>DIPLOMA Владимир Кусенков</title>
	<link rel="icon" type="image/png" href="favicon.ico">
	<!-- Bootstrap --> 
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>

<div class="all-content">

	<!-- HEADER -->
	<?php 
		include_once('pages/header.php'); //подключаем header
	?>
	<!-- ./HEADER -->

	<!-- CONTENT -->
	<?php 
		include_once('pages/content.php'); //подключаем content
	?>
	<!-- ./CONTENT -->

</div>

<!-- FOOTER -->
<?php 
	include_once('pages/footer.php'); //подключаем footer
?>
<!-- ./FOOTER -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<!--<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.11.2.min.js"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>