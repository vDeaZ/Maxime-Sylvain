<?php
  require_once 'Music.php';

  class MusicDAO {

    private $db;

    function __construct($path) {
      $database = 'sqlite:'.$path.'/music.db';
      try {
        $this->db = new PDO($database);
        ...
      }
    }

    function get(int $id):Music{
      $requete = "SELECT * FROM music WHERE id='".$id."'";
      $sth = $this->_db->query($requete);
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      $music = new Music();

      foreach ($result as $row){
        $music->_id = $row['id'];
        $music->_auteur = $row['author'];
        $music->_titre = $row['title'];
        $music->_cover = $row['cover'];
        $music->_mp3 = $row['mp3'];
        $music->_categorie = $row['category'];
      }
      return $music;
    }

  }
 ?>
