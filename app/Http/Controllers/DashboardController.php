<?php

namespace App\Http\Controllers;

use App\Charts\Chart;
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
use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\PieChart;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    //admin
    public function admin(Chart $chart)
    {
        if (Auth::user()->role_id == '1') {

            $data = Buku::all();
            $kategori = Category::all();
            $penerbit = Penerbit::all();
            $favorit = Favorit::all();
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
                'favorit' => $favorit,
                'users' => $users,
                'title' => 'Semua Buku',
                'data' => $data,
                'chart' => $chart->build(),
            ]);
        } elseif (Auth::user()->role_id == '2') {

            $data = Buku::all();
            $kategori = Category::all();
            $penerbit = Penerbit::all();
            $favorit = Favorit::all();
            $peminjaman = Peminjaman::all();
            $ulasan = Ulasan::all();
            $users = User::all();
            $raks = Rak::all();
            return view('dashboard2.index', [
                'kategori' => $kategori,
                'ulasan' => $ulasan,
                'penerbit' => $penerbit,
                'peminjaman' => $peminjaman,
                'raks' => $raks,
                'favorit' => $favorit,
                'users' => $users,
                'title' => 'Semua Buku',
                'data' => $data,
                'chart' => $chart->build(),
            ]);
        } elseif (Auth::user()->role_id == '3') {
            return redirect('loginn')->with('error', 'Anda bukan karyawan');;
        } else {
            return redirect('')->with('error', 'Kesalahan Berfikir')->withInput();
        }
    }

    public function cek(Chart $chart)
    {
        if (Auth::user()->role_id == '1') {

            $bukunew = Buku::limit(5)->latest()->get();
            $data = Buku::all();
            $kategori = Category::all();
            $penerbit = Penerbit::all();
            $favorit = Favorit::all();
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
                'favorit' => $favorit,
                'users' => $users,
                'title' => 'Semua Buku',
                'data' => $data,
                'bukunew' => $bukunew,
                // 'chart' => $chart,
                'chart' => $chart->build(),
            ]);
        } elseif (Auth::user()->role_id == '2') {
            $bukunew = Buku::limit(5)->latest()->get();
            $data = Buku::all();
            $kategori = Category::all();
            $penerbit = Penerbit::all();
            $favorit = Favorit::all();
            $peminjaman = Peminjaman::all();
            $ulasan = Ulasan::all();
            $users = User::all();
            $raks = Rak::all();
            return view('dashboard2.index', [
                'kategori' => $kategori,
                'ulasan' => $ulasan,
                'penerbit' => $penerbit,
                'peminjaman' => $peminjaman,
                'raks' => $raks,
                'favorit' => $favorit,
                'users' => $users,
                'title' => 'Semua Buku',
                'data' => $data,
                'bukunew' => $bukunew,
                'chart' => $chart->build(),
            ]);
        } elseif (Auth::user()->role_id == '3') {
            return redirect('loginn')->with('error', 'Anda bukan karyawan');;
        } else {
            return redirect('')->with('error', 'Kesalahan Berfikir')->withInput();
        }
    }

    //operator
    public function operator(Chart $chart)
    {

        $bukunew = Buku::limit(5)->latest()->get();
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
            'bukunew' => $bukunew,
            'chart' => $chart->build(),
        ]);
    }

    //peminjam
    public function peminjam()
    {
        // echo " iki peminjam";

        $user = auth()->id();
        $datapinjam = Peminjaman::where('users_id', $user)->get();
        $favorits = Favorit::where('users_id', $user)->get();
        $data = Buku::latest()->paginate(4);
        $peminjaman = Peminjaman::all();
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
            'datapinjam' => $datapinjam,
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
        $user = auth()->id();
        $datapinjam = Peminjaman::where('users_id', $user)->get();
        $kategori = Category::all();
        return view('peminjam.index', [
            'kategori' => $kategori,
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => 'Semua Buku',
            'data' => $data,
            'datas' => $datas,
            'datapinjam' => $datapinjam,
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
        $user = auth()->id();
        $datapinjam = Peminjaman::where('users_id', $user)->get();
        $data = Buku::paginate(4);
        $kategori = Category::all();
        return view('peminjam.index', [
            'kategori' => $kategori,
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => 'Semua Buku',
            'data' => $data,
            'datas' => $datas,
            'datapinjam' => $datapinjam,
        ]);
    }

    public function pilihBuku(Request $request, $id)
    {
        $user = auth()->id();
        $datapinjam = Peminjaman::where('users_id', $user)->get();
        $favorit    = Favorit::all();

        dd($datapinjam);

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
            'favorit' => $favorit,
            'datapinjam' => $datapinjam,
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
