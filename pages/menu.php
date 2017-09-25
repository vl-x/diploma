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
		<!-- для вытягивания класса активной ссылки -->
		<?php
			$link = connect(); 
			$menu = find_all_from_pages_in_sumki();

			for ($i=0; $i < count($menu); $i++) { 
				$page_id = $menu[$i]['page_id'];
		?>			
			<li class=<?php echo ($_SERVER['QUERY_STRING'] == 'page='.$page_id.'') ? "active" : "";?>>
				<?php 
					switch ($i) {
						case '4':
							if ($_SESSION['user']['login']) {
						       echo "";
						    } else echo '<a href="index.php?page='.$page_id.'">'.$menu[$i]['menu_name'].'</a>';
							break;

						case '5':
							?>		
								<?php 
									if ($_SESSION['user']['login']) {
								       echo "<a href='index.php?action=logout'>Выход из ".$_SESSION['user']['login']."</a>";
								    } else echo '<a href="index.php?page='.$page_id.'">'.$menu[$i]['menu_name'].'</a>';
								?>
							 <?php 
							break;

						case '6':
							if ($_SESSION['user']['roleid']==1) {
						       echo ('<a href="index.php?page='.$page_id.'">'.$menu[$i]['menu_name'].'</a>');
						    } else echo "";
							break;
						
						default:
							?>
							<a href="index.php?page=<?php echo $page_id; ?>">
								<?php echo $menu[$i]['menu_name']; ?>
							</a> <?php 
							break; 
				}?>
			</li>
		<?php	
			}
		?>
	</ul>

	<ul class="nav nav-pills pull-right">
		<li <?php if ($_SERVER['QUERY_STRING'] == 'page='.$page_id='99'.'') echo 'class="active"'; ?>>
			<a href="index.php?page=<?php echo $page_id='99'; ?>">
				<img src="img/basket-icon.png" alt="cart">
				<div><span class="basket-title">Корзина </span>( 3 )</div>
			</a>
		</li>
	</ul>
</div>