<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Donatur;
use Illuminate\Foundation\Auth\RegistersUsers;
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

    public function showRegistrationForm()
    {
        $title = 'Register';
        return view('auth.register', compact("title"));
    }

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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'          => ['required', 'string', 'max:255'],
            'jenis'         => ['required'],
            'alamat'        => ['required'],
            'telp'          => ['required'],
            'narahubung'    => ['required'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'captcha'       => 'required|captcha',
        ], [
            'email.required'        => 'Email masih kosong.',
            'password.required'     => 'Password masih kosong.',
            'captcha.required'      => 'Captcha masih kosong.',
            'captcha.captcha'       => 'Captcha salah, masukkan captcha dengan benar.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {


        $roles = 2;
        $donatur = Donatur::create([
            'nama'          => $data['name'],
            'jenis'         => $data['jenis'],
            'alamat'        => $data['alamat'],
            'telp'          => $data['telp'],
            'narahubung'    => $data['narahubung']
        ]);

        if ($donatur) {
            $donatur_id = Donatur::where('nama', '=', $data['name'])->orderBy('created_at', 'desc')->first()->id;
            // dd($donatur_id);
        }
        return $user = User::create([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
            'donatur_id'    => $donatur_id
        ]);
    }
}
