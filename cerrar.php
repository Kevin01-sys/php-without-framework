<?php
session_start();

if(isset($_GET['cerrar'])) {

  //Vaciamos y destruimos las variables de sesión
  $_SESSION['user_id'] = NULL;
  $_SESSION['username'] = NULL;
  $_SESSION['user_email'] = NULL;
  unset($_SESSION['user_id']);
  unset($_SESSION['username']);
  unset($_SESSION['user_email']);

	// remove all session variables
	//  session_unset();

	// destroy the session
	//session_destroy();

  //Redireccionamos a la pagina index.php
  header('Location: index.php');
}
	header('Location: index.php');


?>