@extends("layouts.app")
@section( "title")
    <h1>Ticket N°{{ $ticket->ID_Ticket }}</h1>
@endsection
@section( "content")
    <div class="flex items-center justify-center">
        <div class="max-w-4xl mt-40 p-10 pb-4 rounded-xl bg-gray-100 shadow-3xl">
            <div class="grid gap-3 mb-5 lg:grid-cols-2">
                @foreach ( $urgenceTickets as $urgenceTicket)
                    @if( $urgenceTicket->ValeurUrgTicket == $ticket->UrgenceTicket)
                        <div class="font-bold text-slate-700 border-r-2 border-b border-gray-500 pb-2">Urgence :
                            @if( $ticket->UrgenceTicket < 8 )
                                <span class="rounded-md p-1 text-black" style="background:{{ $urgenceTicket->CouleurUrg }};">{{ $urgenceTicket->LibelleUrgTicket }}</span>
                            @else
                                <span class="rounded-md p-1 text-white" style="background:{{ $urgenceTicket->CouleurUrg }};">{{ $urgenceTicket->LibelleUrgTicket }}</span>
                            @endif
                        </div>
                    @endif
                @endforeach
                    @foreach( $typeTickets as $typeTicket )
                        @if( $typeTicket->CommentAbrege == $ticket->TypeTicket)
                            <span class="font-bold text-slate-700 border-r-2 border-b border-gray-500 pb-2">Type : {{ $typeTicket->CommentTicket }}</span>

                        @endif
                    @endforeach
                <span class="font-bold text-slate-700 border-r-2 border-b border-gray-500 pb-2">Statut : {{ $ticket->StatutTicket }}</span>
                <span class="font-bold text-slate-700 border-r-2 border-b border-gray-500 pb-2">N°Ticket : {{ $ticket->NumTicket }}</span>
                <span class="font-bold text-slate-700 border-r-2 border-b border-gray-500 pb-2">Affecté à : {{ $ticket->CodeUserTicket }}</span>
                <span class="font-bold text-slate-700 border-r-2 border-b border-gray-500 pb-2">N° série : {{ $ticket->NumSerieTicket }}</span>
                <span class="font-bold text-slate-700 border-r-2 border-b border-gray-500 pb-2">Client : {{ $ticket->CodeClientTicket }}}</span>
                <span class="font-bold text-slate-700 border-r-2 border-b border-gray-500 pb-2">Commentaire : {{ $ticket->DetailTicket }}</span>
                <span class="font-bold text-slate-700 border-r-2 border-b border-gray-500 pb-2">Date début : {{ $ticket->DateTicket }}</span>
                <span class="font-bold text-slate-700 border-r-2 border-b border-gray-500 pb-2">Date fin : {{ $ticket->DateTicket }}</span>
            </div>
            <div class="grid gap-3 mb-5 lg:grid-cols-1">
                <div class="mb-1 font-bold">Problème ticket :</div>
                <span class="font-semibold text-slate-700 border-r-2 border-b border-gray-500 pb-2">{{ $ticket->ProbTicket }}</span>
            </div>
            <div class="flex items-center justify-end">
                <button class="text-black font-semibold border border-gray-400 bg-gray-300 shadow-lg hover:bg-blue-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg
                                    text-lg w-full sm:w-auto px-8 text-center">
                    <a class="" href="{{ route('tickets.edit', $ticket) }}" title="Modifier le ticket">Modifier</a>
                </button>
            </div>
        </div>
        <div class="max-w-md ml-5 mt-10 p-10 pb-4 rounded-xl bg-gray-100 shadow-3xl">
            <span class="block mb-1 text-lg uppercase font-semibold">Documents : </span>
            <div class="grid gap-3 mb-5 lg:grid-cols-1">
                <div class="grid gap-3 mb-5 lg:grid-cols-2">
                    @foreach( $ticket->document as $ticket->document)
                        <a class="text-blue-700 font-semibold text-md" href="{{ asset('storage/'.$ticket->document->chemindoc) }}" target="_blank">{{ $ticket->document->nomdoc }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
