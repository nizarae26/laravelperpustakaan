<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Rak;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    // Cek Detail Pinjam Berdasarkan User 
    public function detailPinjam()
    {
        $user = auth()->id();
        $data = Peminjaman::where('users_id', $user)->get();

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

    // Peminjaman oleh user peminjam
    public function pinjamBuku(Request $request, $id)
    {

        // authentication login
        if (auth()->user()) {

            // Cek Data Peminjaman
            $pinjamlama = DB::table('peminjaman')
                ->where('users_id', auth()->user()->id)
                ->where('buku_id', $id)
                ->get();

            // Periksa ketersediaan stok buku yang spesifik dengan ID yang ditentukan
            $book = Buku::find($id);

            // Tidak Boleh Lebih 10
            if ($pinjamlama->count() == 11) {
                return redirect()->back()->with('error', 'Buku yang dipinjam maksimal 10');
            } else {
                if (!$book || $book->stok == 0) { // Periksa jika buku tidak ditemukan atau stok habis
                    return redirect()->back()->with('error', 'Buku tidak tersedia atau stok habis');
                } else {
                    Peminjaman::create([
                        'kode_pinjam' => random_int(10000000, 999999999),
                        'users_id' => auth()->user()->id,
                        'buku_id' => $id,
                        'tanggal_pinjam' => now(),
                        'batas_pinjam' => now()->addDays(29),
                        'status' => 0,
                    ]);
        
                    return redirect()->back()->with('success', 'Berhasil Mengajukan Meminjam');
                }
            
            }
        } else {
            Alert::error('Error', 'Anda belum Login');
        }
    }

    // confirm buku
    public function ubahStatus(Request $request, $id)
    {
        // Confirm Buku 
        $data = Peminjaman::findOrfail($id);
        $data->update([
            'status' => 1,
        ]);

        // Mengurangi Stok Buku
        $data->buku->update([
            'stok' => $data->buku->stok - 1
        ]);

        return redirect('DataPeminjaman')->with('success', 'Berhasil Mengonfirmasi');
    }

    // Kembali buku
    public function ubahStatus1(Request $request, $id)
    {
        // Mengembalikan Buku
        $data = Peminjaman::findOrfail($id);
        $data->update([
            'status' => 2,
            'tanggal_kembali' => now(),
        ]);

        // Menambah Stok dari buku kembali
        $data->buku->update([
            'stok' => $data->buku->stok + 1
        ]);

        return redirect('DataPeminjaman')->with('success', 'Berhasil Mengembalikan');
    }

    //buku all
    public function semuaBuku()
    {
        // Semua Buku Tampil
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
        // Semua Buku Tampil
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

    // Pilih Buku Berdasarkan Kategori
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

    // Pilih Buku Berdasarkan Penerbit
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

    // Insert Ulasan pada halaman peminjam
    public function ulasan(Request $request, $id)
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

        return view('peminjam.ulasan', [
            'kategori' => Category::all(),
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => $title,
            'ini' => $ini,
            'data' => $data,
        ]);
    }


    // Aksi Data Peminjaman hanya yang bisa diakses oleh operator 
    public function dataPeminjaman()
    {

        // Menggunakan percabangan berdasarkan previllege role
        if (Auth::user()->role_id == '1') {
            return redirect('dashboard')->with('error', 'Anda tidak berhak mengakses ini');
        } elseif (Auth::user()->role_id == '2') {
            // return redirect('dashboard/operator')->with('success', 'Berhasil Login');;
            $data = Peminjaman::all();
            $kategori = Category::all();
            return view('dashboard2.datapeminjaman', [
                'buku' => Buku::all(),
                'kategori' => $kategori,
                'penerbit' => Penerbit::all(),
                'raks' => Rak::all(),
                'title' => 'Semua Buku',
                'data' => $data,
            ])->with('success', 'Berhasil Login');
        } elseif (Auth::user()->role_id == '3') {
            return redirect('login')->with('error', 'Anda bukan karyawan');;
        } else {
            return redirect('')->with('error', 'Kesalahan Berfikir')->withInput();
        }
    }

    // Filter Data Peminjaman rentan waktu 
    public function filter(Request $request)
    {

        if (Auth::user()->role_id == '1') {
            return redirect('dashboard')->with('error', 'Anda tidak berhak mengakses ini');
        } elseif (Auth::user()->role_id == '2') {

            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $data = Peminjaman::whereDate('created_at', '>=', $start_date)
                ->wheredate('created_at', '<=', $end_date)
                ->get();
            $kategori = Category::all();
            return view('dashboard2.datapeminjaman', [
                'buku' => Buku::all(),
                'kategori' => $kategori,
                'penerbit' => Penerbit::all(),
                'raks' => Rak::all(),
                'title' => 'Semua Buku',
                'data' => $data,
            ])->with('success', 'Berhasil Login');
        } elseif (Auth::user()->role_id == '3') {
            return redirect('login')->with('error', 'Anda bukan karyawan');;
        } else {
            return redirect('')->with('error', 'Kesalahan Berfikir')->withInput();
        }
    }

    // Filter Data Pengembalian rentan waktu 
    public function filterp(Request $request)
    {

        if (Auth::user()->role_id == '1') {
            return redirect('dashboard')->with('error', 'Anda tidak berhak mengakses ini');
        } elseif (Auth::user()->role_id == '2') {

            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $data = Peminjaman::whereDate('created_at', '>=', $start_date)
                ->wheredate('created_at', '<=', $end_date)
                ->get();
            $kategori = Category::all();
            return view('dashboard2.datapengembalian', [
                'buku' => Buku::all(),
                'kategori' => $kategori,
                'penerbit' => Penerbit::all(),
                'raks' => Rak::all(),
                'title' => 'Semua Buku',
                'data' => $data,
            ])->with('success', 'Berhasil Login');
        } elseif (Auth::user()->role_id == '3') {
            return redirect('login')->with('error', 'Anda bukan karyawan');;
        } else {
            return redirect('')->with('error', 'Kesalahan Berfikir')->withInput();
        }
    }

    // Filter Data Laporan rentan waktu 
    public function filterla(Request $request)
    {

        if (Auth::user()->role_id == '1') {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $data = Peminjaman::whereDate('created_at', '>=', $start_date)
                ->wheredate('created_at', '<=', $end_date)
                ->get();
            $kategori = Category::all();
            return view('dashboard.laporan', [
                'buku' => Buku::all(),
                'kategori' => $kategori,
                'penerbit' => Penerbit::all(),
                'raks' => Rak::all(),
                'title' => 'Semua Buku',
                'data' => $data,
            ])->with('success', 'Berhasil Login');
        } elseif (Auth::user()->role_id == '2') {

            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $data = Peminjaman::whereDate('created_at', '>=', $start_date)
                ->wheredate('created_at', '<=', $end_date)
                ->get();
            $kategori = Category::all();
            return view('dashboard.laporan', [
                'buku' => Buku::all(),
                'kategori' => $kategori,
                'penerbit' => Penerbit::all(),
                'raks' => Rak::all(),
                'title' => 'Semua Buku',
                'data' => $data,
            ])->with('success', 'Berhasil Login');
        } elseif (Auth::user()->role_id == '3') {
            return redirect('login')->with('error', 'Anda bukan karyawan');;
        } else {
            return redirect('')->with('error', 'Kesalahan Berfikir')->withInput();
        }
    }

    // Filter Data Ulasan rentan waktu 
    public function filterul(Request $request)
    {

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $data = Ulasan::whereDate('created_at', '>=', $start_date)
            ->wheredate('created_at', '<=', $end_date)
            ->get();
        $kategori = Category::all();
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

    // Cetak Data Laporan oleh admmin & operator 
    public function laporan()
    {

        if (Auth::user()->role_id == '1') {
            $data = Peminjaman::all();
            $kategori = Category::all();
            return view('dashboard.laporan', [

                'users' => User::all(),
                'buku' => Buku::all(),
                'kategori' => $kategori,
                'penerbit' => Penerbit::all(),
                'raks' => Rak::all(),
                'title' => 'Semua Buku',
                'data' => $data,
            ])->with('success', 'Berhasil Login');
        } elseif (Auth::user()->role_id == '2') {
            // return redirect('dashboard/operator')->with('success', 'Berhasil Login');;
            $data = Peminjaman::all();
            $kategori = Category::all();
            return view('dashboard.laporan', [
                'users' => User::all(),
                'buku' => Buku::all(),
                'kategori' => $kategori,
                'penerbit' => Penerbit::all(),
                'raks' => Rak::all(),
                'title' => 'Semua Buku',
                'data' => $data,
            ])->with('success', 'Berhasil Login');
        } elseif (Auth::user()->role_id == '3') {
            return redirect('login')->with('error', 'Anda bukan karyawan');;
        } else {
            return redirect('')->with('error', 'Kesalahan Berfikir')->withInput();
        }
    }

    // Melihat Data Peminjaman yang sudah dikembalikan 
    public function dataPengembalian()
    {

        if (Auth::user()->role_id == '1') {
            $data = Peminjaman::all();
            $kategori = Category::all();
            return view('dashboard2.datapengembalian', [
                'buku' => Buku::all(),
                'kategori' => $kategori,
                'penerbit' => Penerbit::all(),
                'raks' => Rak::all(),
                'title' => 'Semua Buku',
                'data' => $data,
            ])->with('success', 'Berhasil Login');
        } elseif (Auth::user()->role_id == '2') {
            // return redirect('dashboard/operator')->with('success', 'Berhasil Login');;
            $data = Peminjaman::all();
            $kategori = Category::all();
            return view('dashboard2.datapengembalian', [
                'buku' => Buku::all(),
                'kategori' => $kategori,
                'penerbit' => Penerbit::all(),
                'raks' => Rak::all(),
                'title' => 'Semua Buku',
                'data' => $data,
            ])->with('success', 'Berhasil Login');
        } elseif (Auth::user()->role_id == '3') {
            return redirect('login')->with('error', 'Anda bukan karyawan');;
        } else {
            return redirect('')->with('error', 'Kesalahan Berfikir')->withInput();
        }
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
