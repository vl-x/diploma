<?php 

require_once("functions.php");

if (isset($_POST['submit-create'])) {
  // Если кнопка отправки формы нажата

  $menu_name = $_POST['menu_name'];
  $page_id = $_POST['page_id'];
  $position = $_POST['position'];
  $visible = $_POST['visible'];

  $link = connect();

  $query = "INSERT INTO pages (menu_name, page_id, position, visible) VALUES ('{$menu_name}', '{$page_id}', '{$position}', '{$visible}')";
  $result = mysqli_query($link, $query);
} else echo "Кнопка submit-create не нажата<br>";

if (!$result) {
  die ("Запрос к БД не прошел.");
} else echo "Новый пункт меню ''".$menu_name."'' успешно добавлен.";
       echo "<br>";
       echo "<a href='../index.php?page=7'>Вернуться в админку</a>";

mysqli_close($link);

?>