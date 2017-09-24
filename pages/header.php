<?php 
// switching on mailerPHP

$name = $_POST['popup-name'];
$phone = $_POST['popup-phone'];
$path = 'files';

/*if(isset($_POST['submitmailer'])) {
	var_dump($name);
	var_dump($phone);
}*/

require_once "lib/mail/lib/class.phpmailer.php";

$mail = new PHPMailer;

    $mail->setFrom('coolalexnov@gmail.com', 'От кого');
    $mail->addAddress('kusenkov@gmail.com','Кому');

    for ($ct = 0; $ct < count($_FILES['userfile']['tmp_name']); $ct++) {
        $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['userfile']['name'][$ct]));
        $filename = $_FILES['userfile']['name'][$ct];
        if (move_uploaded_file($_FILES['userfile']['tmp_name'][$ct], $uploadfile)) {
            $mail->addAttachment($uploadfile, $filename);
        } else {
            $msg .= 'Failed to move file to ' . $uploadfile;
        }

    }

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Тема';
    $mail->Body = "На вашем сайте пользователь ".$name." запросил обратный звонок. Перезвоните ему, пожалуйста, по номеру ".$phone.".";

    if (isset($_FILES['uploaded_file']) &&
	    $_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK) {
	    $mail->AddAttachment($_FILES['uploaded_file']['tmp_name'],
	                         $_FILES['uploaded_file']['name']);
	}

    if($mail->send()) {
      $success = "Отправлено успешно";
    } else {
      $error[] = $mail->ErrorInfo;
    }

?>

<!-- HEADER -->
<div class="jumbotron header">
	<div class="transparent-menu-bg">
	</div>

	<div class="container">
		<div class="row">
			<nav class="navbar">
				<div class="container">
					<?php 
						include_once('pages/menu.php');  // подключаем меню
					?>
				</div>
			</nav>
		</div>
	</div>

	<div class="jumbotron logo-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<a href="index.php">
						<img src="img/logo-main.png" alt="logo">
					</a>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-4 col-sm-8 col-xs-12">
					<ul>
						<li><span> 8 (029) </span>777 25 77</li>
						<li><span> 8 (044) </span>677 25 26</li>
					</ul>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-12 pull-left">
					<a href="#myModal" id="filter" data-toggle="modal">
						<div class="callback-button">
							<p>Заказать звонок</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog modal-lg">
	    	<div class="modal-content">
	        	<div class="modal-header">
	          		Закажите обратный звонок
	        	</div>

		        <div class="modal-body">
		        	<div>
		        		<form action="index.php" method="post" enctype="multipart/form-data">
							<input type="text" name="popup-name" placeholder="Имя">
							<br>
							<input type="text" name="popup-phone" placeholder="Телефон">
							<br>
							<input type="file" name="uploaded_file" id="uploaded_file" />
							<br>
  							<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
		        			<input type="submit" class="btn btn-primary" name="submitmailer" value="Отправить">
		        		</form>
		        	</div>

			    </div>
	    	</div>
	    </div>
	</div>
	<!--./ Modal -->

	<div class="container">
		<div class="row">
			<div class="col-md-12 slider">
				<div class="col-md-3 hidden-sm hidden-xs slide-custom-controls">
					<!-- Left slider controls -->
				    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
				      <img src="img/slider-triangle-left.png" alt="To Left">
				      <span class="sr-only">Previous</span>
				    </a>
					
				</div>

				<div class="col-md-6 col-xs-12">
				
					<div class="container">
					  <div id="myCarousel" class="carousel slide" data-ride="carousel">
					    <!-- Indicators -->
						<!--   <ol class="carousel-indicators">
					      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					      <li data-target="#myCarousel" data-slide-to="1"></li>
					      <li data-target="#myCarousel" data-slide-to="2"></li>
					    </ol>	-->

					    <!-- Wrapper for slides -->
					    <div class="carousel-inner">

					      <div class="item active">
					        <img src="img/slider-main/slider-img-1.png" alt="First slide" style="width:100%;">
					        <a href="#">
						        <div class="carousel-caption">
						        </div>
					        </a>
					      </div>

					      <div class="item">
					        <img src="img/slider-main/slider-img-2.png" alt="Second slide" style="width:100%;">
					        <div class="carousel-caption">
					        	<a href="google.com">посмотреть</a>
					        </div>
					      </div>
					    
					      <div class="item">
					        <img src="img/slider-main/slider-img-3.png" alt="Third slide" style="width:100%;">
					        <div class="carousel-caption">
					          	<a href="google.com">посмотреть</a>
					        </div>
					      </div>
					  
					    </div>

					    <!-- Left and right controls -->
					    <div class="visible-sm visible-xs">
						    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
						      <img src="img/slider-triangle-left.png" alt="To Left">
						      <span class="sr-only">Previous</span>
						    </a>
						    <a class="right carousel-control" href="#myCarousel" data-slide="next">
						      <img src="img/slider-triangle-right.png" alt="To Right">
						      <span class="sr-only">Next</span>
						    </a>
					    </div>
					  </div>
					</div>
				</div>

				<div class="col-md-3 hidden-sm hidden-xs slide-custom-controls">
					<!-- Right slider controls -->
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
				      <img src="img/slider-triangle-right.png" alt="To Right">
				      <span class="sr-only">Next</span>
				    </a>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- ./HEADER -->