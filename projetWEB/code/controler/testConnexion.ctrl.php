<?php
  if (sessionExist($_POST['id'],$_POST['mail'])) {
    header('Location: ../view/acceuil.view.php');
    header('Location: ../view/connexion.view.php');
  }

  function sessionExist($id, $mdp){
    try {
  		$bd = new PDO('sqlite:data/database.db');
  	} catch (\Exception $e) {
  		echo 'Exception création BD';
  	}
    $req = "SELECT session(mail, mdp) FROM log WHERE mail = (:mail)";
    $stmt = $bd->prepare($req);
    $stmt->BindParam(':mail',$id);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if ($res['mdp'] == $mdp) {
      setcookie('isConnect', 'true', time()+(86400 * 30));
      return true;
    }
    return false;
  }
?>
