@extends("layouts.app")
@if( isset($ticket))
@section( "title")
    <h1>Modifier ticket N°{{ $ticket->ID_Ticket }}</h1>
@endsection
@endif
@section( "title")
    <h1>Nouveau ticket</h1>
@endsection
@section( "content")
    @if( isset($ticket))
        <div class="flex items-center justify-center">
            <div class="max-w-2xl p-10 pb-4 rounded-xl bg-gray-100 shadow-3xl">
                <form method="POST" action="{{ route('tickets.update', $ticket->ID_Ticket) }}" enctype="multipart/form-data">
                    <!-- <input type="hidden" name="_method" value="PUT"> -->
                    @method( 'PUT')
                    @csrf
                    <div class="grid gap-4 mb-6 lg:grid-cols-2">
                        <div>
                            <label for="numDossier" class="block mb-1 text-md uppercase font-semibold">Numéro de dossier Mserv :</label>
                            <input type="text" name="numDossier" id="numDossier" class="bg-gray-200 focus:bg-gray-100 shadow-md border border-gray-400 rounded-lg text-gray-900 text-md focus:ring-teal-500 focus:border-teal-500 block w-full
                                             p-1 pl-2 focus:outline-none" value="{{ $ticket->NumIntTicket }}">
                            <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'numDossier'){{ $message }}@enderror</span>
                        </div>
                        <div>
                            <label for="marquemodele" class="block mb-1 text-md uppercase font-semibold">Marque/Modèle :</label>
                            <input type="text" name="marquemodele" id="marquemodele" class="bg-gray-200 focus:bg-gray-100 shadow-md border border-gray-400 rounded-lg text-gray-900 text-md focus:ring-teal-500 focus:border-teal-500 block w-full
                                             p-1 pl-2 focus:outline-none" value="{{ $ticket->MarqueModTicket }}">
                        </div>
                        <div>
                            <label for="numSerie" class="block mb-1 text-md uppercase font-semibold">Numéro de série :</label>
                            <input type="text" name="numSerie" id="numSerie" class="bg-gray-200 focus:bg-gray-100 shadow-md border border-gray-400 rounded-lg text-gray-900 text-md focus:ring-teal-500 focus:border-teal-500 block w-full
                                             p-1 pl-2 focus:outline-none" value="{{ $ticket->NumSerieTicket }}">
                            <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'numSerie'){{ $message }}@enderror</span>
                        </div>
                        <div>
                            <label for="nomClient" class="block mb-1 text-md uppercase font-semibold">Nom du Client</label>
                            <input type="text" name="nomClient" id="nomClient" class="bg-gray-200 focus:bg-gray-100 shadow-md border border-gray-400 rounded-lg text-gray-900 text-md focus:ring-teal-500 focus:border-teal-500 block w-full
                                             p-1 pl-2 focus:outline-none" value="{{ $ticket->CodeClientTicket }}">
                        </div>
                    </div>
                    <div class="grid gap-6 mb-4 lg:grid-cols-2">
                        <div>
                            <select class="bg-gray-200 cursor-pointer font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" name="agence" id="agence">
                                <option class="text-center" value="{{ $ticket->Agence }}">{{ $ticket->Agence }}</option>
                            </select>
                            <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'agence'){{ $message }}@enderror</span>
                        </div>
                        <div>
                            <select class="bg-gray-200 cursor-pointer font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" name="typeTicket" id="typeTicket">
                                @foreach( $typeTickets as $typeTicket )
                                    @if( $typeTicket->CommentAbrege == $ticket->TypeTicket)
                                        <option class="text-center" value="{{ $ticket->TypeTicket }}">{{ $typeTicket->CommentTicket }}</option>
                                    @endif
                                @endforeach

                                @foreach( $typeTickets as $typeTicket )
                                    <option value="{{ $typeTicket->CommentAbrege }}">{{ $typeTicket->CommentTicket }}</option>
                                @endforeach
                            </select>
                            <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'typeTicket'){{ $message }}@enderror</span>
                        </div>
                        <div>
                            <select class="bg-gray-200 cursor-pointer font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" name="statutTicket" id="statutTicket">
                                <option class="text-center" value="{{ $ticket->StatutTicket }}">{{ $ticket->StatutTicket }}</option>
                                @foreach( $statutTickets as $statutTicket )
                                    <option value="{{ $statutTicket->StatutTicket }}">{{ $statutTicket->StatutTicket }}</option>
                                @endforeach
                            </select>
                            <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'statutTicket'){{ $message }}@enderror</span>
                        </div>
                        <div>
                            <select class="bg-gray-200 cursor-pointer font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" name="urgenceTicket" id="urgenceTicket">
                                @foreach( $urgenceTickets as $urgenceTicket )
                                    @if( $urgenceTicket->ValeurUrgTicket == $ticket->UrgenceTicket)
                                        <option class="text-center" value="{{ $urgenceTicket->ValeurUrgTicket }}">{{ $urgenceTicket->LibelleUrgTicket }}</option>
                                    @endif
                                @endforeach
                                @foreach( $urgenceTickets as $urgenceTicket )
                                    <option class="" value="{{ $urgenceTicket->ValeurUrgTicket }}">{{ $urgenceTicket->LibelleUrgTicket }}</option>
                                @endforeach
                            </select>
                            <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'urgenceTicket'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div>
                        <label for="probleme" class="block mb-1 text-md uppercase font-semibold"><span class="text-sm text-red-600">* </span>Problème :</label>
                        <textarea name="probleme" id="probleme" cols="30" rows="2" class="bg-gray-200 focus:bg-gray-100 shadow-md border border-gray-400 text-gray-900 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 pl-2 mb-2 focus:outline-none">{{ $ticket->ProbTicket }}</textarea>
                        <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'probleme'){{ $message }}@enderror</span>
                    </div>
                    <div>
                        <label for="commentaire" class="block mb-1 text-md uppercase font-semibold">Commentaire :</label>
                        <textarea name="commentaire" id="commentaire" cols="30" rows="2" class="bg-gray-200 focus:bg-gray-100 shadow-md border border-gray-400 text-gray-900 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 pl-2 mb-2 focus:outline-none">{{ $ticket->DetailTicket }}</textarea>
                        <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'commentaire'){{ $message }}@enderror</span>
                    </div>
                    <div class="grid gap-6 mb-1 lg:grid-cols-2">
                        <div>
                            <label  class="block text-md uppercase font-semibold">Début du ticket :</label>
                            <div class="grid gap-1 mb-1 lg:grid-cols-2">
                                <div>
                                    <input type="date" name="debutTicket" id="debutTicket" class="bg-gray-200 mt-2 font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" value="{{ $ticket->DateTicket }}">
                                </div>
                                <div>
                                   <input type="time" name="heureTicket" id="heureTicket" class="mt-2 bg-gray-200 font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" value="{{ $ticket->HeureTicket }}">
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="finTicket" class="block text-md uppercase font-semibold">Fin du ticket :</label>
                            <div class="grid gap-1 mb-1 lg:grid-cols-2">
                                <div>
                                    <input type="date" name="finTicket" id="finTicket" class="mt-2 bg-gray-200 font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" value="{{ $ticket->DateFinTicket }}">
                                </div>
                                <div>
                                    <input type="time" name="heureFinTicket" id="heureFinTicket" class="mt-2 bg-gray-200 font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" value="{{ $ticket->HeureFinTicket }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-2 lg:grid-cols-2">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="fichier">Joindre un document</label>
                            <input class="block w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-500 cursor-pointer focus:outline-none" id="fichier" type="file" name="fichier">
                        </div>
                          <div>
                              <label class="block mb-2 text-sm font-medium text-gray-900" for="nomdoc">Nom du document</label>
                              <input type="text" name="nomdoc" id="nomdoc" class="bg-gray-200 focus:bg-gray-100 shadow-md border border-gray-400 rounded-lg text-gray-900 text-sm focus:ring-teal-500 focus:border-teal-500 block w-full
                                                 p-1 pl-2 focus:outline-none">
                          </div>
                    </div>
                    <div class="grid gap-6 mb-2 lg:grid-cols-2">
                        <div>
                            <label for="tempsPasse" class="block mb-1 text-md uppercase font-semibold">Temps passé(en minutes)</label>
                            <input type="number" name="tempsPasse" id="tempsPasse" class="bg-gray-200 focus:bg-gray-100 shadow-md border border-gray-400 rounded-lg text-gray-900 text-sm focus:ring-teal-500 focus:border-teal-500 block w-full
                                             p-1 pl-2 focus:outline-none" value="{{ $ticket->TempsPasse }}">
                        </div>
                    </div>
                    <div class="flex justify-end mb-2">
                        <button type="submit" class="text-black font-semibold border border-gray-400 bg-gray-400 shadow-lg hover:bg-blue-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg
                                text-lg w-full sm:w-auto px-8 text-center">Modifier</button>
                    </div>
                </form>
            </div>
            <div class="max-w-md ml-5 mt-10 p-10 pb-4 rounded-xl bg-gray-100 shadow-3xl">
                <span class="block mb-1 text-lg uppercase font-semibold">Documents : </span>
                <div class="grid gap-3 mb-5 lg:grid-cols-1 shadow-xl rounded-lg">
                    <div class="grid gap-3 mb-5 lg:grid-cols-1">
                        @foreach( $ticket->document as $ticket->document)
                            <a class="text-blue-700 font-semibold text-md" href="{{ asset('storage/'.$ticket->document->chemindoc) }}" target="_blank">{{ $ticket->document->nomdoc }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="max-w-2xl mx-auto p-10 pb-4 rounded-xl bg-gray-100 shadow-3xl">
            <form method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-6 lg:grid-cols-2">
                    <div>
                        <label for="numDossier" class="block mb-1 text-md uppercase font-semibold">Numéro de dossier Mserv :</label>
                        <input type="text" name="numDossier" id="numDossier" class="focus:placeholder-gray-100 focus:bg-gray-100 shadow-md border border-gray-400 rounded-lg text-gray-900 text-md focus:ring-teal-500 focus:border-teal-500 block w-full
                                             p-1 pl-2 focus:outline-none" placeholder="Entrez le numéro de dossier...">
                        <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'numDossier'){{ $message }}@enderror</span>
                    </div>
                    <div>
                        <label for="marquemodele" class="block mb-1 text-md uppercase font-semibold ">Marque/Modèle :</label>
                        <input type="text" name="marquemodele" id="marquemodele" class="focus:placeholder-gray-100 focus:bg-gray-100 shadow-md border border-gray-400 rounded-lg text-gray-900 text-md focus:ring-teal-500 focus:border-teal-500 block w-full
                                            p-1 pl-2 focus:outline-none " placeholder="Entrez la marque et/ou le modèle...">
                    </div>
                    <div>
                        <label for="numSerie" class="block mb-1 text-md uppercase font-semibold">Numéro de série :</label>
                        <input type="text" name="numSerie" id="numSerie" class="focus:placeholder-gray-100 focus:bg-gray-100 shadow-md border border-gray-400 rounded-lg text-gray-900 text-md focus:ring-teal-500 focus:border-teal-500 block w-full
                                            p-1 pl-2 focus:outline-none" placeholder="Entrez le numéro de série...">
                        <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'numSerie'){{ $message }}@enderror</span>
                    </div>
                    <div>
                        <label for="nomClient" class="block mb-1 text-md uppercase font-semibold">Nom du Client :</label>
                        <input type="text" name="nomClient" id="nomClient" class="focus:placeholder-gray-100 focus:bg-gray-100 shadow-md border border-gray-400 rounded-lg text-gray-900 text-md focus:ring-teal-500 focus:border-teal-500 block w-full
                                            p-1 pl-2 focus:outline-none" placeholder="Entre le nom du Client...">
                    </div>
                </div>
                <div class="grid gap-6 mb-6 lg:grid-cols-2">
                    <div>
                        <select class="cursor-pointer font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" name="agence" id="agence">
                            <option class="text-center" value="">--Choix agence--</option>
                            @foreach( $tickets as $ticket )
                                <option class="font-semibold" value="{{ $ticket->Agence }}">{{ $ticket->Agence }}</option>
                            @endforeach
                        </select>
                        <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'agence'){{ $message }}@enderror</span>
                    </div>
                    <div>
                        <select class="cursor-pointer font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" name="typeTicket" id="typeTicket">
                            <option class="text-center" value="">*--Choix type ticket--</option>
                            @foreach( $typeTickets as $typeTicket )
                                <option class="font-semibold" value="{{ $typeTicket->CommentAbrege }}">{{ $typeTicket->CommentTicket }}</option>
                            @endforeach
                        </select>
                        <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'typeTicket'){{ $message }}@enderror</span>
                    </div>
                    <div>
                        <select class="cursor-pointer font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" name="statutTicket" id="statutTicket">
                            <option class="text-center" value="">*--Statut Ticket--</option>
                            @foreach( $statutTickets as $statutTicket )
                                <option class="font-semibold" value="{{ $statutTicket->StatutTicket }}">{{ $statutTicket->StatutTicket }}</option>
                            @endforeach
                        </select>
                        <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'statutTicket'){{ $message }}@enderror</span>
                    </div>
                    <div>
                        <select class="cursor-pointer font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" name="urgenceTicket" id="urgenceTicket">
                            <option class="text-center" value="">*--Urgence ticket--</option>
                            @foreach( $urgenceTickets as $urgenceTicket )
                                <option class="font-semibold" value="{{ $urgenceTicket->ValeurUrgTicket }}">{{ $urgenceTicket->LibelleUrgTicket }}</option>
                            @endforeach
                        </select>
                        <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'urgenceTicket'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div>
                    <label for="probleme" class="block mb-1 text-md uppercase font-semibold"><span class="text-sm text-red-600">* </span>Problème :</label>
                    <textarea name="probleme" id="probleme" cols="30" rows="2" class="focus:bg-gray-100 shadow-md border border-gray-400 text-gray-900 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 pl-2 mb-1 focus:outline-none" placeholder="Veuillez écrire votre problème..."></textarea>
                    <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'probleme'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="commentaire" class="block mb-1 text-md uppercase font-semibold">Commentaire :</label>
                    <textarea name="commentaire" id="commentaire" cols="30" rows="2" class="focus:bg-gray-100 shadow-md border border-gray-400 text-gray-900 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 pl-2 mb-1 focus:outline-none" placeholder="Veuillez écrire votre commentaire..."></textarea>
                    <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'commentaire'){{ $message }}@enderror</span>
                </div>
                <div class="grid gap-6 mb-1 lg:grid-cols-2">
                    <div>
                        <label  class="block text-md uppercase font-semibold">Début du ticket :</label>
                        <div class="grid gap-1 mb-1 lg:grid-cols-2">
                            <div>
                                <input type="date" name="debutTicket" id="debutTicket" class="mt-1 font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" value="{{ date('Y-m-d') }}">
                                <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'debutTicket'){{ $message }}@enderror</span>
                            </div>
                            <div>
                                <input type="time" name="heureTicket" id="heureTicket" class="mt-1 font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100">
                                <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'heureTicket'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="finTicket" class="block text-md uppercase font-semibold">Fin du ticket :</label>
                        <div class="grid gap-1 mb-1 lg:grid-cols-2">
                            <div>
                                <input type="date" name="finTicket" id="finTicket" class="mt-1 font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" value="{{ date('Y-m-d') }}">
                                <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'finTicket'){{ $message }}@enderror</span>
                            </div>
                            <div>
                                <input type="time" name="heureFinTicket" id="heureFinTicket" class="mt-1 font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100">
                                <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'heureFinTicket'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="grid gap-6 mb-4 lg:grid-cols-2">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="fichier">Joindre un document</label>
                        <input class="block w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-500 cursor-pointer focus:outline-none" id="fichier" type="file" name="fichier">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="nomdoc">Nom du document</label>
                        <input type="text" name="nomdoc" id="nomdoc" class="focus:bg-gray-100 shadow-md border border-gray-400 rounded-lg text-gray-900 text-sm focus:ring-teal-500 focus:border-teal-500 block w-full
                                                 p-1 pl-2 focus:outline-none">
                    </div>
                </div>
             {{--   <div class="grid gap-6 mb-6 lg:grid-cols-2">
                    <div>
                        <label for="debutTicket" class="block mb-1 text-md uppercase font-semibold"><span class="text-sm text-red-600">* </span>Début du ticket  :</label>
                        <input type="date" name="debutTicket" id="debutTicket" class="font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" value="{{ date('Y-m-d') }}">
                        <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'debutTicket'){{ $message }}@enderror</span>
                        <input type="time" name="heureTicket" id="heureTicket" class="font-semibold mt-2 focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100">
                        <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'heureTicket'){{ $message }}@enderror</span>
                    </div>
                    <div>
                        <label for="finTicket" class="block mb-1 text-md uppercase font-semibold"><span class="text-sm text-red-600">* </span>Fin du ticket :</label>
                        <input type="date" name="finTicket" id="finTicket" class="font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" value="{{ date('Y-m-d') }}">
                        <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'finTicket'){{ $message }}@enderror</span>
                        <input type="time" name="heureFinTicket" id="heureFinTicket" class="font-semibold mt-2 focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                        p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100">
                        <span class="block w-fit text-red-500 text-sm font-semibold text-center">@error( 'heureFinTicket'){{ $message }}@enderror</span>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="fichier">Joindre un ficher :</label>
                        <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer
                                     focus:outline-none" name="fichier" id="fichier" type="file">
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="nomdoc">Nom du document</label>
                        <input type="text" name="nomdoc" id="nomdoc">

                    </div>
                </div>--}}
                <div class="flex justify-end pb-2">
                    <button type="submit" class="text-black font-semibold border border-gray-400 bg-gray-300 shadow-lg hover:bg-blue-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg
                                text-lg w-full sm:w-auto px-8 text-center">Valider</button>
                </div>
            </form>
        </div>
    @endif

@endsection
