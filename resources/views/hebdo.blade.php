@extends("layouts.app")
@section( "title")
    <h1>Tickets par semaine</h1>
@endsection
@section( "content")
    <div class="max-w-2xl mx-auto p-10 pb-4 rounded-xl bg-gray-100 shadow-3xl">
        <form class="" method="POST" action="{{ route('envoi') }}" enctype="multipart/form-data">
            @csrf
            <label for="date" class="block mb-1 text-md uppercase font-semibold">Recherche tickets sur 7 jours :</label>
            <div class="flex items-center justify-center">
                <input type="date" class="font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md
            rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" id="fromDate" name="fromDate" required>
                <i title="Selectionnez une date pour avoir les tickets sur les 7 jours qui suivent" class="material-icons-outlined cursor-pointer">help</i>
            </div>
            <div class="flex justify-end pb-2 mt-2">
                <button type="submit" class="text-black font-semibold border border-gray-400 bg-gray-300 shadow-lg hover:bg-blue-600 hover:text-white focus:outline-none rounded-lg
                            text-lg w-full sm:w-auto px-8 text-center" name="search">Rechercher</button>
            </div>
        </form>
    </div>
    <div class="w-3/12 mt-5 mx-auto">
        <div class="flex items-center">
            <label for="searchbox" class="sr-only">Search</label>
            <div class="relative w-full pl-2">
                <div class="flex absolute inset-y-0 left-0 items-center pl-5 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="search" onkeyup="liveSearch()" id="searchbox" class="bg-gray-100 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-gray-500 focus:border-gray-500 block outline-none w-full pl-10 p-1" placeholder="Filtre...">
            </div>
        </div>
    </div>
    <div class="mx-auto">
        <div class="grid gap-3 mb-3 lg:grid-cols-3 mt-5" id="ticketListe">
            @foreach ( $tickets as $ticket)
                <div class="tickets rounded-xl border border-gray-400 p-3 shadow-md w-12/12 bg-white transform hover:scale-105 transition duration-200 hover:shadow-xl">
                    <div class=" flex w-full items-center justify-between border-b pb-1">
                        @foreach ( $urgenceTickets as $urgenceTicket)
                            @if( $urgenceTicket->ValeurUrgTicket == $ticket->UrgenceTicket)
                                <div id="cercle" style="background: radial-gradient(circle at 9px 9px, {{ $urgenceTicket->CouleurUrg }}, #7F7F7F);"></div>
                            @endif
                        @endforeach
                        <span class="font-bold text-slate-700 border-r-2 pr-1">Type :<span class="font-semibold">{{ $ticket->TypeTicket }}</span></span>
                        @foreach ( $statutTickets as $statutTicket)
                            @if( $statutTicket->StatutTicket ==  $ticket->StatutTicket && $statutTicket->ID_TicketStatut == 1)
                                <span class="bg-green-400 font-semibold rounded-md px-2 flex justify-center">Nouveau</span>
                            @elseif( $statutTicket->StatutTicket ==  $ticket->StatutTicket && $statutTicket->ID_TicketStatut == 2)
                                <span class="bg-orange-400 font-semibold rounded-md px-2 flex justify-center">Encours</span>
                            @elseif(  $statutTicket->StatutTicket ==  $ticket->StatutTicket && $statutTicket->ID_TicketStatut == 3)
                                <span class="bg-blue-400 font-semibold rounded-md px-2 flex justify-center">Terminé</span>
                            @elseif(  $statutTicket->StatutTicket ==  $ticket->StatutTicket && $statutTicket->ID_TicketStatut == 4)
                                <span class="bg-red-400 font-semibold rounded-md px-2 flex justify-center">Annulé</span>
                            @endif
                        @endforeach
                        <div class="font-semibold text-slate-700 border-l-2 pl-1 ">N° :<span class="font-semibold">{{ $ticket->NumTicket }}</span></div>
                        <div class="text-s text-neutral-500 border-l-2 pl-2">{{ $ticket->DateTicket }}</div>
                    </div>
                    <div class="machin flex items-center justify-between border-t pt-4">
                        <button class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                                font-medium rounded-lg text-lg px-5 text-center">
                            <a class="" href="{{ route('tickets.show', $ticket->ID_Ticket) }}" title="Afficher le ticket">Aperçu</a>
                        </button>
                        <button class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                                font-medium rounded-lg text-lg px-5 text-center">
                            <a class="" href="{{ route('tickets.edit', $ticket->ID_Ticket) }}" title="Modifier le ticket">Modifier</a>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
