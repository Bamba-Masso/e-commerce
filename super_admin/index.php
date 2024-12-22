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
  $count=new Produits();
  $totalArticle=$count->countArticles();
  
  $totalUsers=$count->countUsers();
   
  $totalCategorie=$count->countCategorie();

}else{
  header('Location:../index.php');
}
 
include('navConnect.php');
?> 
<div>
  <h1 class="text-center mt-12 text-4xl">Bienvenue <span class="font-bold"> <?php echo  $name['username'];?> </h1>
   <p class="text-center mt-8 text-xl">Vous êtes l'administrateur du site </p>
</div>
<div class="w-screen" id="content">
  <div class="mx-auto grid max-w-screen-lg gap-4 p-4 sm:grid-cols-2 lg:grid-cols-3">
    <div class="max-w-md rounded-lg border border-green-600 px-6 pt-6 pb-10">
      
      <p class=" text-2xl font-medium text-gray-800 text-center">Nombre de produits</p>
      <p class="text-3xl mt-4 font-medium text-gray-500 text-center"> <?php echo $totalArticle ?></p>
      <span class="float-right rounded-full bg-rose-100 px-1 text-sm font-medium text-rose-600">
       
    </div>

    <div class="max-w-md rounded-lg border border-green-600 px-6 pt-6 pb-10">
      
      <p class=" text-2xl font-medium text-gray-800 text-center">Nombre d'utilisateur</p>
      <p class="text-3xl mt-4  font-medium text-gray-500 text-center"> <?php echo $totalUsers ?></p>
      <span class="float-right rounded-full bg-rose-100 px-1 text-sm font-medium text-rose-600">
       
    </div>

    <div class="max-w-md rounded-lg border border-green-600 px-6 pt-6 pb-10">
      
      <p class=" text-2xl font-medium text-gray-800 text-center">Categories</p>
      <p class="text-3xl  mt-4 font-medium text-gray-500 text-center"> <?php echo $totalCategorie?></p>
      <span class="float-right rounded-full bg-rose-100 px-1 text-sm font-medium text-rose-600">
       
    </div>
  </div>
</div>
<footer class="relative mt-20 bg-gray-900 px-4 pt-20 mt-32">
  <!-- <div class="absolute -top-10 left-1/2 h-16 w-16 -translate-x-1/2 rounded-xl border-4 border-sky-500 bg-white p-2"><img class="h-full object-contain" src="/images/logo-circle.png" alt="" /></div> -->
  <nav aria-label="Footer Navigation" class="mx-auto mb-10 flex max-w-lg flex-col gap-10 text-center sm:flex-row sm:text-left">
    <a href="#" class="font-medium text-white">Demo</a>
    <a href="#" class="font-medium text-white">Support</a>
    <a href="#" class="font-medium text-white">Privacy Policy</a>
    <a href="#" class="font-medium text-white">Terms & Conditions</a>
  </nav>
  <p class="py-10 text-center text-gray-300">© 2024 Boleno | All Rights Reserved</p>
</footer>

</body>
</html>