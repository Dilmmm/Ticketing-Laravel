<?php

namespace App\Http\Controllers;

use App\Models\Logdemat;
use App\Models\SatutTicket;
use App\Models\Ticket;
use App\Models\TypeTicket;
use App\Models\UrgenceTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Get the search value from the request
        $nDossier = $request->nDossier;
        $nSerie = $request->nSerie;
        $nTicket = $request->nTicket;
        $nomClient = $request->nomClient;
        $statut = $request->statut;
        $typeTicket = $request->typeTicket;
        $agence = $request->agence;
        $urgenceTicket = $request->urgenceTicket;
        $intervenant = $request->intervenant;
        $dateDebut = $request->fromDate;
        $dateFin = $request->toDate;

        $tickets = Ticket::query()
            ->where('NumIntTicket', 'LIKE', "%{$nDossier}%")
            ->Where('NumSerieTicket', 'LIKE', "%{$nSerie}%")
            ->Where('NumTicket', 'LIKE', "%{$nTicket}%")
            ->Where('CodeClientTicket', 'LIKE', "%{$nomClient}%")
            ->Where('StatutTicket', 'LIKE', "%{$statut}%")
            ->Where('TypeTicket', 'LIKE', "%{$typeTicket}%")
            ->Where('Agence', 'LIKE', "%{$agence}%")
            ->Where('UrgenceTicket', 'LIKE', "%{$urgenceTicket}%")
            ->Where('CodeUserTicket', 'LIKE', "%{$intervenant}%")
            ->paginate(300);
        //si la date de début et de fin sont renseignées chercher entre les deux dates.
            if ((!empty($dateDebut) === true) && (!empty($dateFin) === true)){
                $tickets = Ticket::query()
                ->whereBetween('DateTicket', [$dateDebut, $dateFin])
                ->paginate(300);
                //si la date de début est renseignée mais pas la date de fin on cherche à partir de la date de début
            } else if ((!empty($dateDebut) === true) && (!empty($dateFin) === false)){
                $tickets = Ticket::query()
                    ->where('DateTicket', '>', "{$dateDebut}")
                    ->paginate(300);
                //si la date de fin est renseignée mais pas la date de début on rechercher avant la date de fin
            }  else if ((!empty($dateDebut) === false) && (!empty($dateFin) === true)) {
                $tickets = Ticket::query()
                ->where('DateTicket', '<', "{$dateFin}")
                    ->paginate(300);
            }

        $statutTickets = SatutTicket::all();
        $logdemats = Logdemat::all()->take(15);
        $urgenceTickets = UrgenceTicket::all();
        $typeTickets = DB::table('t_typeticket')
            ->select('CommentTicket', 'CommentAbrege')
            ->distinct()
            ->get();
        $agences = DB::table('t_ticket')
            ->select('Agence')
            ->where('Agence', '!=', ' ')
            ->distinct()->get();
        $intervenants = DB::table('t_typeticket')
            ->select('Agence')
            ->distinct()->get();
        return view('tickets.index', compact('statutTickets','tickets', 'logdemats', 'urgenceTickets', 'agences', 'intervenants','typeTickets'));
    }
}
