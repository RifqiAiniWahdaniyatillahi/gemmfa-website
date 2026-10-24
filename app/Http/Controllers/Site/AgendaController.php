<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::where('is_public', true)
            ->orderBy('start_at')
            ->get();

        return view('pages.agenda', compact('agendas'));
    }
}
