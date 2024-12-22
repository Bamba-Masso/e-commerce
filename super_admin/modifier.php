<?php
session_start();
include('../class/Produits.php');
include('../class/Auth.php');
 if(!empty($_SESSION['id_user'])){

  if($_SESSION['id_role'] == 1 ||$_SESSION['id_role'] == 2 ){
  // echo $_SESSION['id_user'];
  $sessionId=$_SESSION['id_user'];
  //  $sessionName=$_SESSION['user_name'];
   $users=New user;
   $name=$users->veryfie($sessionId);
     
  }
//
$produits=new Produits();
$liste=$produits->categogies();

  if(isset($_GET['idModif'])){
    $id=$_GET['idModif'];
    $prods=$produits->afficherId($id);
    $prods;

    if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['categorie']) && !empty($_POST['price']) &&!empty($_POST['picture'])){
   $name=$_POST['name'];
    $description=$_POST['description'];
    $categorie=$_POST['categorie'];
    $price=$_POST['price'];
    $picture=$_POST['picture'];
     $recup= $produits->productModif($id ,$name,$description,$price,$picture,$categorie);
     if($recup){
        $prods=$produits->afficherId($id);
        $prods;
        if($prods){
            $insert='Le produit à bien été modifier';  
        }else{
            $error="Une erreur c'est l'ors le la modification";  
        }
     } 
     // 
}
//
  }
  //
}else{
  header('Location:../index.php');
}
include('navConnect.php');
?>

<div class=" mt-16 bg-white w-screen font-sans text-gray-900">
  <div class=" ">
    <div class="mx-auto w-full sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl">
      <!-- <div class="mx-2 py-12 text-center md:mx-auto md:w-2/3 md:py-16">
        <h1 class="text-3xl font-black leading-4 sm:text-5xl xl:text-6xl">Sign in</h1>
      </div> -->
     
      <!-- <p class="mt-2 text-xs text-rose-600 text-center">Valid email address required for the account recovery process</p> -->
    </div>
  </div>
  <div class="md:w-2/3 mx-auto w-full pb-16 sm:max-w-screen-sm md:max-w-screen-md lg:w-1/3 lg:max-w-screen-lg xl:max-w-screen-xl">
    <form class="shadow-lg rounded-lg border border-gray-100 py-10 px-8" method="post">
    <?php 
      if(!empty($insert)){
        echo"<p class='mt-2 text-xs text-green-300 text-center'>$insert</p>";} 
       
        if(!empty($error)){
          echo"<p class='mt-2 text-xs text-rose-300 text-center'>$error</p>"; } 
        
      ?> 
      <div class="mb-4">
            <label class="mb-2 block text-sm font-bold" for="email">name</label>
            <input name="name" value="<?php echo $prods['name']?>" class="shadow-sm w-full rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" id="email" type="text" />
            <!-- <span class="my-2 block"></span> --> 
     </div>
     <div class="mb-4">
            <label class="mb-2 block text-sm font-bold" for="email">Description</label>
            <textarea name="description" value="" id="" class="border border-gray-300" rows="9" cols="55"><?php echo $prods['description']?></textarea>
     </div>
     <div class="mb-4">
         <label class="mb-2 block text-sm font-bold" for="email">Categories</label>
          <select name="categorie" id="" class="shadow-sm w-full cursor-text appearance-none rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" >
          <?php foreach ($liste as $value):?>
            <option value="<?php echo $value['id']?>"> <?php echo $value['name']?></option>
            <?php endforeach;?>
          </select>
     </div>
     <div class="mb-4">
        <label class="mb-2 block text-sm font-bold" for="phone">price</label>
        <input name="price" value="<?php echo $prods['price']?>" class="shadow-sm w-full cursor-text appearance-none rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" id="phone" type="number"/>
        <!-- <span class="my-2 block"></span> -->    
     </div>
     <div class="mb-4">
        <label class="mb-2 block text-sm font-bold" for="phone">Image</label>
        <input value="<?php echo $prods['picture']?>" name="picture"class="shadow-sm w-full cursor-text appearance-none rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" id="phone" type="url"/>
        <!-- <span class="my-2 block"></span> -->    
     </div>
     <!-- <div class="mb-4">
        
         <span class="my-2 block"> Vous n'avez pas de compte ? <a href="singnup.php" class="text-green-300">s'inscrire</a></span> 
     
     </div> -->
      <div class="flex items-center gap-2">
      
        <input class="cursor-pointer rounded bg-blue-600 py-2 px-8 text-center text-lg font-bold  text-white" type="submit" value="Modifier">
        <a href="produitsManager.php" class="cursor-pointer rounded bg-blue-600 py-2 px-8 text-center text-lg font-bold  text-white">Retour au produit</a>
      </div>
    </form>
  </div>
</div> 
<?php
include('../footer.php');
?>