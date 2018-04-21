<!DOCTYPE html> 
<html>
<head>

  <meta charset="utf-8">
  <title>Jogo da Memória</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<?php
session_start();  
  
if (!isset($_SESSION["cartas"])) {
 
  $_SESSION["estado"] = 
  [ 
    [0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0]
  ];

  $_SESSION["cartas"] = 
  [ 
    [2, 7, 1, 6, 4, 3, 5],
    [5, 2, 1, 7, 3, 4, 6]
  ];
  $arr = [];
  for($i = 1; $i < 8; $i++) {
    $arr[] = $i;
    $arr[] = $i;
  }
  shuffle($arr);
  for($i = 0; $i < 7; $i++) {
    $_SESSION['cartas'][0][$i] = $arr[$i];
  }
  for($i = 0; $i < 7; $i++) {
    $_SESSION['cartas'][1][$i] = $arr[7 + $i];
  }


}


$estado = $_SESSION["estado"];
$cartas = $_SESSION["cartas"];


?>


<body>
  <div class="fade"></div>
  <div id="container">

    <table>

      <?php for($i = 0; $i < sizeof($estado); $i++): ?>
        <tr>

          <?php for($j = 0; $j < sizeof($estado[$i]); $j++): ?>
            <td>
              <div class="card">
                <?php if ($estado[$i][$j] == 0): ?>

                  <button class="face back" onclick="window.location='processar.php?<?= "linha=$i&coluna=$j"; ?>'"></button>
                
                <?php endif ?>

                <?php if ($estado[$i][$j] == 2 || $estado[$i][$j] == 1){
                  echo '<button class="face front' . $cartas[$i][$j] . '"></button>';
              }

              ?>
            </div>
          </td>
        <?php endfor; ?>

      </tr>
    <?php endfor; ?>

  </table>
  <a href="reset.php">Reiniciar</a>
</div>

<?php 


if(isset($_SESSION['contadorP']) && isset($_SESSION['contadorN'])){
  $ganhou = count($_SESSION['contadorP']) - count($_SESSION['contadorN']);
  if($ganhou == 7){
    echo "<script> alert(\"Você Ganhou! Pressione ok para jogar novamente.\"); </script>";
    echo "<script> window.location=\"reset.php\"; </script>";

    }

}

?>

 
 </body>

</html>