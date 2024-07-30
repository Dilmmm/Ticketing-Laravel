<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,500,0,0" />
</head>
<body>


    <nav class="bg-white shadow-md fixed w-full top-0 z-10 inset-x-0 flex justify-between duration-200 hover:shadow-lg bg-gray-200">
        <a href="<?php echo e(route('tickets.index')); ?>" class="title-index font-semibold text-2xl m-3 py-2 uppercase hover:text-blue-700 transition-all duration-300">
            GESTION DES TICKETS
        </a>
        <div id="sideMenuHideOnMobile" class="bg-white font-semibold flex justify-end items-center py-2 mr-3 space-x-8 bg-gray-200 ">
            <a href="<?php echo e(route('tickets.index')); ?>" class="flex items-center border-transparent border-2 px-2 py-2 rounded-full hover:border-blue-500 hover:text-white hover:bg-blue-500 transition-all duration-300">
                <span class="material-symbols-outlined icone" title="Tous les tickets">home</span>
            </a>
            <a href="<?php echo e(route('tickets.create')); ?>" class="flex items-center border-transparent border-2 px-2 py-2 rounded-full hover:border-blue-500 hover:text-white hover:bg-blue-500  transition-all duration-300">
                <span class="material-symbols-outlined icone" title="Nouveau Ticket">post_add</span>
            </a>
            <a href="<?php echo e(route('hebdo')); ?>" class="flex items-center border-transparent border-2 px-2 py-2 rounded-full hover:border-blue-500 hover:text-white hover:bg-blue-500  transition-all duration-300">
                <span class="material-symbols-outlined icone" title="Recap hebdomadaire">manage_search</span>
            </a>
            <a href="<?php echo e(route('graphTicket')); ?>" class="flex items-center border-transparent border-2 px-2 py-2 rounded-full hover:border-blue-500 hover:text-white hover:bg-blue-500  transition-all duration-300">
                <span class="material-symbols-outlined icone" title="Graphique">bar_chart</span>
            </a>
        </div>
    </nav>

</body>
</html>

<?php /**PATH C:\wamp64\www\Test-Tailwind_v5\resources\views/nav-bar/nav.blade.php ENDPATH**/ ?>