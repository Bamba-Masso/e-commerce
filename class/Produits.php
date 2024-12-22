<?php 
require_once('database.php');
class Produits{
    private $id;
    private $database;
       public function __construct(){
        $this->database=(new Data())->connect();
       } 
       
       public function categogies(){
        $requete="SELECT * FROM  categories";
        $prepare=$this->database->prepare($requete);
        $prepare->execute();
        $result=$prepare->fetchAll(PDO::FETCH_ASSOC);
       return $result;
       }

       public function ajout($name,$description,$price,$picture,$categorie){
          $requete="INSERT INTO articles (name,description,price,picture,id_categorie) VALUES (:name, :description,:price,:picture,:id_categorie)";
          $prepare=$this->database->prepare($requete);
          $prepare->bindParam(":name", $name, PDO::PARAM_STR);
          $prepare->bindParam(":description", $description, PDO::PARAM_STR);
          $prepare->bindParam(":price", $price, PDO::PARAM_STR);
          $prepare->bindParam(":picture", $picture, PDO::PARAM_STR);
          $prepare->bindParam(":id_categorie", $categorie, PDO::PARAM_INT);
          $result=$prepare->execute();
          return $result;
       }

       public function afficheProduit($premier,$parPage){
        $requete="SELECT * FROM articles LIMIT :premier,:parpage";
        $prepare=$this->database->prepare($requete);
        $prepare->bindParam(":premier", $premier, PDO::PARAM_INT);
        $prepare->bindParam(":parpage", $parPage, PDO::PARAM_INT);
        $prepare->execute();
        $result=$prepare->fetchAll(PDO::FETCH_ASSOC);
        return $result;
       }
       public function recherche($entrer){
       $serche="%$entrer%";
       $requete="SELECT * FROM articles INNER JOIN categories ON articles.id_categorie=categories.id WHERE(articles.name LIKE :entrer OR articles.description LIKE :entrer OR articles.price LIKE :entrer OR categories.name LIKE :entrer)"; 
       $prepare=$this->database->prepare($requete);
       $prepare->bindParam(":entrer", $serche);
       $prepare->execute();
       $result=$prepare->fetchAll(PDO::FETCH_ASSOC);
      return $result;
       }
       public function afficherId($id){
         $requete="SELECT * FROM articles WHERE id=:id";
         $prepare=$this->database->prepare($requete);
         $prepare->bindParam(":id", $id, PDO::PARAM_INT);
         $prepare->execute();
         $result=$prepare->fetch();
         return $result;
       }

       public function productModif($id,$name,$description,$price,$picture,$categorie){
         $requete="UPDATE articles SET name=:name,description=:description,price=:price,picture=:picture,id_categorie=:id_categorie WHERE id=:id";
         $prepare=$this->database->prepare($requete);
         $prepare->bindParam(":name", $name, PDO::PARAM_STR);
         $prepare->bindParam(":description", $description, PDO::PARAM_STR);
         $prepare->bindParam(":price", $price, PDO::PARAM_STR);
         $prepare->bindParam(":picture", $picture, PDO::PARAM_STR);
         $prepare->bindParam(":id_categorie", $categorie, PDO::PARAM_INT);
         $prepare->bindParam(":id", $id, PDO::PARAM_INT);
         $result=$prepare->execute();
         return $result;
       }

       public function Delete($id){
         $requete="DELETE FROM articles WHERE id=:id";
         $prepare=$this->database->prepare($requete);
         $prepare->bindParam(":id", $id, PDO::PARAM_INT);
        return $prepare->execute();
        
         
       }

       public function countArticles(){
        $requete="SELECT COUNT(*) AS article FROM articles ";
        $prepare=$this->database->prepare($requete);
        // $prepare->bindParam(":id", $id, PDO::PARAM_INT);
       $prepare->execute();
       $result=$prepare->fetch(); 
       $total=$result['article'];
       return $total;

       }

       public function countUsers(){
        $requete="SELECT COUNT(*) AS total FROM users";
        $prepare=$this->database->prepare($requete);
        // $prepare->bindParam(":id", $id, PDO::PARAM_INT);
       $prepare->execute();
       $result=$prepare->fetch(PDO::FETCH_ASSOC); 
       $total=$result['total'];
       return $total;
       }

       public function countCategorie(){
        $requete="SELECT COUNT(*) AS total FROM categories";
        $prepare=$this->database->prepare($requete);
        // $prepare->bindParam(":id", $id, PDO::PARAM_INT);
       $prepare->execute();
       $result=$prepare->fetch(); 
       $total=$result['total'];
       return $total;
       }
}
?>