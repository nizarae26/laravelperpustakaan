<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use RealRashid\SweetAlert\Facades\Alert;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $edit, $kategori, $rak, $penerbit,
        $kategori_id, $rak_id, $penerbit_id,
        $judul, $stok, $penulis, $sampul, $buku_id;

    protected $validationAttributes = [
        'kategori_id' => 'kategori',
        'penerbit_id' => 'penerbit',
        'rak_id' => 'raks',
    ];

    // public function format()
    // {
    //     unset($this->buku_id);
    //     unset($this->judul);
    //     unset($this->sampul);
    //     unset($this->stok);
    //     unset($this->penulis);
    //     unset($this->kategori);
    //     unset($this->penerbit);
    //     unset($this->rak);
    //     unset($this->rak_id);
    //     unset($this->penerbit_id);
    //     unset($this->kategori_id);
    // }

    //menampilkan data Buku
    public function DataBuku()
    {

        $data = Buku::all();
        return view('buku.index', [

            'kategori' => Category::all(),
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => 'Semua Kategori',
            'data' => $data,
        ]);
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
    public function edit(Buku $buku)
    {
        // $this->format();

        // $this->edit = true;
        // $this->buku_id = $buku->id;
        // $this->judul = $buku->judul;
        // $this->sampul = $buku->sampul;
        // $this->penulis = $buku->penulis;
        // $this->stok = $buku->stok;
        // $this->kategori_id = $buku->kategori_id;
        // $this->rak_id = $buku->rak_id;
        // $this->penerbit_id = $buku->penerbit_id;
        // $this->kategori = Category::all();
        // $this->rak = Rak::all();
        // $this->penerbit = Penerbit::all();
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

    //Isi data Buku
    public function insertBuku(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'slug' => 'required',
            'sampul' => 'required|mimes:png,jpg,jpeg|max:2048',
            'penulis' => 'required',
            'penerbit_id' => 'required',
            'kategori_id' => 'required',
            'rak_id' => 'required',
            'stok' => 'required|numeric|min:1',
        ]);

        $sampul = $request->file('sampul');
        $filename = date('Y-m-d') . $sampul->getClientOriginalName();
        $path = 'buku/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($sampul));

        Buku::create([
            'judul' => $request->judul,
            'slug' => $request->slug,
            'sampul' => $filename,
            'penulis' => $request->penulis,
            'penerbit_id' => $request->penerbit_id,
            'kategori_id' => $request->kategori_id,
            'rak_id' => $request->rak_id,
            'stok' => $request->stok,
        ]);





        return redirect('DataBuku')->with('success', 'Berhasil Menambahkan data');
    }


    // Edit Buku
    public function updateBuku(Request $request, $id)
    {
        $data = Buku::findOrfail($id);
        $data->judul = $request->judul;
        $data->penulis = $request->penulis;
        $data->slug = $request->slug;

        if ($request->hasFile('sampul')) {

            $destination = 'storage/buku/' . $data->sampul;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('sampul');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '-' . $extention;
            $file->move('storage/buku/', $filename);
            $data->sampul = $filename;
        }
        $data->penerbit_id = $request->penerbit_id;
        $data->kategori_id = $request->kategori_id;
        $data->rak_id = $request->rak_id;
        $data->update();
        return redirect('DataBuku')->with('success', 'Berhasil Mengubah data');
    }

    //Delete Buku
    public function deleteBuku(Request $request, $id)
    {
        $data = Buku::findOrfail($id);

        Storage::disk('public')->delete($data->sampul);
        $data->delete($request->all());
        return redirect()->route('DataBuku')->with('success', 'Data Buku Berhasil Di Hapus');
    }

    public function exportpdf()
    {
        $data = Buku::all();
        $ka =   Category::all();
        $pen = Penerbit::all();
        $ra = Rak::all();


        view()->share('data', $data, $ka, $pen, $ra);
        $pdf = FacadePdf::loadview('buku/databuku-pdf');
        return $pdf->download('databuku.pdf');
    }
}
