<?php
	include "config.php";
	if(isset($_SESSION['user_id'])){
		
	}else{
		echo "<script >
		alert('Área restrita.');
		window.location='../index.php';
		</script>";
		//header ("Location:index.php");
	}
	echo "

  			
    			<div class='container'><h2>Aqui estão Seus arquivos</h2>
    		
";
	$path = "files/";
   	$diretorio = dir($path);
   
   	while($arquivo = $diretorio -> read()){
    	echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
   	}
   	$diretorio -> close();
	
   	echo "</div>";
	
  
?>
