<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //menampilkan data User
    public function DataUser()
    {
        if (request('search')) {
            $data = User::where('name', 'LIKE', '%' . request('search') . '%')
                ->orWhere('email', 'LIKE', '%' . request('search') . '%')
                ->orWhere('role_id', 'LIKE', '%' . request('search') . '%')->paginate(5);
        } else {
            $data = User::paginate(5);
        }
        return view('User.index', [
            'role' => Role::all(),
            'title' => 'Semua Kategori',
            'data' => $data,
        ]);
    }

    // Isi data User
    public function insertUser(Request $request)
    {
        User::create($request->all());
        return redirect()->route('DataUser')->with('success', 'User berhasil ditambah');
    }

    // Edit User
    public function updateUser(Request $request, $id)
    {
        $data = User::findOrfail($id);
        $data->update($request->all());
        return redirect()->route('DataUser')->with('success', 'Data User Berhasil Di Rubah');
    }

    //Delete User
    public function deleteUser(Request $request, $id)
    {
        $data = User::findOrfail($id);
        $data->delete($request->all());
        return redirect()->route('DataUser')->with('success', 'Data User Berhasil Di Hapus');
    }

    public function index()
    {
        //
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
