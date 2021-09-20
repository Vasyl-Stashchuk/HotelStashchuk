<?php
  $login = filter_var(trim($_POST['login']),
  FILTER_SANITIZE_STRING);
  $name = filter_var(trim($_POST['name']),
  FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']),
  FILTER_SANITIZE_STRING);
  if(mb_strlen($login) <  5 || mb_strlen($login) >  90) {
    echo "Недопутима довжина логіну ";
    exit();
  } else if(mb_strlen($name) <  3 || mb_strlen($name) > 50) {
    echo "Недопутима довжина імені";
    exit();
  } else if(mb_strlen($pass) <  0 || mb_strlen($pass) > 100) {
    echo "Недопутима довжина паролю";
    exit();
  }
  $pass = md5($pass."AgaNy228");

  $mysql = new mysqli('localhost', 'root', 'root','register-bd');
  $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`)
  VALUES('$login', '$pass', '$name') ");

  $mysql->close();


  header('Location: /');
 ?>
