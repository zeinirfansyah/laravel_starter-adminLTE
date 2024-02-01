<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   public function register(Request $request) {
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'nomor_telpon' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'required|string|min:8|confirmed',

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
            'created_at' => now(),
            'updated_at' => now(),
        ];

        User::create($user);

        return redirect(route('login'))->with('success', 'Akun user berhasil dibuat. Silahkan login.');
    }
}
