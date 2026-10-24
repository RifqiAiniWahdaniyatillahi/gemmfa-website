<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        return view('pages.donasi');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'donor_name' => ['required', 'string', 'max:200'],
            'donor_phone' => ['nullable', 'string', 'max:50'],
            'amount' => ['required', 'numeric', 'min:0'],
            'message' => ['nullable', 'string'],
        ]);

        $data['status'] = 'pending';
        $data['donated_at'] = now();

        Donation::create($data);

        return redirect()->route('donasi')
            ->with('success', 'Terima kasih. Konfirmasi donasi Anda sudah kami terima.');
    }
}
