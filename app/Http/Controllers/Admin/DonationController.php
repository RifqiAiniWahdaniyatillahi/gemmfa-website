<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::orderByDesc('donated_at')->orderByDesc('created_at')->get();

        return view('admin.donations.index', compact('donations'));
    }

    public function create()
    {
        return view('admin.donations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'donor_name' => ['required', 'string', 'max:200'],
            'donor_phone' => ['nullable', 'string', 'max:50'],
            'amount' => ['required', 'numeric', 'min:0'],
            'status' => ['nullable', 'string', 'max:40'],
            'donated_at' => ['nullable', 'date'],
            'confirmed_at' => ['nullable', 'date'],
            'message' => ['nullable', 'string'],
        ]);

        $data['status'] = $data['status'] ?? 'pending';

        Donation::create($data);

        return redirect()->route('admin.donations.index')->with('success', 'Donasi berhasil dibuat.');
    }

    public function show(Donation $donation)
    {
        return view('admin.donations.show', compact('donation'));
    }

    public function edit(Donation $donation)
    {
        return view('admin.donations.edit', compact('donation'));
    }

    public function update(Request $request, Donation $donation)
    {
        $data = $request->validate([
            'donor_name' => ['required', 'string', 'max:200'],
            'donor_phone' => ['nullable', 'string', 'max:50'],
            'amount' => ['required', 'numeric', 'min:0'],
            'status' => ['nullable', 'string', 'max:40'],
            'donated_at' => ['nullable', 'date'],
            'confirmed_at' => ['nullable', 'date'],
            'message' => ['nullable', 'string'],
        ]);

        $data['status'] = $data['status'] ?? $donation->status;

        $donation->update($data);

        return redirect()->route('admin.donations.index')->with('success', 'Donasi berhasil diperbarui.');
    }

    public function destroy(Donation $donation)
    {
        $donation->delete();

        return redirect()->route('admin.donations.index')->with('success', 'Donasi berhasil dihapus.');
    }
}
