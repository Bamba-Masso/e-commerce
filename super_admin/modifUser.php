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

   if(isset($_GET['user']) ){
    $id=$_GET['user'];
    $usersId=new UsersManager();
    $liste=$usersId-> usersId($id);
     
    if($liste){
        $role=$usersId->roles();
        //  echo $_POST['username'];
     if(!empty($_POST['username'])&&!empty($_POST['id_role'])){
      $username=$_POST['username'];
      // //  echo'gfg';
       $id_role=$_POST['id_role'];
     
       $modif=$usersId->modid($id,$username,$id_role);
       if($modif){
          $modif="L'utilisateur a bien été modifié";
        }
     }
         
        
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

include('navConnect.php');
?>

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
      if(!empty($modif)){
        echo"<p class='mt-2 text-xs text-green-300 text-center'>$modif</p>";} 
        ?>
      <div class="mb-4">
            <label class="mb-2 block text-sm font-bold" for="username">Nom</label>
            <input name="username" class="shadow-sm w-full rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" id="email" type="name" value="<?php echo $liste['username']?>" />  
     </div>
     <div class="mb-4">
        <label class="mb-2 block text-sm font-bold" for="id_role">Role</label>
        <select name="id_role" id=""class="shadow-sm w-full cursor-text appearance-none rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" >
        <?php foreach($role as $roles):?>
             <option value="<?php echo $roles['id']?>"> <?php echo $roles['roles'];?></option> 
        <?php endforeach?>
            
        </select>

     </div>
     
      <div class="flex items-center">
      
        <input class="cursor-pointer rounded bg-purple-600 py-2 px-8 text-center text-lg font-bold  text-white" type="submit" value="Modifier">
      </div>
    </form>
  </div>
</div>  

<footer class="relative mt-20 bg-gray-900 px-4 pt-20 mt-72">
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