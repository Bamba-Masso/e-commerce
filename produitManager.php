<?php 
include('Produits.php');
$produits=new Produits();
$liste=$produits->afficheProduit();

include('nav.php')
?>
<section class="bg-white py-12 text-gray-700 sm:py-16 lg:py-20">
<div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
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
            <p><a href="detail.php?idArticle=<?php echo $value['id']?>" onclick="">Voir</a></p>
            </div>
            
        </article>
        <?php endforeach;?>
    </div>
</div>
</section>