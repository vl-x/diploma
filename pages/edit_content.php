<?php 

require_once("functions.php");
//var_dump(isset($_POST['submit-edit']));
//echo "<br>";

if (isset($_POST['submit-edit-content'])) {
  // Если кнопка отправки формы нажата

  $selected_id = $_POST['menu_name_list'];
  //var_dump($selected_id);
  $new_content = $_POST['content'];
  //var_dump($new_menu_name);

  $link = connect();

  $query = "UPDATE pages SET content = '{$new_content}' WHERE id = '{$selected_id}'"; //временно задаю id вручную
  $result = mysqli_query($link, $query);
  //var_dump($result);
  //die('e');

} else echo "Кнопка submit-edit-content не нажата<br>";

if (!$result) {
  die ("Запрос к БД не прошел.");
} else echo "Контент пункта меню успешно отредактирован.";
       echo "<br>";
       echo "<a href='../index.php?page=7'>Вернуться в админку</a>";

mysqli_close($link);

?>