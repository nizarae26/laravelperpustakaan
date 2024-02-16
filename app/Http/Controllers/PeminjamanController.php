<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Rak;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function detailPinjam()
    {
        $data = Peminjaman::paginate(3);

        return view('peminjam.detailpinjam', [

            'buku' => Buku::all(),
            'user' => User::all(),
            'kategori' => Category::all(),
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => 'Semua Kategori',
            'data' => $data,
        ]);
    }

    public function pinjamBuku(Request $request, $id)
    {

        // $ceklimit = Peminjaman::all()->get($id);

        if (auth()->user()) {


            //     if ($ceklimit->count() == 2) {
            //         Alert::error('Error', 'Buku yang dipinjam maksimal 2');
            //     } else {

            //         if ($ceklimit[0]->buku_id == $id) {                   
            //             Alert::error('Error', 'Buku yang dipinjam tidak boleh sama');
            //         } else {
            Peminjaman::create([
                // 'id_user' => $request->id_user,
                'kode_pinjam' => random_int(10000000, 999999999),
                'peminjam_id' => auth()->user()->id,
                'buku_id' => $id,
                'tanggal_pinjam' => date('Y-m-d'),
                'status' => 0,

            ]);
            return redirect('semuaBuku')->with('success', 'Berhasil Meminjam Buku');
            //         }
            //     }
        } else {
            Alert::error('Error', 'Anda belum Login');
        }
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

    public function dataPeminjaman()
    {
        $data = Peminjaman::paginate(5);
        $kategori = Category::all();
        return view('dashboard.datapeminjaman', [
            'buku' => Buku::all(),
            'kategori' => $kategori,
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => 'Semua Buku',
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
