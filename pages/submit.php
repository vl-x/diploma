<div class="col-md-6">

  <h3>Страница авторизации</h3>

  <?php

  /*if (!empty($_POST["login"]) && !empty($_POST["pass"])) {
    var_dump($_POST);
    die('y');
    $res = login($_POST["login"],$_POST["pass"]);
    //var_dump($_SESSION);
  }*/


  if(!isset($_POST['submitbtn']) && (empty($_SESSION['user'])) || (empty($_SESSION['user']))) // определяем существование переменной
  // если кнопка не нажата, то выводим форму, если нажата то выводим обработчик
  {
  ?>

  <form action="index.php?page=6" method="post"> 
    <div class="form-group">
      <label for="login">Логин:</label>
      <input type="text" class="form-control" name="login">
      <span class="error"><?php echo $res['e1'];?>
      <span class="error"><?php echo $res['e6'];?>
      <span class="error"><?php echo $res['e7'];?>
    </div>
    <div class="form-group">
      <label for="pass">Пароль:</label>
      <input type="password" class="form-control" name="pass">
      <span class="error"><?php echo $res['e2'];?>
    </div>
    <button type="submit" class="btn btn-primary" name="submitbtn">Войти</button>
  </form>
  <?php

  }
  else
  {
    //var_dump($_SESSION);
     
     if (isset($_SESSION['user']['login'])) {
       echo $_SESSION['user']['login'];
       echo " <a href='index.php?action=logout'>Выйти</a>";
     } else echo " <a href='index.php?page=6'>Вернутся к странице входа</a>";
     
  }
  ?>

</div>



<div class="col-md-6">

</div>