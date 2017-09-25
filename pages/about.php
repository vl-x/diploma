<div class="col-md-12">
	<h2>О магазине</h2>
	<p>
		<?php

		$link = connect(); 
		$menu = find_all_from_pages_in_sumki();

		for ($i=0; $i < count($menu); $i++) { 
			$id = intval($menu[$i]['id']);
			$content = $menu[$i]['content'];
			if ($_SERVER['QUERY_STRING'] == 'page='.$id) {
				echo $content;
			}
		}
	    ?>
	</p>
</div>