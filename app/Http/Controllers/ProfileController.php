<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // show profile data
    public function index()
    {
        $user = auth()->user();
        return view('admin.profile.index', compact('user'));
    }

    public function updateProfile() {
        $user = auth()->user();
        return view('admin.profile.update', compact('user'));
    }

    public function editProfile(Request $request)
    {
        // Retrieve the authenticated user
        $user = auth()->user();
    
        // Validation rules
        $rules = [
            'nama_user' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    
        // Add password validation rules only if a new password is provided
        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:8';
        }
    
        // Validate the request
        $validate = $request->validate($rules, [
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
        $filename = $this->handleFileUpload($request, $currentAvatar);
    
        // Update user data
        $userData = [
            'nama_user' => $request->nama_user,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'email' => $request->email,
            'avatar' => $filename,
            'updated_at' => now(),
        ];
    
        // Add password to the update array only if a new password is provided
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }
    
        User::where('id', $user->id)->update($userData);
    
        // Delete the old file if it's different from the new one
        if ($currentAvatar !== $filename) {
            Storage::delete("public/files/avatars/{$currentAvatar}");
        }

        return redirect()->route('profile.show', ['id' => $user->id])->with('success', 'User data updated successfully');
    }
    
    private function handleFileUpload(Request $request, $currentFile)
    {

        $nama_file = $request->nama_file;

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $file = $request->file('avatar');
            $filename = time() . '-' . $nama_file . '.' . $file->getClientOriginalExtension();
    
            // Save the file in the 'public/files/galery' directory
            $file->storeAs('public/files/avatars', $filename);
    
            return $filename; // Return the generated filename
        }
    
        // If no new file file is provided, return the current file filename
        return $currentFile;
    }

}
