<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    public function loginn(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role_id == '1') {
                Alert::success('Login Berhasil', 'Selamat Datang Admin');
                return redirect('dashboard')->with('Login Berhasil', 'Selamat Datang Admin');
            } elseif (Auth::user()->role_id == '2') {
                Alert::success('Selamat Datang', (Auth::user()->name));
                return redirect('dashboard/operator');
            } elseif (Auth::user()->role_id == '3') {
                Alert::success('Selamat Datang', (Auth::user()->name));
                return redirect('dashboard/peminjam');
            }
        } else {
            return redirect('/loginn')->with('error', 'username atau Password yang anda masukkan salah!')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/loginn');
    }

    public function index2()
    {
        return view('register');
    }

    public function registerr(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['integer', 'min:1'],
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'role_id' => $request['role_id'],
        ]);

        return redirect('/registerr')->with('success', 'Berhasil Membuat Akun');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
