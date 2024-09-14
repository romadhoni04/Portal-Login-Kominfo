<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact'); // Pastikan Anda memiliki tampilan 'contact.blade.php'
    }

    public function sendContactForm(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Ambil semua pengguna dengan role administrator dan superadmin
        $admins = User::whereIn('role', ['administrator', 'superadmin'])->get();

        // Loop untuk mengirim email ke setiap admin
        foreach ($admins as $admin) {
            Mail::raw($validatedData['message'], function ($message) use ($admin, $validatedData) {
                $message->to($admin->email)
                    ->subject($validatedData['subject'])
                    ->from($validatedData['email'], $validatedData['name']);
            });
        }

        // Mengembalikan JSON response dengan pesan sukses
        return response()->json([
            'status' => 'SUCCESS',
            'message' => 'Message sent successfully'
        ], 200);
    }


    // Di dalam metode yang menangani pengiriman formulir
    public function send(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan pesan ke database
        Message::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        // Kirim email (jika diperlukan)
        // Mail::to($request->input('email'))->send(new ContactMail($request->all()));

        return response()->json(['status' => 'SUCCESS', 'message' => 'Pesan berhasil dikirim!']);
    }
}
