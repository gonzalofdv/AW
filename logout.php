<?php 
	session_start();
	unset($_SESSION); 
	session_destroy(); 

		echo"Gracias, ¡Vuelva pronto!" . "<br>" . "Redireccionando en 3 segundos..";
		header("refresh:3; url=index.php");
		
?>
