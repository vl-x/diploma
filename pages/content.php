<!-- CONTENT -->
<div class="jumbotron content">
	<div class="jumbotron breadcrumbs">
		<div class="container">	
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<p>Главная > Женские сумки > Рекомендуемые товары</p>
				</div>
			</div>
		</div>
		
	</div>
	

	<main>
		<div class="container"> <!-- данный див отвечает за контент необходимой страницы -->
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<?php
						if(isset($_GET['page'])) // проверяем на наличие переменной
						{
							$page = $_GET['page'];
							if($page == 1)include_once('pages/home.php'); //подключаем страницы согласно пунктов меню
							if($page == 2)include_once('pages/about.php');
							if($page == 3)include_once('pages/payment.php');
							if($page == 4)include_once('pages/contacts.php');
							if($page == 5)include_once('pages/registration.php'); 
							if($page == 6)include_once('pages/cart.php');
							if($page == 7)include_once('pages/submit.php'); 
							if($page == 8)include_once('pages/admin_panel.php'); 
						}
					?>
				</div>
			</div>
		</div>
	</main>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
				</div>
			</div>
		</div>
	</section>

</div>
<!-- ./CONTENT -->
