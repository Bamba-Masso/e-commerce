<?php 
require_once('database.php');
class UsersManager{
    private $database;
    public function __construct(){
        $this->database=(new Data())->connect();
       }  
       
      public function users(){
        $requete="SELECT * FROM users";
        $prepare=$this->database->prepare($requete);
        // $prepare->bindParam(":id", $id, PDO::PARAM_INT);
       $prepare->execute();
       $result=$prepare->fetchAll(PDO::FETCH_ASSOC); 
      
       return $result;
      } 

      public function roles(){
        $requete="SELECT * FROM roles";
        $prepare=$this->database->prepare($requete);
        // $prepare->bindParam(":id", $id, PDO::PARAM_INT);
       $prepare->execute();
       $result=$prepare->fetchAll(PDO::FETCH_ASSOC); 
       return $result;
      } 
      public function usersId($id){
       $requete="SELECT * FROM users WHERE id=:id";
       $prepare=$this->database->prepare($requete);
       $prepare->bindParam(":id", $id, PDO::PARAM_INT);
       $prepare->execute();
       $result=$prepare->fetch(); 
      
       return $result;
      }

  public function modid($id,$username,$id_role){
      $requete="UPDATE users SET username=:username, id_role=:id_role WHERE id=:id";
      $prepare=$this->database->prepare($requete);
      $prepare->bindParam(":username", $username, PDO::PARAM_STR);
      $prepare->bindParam(":id_role", $id_role, PDO::PARAM_INT);
      $prepare->bindParam(":id", $id, PDO::PARAM_INT);
      $result=$prepare->execute();
      return $result;
    }

  
      public function Delete($id){
        $requete="DELETE FROM users WHERE id=:id";
        $prepare=$this->database->prepare($requete);
        $prepare->bindParam(":id", $id, PDO::PARAM_INT);
       return $prepare->execute();
    
      } 
}
?>