<?php
session_start();
?>
<?php require ("includes/conexion.php") ?>
<?php include ("includes/header.php") ?>
<?php 
if(isset($_SESSION ["sesion_username"])){

header ("Location: intropage.php");  
}

if (isset ($_POST["login"])){
if(!empty($_POST['login']) && !empty($_POST['pass'])) {
 $username=$_POST['login'];
 $password=$_POST['pass'];
 
$query =mysqli_query("SELECT * FROM registro WHERE login='".$username."' AND pass='".$pass."'");
 
$numrows=mysql_num_rows($query);
 if($numrows!=0)
 
{
 while($row=mysqli_fetch_assoc($query))
 {
 $dbusername=$row['login'];
 $dbpassword=$row['pass'];
 }
 
if($username == $dbusername && $password == $dbpassword)
 
{
 
 $_SESSION['session_username']=$username;
 
/* Redirect browser */
 header("Location: intropage.php");
 }
 } else {
 
$message = "Nombre de usuario ó contraseña invalida!";
 }
 
} else {
 $message = "Todos los campos son requeridos!";
}
}
?>


<!DOCTYPE html>  
<html  lang=”es”>

<head>
<meta charset=”utf-8”> 
<title></title>

<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilos.css" rel="stylesheet" type="text/css" />

</head>

<body>
	<div id=principal>

		<heard id=cabecera>

		<h3>Formulario contacto</h3>

		</heard>

	<nav id=menu
	
	</nav>

	<div class="container">  
  		<form id="contacto" action="enviar1.php" method="post">
    	<h4>Formulario de contacto</h4>
    

    <fieldset>
    <p> 

        <label><b>(*)Usuario</b></label>
       	    <input placeholder="login" type="text"  name="login" title="Introduce el nombre de usuario que vas a utilizar en la red" required="*"></p> 
    </p>
    	<label><b>(*)Password</b></label>
      	 <input placeholder="password" type="password" name="pass" title="Introduce una contraseña de un mínimo de 6 carácteres y combinando letras y números" required="*"</textarea></p>  
    	</fieldset>

     <br>
     <button name="submit" type="submit" value="enviar">Enviar</button>
     <button class="reset" name="reset" type="reset" value="reset">Restablecer</button>

   </form>

   <?php
    if (isset($_POST['submit'])){
          required ("enviar1.php");

    }
   ?>

   </div>


</body>
