<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Rak;
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
            $users = User::all();
            $raks = Rak::all();
            return view('dashboard.index', [
                'kategori' => $kategori,
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
            $raks = Rak::all();
            return view('dashboard.index', [
                'kategori' => $kategori,
                'penerbit' => $penerbit,
                'peminjaman' => $peminjaman,
                'raks' => $raks,
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
        $data = Buku::all();
        $kategori = Category::all();
        $penerbit = Penerbit::all();
        $peminjaman = Peminjaman::all();
        $users = User::all();
        $raks = Rak::all();
        return view('dashboard2.index', [
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
        $data = Buku::paginate(8);
        $kategori = Category::all();
        return view('peminjam.index', [
            'kategori' => $kategori,
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => 'Semua Buku',
            'data' => $data,
        ]);
    }

    //buku all
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

    public function semuaPenerbit()
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

    public function detailBuku(Request $request, $id)
    {
        // dd($id);
        if ($request) {
            $data = Buku::all()->where('id', $id);
            $ini = Buku::where('id', $id);
            $title = 'Detail Buku';
        } else {
            // $data = Buku::latest()->paginate(12);
            $title = 'Buku Tidak Ada';
        }

        return view('peminjam.detailbuku', [
            'kategori' => Category::all(),
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => $title,
            'ini' => $ini,
            'data' => $data,
        ]);
    }

    public function favorit(Request $request, $id)
    {
        $kategori = Category::all();
        $data = Buku::all()->where('id', $id);
        //user harus login
        // if (auth()->user()) {

        //role peminjam
        if (auth()->user()) {

            $peminjaman_lama = DB::table('peminjaman')
                ->join('detail_peminjaman', 'peminjaman_id', '=', 'detail_peminjaman.peminjaman_id')
                ->where('peminjam_id', auth()->user()->id)
                ->where('status', '!=', 3)
                ->get();
            Alert::error('Error', 'Limit Favorit Terlampaui');

            //batas dua
            if ($peminjaman_lama->count() == 3) {
                return view('peminjam.detailBuku', compact('kategori', 'data'))->with('error', 'Berhasil menambahkan');
                Alert::error('Error', 'Buku yang dipinjam maksimal 2');
            } else {

                //sudah ada isinya
                if ($peminjaman_lama->count() == 0) {
                    $peminjaman_baru = Peminjaman::create([
                        'kode_pinjam' => random_int(10000000, 999999999),
                        'peminjam_id' => auth()->user()->id,
                        'status' => 0,
                    ]);

                    DetailPeminjaman::create([
                        'peminjaman_id' => $peminjaman_baru->id,
                        'buku_id' => $id
                    ]);

                    // session()->flash('Sukses', 'Berhasil menambahkan');
                    Alert::success('Sukses', 'Berhasil menambahkan');
                    return view('peminjam.detailBuku', compact('kategori', 'data'))->with('success', 'Berhasil menambahkan');
                    // return redirect('detailBuku/'+$id)->with('error', 'Anda harus login');
                } else {

                    if ($peminjaman_lama[0]->buku_id == $id) {
                        // return redirect('peminjam.detailBuku', compact('kategori', 'data'))->with('error', 'Berhasil menambahkan');

                        Alert::error('Error', 'Buku yang dipinjam tidak boleh sama');
                        // session()->flash('gagal', 'Buku yang dipinjam tidak boleh sama');
                    } else {

                        DetailPeminjaman::create([
                            'peminjaman_id' => $peminjaman_lama[0]->peminjaman_id,
                            'buku_id' => $id
                        ]);
                        return view('peminjam.detailBuku', compact('kategori', 'data'))->with('success', 'Berhasil menambahkan');
                        Alert::success('Sukses', 'Berhasil menambahkan');
                        // return redirect('detailBuku/'+$id+'')->with('success', 'Berhasil menambahkan favorit');
                    }
                }
            }
        } else {
            Alert::error('Error', 'role anda bukan peminjam');
            // session()->flash('gagal', 'role anda bukan peminjam');
            // return redirect('semuaBuku')->with('error', 'Anda harus login');
            return view('peminjam.detailBuku', compact('kategori', 'data'))->with('success', 'Berhasil menambahkan');
        }
        return view('peminjam.detailBuku', compact('kategori', 'data'))->with('success', 'Berhasil menambahkan');
        Alert::error('Error', 'role anda bukan peminjam');
        // } else {
        //     return redirect('login')->with('error', 'Anda harus login');
        // }
        // return redirect('semuaBuku')->with('error', 'Anda harus login');
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
