<div class="col-md-12">
	<h2>Панель администратора</h2>

	<section>
		<h3>Управление пунктом меню</h3>
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
			  <h4 class="panel-title">
			    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			      + Добавить пункт меню
			    </a>
			  </h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			  <div class="panel-body">
			    <form action="pages/create_page.php" method="post">
			    	<input type="text" name="menu_name" placeholder="Введите имя пункта меню">
			    	<br>
			    	<input type="text" name="page_id" placeholder="Введите Page ID">
			    	<br>
			    	<input type="text" name="position" placeholder="Введите позицию">
			    	<br>
			    	<input type="hidden" name="visible" value="1">
			    	<input type="submit" name="submit-create" value="Создать пункт меню">
			    </form>
			  </div>
			</div>
			</div>
			<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingTwo">
			  <h4 class="panel-title">
			    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			      Редактировать пункт меню
			    </a>
			  </h4>
			</div>
			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			  <div class="panel-body">
				<form action="pages/edit_page.php" method="post">
				    Пункт меню: 
					<select name="menu_name_list">	
						<?php
							$link = connect(); 
							$menu = find_all_from_pages_in_sumki();
						
							for ($i=0; $i < count($menu); $i++) { 
								//$page_id = $menu[$i]['page_id'];
								$id = intval($menu[$i]['id']);

								echo '<option value="'.$id.'">'.$menu[$i]['menu_name'].'</option>'; 
							}
						?>
					</select>
					<input type="text" name="new_menu_name" placeholder="Введите новое имя пункта меню">
				    <input type="submit" name="submit-edit" value="Редактировать пункт меню">
				</form>
			  </div>
			</div>
			</div>
			<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingThree">
			  <h4 class="panel-title">
			    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			      - Удалить пункт меню
			    </a>
			  </h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			  <div class="panel-body">
			  	<form action="pages/delete_page.php" method="post">
				    Пункт меню: 
					<select name="menu_name_list">	
						<?php
							$link = connect(); 
							$menu = find_all_from_pages_in_sumki();
						
							for ($i=0; $i < count($menu); $i++) { 
								//$page_id = $menu[$i]['page_id'];
								$id = intval($menu[$i]['id']);

								echo '<option value="'.$id.'">'.$menu[$i]['menu_name'].'</option>'; 
							}
						?>
					</select>
				    <input type="submit" name="submit-delete" value="Удалить пункт меню">
				</form>
			  </div>
			</div>
			</div>

	</section>
	<hr>
	<section>
		<h3>Управление контентом пункта меню</h3>
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingFour">
			  <h4 class="panel-title">
			    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
			      Редактировать контент
			    </a>
			  </h4>
			</div>
			<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
			  <div class="panel-body">
			  	<form action="pages/edit_content.php" method="post">
					Пункт меню: 
					<select name="menu_name_list">
						
						<?php
							$link = connect(); 
							$menu = find_all_from_pages_in_sumki();
						
							for ($i=0; $i < count($menu); $i++) { 
								//$page_id = $menu[$i]['page_id'];
								$id = intval($menu[$i]['id']);

								echo '<option value="'.$id.'">'.$menu[$i]['menu_name'].'</option>'; 
							}
						?>
						
					</select>
					<br>
					<br>
					<textarea name="content" id="" style="width:100%;" rows="10" placeholder="Введите новый контент страницы"></textarea>
					<input type="submit" name="submit-edit-content" value="Редактировать контент страницы">
				</form>
			  </div>
			</div>
			</div>
	</section>
</div>
