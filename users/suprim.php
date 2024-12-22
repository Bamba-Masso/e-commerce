<?php
session_start();
include('../class/Produits.php');

if(!empty($_SESSION['id_user'])){

  if($_SESSION['id_role'] == 3){
  $sessionId=$_SESSION['id_user'];
  $users=New user;
   $name=$users->veryfie($sessionId); 
  }
 // 
if(isset($_GET['produitId']) ){
    $id=$_GET['produitId'];
    $produits=new Produits();
    $liste=$produits->Delete($id);
    if($liste){
        echo'bien';
      header('LOCATION:index.php');
    }else{
        die("oups une erreur c'est produit");
    }
    // $liste;
  }
}else{
  header('Location:../index.php');
}
?>