<?php

// c'est un objet qui a une seule valeur: la base de donnée
// la db est un tableau, array. La db = un objet
class MembersManager extends Database{
        // Database table

  public function __construct()
  {
    parent::__construct();
  }

    // Création d'une ligne dans la base de donnée
    public function add(Member $member) {
        
    $q = $this->db->prepare('INSERT INTO ' . self::TABLE_MEMBER . '(name, password, level) VALUES( :name, :password, :level)');
    $q->bindValue(':name', $member->name());
    $q->bindValue(':password', $member->password());
    $q->bindValue(':level', $member->level());
    $q->execute();
    
    $member->hydrate([
      'id' => $this->db->lastInsertId(),
      // 'degats' => 0,
    ]);
  }
  
  // On compte les inscrits
  public function count()
  {
    return $this->db->query('SELECT COUNT(*) FROM ' . self::TABLE_MEMBER . '')->fetchColumn();
  }
  
  // Lecture de la base de donnée pour voir si tel id ($info) y est
  public function exists($info)
  {
    if (is_int($info)) // On veut voir si tel membernnage ayant pour id $info existe.
    {
      return (bool) $this->db->query('SELECT COUNT(*) FROM ' . self::TABLE_MEMBER . ' WHERE id = '.$info)->fetchColumn();
    }
    // Sinon, c'est qu'on veut vérifier que le name existe ou pas.
    $q = $this->db->prepare('SELECT COUNT(*) FROM ' . self::TABLE_MEMBER . ' WHERE name = :name');
    $q->execute([':name' => $info]);
    return (bool) $q->fetchColumn();
  }
  
  public function get($info)
  {
    if (is_int($info))// is_int: Get member attributs by "id"
    {
      $q = $this->db->query('SELECT * FROM ' . self::TABLE_MEMBER . ' WHERE id = '.$info);
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return new Member($donnees);
    }
    elseif(is_string($info)) // is_string: Get member attributs by "name" (string)
    {
		// echo "<div style=\"background-color:pink;padding:20px;\"><hr>";
		// echo __line__; echo " Classe MembersManager:<br>\$info = ";
		// print($info);
		// echo "<hr>";

        // On test d'abord si $info (nom d'un membre connecté) se trouve bien dans la base de données pour éviter un bug.		$info = "Phil";
		$requete = 'SELECT * FROM ' . self::TABLE_MEMBER . ' WHERE name = "' . $info . '"';
        $req = $this->db->prepare($requete);
        $req->execute();
        $datas = $req->fetch();
			// echo "<pre><hr>";
			// echo __line__; echo " Dans la classe MembersManager: \$datas vaut: ";
			// var_dump($datas);
			// echo "<pre><hr>";	
		
        if($datas == True){
			// echo __line__; echo "<pre>Dans la classe MembersManager: \$datas vaut: ";
			// print_r($datas);
			// echo "<pre><hr>";
			// exit("La classe Member a été instanciée avec $info");
			return new Member($datas);
		}
        else {
            unset($member); // The member do not exists in database but still in the navigator memory. We empty it.
            unset($_SESSION['member']); // same action to session memory
            session_destroy(); // close de session
        }
	}
	else {
            unset($member); // The member do not exists in database but still in the navigator memory. We empty it.
            unset($_SESSION['member']); // same action to session memory
            session_destroy(); // close de session
        };
  }
  
  public function getList($name)
  {
    $members = [];
    $q = $this->db->prepare('SELECT * FROM ' . self::TABLE_MEMBER . ' WHERE name <> :name ORDER BY name');
    $q->execute([':name' => $name]);
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $members[] = new Member($donnees);
    }
    
    return $members;
  }
  
  public function update(Member $member)
  {
    $q = $this->db->prepare('UPDATE member SET name = :name, password = :password, level = :level  WHERE id = :id');
    
    $q->bindValue(':id', $member->id(), PDO::PARAM_INT);
    $q->bindValue(':name', $member->name(), PDO::PARAM_STR);
    $q->bindValue(':password', $member->password(), PDO::PARAM_INT);
    $q->bindValue(':level', $member->level(), PDO::PARAM_INT);
    $q->execute();
  }
  
  public function setDb(PDO $db)
  {
    $this->db = $db;
  }
}