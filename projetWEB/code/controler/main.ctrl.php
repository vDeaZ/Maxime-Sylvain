<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>page principal</h1>
    <?php
    require_once('Produit.class.php');
    $allProduct = loadMusicDB();
    if (!isset($_GET['No']) || $_GET['No'] < 0) {
      $No = 0;
    }
    else{
      $No = $_GET['No'];
    }

    if (!isset($_GET['Nb']) || $_GET['Nb'] < 10) {
      $Nb = 10;
    }
    else{
      $Nb = $_GET['Nb'];
    }
    echo '<a href="main2.php?No=' . ($No - $Nb) .'"><img src="https://www-info.iut2.univ-grenoble-alpes.fr/intranet/enseignements/ProgWeb/M3104/TP/tp02/sujet/img/Actions-arrow-left-icon.png" alt="" height="50" width="50"></a>';
    echo $No;
    echo '<a href="main2.php?No=' . ($No + $Nb) .'"><img src="https://www-info.iut2.univ-grenoble-alpes.fr/intranet/enseignements/ProgWeb/M3104/TP/tp02/sujet/img/Actions-arrow-right-icon.png" alt="" height="50" width="50"></a>';
    if ($No == 0) {
      for ($i = 1 + $No; $i <= $Nb + $No; $i++){
        echo  '<a href="play.php?music='. $allProduct[$i]->mp3 .'&cover='. $allProduct[$i]->cover .'&No='. $i .'"><img src="https://www-info.iut2.univ-grenoble-alpes.fr/intranet/enseignements/ProgWeb/data/musiques/img/'. $allProduct[$i]->cover .'" alt="" height="200" width="200"></a>';
        echo 'Titre : '. $allProduct[$i]->title .'';
        echo '| Auteur : '. $allProduct[$i]->author .'';
      }
    }
    else{
      for ($i = $No; $i <= $Nb + $No; $i++){
        echo  '<a href="play.php?music='. $allProduct[$i]->mp3 .'&cover='. $allProduct[$i]->cover .'&No='. $i .'"><img src="https://www-info.iut2.univ-grenoble-alpes.fr/intranet/enseignements/ProgWeb/data/musiques/img/'. $allProduct[$i]->cover .'" alt="" height="200" width="200"></a>';
        echo 'Titre : '. $allProduct[$i]->title .'';
        echo '| Auteur : '. $allProduct[$i]->author .'';
      }
    }

    ?>
  </body>
</html>
