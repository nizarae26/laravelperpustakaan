<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use App\Models\Penerbit;
use App\Models\Rak;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $kategori = Category::latest()->paginate(10);
        return view('dashboard.index');
        // echo " iki admin";
    }

    public function operator()
    {
        return view('dashboard2.index');
    }
    public function peminjam()
    {
        // echo " iki peminjam";
        $data = Buku::paginate(4);
        $kategori = Category::all();
        return view('peminjam.index', [
            'kategori' => $kategori,
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => 'Semua Buku',
            'data' => $data,
        ]);
    }
    public function semuaBuku()
    {
        // echo " iki peminjam";
        $data = Buku::paginate(4);
        $kategori = Category::all();
        return view('peminjam.index', [
            'kategori' => $kategori,
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => 'Semua Buku',
            'data' => $data,
        ]);
    }

    public function pilihBuku(Request $request, $id)
    {
        if ($request) {
            $data = Buku::latest()->where('kategori_id', $id)->paginate(12);
            $title = Category::find($id)->nama;
        } else {
            $data = Buku::latest()->paginate(12);
            $title = 'Semua Buku';
        }

        return view('peminjam.index', [
            'kategori' => Category::all(),
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => $title,
            'data' => $data,
        ]);
    }

    // public function logout()
    // {
    //     return view('auth.login');
    // }

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
