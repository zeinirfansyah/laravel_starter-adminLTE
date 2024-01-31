<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserDataController extends Controller
{
    public function index(Request $request)
    {
        // Use a dynamic query to adjust based on the user's role
        $usersQuery = User::query();

        // Filter by role if a role is provided in the request
        if ($request->has('role') && $request->role !== 'all roles') {
            $usersQuery->where('role', $request->role);
        }

        // Search by name, role, or everything if a search query is provided
        if ($request->has('search')) {
            $searchQuery = $request->search;
            $usersQuery->where(function ($query) use ($searchQuery) {
                $query->where('nama_user', 'like', "%$searchQuery%")
                    ->orWhere('username', 'like', "%$searchQuery%")
                    ->orWhere('email', 'like', "%$searchQuery%")
                    ->orWhere('role', 'like', "%$searchQuery%");
            });
        }


        // sort data in table column
        if ($request->has('sort_column') && $request->has('sort_order')) {
            $sortColumn = $request->sort_column;
            $sortOrder = $request->sort_order;
            $usersQuery->orderBy($sortColumn, $sortOrder);
        }

        // Paginate the results with 8 items per page without the manager
        $users = $usersQuery->where('role', '!=', 'manager')->paginate(8);

        // Pass the roles to the view for filtering
        $roles = ['all roles', 'admin', 'user'];

        return view('dashboard.users.index', [
            'users' => $users,
            'roles' => $roles,
            'sortColumn' => $request->get('sort_column'),
            'sortOrder' => $request->get('sort_order'),
        ]);
    }



    public function createUser()
    {
        return view('dashboard.users.create');
    }

    public function updateUser($id)
    {
        $user = User::find($id);
        $roles = ['admin', 'user'];
        return view('dashboard.users.update', compact('user', 'roles'));
    }

    // handle upload avatar
    // handle upload avatar
    private function handleAvatarUpload(Request $request, $currentAvatar)
    {
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            // Save the file in the 'public/avatars' directory
            $avatar->storeAs('public/avatars', $filename);

            return $filename; // Return the generated filename
        }

        // If no new avatar file is provided, return the current avatar filename
        return $currentAvatar;
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

        $filename = $this->handleAvatarUpload($request, 'default_avatar.jpg');

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
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
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
        $currentAvatar = $user->avatar;
        $filename = $this->handleAvatarUpload($request, $currentAvatar);


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

        return redirect()->route('users.detail', ['id' => $id])->with('success', 'User data updated successfully');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User data deleted successfully');
    }
}
