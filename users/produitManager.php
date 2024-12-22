<?php
include('navConnect.php');
?> 
<div class="mx-auto max-w-screen-lg px-4 py-8 sm:px-8">
  <div class="flex items-center justify-between pb-6">
    
    <div class="flex items-center ">
      <div class="ml-10 space-x-8 lg:ml-40">
         <button class="flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:outline-none focus:ring hover:bg-blue-700">
         <a href="">Ajouter un Produit</a>
        </button> 
      </div>
    </div>
  </div>
  <div class="overflow-y-hidden rounded-lg border">
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="bg-blue-600 text-left text-xs font-semibold uppercase tracking-widest text-white">
            <th class="px-5 py-3 text-center">ID</th>
            <th class="px-5 py-3 text-center">Image</th>
            <th class="px-5 py-3 text-center">Produits Name</th>
            <th class="px-5 py-3 text-center">Description</th>
            <th class="px-5 py-3 text-center">Prix</th>
            <th class="px-5 py-3 text-center">Action</th>
          </tr>
        </thead>
        <tbody class="text-gray-500">
          <tr>
            
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <div class="flex items-center">
                <div class="h-10 w-10 flex-shrink-0">
                  <img class="h-full w-full rounded-full" src="/images/-ytzjgg6lxK1ICPcNfXho.png" alt="" />
                </div>
                
              </div>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <p class="whitespace-no-wrap">Administrator</p>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <p class="whitespace-no-wrap">Sep 28, 2022</p>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <p class="whitespace-no-wrap">Sep 28, 2022</p>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <p class="whitespace-no-wrap">Sep 28, 2022</p>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <span class="rounded-full bg-green-200 px-3 py-1 text-xs font-semibold text-green-900"> <a href="">Modifier</a></span>
              <span class="rounded-full bg-red-500 px-3 py-1 text-xs font-semibold"><a href="">Suprimer</a></span>
            </td>
          </tr>
          
        </tbody>
      </table>
    </div>
   
</div>
</div>

<?php
include('../footer.php');
?> 