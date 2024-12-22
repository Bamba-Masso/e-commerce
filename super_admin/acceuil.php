<?php 
session_start();
include('../class/Produits.php');
include('../class/Auth.php');
// $produits=new Produits();
if(!empty($_SESSION['id_user'])){
    if($_SESSION['id_role'] == 1 ||$_SESSION['id_role'] == 3){
    // echo $_SESSION['id_user'];
    $sessionId=$_SESSION['id_user'];
    //  $sessionName=$_SESSION['user_name'];
     $users=New user;
     $name=$users->veryfie($sessionId);
       
    }
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
 
} 



include('navConnect.php');
?>
<div class="contour">
    <div class="image">
        <p class="welcome"> Bienvenue sur my shop</p>
    </div>
</div>
<section class="bg-white py-12 text-gray-700 sm:py-16 lg:py-20">
<div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
  <div class="mx-auto max-w-md text-center">
      <h2 class="font-serif text-2xl font-bold sm:text-3xl">ACCESSOIRES ET MODE</h2>
  </div>
    <div class="mt-10 grid grid-cols-2 gap-6 sm:grid-cols-4 sm:gap-4 lg:mt-16">
     <?php foreach ($liste as $value):?>
     <article class="relative flex flex-col overflow-hidden rounded-lg border">
            <div class="aspect-square overflow-hidden">
            <img class="h-full w-full object-cover transition-all duration-300 group-hover:scale-125" src="<?php echo $value['picture']?>" alt="" />
            </div>
            <div class="absolute top-0 m-2 rounded-full bg-white">
            <!-- <p class="rounded-full bg-emerald-500 p-1 text-[8px] font-bold uppercase tracking-wide text-white sm:py-1 sm:px-3">Sale</p> -->
            </div>
            <div class="my-4 mx-auto flex w-10/12 flex-col items-start justify-between">
            <div class="mb-2 flex">
                <p class="mr-3 text-sm font-semibold"><?php echo $value['price']?></p>
                <!-- <del class="text-xs text-gray-400"> $79.00 </del>  -->
            </div>
            <h3 class="mb-2 text-sm text-gray-400"><?php echo $value['name']?></h3>
            <p><a href="detail.php?idArticle=<?php echo $value['id']?>" onclick="" class="bg-green-600 p-2 rounded-md text-white">Voir</a></p>
            </div>
            
        </article>

        <?php endforeach;?>
        
    </div>
    <ul class="pagination">
    <?php for($page=1; $page <= $pages;$page++):?>
      <li class="<?php echo($currentPage==$page)?"bg-gray-100 rounded-md p-4":"p-4 " ?> " > 
      <a href="?page=<?php echo $page ?>"> <?php echo $page ?></a>
     </li>
     
    <?php endfor;?>
  
</ul>
</div>

<main>
    <!-- Section Qui Sommes-Nous -->
    <section id="about-section" class="bg-white py-12 text-gray-700 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
            <h1 class="font-serif text-3xl font-bold">Qui sommes-nous ?</h1>
                <p class="mt-4 text-lg">Nous sommes une entreprise dédiée à offrir des produits de qualité pour nos clients.</p>
                <p class="mt-4 text-lg">Nous avons pour mission de rendres vos achats faciles, agréables et accessibles.</p>
                <p class="mt-4 text-lg">Merci de nous faire confiance pour vos achats.</p>
            </div>
        </div>
    </section>

</main>
</section>
 <?php include('../footer.php')?>