<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kategori;
use App\Models\Rak;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;


class RakController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // public function __invoke(Request $request)
    // {
    //     return view('rak/index');
    // }

    public $rak, $baris, $kategori, $kategori_id, $rak_id, $search, $nama;

    protected $validationAttributes = [
        'kategori_id' => 'kategori'
    ];


    // Menampilkan data Rak
    public function DataRak()
    {
        if (request('search')) {
            $data = Rak::latest()->where('rak', 'LIKE', '%' . request('search') . '%')
                ->orWhere('baris', 'LIKE', '%' . request('search') . '%')
                ->orWhere('kategori_id', 'LIKE', '%' . request('search') . '%')
                ->orWhere('slug', 'LIKE', '%' . request('search') . '%')->paginate(5);
        } else {
            $data = Rak::latest()->paginate(1000);
        }
        return view('rak.index', [
            'kategori' => Category::all(),
            'title' => 'Semua Kategori',
            'data' => $data,
        ]);
    }

    // Isi data Rak
    public function insertRak(Request $request)
    {

        $rak_pilihan = Rak::select('baris')->where('rak', $this->rak)->get()->implode('baris', ',');

        $request->validate([
            'rak' => 'required|numeric|min:1',
            'baris' => 'required|numeric|min:1|not_in:' . $rak_pilihan,
            'kategori_id' => 'required|numeric|min:1',
        ]);

        Rak::create([
            'rak' => $request->rak,
            'baris' => $request->baris,
            'kategori_id' => $request->kategori_id,
            'slug' => $request->rak . '-' . $request->baris
        ]);

        return redirect()->route('DataRak')->with('success', 'Rak berhasil ditambah');
    }

    // Edit Rak
    public function updateRak(Request $request, $id)
    {
        $data = Rak::findOrfail($id);
        $data->update($request->all());
        return redirect()->route('DataRak')->with('success', 'Data Rak Berhasil Di Rubah');
    }

    //Delete Rak
    public function deleteRak(Request $request, $id)
    {
        $data = Rak::findOrfail($id);
        $data->delete($request->all());
        return redirect()->route('DataRak')->with('success', 'Data Rak Berhasil Di Hapus');
    }

    public function exportpdf()
    {
        $data = Rak::all();
        $ka =   Category::all();


        view()->share('data', $data, $ka);
        $pdf = FacadePdf::loadview('rak/datarak-pdf');
        return $pdf->download('datarak.pdf');
    }
}
