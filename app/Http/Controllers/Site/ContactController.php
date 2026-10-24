<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.kontak');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email', 'max:200'],
            'phone' => ['nullable', 'string', 'max:60'],
            'subject' => ['nullable', 'string', 'max:200'],
            'message' => ['required', 'string'],
        ]);

        $data['status'] = 'new';

        ContactMessage::create($data);

        return redirect()->route('kontak')
            ->with('success', 'Pesan Anda sudah kami terima.');
    }
}
