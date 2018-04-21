<?php

session_start();
$contadorP = 0;
$contadorN = 0;


if (isset($_SESSION["apagar"]) && $_SESSION["apagar"] == true) {
	if (isset($_SESSION["segundaLinha"]) && isset($_SESSION["segundaColuna"])) {
		$_SESSION["estado"][$_SESSION["segundaLinha"]][$_SESSION["segundaColuna"]]=0;
		$_SESSION["estado"][$_SESSION["primeiraLinha"]][$_SESSION["primeiraColuna"]]=0;
		
	}
	unset($_SESSION["primeiraCarta"]);
	unset($_SESSION["primeiraColuna"]);
	unset($_SESSION["primeiraLinha"]);
	unset($_SESSION["segundaLinha"]);
	unset($_SESSION["segundaColuna"]);
	$_SESSION["apagar"] = false;


}
	$_SESSION["estado"][$_GET["linha"]][$_GET["coluna"]] = 2;
if (!isset ($_SESSION["primeiraCarta"])) {
	
	$_SESSION["primeiraCarta"] = $_SESSION["cartas"][$_GET["linha"]][$_GET["coluna"]];
	$_SESSION["primeiraLinha"] = $_GET["linha"];
    $_SESSION["primeiraColuna"] = $_GET["coluna"]; 

} else {
	
	$primeiraCarta = $_SESSION["primeiraCarta"];
	$segundaCarta = $_SESSION["cartas"][$_GET["linha"]][$_GET["coluna"]];
    
    if ($primeiraCarta != $segundaCarta) {
   		$_SESSION["segundaLinha"] = $_GET["linha"];
    	$_SESSION["segundaColuna"] = $_GET["coluna"]; 
   		$_SESSION['contadorN'][] = $contadorN+=1;
   	}

   $_SESSION['contadorP'][] = $contadorP+=1;
   $_SESSION["apagar"] = true;


}	  

header("location:jogar.php");

?>