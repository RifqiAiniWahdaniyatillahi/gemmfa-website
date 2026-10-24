<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderByDesc('is_featured')
            ->orderByDesc('created_at')
            ->get();

        return view('pages.program', compact('programs'));
    }

    public function show(Program $program)
    {
        return view('pages.program-show', compact('program'));
    }
}
