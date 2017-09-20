<div class="col-md-6">

  <h3>Страница регистрации</h3>

  <?php
  $res = register($_POST["login"],$_POST["pass"],$_POST["pass2"],$_POST["email"]);
  //var_dump($res);
  //die();

  if(!isset($_POST['regbtn']) && (!$res['e_status'])) // определяем существование переменной
  // если кнопка не нажата, то выводим форму, если нажата то выводим обработчик
  {
  ?>
  <form action="index.php?page=5" method="post"> 
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
    <div class="form-group">
      <label for="pass2">Подтвердите пароль:</label>
      <input type="password" class="form-control" name="pass2">
      <span class="error"><?php echo $res['e3'];?>
      <span class="error"><?php echo $res['e4'];?>
    </div>
    <div class="form-group">
      <label for="email">E-mail:</label>
      <input type="email" class="form-control" name="email">
      <span class="error"><?php echo $res['e5'];?>
    </div>
    <button type="submit" class="btn btn-primary" name="regbtn">Зарегистрироваться</button>
  </form>
  <?php

  }
  else
  {
    echo $res['e_status_message'];
  	 //if(register($_POST["login"],$_POST["pass"],$_POST["pass2"],$_POST["email"]))
  	 //{
  	 //echo "<h3/><span style='color:green;'>Новый пользователь добавлен!</span><h3/>";
  	 //}
  }
  ?>

</div>

<div class="col-md-6">

</div>