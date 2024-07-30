<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraphController extends Controller
{
    public function graphTicket()
    {
        $users = DB::table('t_ticket')
            ->select('CodeUserTicket')
            ->where('CodeUserTicket', '!=', ' ')
            ->distinct()->get();
        $termines = DB::table('t_ticket')
            ->select()
            ->where('StatutTicket', 'LIKE', 'Terminer')
            ->count();
        $nouveaux = DB::table('t_ticket')
            ->select()
            ->where('StatutTicket', 'LIKE', 'Nouveaux')
            ->count();
        $enCours = DB::table('t_ticket')
            ->select()
            ->where('StatutTicket', 'LIKE', 'EnCours')
            ->count();
        $annules = DB::table('t_ticket')
            ->select()
            ->where('StatutTicket', 'LIKE', 'Annuler')
            ->count();
        $totalTicket =  DB::table('t_ticket')
            ->select()
            ->count();
        return view("graphs.graph", compact('users', 'termines', 'nouveaux', 'enCours', 'annules', 'totalTicket'));
    }

    public function graphTicketPeriodeEtUser(Request $request)
    {
        $users = DB::table('t_ticket')
        ->select('CodeUserTicket')
        ->where('CodeUserTicket', '!=', ' ')
        ->distinct()->get();
        $dateDebut = $request->input('fromDate');
        $dateFin = $request->input('toDate');
        $user = $request->input('codeUserTicket');
        //récupération du nombre de tickets

        if ((!empty($user)) === true) {
            if ((!empty($dateDebut) === true) && (!empty($dateFin) === true)) {

                $termines = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('StatutTicket', 'LIKE', 'Terminer')
                    ->whereBetween('DateTicket', [$dateDebut, $dateFin])
                    ->count();
                $nouveaux = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('StatutTicket', 'LIKE', 'Nouveaux')
                    ->whereBetween('DateTicket', [$dateDebut, $dateFin])
                    ->count();
                $enCours = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('StatutTicket', 'LIKE', 'EnCours')
                    ->whereBetween('DateTicket', [$dateDebut, $dateFin])
                    ->count();
                $annules = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('StatutTicket', 'LIKE', 'Annuler')
                    ->whereBetween('DateTicket', [$dateDebut, $dateFin])
                    ->count();
                $totalTicket = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->whereBetween('DateTicket', [$dateDebut, $dateFin])
                    ->count();
            } else if ((!empty($dateDebut) === false) && (!empty($dateFin) === false)) {

                $termines = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('StatutTicket', 'LIKE', 'Terminer')
                    ->count();
                $nouveaux = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('StatutTicket', 'LIKE', 'Nouveaux')
                    ->count();
                $enCours = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('StatutTicket', 'LIKE', 'EnCours')
                    ->count();
                $annules = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('StatutTicket', 'LIKE', 'Annuler')
                    ->count();
                $totalTicket = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->count();

            } else if ((!empty($dateDebut) === true) && (!empty($dateFin) === false)) {

                $termines = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('DateTicket', '>', "{$dateDebut}")
                    ->where('StatutTicket', 'LIKE', 'Terminer')
                    ->count();
                $nouveaux = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('DateTicket', '>', "{$dateDebut}")
                    ->where('StatutTicket', 'LIKE', 'Nouveaux')
                    ->count();
                $enCours = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('DateTicket', '>', "{$dateDebut}")
                    ->where('StatutTicket', 'LIKE', 'EnCours')
                    ->count();
                $annules = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('DateTicket', '>', "{$dateDebut}")
                    ->where('StatutTicket', 'LIKE', 'Annuler')
                    ->count();
                $totalTicket = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('DateTicket', '>', "{$dateDebut}")
                    ->count();
            } else if ((!empty($dateDebut) === false) && (!empty($dateFin) === true)) {

                $termines = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('DateTicket', '<', "{$dateFin}")
                    ->where('StatutTicket', 'LIKE', 'Terminer')
                    ->count();
                $nouveaux = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('DateTicket', '<', "{$dateFin}")
                    ->where('StatutTicket', 'LIKE', 'Nouveaux')
                    ->count();
                $enCours = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('DateTicket', '<', "{$dateFin}")
                    ->where('StatutTicket', 'LIKE', 'EnCours')
                    ->count();
                $annules = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('DateTicket', '<', "{$dateFin}")
                    ->where('StatutTicket', 'LIKE', 'Annuler')
                    ->count();
                $totalTicket = DB::table('t_ticket')
                    ->select()
                    ->where('CodeUserTicket','LIKE',"%{$user}%")
                    ->where('DateTicket', '<', "{$dateFin}")
                    ->count();
            }
        } else if ((!empty($user)) === false) {
            if ((!empty($dateDebut) === true) && (!empty($dateFin) === true)) {


                $termines = DB::table('t_ticket')
                    ->select()
                    ->where('StatutTicket', 'LIKE', 'Terminer')
                    ->whereBetween('DateTicket', [$dateDebut, $dateFin])
                    ->count();
                $nouveaux = DB::table('t_ticket')
                    ->select()
                    ->where('StatutTicket', 'LIKE', 'Nouveaux')
                    ->whereBetween('DateTicket', [$dateDebut, $dateFin])
                    ->count();
                $enCours = DB::table('t_ticket')
                    ->select()
                    ->where('StatutTicket', 'LIKE', 'EnCours')
                    ->whereBetween('DateTicket', [$dateDebut, $dateFin])
                    ->count();
                $annules = DB::table('t_ticket')
                    ->select()
                    ->where('StatutTicket', 'LIKE', 'Annuler')
                    ->whereBetween('DateTicket', [$dateDebut, $dateFin])
                    ->count();
                $totalTicket = DB::table('t_ticket')
                    ->select()
                    ->whereBetween('DateTicket', [$dateDebut, $dateFin])
                    ->count();

            } else if ((!empty($dateDebut) === false) && (!empty($dateFin) === false)) {

                $termines = DB::table('t_ticket')
                    ->select()
                    ->where('StatutTicket', 'LIKE', 'Terminer')
                    ->count();
                $nouveaux = DB::table('t_ticket')
                    ->select()
                    ->where('StatutTicket', 'LIKE', 'Nouveaux')
                    ->count();
                $enCours = DB::table('t_ticket')
                    ->select()
                    ->where('StatutTicket', 'LIKE', 'EnCours')
                    ->count();
                $annules = DB::table('t_ticket')
                    ->select()
                    ->where('StatutTicket', 'LIKE', 'Annuler')
                    ->count();
                $totalTicket = DB::table('t_ticket')
                    ->select()
                    ->count();

            } else if ((!empty($dateDebut) === true) && (!empty($dateFin) === false)) {

                $termines = DB::table('t_ticket')
                    ->select()
                    ->where('DateTicket', '>', "{$dateDebut}")
                    ->where('StatutTicket', 'LIKE', 'Terminer')
                    ->count();
                $nouveaux = DB::table('t_ticket')
                    ->select()
                    ->where('DateTicket', '>', "{$dateDebut}")
                    ->where('StatutTicket', 'LIKE', 'Nouveaux')
                    ->count();
                $enCours = DB::table('t_ticket')
                    ->select()
                    ->where('DateTicket', '>', "{$dateDebut}")
                    ->where('StatutTicket', 'LIKE', 'EnCours')
                    ->count();
                $annules = DB::table('t_ticket')
                    ->select()
                    ->where('DateTicket', '>', "{$dateDebut}")
                    ->where('StatutTicket', 'LIKE', 'Annuler')
                    ->count();
                $totalTicket = DB::table('t_ticket')
                    ->select()
                    ->where('DateTicket', '>', "{$dateDebut}")
                    ->count();
            } else if ((!empty($dateDebut) === false) && (!empty($dateFin) === true)) {

                $termines = DB::table('t_ticket')
                    ->select()
                    ->where('DateTicket', '<', "{$dateFin}")
                    ->where('StatutTicket', 'LIKE', 'Terminer')
                    ->count();
                $nouveaux = DB::table('t_ticket')
                    ->select()
                    ->where('DateTicket', '<', "{$dateFin}")
                    ->where('StatutTicket', 'LIKE', 'Nouveaux')
                    ->count();
                $enCours = DB::table('t_ticket')
                    ->select()
                    ->where('DateTicket', '<', "{$dateFin}")
                    ->where('StatutTicket', 'LIKE', 'EnCours')
                    ->count();
                $annules = DB::table('t_ticket')
                    ->select()
                    ->where('DateTicket', '<', "{$dateFin}")
                    ->where('StatutTicket', 'LIKE', 'Annuler')
                    ->count();
                $totalTicket = DB::table('t_ticket')
                    ->select()
                    ->where('DateTicket', '<', "{$dateFin}")
                    ->count();
            }
        }

        return view("graphs.graph", compact('user','users', 'termines', 'nouveaux', 'enCours', 'annules','totalTicket'));

    }


}
