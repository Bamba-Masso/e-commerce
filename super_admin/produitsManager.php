<?php
session_start();
include('../class/Produits.php');
include('../class/Auth.php');
//verification de la connexion de l'utilisateur 
if(!empty($_SESSION['id_user'])){

  if($_SESSION['id_role'] == 1 || $_SESSION['id_role'] == 2 ){
  // echo $_SESSION['id_user'];
  $sessionId=$_SESSION['id_user'];
  //  $sessionName=$_SESSION['user_name'];
   $users=New user;
   $name=$users->veryfie($sessionId);
  
  }
//creation de l'instance de la class produit
//on determine sur quelle page on se trouve

if(isset($_GET['page']) && !empty($_GET['page'])){
$currentPage=(int) strip_tags($_GET['page']);
}else{
  $currentPage=1;
}
$produits=new Produits();
   $article= (int)$produits->countArticles();
   //on determine le nombre d'article par page
   $parPage=8;
  //on calcule la page total
  $pages= ceil($article/$parPage);
  //calcul du 1er article de la page;

  $premier=($currentPage*$parPage)-$parPage;

  $liste=$produits->afficheProduit($premier,$parPage);
  // $produits=new Produits();
  $categories=$produits->categogies();
  // var_dump($categories);
 


}else{
  header('Location:../index.php');
}

include('navConnect.php');
?>

<div class="mx-auto w-6/12  px-4 py-8 sm:px-8" id="table">
  <div class="flex items-center justify-between pb-6">
    
    <div class="flex items-center" >
      <div class="ml-10 space-x-8 lg:ml-40">
         <button class="flex items-center gap-2 rounded-md bg-purple-600 px-4 py-2 text-sm font-semibold text-white focus:outline-none focus:ring hover:bg-blue-700">
         <a href="formProduits.php">Ajouter un Produit</a>
        </button> 
      </div>
    </div>
  </div>
  <div class="overflow-y-hidden rounded-lg border">
    <div class="overflow-x-auto">
      <table class="w-full" >
        <thead>
          <tr class="bg-green-600 text-left text-xs font-semibold uppercase tracking-widest text-white">
            <!-- <th class="px-5 py-3 text-center"></th> -->
            <th class="px-10 py-5 text-center">Image</th>
            <th class="px-5 py-3 text-center">Produits Name</th>
             <th class="px-5 py-3 text-center">Description</th> 
            <th class="px-5 py-3 text-center"> Categorie</th>
            <th class="px-5 py-3 text-center">Prix</th>
            <th class="px-5 py-3 text-center">Action</th>
          </tr>
        </thead>
 
        <tbody class="text-gray-500">
        <?php  if(!empty($liste)):?>
          <?php foreach($liste as $value): ?>
          <tr>
            
            <!-- <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <div class="flex items-center">
               
              </div> -->
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm text-center">
            <div class="h-18 w-18 flex-shrink-0">
                <img class="h-full w-28" src="<?php echo $value['picture']?>" alt="" />
              </div>
            </td>
            <td class="border-b  border-gray-200 bg-white px-5 py-5 text-sm text-center">
              <p class="whitespace-no-wrap"><?php echo $value['name']?></p>
            </td>
            
            <td class="border-b  border-gray-200 bg-white px-5 py-5 text-sm text-center">
              <p class="whitespace-no-wrap"><?php echo $value['description']?></p>
            </td>
            <td class="border-b  border-gray-200 bg-white px-5 py-5 text-sm text-center">
              <p class="whitespace-no-wrap">
                <?php foreach($categories as $categorie): ?>
                <?php if($value['id_categorie'] == $categorie['id']):?>
                <?php echo $categorie['name'];?>
              <?php endif;?>
              <?php endforeach ?></p>
            </td>
            <td class="border-b  border-gray-200 bg-white px-5 py-5 text-center text-center">
              <p class="whitespace-no-wrap"><?php echo $value['price']?> Fr</p>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm text-center">
              <span class="rounded-full bg-blue-600 px-3 py-1 text-xs font-semibold text-white"><a href="modifier.php?idModif=<?php echo $value['id']?>">Modifier</a></span>
              <span class="rounded-full bg-red-600 px-3 py-1 text-xs font-semibold text-white"><a href="" onclick="deleteCart(event, <?php echo $value['id'];?>)">Suprimer</a></span>
            </td>
          </tr>
          
          <?php endforeach?>
          <?php else:?>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm" colspan="6">
              <p class="whitespace-no-wrap">Aucun produit pour le moment</p>
            </td>
          <?php  endif;?>
        </tbody>
        
      </table>
    </div>
  <ul class="pagination">
    <?php for($page=1; $page <= $pages;$page++):?>
      <li class="<?php echo($currentPage==$page)?"bg-gray-100 rounded-md p-4":"p-4 "?> " > 
      <a href="?page=<?php echo $page ?>"> <?php echo $page ?></a>
     </li>
     
    <?php endfor; ?>
  
</ul>

</div>
</div>

<script>
function deleteCart(event, prodId) {
        event.preventDefault(); // Empêche le comportement par défaut du lien

        // Récupère la valeur de l'élément <input> en utilisant l'identifiant unique
         var inputElement = document.getElementById("livre" + prodId);

        if (confirm('Voulez vous réellement supprimer  ce produit ?')) {
            let url = "./suprim.php?produitId=" + prodId;
            window.location.href =url;
        }

    }

</script>

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