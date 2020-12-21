<?php
include_once './racine.php';

require_once RACINE.'/classes/User.php';
require_once RACINE.'/conx/connexion.php';
require_once RACINE.'/dao/Idao.php';

class UserService implements IDao{

	private $con;

	function __construct(){
		$this->con = new Connexion();
	}
    
	public function create($o){
        try{
		$query = "INSERT INTO user (`idUser`, `nom`, `prenom`, `login`, `password`, `email`,`numTel`,`img`,`cle`,`actif`) "
                . "VALUES (NULL, '" . $o->getNom() . "', '" . $o->getPrenom() . "', '" . $o->getLogin() . "', '" . $o->getPassword() . "','" . $o->getemail() . "', NULL, NULL,'" . $o->getCle() . "', NULL);";
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
	   } catch (PDOException $e){
        echo $e->getMessage();
       }
    }

    public function logout()
   {
		
		session_unset();
        unset($_SESSION['user_session']);
        unset($_SESSION['id']);
        unset($_SESSION['nom']);
        unset($_SESSION['prenom']);
        return true;
   }

    public function login($login,$password)
    {
       try
       {
          $stmt = $this->con->getConnexion()->prepare("SELECT * FROM user WHERE login=:login AND password=:password LIMIT 1");
          $stmt->execute(array(':login'=>$login, ':password'=>$password));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
			    
				$_SESSION['id'] = $userRow['idUser'];
				$_SESSION['nom']=$userRow['nom'];
				$_SESSION['prenom']=$userRow['prenom'];
                return true;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

	public function findAll(){
		$etds = array();
        $query = "select * from user";
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new User($e->idUser, $e->nom, $e->prenom, $e->login, $e->password, $e->email,$e->numTel,$e->img,$e->cle,$e->actif);
        }
        return $etds;
	}

	public function findById($id) {
        $query = "select * from user where idUser = " . $id;
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new User($e->idUser, $e->nom, $e->prenom, $e->login, $e->password, $e->email, $e->cle, $e->numTel, $e->img, $e->actif);
        }
        return $etd;
    }

    public function update($o) {
        $query = "UPDATE `user` SET `nom` = '" . $o->getNom() . "', `prenom` = '" . $o->getPrenom() . "', `login` = '" . $o->getLogin() . "', `password` = '" . $o->getPassword() . "',`numTel` = '" . $o->getTel() . "',`img` = '" . $o->getImg() ."' WHERE `user`.`idUser` = " . $o->getId();
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

     public function getAll() {
        $query = "select * from user";
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($o) {
        $query = "delete from user where idUser = " . $o->getId();
        $req = $this->con->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

}
