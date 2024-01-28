<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserDataController extends Controller
{
    public function index()
    {
        $users = User::paginate(8);

        return view('dashboard.users.index', ['users' => $users]);
    }

    public function createUser()
    {
        return view('dashboard.users.create');
    }

    public function updateUser($id)
    {
        $user = User::find($id);
        return view('dashboard.users.update', compact('user'));
    }

    public function storeUser(Request $request)
    {
        $validate = $request->validate([
            'nama_user' => 'required|string|max:255',
            'nomor_telpon' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:255',
        ], [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah ada.',
            'string' => ':attribute harus string.',
            'max' => ':attribute maksimal 255 karakter.',
            'min' => ':attribute minimal 8 karakter.',
            'email' => ':attribute harus email.',
            'image' => ':attribute harus jpeg, png, jpg.',
            'mimes' => ':attribute harus jpeg, png, jpg.',
            'max' => ':attribute maksimal 2 MB.',
        ]);

        // Handle file upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('public/avatars', $filename);
        } else {
            // Default avatar or any other logic you prefer
            $filename = 'default_avatar.jpg';
        }

        $user = [
            'nama_user' => $request->nama_user,
            'nomor_telpon' => $request->nomor_telpon,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'email' => $request->email,
            'avatar' => $filename,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        User::create($user);

        return redirect()->route('users.index')->with('success', 'User data created successfully');
    }

    public function detailUser($id)
    {
        $user = User::find($id);
        return view('dashboard.users.detail', compact('user'));
    }

    public function editUser(Request $request, $id)
    {
        $user = User::find($id);

        $validate = $request->validate([
            'nama_user' => 'required|string|max:255',
            'nomor_telpon' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:255',
        ], [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah ada.',
            'string' => ':attribute harus string.',
            'max' => ':attribute maksimal 255 karakter.',
            'min' => ':attribute minimal 8 karakter.',
            'email' => ':attribute harus email.',
            'image' => ':attribute harus jpeg, png, jpg.',
            'mimes' => ':attribute harus jpeg, png, jpg.',
            'max' => ':attribute maksimal 2 MB.',
        ]);

        // Handle file upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('public/avatars', $filename);
        
        } else {
            // Default avatar or any other logic you prefer
            $filename = 'default_avatar.jpg';
        }


        $user = [
            'nama_user' => $request->nama_user,
            'nomor_telpon' => $request->nomor_telpon,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'email' => $request->email,
            'avatar' => $filename,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $user = User::where('id', $id)->update($user);

        return redirect()->route('users.index')->with('success', 'User data updated successfully');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User data deleted successfully');
    }
}
