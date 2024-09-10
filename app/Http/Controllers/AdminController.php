<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    // Menampilkan daftar administrator

    // Menampilkan daftar pengguna
    public function Index()
    {
        // Mengambil semua user yang tidak memiliki role 'Administrator' atau 'superadmin'
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['Administrator', 'superadmin']);
        })->get();

        return view('admin.users.index', compact('users'));
    }

    // Menampilkan form untuk menambahkan pengguna baru
    public function userCreate()
    {
        return view('admin.users.create');
    }

    // Menyimpan pengguna baru
    public function userStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Mendefinisikan variabel $data
        $data = $request->only(['name', 'last_name', 'email', 'password']); // Mengambil input yang dibutuhkan

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $data['password'],
            'role' => 'user', // Default role
        ]);

        Log::info('User created with ID: ' . $user->id);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Menampilkan form edit pengguna
    public function userEdit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Mengupdate data pengguna
    public function userUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diupdate.');
    }

    // Menghapus pengguna
    public function userDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}
