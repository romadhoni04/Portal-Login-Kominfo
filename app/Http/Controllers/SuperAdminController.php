<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;

class SuperAdminController extends Controller
{
    // Menampilkan daftar administrator
    public function index()
    {
        // Mengambil semua user yang memiliki role 'Administrator'
        $admins = User::role('Administrator')->get();

        return view('superadmin.admins.index', compact('admins'));
    }

    // Menampilkan form untuk menambahkan admin baru
    public function create()
    {
        return view('superadmin.admins.create');
    }

    // Menyimpan admin baru
    public function store(Request $request)
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
            'role' => 'administrator', // Default role
        ]);

        // Menetapkan role 'Administrator'
        $user->assignRole('Administrator'); // Pastikan ini berjalan

        Log::info('Role Administrator assigned to user ID: ' . $user->id);

        return redirect()->route('superadmin.admins.index')->with('success', 'Administrator berhasil ditambahkan.');
    }


    // Menampilkan form edit admin
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('superadmin.admins.edit', compact('admin'));
    }

    // Mengupdate data admin
    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $admin->password,
        ]);

        return redirect()->route('superadmin.admins.index')->with('success', 'Administrator berhasil diupdate.');
    }

    // Menghapus admin
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('superadmin.admins.index')->with('success', 'Administrator berhasil dihapus.');
    }
    // Menampilkan daftar pengguna
    public function userIndex()
    {
        // Mengambil semua user yang tidak memiliki role 'Administrator' atau 'superadmin'
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['Administrator', 'superadmin']);
        })->get();

        return view('superadmin.users.index', compact('users'));
    }

    // Menampilkan form untuk menambahkan pengguna baru
    public function userCreate()
    {
        return view('superadmin.users.create');
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

        return redirect()->route('superadmin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Menampilkan form edit pengguna
    public function userEdit($id)
    {
        $user = User::findOrFail($id);
        return view('superadmin.users.edit', compact('user'));
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

        return redirect()->route('superadmin.users.index')->with('success', 'User berhasil diupdate.');
    }

    // Menghapus pengguna
    public function userDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('superadmin.users.index')->with('success', 'User berhasil dihapus.');
    }
}
