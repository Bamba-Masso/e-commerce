<?php
session_start();
include('../class/Produits.php');
include('../class/Auth.php');
if(!empty($_SESSION['id_user'])){

  if($_SESSION['id_role'] == 1 || $_SESSION['id_role'] == 2 ){
  // echo $_SESSION['id_user'];
  $sessionId=$_SESSION['id_user'];
  //  $sessionName=$_SESSION['user_name'];
   $users=New user;
   $name=$users->veryfie($sessionId);
  
  }

  if(isset($_GET['produitId']) ){
    $id=$_GET['produitId'];
    $produits=new Produits();
    $liste=$produits->Delete($id);
    if($liste){
        echo'bien';
      header('LOCATION:produitsManager.php');
    }else{
        echo 'mal';
    }
    // $liste;
  }
}else{
  header('Location:../index.php');
}

?>