<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Donatur;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Models\Role;
// use App\Models\Logactivity;
use App\Models\Webconfig;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->website  = Webconfig::get()->first()->nama_web;
    }

    public function index()
    {
        if (Auth::user()->role_id == 1) {
            $website    = $this->website;
            $title      = "User";

            $users      = User::join('roles', 'users.role_id', '=', 'roles.id')
                ->orderby('users.role_id', 'desc')
                ->get(['users.*', 'roles.name AS nama_role']);

            return view('admin.user.index', compact('website', 'title', 'users'));
        }
    }

    public function create()
    {
        if (Auth::user()->role_id == 1) {
            $website    = $this->website;
            $title      = "Tambah User";

            $donatur    = Donatur::all();
            $roles      = Role::latest()->get();

            return view('admin.user.create', compact('website', 'title', 'donatur', 'roles'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => [
                'required',
                'confirmed',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
            'role_id'   => 'required'
        ], [
            'name.required'         => 'Nama User belum diisi',
            'email.required'        => 'Email belum diisi',
            'email.email'           => 'Email harus menggunakan @',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password belum diisi',
            'password.min'          => 'Password minimal terdiri dari 8 karakter kombinasi',
            'password.regex'        => 'Password harus berupa kombinasi huruf besar, huruf kecil, angka, dan simbol.',
            'password.confirmed'    => 'Kombinasi Password tidak cocok',
            'role_id.required'      => 'Level/Role belum dipilih',
        ]);

        $user = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => bcrypt($request->input('password')),
            'role_id'   => $request->input('role_id'),
        ]);

        //assign role
        // $user->assignRole($request->input('role'));

        if ($user) {
            // Logactivity::addLog(Auth::user()->id, '<b>Tambah Data User</b> : ' . $request->input('name'));
            //redirect dengan pesan sukses
            return redirect()->route('admin.user.index')->with(['success' => 'Data User Berhasil Disimpan']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.user.index')->with(['error' => 'Data User Gagal Disimpan']);
        }
    }

    public function edit(User $user)
    {
        if (Auth::user()->role_id == '1') {

            $website    = $this->website;
            $title      = "Ubah User";

            $roles      = Role::latest()->get();

            if ($user->id == '1' && Auth::user()->id == '1' || ($user->id != '1')) {

                return view('admin.user.edit', compact('website', 'title', 'user', 'roles'));
            }
        }
    }

    public function update(Request $request, User $user)
    {
        $user   = User::findOrFail($user->id);
        $name   = $user->name;

        if ($request->input('email') != $user->email) {
            $this->validate($request, [
                'email'     => 'unique:users',
            ], [
                'email.unique'      => 'Email sudah terdaftar',
            ]);
        }

        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
            'role_id'   => 'required'
        ], [
            'name.required'         => 'Nama User belum diisi',
            'email.required'        => 'Email belum diisi',
            'email.email'           => 'Email harus menggunakan @',
            'role_id.required'      => 'Level/Role belum dipilih',
        ]);

        if ($request->input('password') == "") {
            $user->update([
                'name'      => $request->input('name'),
                'email'     => $request->input('email'),
                'role_id'   => $request->input('role_id'),
            ]);
        } else {
            $this->validate($request, [
                'password'  => [
                    'confirmed',
                    'min:8',
                    'regex:/[a-z]/',
                    'regex:/[A-Z]/',
                    'regex:/[0-9]/',
                    'regex:/[@$!%*#?&]/',
                ],
            ], [
                'password.min'          => 'Password minimal terdiri dari 8 karakter kombinasi',
                'password.regex'        => 'Password harus berupa kombinasi huruf besar, huruf kecil, angka, dan simbol.',
                'password.confirmed'    => 'Kombinasi Password tidak cocok',
            ]);

            $user->update([
                'name'      => $request->input('name'),
                'email'     => $request->input('email'),
                'password'  => bcrypt($request->input('password')),
                'role_id'   => $request->input('role_id'),
            ]);
        }

        //assign role
        // $user->syncRoles($request->input('role'));

        if ($user) {
            if ($name != $request->input('name')) {
                // Logactivity::addLog(Auth::user()->id, '<b>Ubah Data User</b> : ' . $name . ' <b>Menjadi : </b>' . $request->input('name'));
            }
            // Logactivity::addLog(Auth::user()->id, '<b>Ubah Data User</b> : ' . $request->input('name'));

            //redirect dengan pesan sukses
            return redirect()->route('admin.user.index')->with(['success' => 'Data User Berhasil Diupdate']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.user.index')->with(['error' => 'Data User Gagal Diupdate']);
        }
    }

    public function destroy($id)
    {
        $data   = User::findOrFail($id);
        $user   = $data->name;

        $data->delete();

        if ($data) {
            // Logactivity::addLog(Auth::user()->id, '<b>Hapus Data User</b> : ' . $user);

            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
