<?php
session_start();
include('../class/users.php');
include('../class/Auth.php');
if(!empty($_SESSION['id_user'])){

  if($_SESSION['id_role'] == 1 || $_SESSION['id_role'] == 2 ){
  // echo $_SESSION['id_user'];
  $sessionId=$_SESSION['id_user'];
  //  $sessionName=$_SESSION['user_name'];
   $users=New user;
   $name=$users->veryfie($sessionId);

   if(isset($_GET['userId']) ){
    $id=$_GET['userId'];
    $produits=new UsersManager();
    $liste=$produits->Delete($id);
    if($liste){
        echo'bien';
      header('LOCATION:userManager.php');
    }else{
        echo 'mal';
    }
    // $liste;
  }
  }else{
  header('Location:../index.php');
}

}else{
  header('Location:../index.php');
}

?>