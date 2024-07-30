<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Logdemat;
use App\Models\SatutTicket;
use App\Models\Ticket;
use App\Models\TypeTicket;
use App\Models\UrgenceTicket;
use App\Models\User;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use PhpParser\Comment\Doc;

class TicketController extends Controller
{

    public function index()
    {
        $urgenceTickets = UrgenceTicket::all();
        $typeTickets = DB::table('t_typeticket')
            ->select('CommentTicket', 'CommentAbrege')
            ->distinct()
            ->get();

        $tickets = DB::table('t_ticket')
            ->where('StatutTicket', '=','Nouveaux')
            ->Orwhere('StatutTicket', '=','EnCours')
            ->orderBy('StatutTicket', 'desc')
            ->orderBy('DateTicket', 'asc')
            ->paginate(30, ['*'], 'index');

        $statutTickets = SatutTicket::all();
        $intervenants = DB::table('t_typeticket')
            ->select('Agence')
            ->distinct()->get();
        $agences = DB::table('t_ticket')
            ->select('Agence')
            ->distinct()->get();

        return view('tickets.index', compact ('intervenants','agences','tickets', 'urgenceTickets', 'statutTickets','typeTickets'));
    }

    public function create()
    {
        $statutTickets = SatutTicket::all();
        $urgenceTickets = DB::table('t_urgenceticket')
            ->orderBy('id_UrgenceTicket', 'desc')
            ->get();
        $tickets = DB::table('t_ticket')->select('Agence')
            ->where('Agence', '!=', ' ')
            ->distinct()->get();
        $typeTickets = DB::table('t_typeticket')
            ->select('CommentTicket','CommentAbrege')
            ->distinct()->get();

        return view("tickets.edit", compact('tickets','typeTickets', 'urgenceTickets', 'statutTickets'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'typeTicket'=>['required'],
            'urgenceTicket'=>['required'],
            'agence'=>[''],
            'numDossier'=>[''],
            'marquemodele'=>[''],
            'numSerie'=>[''],
            'nomClient'=>[''],
            'probleme'=>['required'],
            'commentaire'=>[''],
            "fichier" => ['image','max:1024',],
            'debutTicket'=>[''],
            'heureTicket'=>[''],
            'finTicket'=>[''],
            'heureFinTicket'=>[''],
            'statutTicket'=>['required'],
        ],[
            'typeTicket.required'=>'Veuillez renseigner le type du ticket',
            'urgenceTicket.required'=>'Veuillez renseigner l\'urgence.',
            'statutTicket.required'=>'Veuillez renseigner le statut',
            'probleme.required'=>'Veuillez renseigner le problème.',

        ]);


         $ticket = Ticket::create([
            "NumTicket" => 1450,
            "TypeTicket" => request('typeTicket'),
            "ProbTicket" => request('probleme'),
            "UrgenceTicket" => request('urgenceTicket'),
            "Agence" => request('agence', 'Null'),
            "NumIntTicket" => request('numDossier', 'Non renseigné'),
            "MarqueModTicket" => request('marquemodele','Non renseigné'),
            "NumSerieTicket" => request('numSerie','Non renseigné'),
            "CodeClientTicket" => request('nomClient','Pas de client à renseigner'),
            "DetailTicket" => request('commentaire','Pas de commentaire'),
            "DateTicket" => request('debutTicket', '0000-00-00'),
            "StatutTicket" => request('statutTicket'),
            "HeureTicket"=> request('heureTicket', '00:00:00'),
            "DateFinTicket" => request('finTicket','0000-00-00'),
            "HeureFinTicket" => request('heureFinTicket','00:00:00'),
            "TempsPasse" => 0,
            "CodeUserTicket" => 'SAPO',
            "DateCreation" => now(),
            "HeureCreation" => now(),
            "UserCreation" => 'SAPO',
            "NumTicketOrg" => request('numTicket',666),
        ]);

        if ($request->has("fichier"))
        {
            $filename = $request->nomdoc . '.' . $request->fichier->extension();
            $chemin_fichier = $request->fichier->storeAs("documents", $filename ,'public');
            $document = new Document();
            $document->nomdoc = $filename;
            $document->chemindoc = $chemin_fichier;
            $document->id_documents = time();
            $ticket->document()->save($document);
        }

        return redirect(route("tickets.show", $ticket));
    }

    public function show(Ticket $ticket)
    {
        $urgenceTickets = UrgenceTicket::all();
        $typeTickets = DB::table('t_typeticket')
            ->select('CommentTicket','CommentAbrege')
            ->distinct()->get();

        return view("tickets.show", compact("ticket","urgenceTickets",'typeTickets' ));
    }

    public function edit(Ticket $ticket, Document $document)
    {
        $typeTickets = DB::table('t_typeticket')
            ->select('CommentTicket','CommentAbrege')
            ->distinct()->get();
        $urgenceTickets = UrgenceTicket::all();
        $statutTickets = SatutTicket::all();

        return view("tickets.edit", compact("ticket",'typeTickets','urgenceTickets', 'statutTickets', 'document'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $this->validate($request, [
            'typeTicket'=>['required',],
            'urgenceTicket'=>['required'],
            'agence'=>[''],
            'numDossier'=>[''],
            'marquemodele'=>[''],
            'numSerie'=>[''],
            'nomClient'=>[''],
            'probleme'=>['required'],
            'commentaire'=>[''],
            "fichier" => ['image','max:1024',],
            'debutTicket'=>[''],
            'heureTicket'=>[''],
            'finTicket'=>[''],
            'heureFinTicket'=>[''],
            'statutTicket'=>['required'],
        ],[
            'typeTicket.required'=>'Le type du ticket est obligatoire.',
            'urgenceTicket.required'=>'Veuillez renseigner l\'urgence.',
            'probleme.required'=>'Veuillez renseigner le problème.',

        ]);

            $ticket->update([
                "TypeTicket" =>$request->typeTicket,
                "UrgenceTicket" =>$request->urgenceTicket,
                "Agence" => $request->agence,
                'NumIntTicket'=>$request->numDossier,
                'MarqueModTicket'=>$request->marquemodele,
                'NumSerie'=>$request->numSerie,
                'CodeClientTicket'=>$request->nomClient,
                'ProbTicket'=>$request->probleme,
                'DetailTicket'=>$request->commentaire,
                'DateTicket'=>$request->debutTicket,
                'HeureTicket'=>$request->heureTicket,
                'DateFinTicket'=>$request->finTicket,
                'StatutTicket'=>$request->statutTicket,
                'TempsPasse'=>$request->tempsPasse
        ]);
        if ($request->has("fichier"))
        {
            $filename = $request->nomdoc . '.' . $request->fichier->extension();
            $chemin_fichier = $request->fichier->storeAs("documents", $filename ,'public');
            $document = new Document();
            $document->nomdoc = $filename;
            $document->chemindoc = $chemin_fichier;
            $document->id_documents = time();
            $ticket->document()->save($document);
        }
        return redirect(route("tickets.show", $ticket));
    }

    public function rechercheHebdo(Request $request)
    {
        $urgenceTickets = UrgenceTicket::all();
        $fromDate = (new Carbon($request->fromDate));
        $statutTickets = SatutTicket::all();
        $toDate = (new Carbon($fromDate))->addDays(7);
        $tickets= DB::table('t_ticket')
            ->whereBetween('DateTicket', [$fromDate, $toDate])->get();

        return view('hebdo', compact('tickets','urgenceTickets','statutTickets'));
    }
}
