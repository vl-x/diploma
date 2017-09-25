<?php 

require_once("functions.php");
//var_dump(isset($_POST['submit-edit']));
//echo "<br>";

if (isset($_POST['submit-edit'])) {
  // Если кнопка отправки формы нажата

  $selected_id = $_POST['menu_name_list'];
  //var_dump($selected_id);
  $new_menu_name = $_POST['new_menu_name'];
  //var_dump($new_menu_name);

  $link = connect();

  $query = "UPDATE pages SET menu_name = '{$new_menu_name}' WHERE id = '{$selected_id}'"; //временно задаю id вручную
  $result = mysqli_query($link, $query);
  //var_dump($result);
  //die('e');

} else echo "Кнопка submit-edit не нажата<br>";

if (!$result) {
  die ("Запрос к БД не прошел.");
} else echo "Пункт меню ''".$new_menu_name."'' успешно отредактирован.";
       echo "<br>";
       echo "<a href='../index.php?page=7'>Вернуться в админку</a>";

mysqli_close($link);

?>