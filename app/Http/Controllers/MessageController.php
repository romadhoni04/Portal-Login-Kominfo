<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan pesan ke dalam database
        try {
            Message::create($validatedData);

            // Buat notifikasi baru
            Notification::create([
                'title' => 'Pesan Baru Diterima',
                'description' => 'Anda telah menerima pesan baru dari ' . $request->name,
            ]);

            // Redirect dengan pesan sukses
            return back()->with('success', 'Pesan Anda telah dikirim!');
        } catch (\Exception $e) {
            Log::error('Error sending message: ' . $e->getMessage());
            return back()->withErrors('Gagal mengirim pesan.');
        }
    }
}
