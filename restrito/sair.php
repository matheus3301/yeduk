<?php 
session_start();
session_destroy();


header('location:loginrestrito.php');
 ?>