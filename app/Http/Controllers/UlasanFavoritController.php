<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use App\Models\Favorit;
use App\Models\Penerbit;
use App\Models\Rak;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UlasanFavoritController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function insertUlasan(Request $request, $id)
    {
        if (auth()->user()) {

            $request->validate([
                'ulasan' => 'required',
                'rating' => 'required',
            ], [
                'ulasan.required' => 'Ulasan Wajib Diisi',
                'rating.required' => 'Wajib Memilih Rating ',
            ]);

            Ulasan::create([

                'users_id' => auth()->user()->id,
                'buku_id' => $id,
                'ulasan' => $request->ulasan,
                'rating' => $request->rating,

            ]);
            return redirect()->back()->with('success', 'Berhasil Mengulas Buku');
            //         }
            //     }
        } else {
            Alert::error('Error', 'Anda belum Login');
        }
    }

    public function favorit(Request $request, $id)
    {
        if (auth()->user()) {

            $favlama = DB::table('favorit')
                ->where('users_id', auth()->user()->id)
                ->where('buku_id', $id)
                ->get();

            if ($favlama->count() == 11) {
                return redirect()->back()->with('error', 'Buku yang difavorit maksimal 2');
            } else {
                if (isset($favlama[0])) {
                    if ($favlama[0]->buku_id == $id) {
                        return redirect()->back()->with('error', 'Buku yang difavorit tidak boleh sama');
                    }
                } else {
                    Favorit::create([

                        'users_id' => auth()->user()->id,
                        'buku_id' => $id,

                    ]);
                    return redirect()->back()->with('success', 'Berhasil Menambahkan Ke Favorit');
                }
            }
        } else {
            Alert::error('Error', 'Anda belum Login');
        }
    }

    public function ulasan(Request $request, $id)
    {
        // dd($id);
        if ($request) {
            $data = Buku::all()->where('id', $id);
            $ini = Buku::where('id', $id);
            $users = User::all();
            $title = 'Detail Buku';
        } else {
            // $data = Buku::latest()->paginate(12);
            $title = 'Buku Tidak Ada';
        }

        return view('peminjam.ulasan', [
            'users' => $users,
            'kategori' => Category::all(),
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => $title,
            'ini' => $ini,
            'data' => $data,
        ]);
    }

    public function favorits()
    {
        $user = auth()->id();
        $data = Favorit::where('users_id', $user)->get();

        return view('peminjam.favorit', [

            'buku' => Buku::all(),
            'user' => User::all(),
            'kategori' => Category::all(),
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => 'Favorit',
            'data' => $data,
        ]);
    }

    public function dataUlasan()
    {
        // echo " iki peminjam";
        $data = Ulasan::all();
        $kategori = Category::all();
        $buku = Buku::all();
        $users = User::all();
        return view('dashboard2.ulasan', [

            'user' => $users,
            'buku' => $buku,
            'kategori' => $kategori,
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => 'Semua Buku',
            'data' => $data,
        ]);
    }

    //Delete Favorit
    public function deleteFavorit(Request $request, $id)
    {
        $data = Favorit::findOrfail($id);
        $data->delete($request->all());
        return redirect()->back()->with('success', 'Berhasil Menghapus dari Favorit');
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
