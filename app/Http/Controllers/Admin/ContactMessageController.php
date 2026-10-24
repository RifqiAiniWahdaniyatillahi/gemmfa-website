<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderByDesc('created_at')->get();

        return view('admin.contact-messages.index', compact('messages'));
    }

    public function create()
    {
        return view('admin.contact-messages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email', 'max:200'],
            'phone' => ['nullable', 'string', 'max:60'],
            'subject' => ['nullable', 'string', 'max:200'],
            'message' => ['required', 'string'],
            'status' => ['nullable', 'string', 'max:40'],
            'resolved_at' => ['nullable', 'date'],
        ]);

        $data['status'] = $data['status'] ?? 'new';

        ContactMessage::create($data);

        return redirect()->route('admin.contact-messages.index')->with('success', 'Pesan kontak berhasil dibuat.');
    }

    public function show(ContactMessage $contactMessage)
    {
        return view('admin.contact-messages.show', compact('contactMessage'));
    }

    public function edit(ContactMessage $contactMessage)
    {
        return view('admin.contact-messages.edit', compact('contactMessage'));
    }

    public function update(Request $request, ContactMessage $contactMessage)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email', 'max:200'],
            'phone' => ['nullable', 'string', 'max:60'],
            'subject' => ['nullable', 'string', 'max:200'],
            'message' => ['required', 'string'],
            'status' => ['nullable', 'string', 'max:40'],
            'resolved_at' => ['nullable', 'date'],
        ]);

        $data['status'] = $data['status'] ?? $contactMessage->status;

        $contactMessage->update($data);

        return redirect()->route('admin.contact-messages.index')->with('success', 'Pesan kontak berhasil diperbarui.');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()->route('admin.contact-messages.index')->with('success', 'Pesan kontak berhasil dihapus.');
    }
}
