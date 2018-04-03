<?php
  //header('Location: controler/main.ctrl.php');
?>

<?php
  $data;
  GLOBAL $data;

	if (!isset($COOKIE['isConnect']) || $COOKIE['isConnect'] != true) {
		header('Location: view/connexion.view.php');
	}
	else{
		header('Location: view/acceuil.view.php');
	}

  function newSessionId()
	{
		global $bd;  $data;
  GLOBAL $data;
		$req = "SELECT id FROM session;";
		$idTrouve = false;

		$res = $bd->query($req);
		$res = $res->fetchAll(PDO::FETCH_ASSOC);

		while (!$idTrouve) {
			$idTrouve = true;
			$rand = rand();
			foreach ($res as $value) {
				if ($value == $rand) {
					$idTrouve = false;
				}
			}
		}
		return $rand;
	}

	function putSession($id,$key,$val)
	{
		global $bd;
		$req = 'INSERT INTO session(id, key, val) VALUES (:id, :key, :val)';
		$stmt = $bd->prepare($req);
		$stmt->BindParam(':id',$id);
		$stmt->BindParam(':key',$key);
		$stmt->BindParam(':val',$val);
		$stmt->execute();
	}

	function getSession($id,$key)
	{
		$req = 'SELECT val FROM session WHERE id='.$id.' and key='.$key.';';
		$res = $bd->query($req);
		$res = $res->fetchAll(PDO::FETCH_ASSOC);
		return $res[0];
	}

	if (isset($_GET['prenom']))
	{
		setcookie('name', $_GET['prenom'], time()+(86400 * 30));
	}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
