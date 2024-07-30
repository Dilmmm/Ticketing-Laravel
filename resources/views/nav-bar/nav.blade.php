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
{{--<div class="navigation">
    <ul>
        <li>
            <div class="toggle">
                <ion-icon name="menu-outline" class="open"></ion-icon>
                <ion-icon name="close-outline" class="close"></ion-icon>
            </div>
        </li>
        <br>
        <li class="list active">
            <b></b>
            <b></b>
            <a href="{{ route('tickets.index') }}" class="link">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                <span class="text">Accueil</span>
            </a>
        </li>
        <li class="list">
            <b></b>
            <b></b>
            <a href="{{ route('tickets.create') }}" class="link">
                        <span class="icon">
                            <ion-icon name="add-circle-outline"></ion-icon>
                        </span>
                <span class="text">Création</span>
            </a>
        </li>
        <li class="list">
            <b></b>
            <b></b>
            <a href="{{ route('hebdo') }}" class="link">
                        <span class="icon">
                            <ion-icon name="create-outline"></ion-icon>
                        </span>
                <span class="text">Modification</span>
            </a>
        </li>
        <li class="list">
            <b></b>
            <b></b>
            <a href="#" class="link">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                <span class="text">Admin</span>
            </a>
        </li>
    </ul>
</div>--}}

    <nav class="bg-white shadow-md fixed w-full top-0 z-10 inset-x-0 flex justify-between duration-200 hover:shadow-lg bg-gray-200">
        <a href="{{ route('tickets.index') }}" class="title-index font-semibold text-2xl m-3 py-2 uppercase hover:text-blue-700 transition-all duration-300">
            GESTION DES TICKETS
        </a>
        <div id="sideMenuHideOnMobile" class="bg-white font-semibold flex justify-end items-center py-2 mr-3 space-x-8 bg-gray-200 ">
            <a href="{{ route('tickets.index') }}" class="flex items-center border-transparent border-2 px-2 py-2 rounded-full hover:border-blue-500 hover:text-white hover:bg-blue-500 transition-all duration-300">
                <span class="material-symbols-outlined icone" title="Tous les tickets">home</span>
            </a>
            <a href="{{ route('tickets.create') }}" class="flex items-center border-transparent border-2 px-2 py-2 rounded-full hover:border-blue-500 hover:text-white hover:bg-blue-500  transition-all duration-300">
                <span class="material-symbols-outlined icone" title="Nouveau Ticket">post_add</span>
            </a>
            <a href="{{ route('hebdo') }}" class="flex items-center border-transparent border-2 px-2 py-2 rounded-full hover:border-blue-500 hover:text-white hover:bg-blue-500  transition-all duration-300">
                <span class="material-symbols-outlined icone" title="Recap hebdomadaire">manage_search</span>
            </a>
            <a href="{{ route('graphTicket') }}" class="flex items-center border-transparent border-2 px-2 py-2 rounded-full hover:border-blue-500 hover:text-white hover:bg-blue-500  transition-all duration-300">
                <span class="material-symbols-outlined icone" title="Graphique">bar_chart</span>
            </a>
        </div>
    </nav>
{{--<nav class="bg-white shadow-md fixed w-full z-10 mx-auto inset-x-0 top-0 flex justify-between duration-200 hover:shadow-lg bg-gray-200">
    <a href="{{ route('tickets.index') }}" class="title-index font-semibold text-2xl m-3 py-2 uppercase inline-flex hover:text-blue-700 transition-all duration-300">
        GESTION DES TICKETS
    </a>
    <button id="mobileMenuButton" class="p-3 focus:outline-none md:hidden" title="Open side menu">
        <svg id="mobileMenuButtonClose" class="w-6 h-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        <svg id="mobileMenuButtonOpen" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    --}}{{-- <div id="sideMenuHideOnMobile" class="bg-white font-semibold text-lg z-10 rounded-bl-md flex absolute top-0 right-0 transition-all
             duration-500 transform translate-x-0 w-1/2 md:w-auto px-3 md:px-0 flex-col md:flex-row -translate-y-full md:translate-y-0 md:mt-2 md:items-center md:mx-1 md:uppercase">
         <a href="{{ route('tickets.index') }}" class="title-index mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:border-blue-500 hover:text-blue-700 transition-all duration-500 py-1 sm:p-0">Tous les tickets</a>
         <a href="{{ route('tickets.create') }}" class="title-index mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:border-blue-500 hover:text-blue-700 transition-all duration-500 py-1 sm:p-0">Nouveau ticket</a>
         <a href="{{ route('hebdo') }}" class="title-index mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:border-blue-500 hover:text-blue-700 transition-all duration-500 py-1 sm:p-0">Recherche hebdo</a>
         <a href="{{ route('graphTicket') }}" class="title-index mx-0 sm:mx-2 my-2 border-b-2 border-transparent hover:border-blue-500 hover:text-blue-700 transition-all duration-500 py-1 sm:p-0">Graphique</a>
     </div>--}}{{--
    <div id="sideMenuHideOnMobile" class="bg-white font-semibold flex justify-end items-center py-2 mr-3 space-x-8 bg-gray-200 ">
        <a href="{{ route('tickets.index') }}" class="flex items-center border-transparent border-2 px-2 py-2 rounded-full hover:border-blue-500 hover:text-white hover:bg-blue-500 transition-all duration-200">
            <span class="material-symbols-outlined icone" title="Tous les tickets">home</span>
        </a>
        <a href="{{ route('tickets.create') }}" class="flex items-center border-transparent border-2 px-2 py-2 rounded-full hover:border-blue-500 hover:text-white hover:bg-blue-500  transition-all duration-200">
            <span class="material-symbols-outlined icone" title="Nouveau Ticket">post_add</span>
        </a>
        <a href="{{ route('hebdo') }}" class="flex items-center border-transparent border-2 px-2 py-2 rounded-full hover:border-blue-500 hover:text-white hover:bg-blue-500  transition-all duration-200">
            <span class="material-symbols-outlined icone" title="Recap hebdomadaire">manage_search</span>
        </a>
        <a href="{{ route('graphTicket') }}" class="flex items-center border-transparent border-2 px-2 py-2 rounded-full hover:border-blue-500 hover:text-white hover:bg-blue-500  transition-all duration-200">
            <span class="material-symbols-outlined icone" title="Graphique">bar_chart</span>
        </a>
    </div>
</nav>--}}
</body>
</html>

