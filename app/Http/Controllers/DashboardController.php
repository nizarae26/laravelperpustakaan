<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use App\Models\DetailPeminjaman;
use App\Models\Favorit;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Rak;
use App\Models\Ulasan;
use App\Models\User;
// use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function cek()
    {
        if (Auth::user()->role_id == '1') {
            // return redirect('dashboard')->with('success', 'Anda  berhak mengakses ini');
            $data = Buku::all();
            $kategori = Category::all();
            $penerbit = Penerbit::all();
            $peminjaman = Peminjaman::all();
            $ulasan = Ulasan::all();
            $users = User::all();
            $raks = Rak::all();
            return view('dashboard.index', [
                'kategori' => $kategori,
                'ulasan' => $ulasan,
                'penerbit' => $penerbit,
                'peminjaman' => $peminjaman,
                'raks' => $raks,
                'users' => $users,
                'title' => 'Semua Buku',
                'data' => $data,
            ]);
        } elseif (Auth::user()->role_id == '2') {
            return redirect('dashboard/operator');
        } elseif (Auth::user()->role_id == '3') {
            return redirect('login')->with('error', 'Anda bukan karyawan');;
        } else {
            return redirect('')->with('error', 'Kesalahan Berfikir')->withInput();
        }
    }
    //admin
    public function admin()
    {

        if (Auth::user()->role_id == '1') {
            return redirect('dashboard')->with('success', 'Anda  berhak mengakses ini');
            $data = Buku::all();
            $kategori = Category::all();
            $penerbit = Penerbit::all();
            $peminjaman = Peminjaman::all();
            $users = User::all();
            $ulasan = Ulasan::all();
            $raks = Rak::all();
            return view('dashboard.index', [
                'kategori' => $kategori,
                'penerbit' => $penerbit,
                'peminjaman' => $peminjaman,
                'raks' => $raks,
                'ulasan' => $ulasan,
                'users' => $users,
                'title' => 'Semua Buku',
                'data' => $data,
            ]);
        } elseif (Auth::user()->role_id == '2') {
            return redirect('dashboard/operator')->with('error', 'Anda tidak berhak mengakses ini');
        } elseif (Auth::user()->role_id == '3') {
            return redirect('login')->with('error', 'Anda bukan karyawan');;
        } else {
            return redirect('')->with('error', 'Kesalahan Berfikir')->withInput();
        }
        // echo " iki admin";
    }

    //operator
    public function operator()
    {
        $ulasan = Ulasan::all();
        $data = Buku::all();
        $kategori = Category::all();
        $penerbit = Penerbit::all();
        $peminjaman = Peminjaman::all();
        $users = User::all();
        $raks = Rak::all();
        return view('dashboard2.index', [
            'ulasan' => $ulasan,
            'kategori' => $kategori,
            'penerbit' => $penerbit,
            'peminjaman' => $peminjaman,
            'raks' => $raks,
            'users' => $users,
            'title' => 'Semua Buku',
            'data' => $data,
        ]);
    }

    //peminjam
    public function peminjam()
    {
        // echo " iki peminjam";

        
        $data = Buku::paginate(4);
        $peminjaman = Peminjaman::all();
        $favorits = Favorit::all();
        $kategori = Category::all();

        if (request('searchh')) {
            $datas = Buku::latest()->where('judul', 'LIKE', '%' . request('searchh') . '%')->paginate(4);
        } else {
            $datas = 'buku tidak ada';
        }
        return view('peminjam.index', [
            'kategori' => $kategori,
            'peminjaman' => $peminjaman,
            'favorit' => $favorits,
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => 'Semua Buku',
            'data' => $data,
            'datas' => $datas,
        ]);
    }

    //buku all
    public function semuaBuku()
    {
        // echo " iki peminjam";
        if (request('searchh')) {
            $datas = Buku::latest()->where('judul', 'LIKE', '%' . request('searchh') . '%')->paginate(1);
        } else {
            $datas = 'buku tidak ada';
        }
        $data = Buku::paginate(4);
        $peminjaman = Peminjaman::all();
        $favorits = Favorit::all();
        $kategori = Category::all();
        return view('peminjam.index', [
            'kategori' => $kategori,
            'peminjaman' => $peminjaman,
            'favorit' => $favorits,
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => 'Semua Buku',
            'data' => $data,
            'datas' => $datas,
        ]);
    }

    public function semuaPenerbit()
    {
        // echo " iki peminjam";
        if (request('searchh')) {
            $datas = Buku::latest()->where('judul', 'LIKE', '%' . request('searchh') . '%')->paginate(1);
        } else {
            $datas = 'buku tidak ada';
        }
        $data = Buku::paginate(4);
        $peminjaman = Peminjaman::all();
        $favorits = Favorit::all();
        $kategori = Category::all();
        return view('peminjam.index', [
            'kategori' => $kategori,
            'peminjaman' => $peminjaman,
            'favorit' => $favorits,
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => 'Semua Buku',
            'data' => $data,
            'datas' => $datas,
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

    public function pilihPenerbit(Request $request, $id)
    {
        if ($request) {
            $data = Buku::latest()->where('penerbit_id', $id)->paginate(12);
            $title = Penerbit::find($id)->nama;
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
