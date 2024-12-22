<?php 
 session_start();
include('class/Auth.php');
//  $email=$_POST['email'];

 if(!empty($_POST['email']) && !empty($_POST['password'])){
  $email=$_POST['email'];
  $password=$_POST['password'];
   $sing=new User();
  if($sing->singIn($email,$password)){
    if($_SESSION['id_role']==3){
       header('LOCATION:users/index.php');
    }elseif($_SESSION['id_role']== 1 || $_SESSION['id_role']==2){
      header('LOCATION:super_admin/index.php');
   }
}else{
    $alert='Mot de passe ou email invalide';
 }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <script src="https://cdn.tailwindcss.com"></script>
     <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <!-- creation de la nav barre -->
<header class="shadow mb-2">
<div class="relative flex max-w-screen-xl flex-col overflow-hidden px-4 py-4 md:mx-auto md:flex-row md:items-center">
  <a href="#" class="flex items-center whitespace-nowrap text-2xl font-black">
   <span class="mr-2 text-4xl text-blue-600">
     <img src="./images/Screenshot_from_2024-12-21_10-28-16-removebg-preview.png" class="w-20" alt="">
    </span>
   
  </a>
 
  <input type="checkbox" class="peer hidden" id="navbar-open" />
  <label class="absolute top-5 right-7 cursor-pointer md:hidden" for="navbar-open">
    <span class="sr-only">Toggle Navigation</span>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
  </label>
  
  <nav aria-label="Header Navigation" class="peer-checked:mt-8 peer-checked:max-h-56 flex max-h-0 w-full flex-col items-center justify-between overflow-hidden transition-all md:ml-24 md:max-h-full md:flex-row md:items-start">
    <ul class="flex flex-col items-center space-y-2 md:ml-auto md:flex-row md:space-y-0">
      <li class="text-gray-600 md:mr-12 hover:text-purple-600"><a href="index.php">Accueil</a></li>
      <!-- <li class="text-gray-600 md:mr-12 hover:text-purple-600"><a href="#">Produit</a> -->
    </li>
      <li class="text-gray-600 md:mr-12 hover:text-purple-600"><a href="#about-section"> QUI SOMMES NOUS ?</a></li>
      <li class="text-gray-600 md:mr-12 hover:text-purple-600">
        <button class="rounded-md border-2 border-purple-600 bg-white-600 px-6 py-1 font-medium text-purple-600 transition-colors hover:bg-purple-600 hover:text-white"><a href="singnin.php">Login</a></button>
      </li>
    </ul>

  </nav>
</div>
</header>
<!-- fin de la nav barre -->

<div class="bg-white w-screen font-sans text-gray-900">
  <div class=" ">
    <div class="mx-auto w-full sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl">
    
    </div>
  </div>
  <div class="md:w-2/3 mx-auto w-full pb-16 sm:max-w-screen-sm md:max-w-screen-md lg:w-1/3 lg:max-w-screen-lg xl:max-w-screen-xl">
   <div class="mx-2 py-12 text-center md:mx-auto md:w-2/3 md:py-16 flex justify-center">
      <img src="./images/Screenshot_from_2024-12-21_10-28-16-removebg-preview.png" class="w-40" alt="">
    </div>
    
    <form class="shadow-lg rounded-lg border border-gray-100 py-10 px-8" method="post">
    <?php 
         if(!empty($alert)){
         echo"<p class='mt-2 text-xs text-rose-600 text-center'> $alert</p>"; } 
                
        ?> 
      <div class="mb-4">
            <label class="mb-2 block text-sm font-bold" for="email">E-mail</label>
            <input name="email" class="shadow-sm w-full rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" id="email" type="email" />
            <!-- <span class="my-2 block"></span> -->
           
     </div>
     <div class="mb-4">
        <label class="mb-2 block text-sm font-bold" for="phone">Password</label>
        <input name="password"class="shadow-sm w-full cursor-text appearance-none rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" id="phone" type="password"/>
        <!-- <span class="my-2 block"></span> -->
            
     </div>
     <div class="mb-4">
        
         <span class="my-2 block"> Vous n'avez pas de compte ? <a href="singnup.php" class="text-green-600">s'inscrire</a></span> 
     
     </div>
      <div class="flex items-center">
      
        <input class="cursor-pointer rounded bg-purple-600 py-2 px-8 text-center text-lg font-bold  text-white" type="submit" value="Connexion">
      </div>
    </form>
  </div>
</div>  
<?php include('footer.php')?>
