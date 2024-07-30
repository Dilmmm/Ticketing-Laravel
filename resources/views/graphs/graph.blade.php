@extends("layouts.app")
@section( "title")
    <h1>Graphique</h1>
@endsection
@section("content")
<div class="bg-gray-200 rounded-lg">
    @if(!empty($user)===true)
        <span class="font-semibold mt-2 ml-3">Utilisateur sélectionné : {{ $user }}</span>
    @endif
    <div class="max-w-2xl mx-auto p-10 pb-4 rounded-xl bg-gray-100 shadow-lg">
        <form action="{{ route('rechercheTicketGraph') }}" method="POST">
            @csrf
            <label for="date" class="block mb-1 text-md uppercase font-semibold">Rechercher entre deux dates :</label>
            <div class="flex items-center justify-center">
                <input type="date" class="font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md
                    rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100 mr-1" id="fromDate" name="fromDate">

                <input type="date" class="font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md
                    rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100 mr-1" id="toDate" name="toDate">
                <select name="codeUserTicket" class="uppercase cursor-pointer font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                    p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100">
                    <option value="">Utilisateur</option>
                    @foreach( $users as $user )
                        <option value="{{ $user->CodeUserTicket }}">{{ $user->CodeUserTicket }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end pb-2 mt-2">
                <button type="submit" class="text-black font-semibold border border-gray-400 bg-gray-300 shadow-lg hover:bg-blue-600 hover:text-white focus:outline-none rounded-lg
                            text-lg w-full sm:w-auto px-8 text-center" name="search">Rechercher</button>
            </div>
        </form>
    </div>
    <div class="hidden" id="termines">{{ $termines }}</div>
    <div class="hidden" id="nouveaux">{{ $nouveaux }}</div>
    <div class="hidden" id="enCours">{{ $enCours }}</div>
    <div class="hidden" id="annules">{{ $annules }}</div>
    <div class="hidden" id="totalTicket">{{ $totalTicket }}</div>
    <div class="canva_container max-w-6xl">
        <canvas id="myChart"></canvas>
    </div>
</div>
@endsection
