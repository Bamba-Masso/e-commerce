<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <script src="https://cdn.tailwindcss.com"></script>
     <link type="text/css" rel="stylesheet" href="../css/style.css">
     <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <!-- creation de la nav barre -->
<header class="shadow mb-2">
<div class="relative flex max-w-screen-xl flex-col overflow-hidden px-4 py-4 md:mx-auto md:flex-row md:items-center">
  <a href="#" class="flex items-center whitespace-nowrap text-2xl font-black">
  <span class="mr-2 text-4xl text-blue-600">
     <img src="../images/Screenshot_from_2024-12-21_10-28-16-removebg-preview.png" class="w-24" alt="">
    </span>
    <!-- <span class="text-black">My shop</span> -->
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
    <li class="text-gray-600 md:mr-12 hover:text-purple-600"><a href="acceuil.php">Acceuil</a></li>
      <li class="text-gray-600 md:mr-12 hover:text-purple-600"><a href="index.php">Dashboard</a></li>
      <li class="text-gray-600 md:mr-12 hover:text-purple-600"><a href="userManager.php">UserManager</a></li>
      <li class="text-gray-600 md:mr-12 hover:text-purple-600"><a href="produitsManager.php">ProduitsManager</a></li>
      <li class="text-gray-600 md:mr-12 hover:text-purple-600">
        <button class="rounded-md border-2 border-purple-600 px-6 py-1 font-medium text-purple-600 transition-colors hover:bg-purple-600 hover:text-white"><a href="../logout.php">Logout</a></button>
      </li>
    </ul>
  </nav>
</div>
</header>
<!-- fin de la nav barre -->




