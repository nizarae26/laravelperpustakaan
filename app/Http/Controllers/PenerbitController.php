<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search')) {
            $penerbit = Penerbit::where('nama', 'LIKE', '%' . request('search') . '%')->paginate(5);
        } else {

            $penerbit = Penerbit::latest()->paginate(10);
        }
        return view('penerbit.index', compact('penerbit'));
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

    // Isi data Penerbit
    public function insertPenerbit(Request $request)
    {
        Penerbit::create($request->all());
        return redirect()->route('DataPenerbit')->with('success', 'Penerbit berhasil ditambah');
    }

    // menampilkan data Penerbit
    public function DataPenerbit()
    {
        if (request('search')) {
            $data = Penerbit::where('nama', 'LIKE', '%' . request('search') . '%')->paginate(5);
        } else {
            $data = Penerbit::paginate(5);
        }
        return view('penerbit.index', compact('data'));
    }

    // Edit Penerbit
    public function updatePenerbit(Request $request, $id)
    {
        $data = Penerbit::findOrfail($id);
        $data->update($request->all());
        return redirect()->route('DataPenerbit')->with('success', 'Data Penerbit Berhasil Di Rubah');
    }

    //Delete Penerbit
    public function deletePenerbit(Request $request, $id)
    {
        $data = Penerbit::findOrfail($id);
        $data->delete($request->all());
        return redirect()->route('DataPenerbit')->with('success', 'Data Penerbit Berhasil Di Hapus');
    }

    public function exportpdf()
    {
        $data = Penerbit::all();

        view()->share('data', $data);
        $pdf = FacadePdf::loadview('penerbit/datapenerbit-pdf');
        return $pdf->download('data.pdf');
    }
}
