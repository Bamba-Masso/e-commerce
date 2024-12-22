<?php 
include('class/Produits.php');
  if(isset($_GET['idArticle']) ){
    $id=$_GET['idArticle'];
    $produits=new Produits();
    $liste=$produits->afficherId($id);
    $liste;
  }
include('nav.php')
?>
<div class="flex items-center  justify-center p-20">
<div class="m-10 mx-4 max-w-screen-lg overflow-hidden rounded-xl border shadow-lg md:pl-8">
  <div class="flex flex-col overflow-hidden bg-white w-full sm:flex-row md:h-80">
  <div class="order-first h-52 w-full bg-gray-700 sm:order-none sm:h-auto sm:w-2/5 lg:w-3/5 w-40">
      <img class="h-full w-full object-cover" src="<?php echo $liste['picture']?>" loading="lazy" />
    </div>
    <div class="flex w-full flex-col p-4 sm:w-1/2 sm:p-8 lg:w-3/5">
      <h2 class="text-xl font-bold text-gray-900 md:text-2xl lg:text-4xl"><?php echo $liste['name']?></h2>
      <p class="mt-2 text-lg"><?php echo $liste['price']?> FR</p>
      <p class="mt-4 mb-8 max-w-md text-gray-500"><?php echo $liste['description']?></p>
      
    </div>
     
    
  </div>
</div>
</div>

<?php include('footer.php')
?>