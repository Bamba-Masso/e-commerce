<?php
session_start();
include('../class/users.php');
include('../class/Auth.php');

if(!empty($_SESSION['id_user'])){

  if($_SESSION['id_role'] == 1 || $_SESSION['id_role'] == 2 ){
  // echo $_SESSION['id_user'];
  $sessionId=$_SESSION['id_user'];
  //  $sessionName=$_SESSION['user_name'];
   $users=New user();
   $name=$users->veryfie($sessionId);

   $listeUser=new UsersManager();
   $liste=$listeUser->users();
   
   $role=$listeUser->roles();
  }else{
    header('Location:../index.php');
  }

}else{
  header('Location:../index.php');
}

include('navConnect.php');
?> 
<div class="mx-auto  px-4 py-8 sm:px-8">
  <div class="flex items-center justify-between pb-6">
    
    <div class="flex items-center ">
      <div class="ml-10 space-x-8 lg:ml-40">
         <!-- <button class="flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:outline-none focus:ring hover:bg-blue-700">
         <a href="">Ajouter un Utilisateur</a>
        </button>  -->
      </div>
    </div>
  </div>
  <div class="mt-8 p-4"><p class="text-2xl">Liste des utilisateurs</p></div>
  <div class="overflow-y-hidden rounded-lg border">
  
    <div class="overflow-x-auto">
     
      <table class="w-full">
        <thead>
          <tr class="bg-green-600 text-left text-xs font-semibold uppercase tracking-widest text-white">
            <th class="px-5 py-3 text-center">ID</th>
            <!-- <th class="px-5 py-3 text-center">Image</th> -->
            <th class="px-5 py-3 text-center">Name</th>
            <th class="px-5 py-3 text-center">Email</th>
            <th class="px-5 py-3 text-center">Rôle</th>
            <th class="px-5 py-3 text-center">Date de creation</th>
            <th class="px-5 py-3 text-center">Action</th>
          </tr>
        </thead>
        <tbody class="text-gray-500">
        <?php  if(!empty($liste)):?>
          <?php foreach($liste as $value): ?>
          <tr>

            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm text-center">
              <div class="flex items-center">
               
                <?php echo $value['id']?>
              </div>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm text-center">
              <p class="whitespace-no-wrap"><?php echo $value['username']?></p>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm text-center">
              <p class="whitespace-no-wrap"><?php echo $value['email']?></p>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm text-center">
              <p class="whitespace-no-wrap">
              <?php foreach($role as $roles ): ?>
                <?php if($value['id_role'] == $roles['id']):?>
                <?php echo $roles['roles'];?>
              <?php endif;?>
              <?php endforeach ?>
            </p>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm text-center">
              <p class="whitespace-no-wrap"><?php echo $value['created_at']?></p>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm text-center">
              <span class="rounded-full bg-blue-600 px-3 py-1 text-xs font-semibold text-white"> <a href="modifUser.php?user=<?php echo $value['id'];?>">Modifier</a></span>
              <span class="rounded-full bg-red-500 px-3 py-1 text-xs font-semibold text-white"><a href="" onclick="deleteCart(event, <?php echo $value['id'];?>)">Suprimer</a></span>
            </td>
          </tr>
          <?php endforeach?>
          <?php else:?>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm text-center" colspan="6">
              <p class="whitespace-no-wrap">Aucun produit pour le moment</p>
            </td>
          <?php  endif;?>
        </tbody>
      </table>
    </div>
   
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
<script>
function deleteCart(event, prodId) {
        event.preventDefault(); // Empêche le comportement par défaut du lien

        // Récupère la valeur de l'élément <input> en utilisant l'identifiant unique
         var inputElement = document.getElementById("livre" + prodId);

        if (confirm('Voulez vous réellement supprimer  ce produit ?')) {
            let url = "./suprimUser.php?userId=" + prodId;
            window.location.href=url;
        }

    }

</script>
</body>
</html>