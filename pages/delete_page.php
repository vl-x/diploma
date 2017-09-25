<?php 

require_once("functions.php");
//var_dump(isset($_POST['submit-delete']));
//echo "<br>";

if (isset($_POST['submit-delete'])) {
  // Если кнопка отправки формы нажата

  $selected_id = $_POST['menu_name_list'];
  $menu_name = $_POST['menu_name'];
  //var_dump($selected_id);

  $link = connect();

  $query = "DELETE FROM pages WHERE id = '{$selected_id}'"; //временно задаю id вручную
  $result = mysqli_query($link, $query);
  //var_dump($result);
  //die('e');

} else echo "Кнопка submit-delete не нажата<br>";

if (!$result) {
  die ("Запрос к БД не прошел.");
} else echo "Пункт меню успешно удалён.";
       echo "<br>";
       echo "<a href='../index.php?page=7'>Вернуться в админку</a>";

mysqli_close($link);

?>