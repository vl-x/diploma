<div class="navbar-header">
	<button type="button" data-toggle="collapse" data-target="#navbar" class="navbar-toggle collapsed">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
</div>

<div id="navbar" class="collapse navbar-collapse">
	<ul class="nav nav-pills pull-left">
		<!-- для вытягиdания класса активной ссылки 
	<?php 
		//print_r($_SERVER); - в результатах найти переменную 'page', далее найти в каком суперглобальном массиве она содержится. В нашем случае это 'QUERY_STRING'
	 ?>
		 -->
		<li <?php if ($_SERVER['QUERY_STRING'] == 'page=1') echo 'class="active"'; ?>><a href="index.php?page=1">Главная</a></li>
		<li <?php if ($_SERVER['QUERY_STRING'] == 'page=2') echo 'class="active"'; ?>><a href="index.php?page=2">О магазине</a></li>
		<li <?php if ($_SERVER['QUERY_STRING'] == 'page=3') echo 'class="active"'; ?>><a href="index.php?page=3">Оплата и доставка</a></li>
		<li <?php if ($_SERVER['QUERY_STRING'] == 'page=4') echo 'class="active"'; ?>><a href="index.php?page=4">Контакты</a></li>
		<li <?php if ($_SERVER['QUERY_STRING'] == 'page=5') echo 'class="active"'; ?>>
				<?php 
				if ($_SESSION['user']['login']) {
			       echo "";
			     } else echo "<a href='index.php?page=5'>Регистрация</a>";
			?>
			
		</li>
		<li <?php if ($_SERVER['QUERY_STRING'] == 'page=7') echo 'class="active"'; ?>>
			<?php 
				if ($_SESSION['user']['login']) {
			       echo " <a href='index.php?action=logout'>Выход из ".$_SESSION['user']['login']."</a>";
			     } else echo "<a href='index.php?page=7'>Вход</a>";
			?>
		</li>
		<li <?php if ($_SERVER['QUERY_STRING'] == 'page=5') echo 'class="active"'; ?>>
				<?php 
				if ($_SESSION['user']['roleid']==1) {
			       echo "<a href='index.php?page=8'>Админка</a>";
			     } else echo "";
			?>
			
		</li>
	</ul>

	<ul class="nav nav-pills pull-right">
		<li <?php if ($_SERVER['QUERY_STRING'] == 'page=6') echo 'class="active"'; ?>>
			<a href="index.php?page=6">
				<img src="img/basket-icon.png" alt="cart">
				<div><span class="basket-title">Корзина </span>( 3 )</div>
			</a>
		</li>
	</ul>
</div>