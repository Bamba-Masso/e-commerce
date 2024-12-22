<?php 
session_start();
include('../class/Produits.php');
include('../class/Auth.php');
if(!empty($_SESSION['id_user'])){

  if($_SESSION['id_role'] == 3){
  // echo $_SESSION['id_user'];
  $sessionId=$_SESSION['id_user'];
  //  $sessionName=$_SESSION['user_name'];
  $users=New user;
   $name=$users->veryfie($sessionId);
     
  }
  if(isset($_GET['idArticle']) ){
    $id=$_GET['idArticle'];
    $produits=new Produits();
    $liste=$produits->afficherId($id);
    $liste;
  }


} else{
  header('Location:../index.php');
}
  
include('navConnect.php')
?>
<div class="flex items-center justify-center">
<div class="m-10 mx-4 max-w-screen-lg overflow-hidden rounded-xl border shadow-lg md:pl-8">
  <div class="flex flex-col overflow-hidden bg-white sm:flex-row md:h-80">
  <div class="order-first ml-auto h-48 w-full bg-gray-700 sm:order-none sm:h-auto sm:w-1/2 lg:w-2/5">
      <img class="h-full w-full object-cover" src="<?php echo $liste['picture']?>" loading="lazy" />
    </div>
    <div class="flex w-full flex-col p-4 sm:w-1/2 sm:p-8 lg:w-3/5">
      <h2 class="text-xl font-bold text-gray-900 md:text-2xl lg:text-4xl"><?php echo $liste['name']?></h2>
      <p class="mt-2 text-lg"><?php echo $liste['price']?> FR</p>
      <p class="mt-4 mb-8 max-w-md text-gray-500"><?php echo $liste['description']?></p>
      <!-- <a href="modifier.php?idModif=<?php echo $liste['id']?>" class="group mt-auto flex w-44 cursor-pointer select-none items-center justify-center rounded-md bg-green-400 px-6 py-2 text-white transition">
        Modifier
      </a>
      <a href="" onclick="deleteCart(event, <?php echo $liste['id'];?>)" class="group mt-auto flex w-44 cursor-pointer select-none items-center justify-center rounded-md bg-red-500 px-6 py-2 text-white transition">
       Supprimer
      </a> -->
    </div>
     
    
  </div>
</div>
</div>

<?php include('../footer.php')
?>