<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search')) {
            $kategori = Category::where('nama', 'LIKE', '%' . request('search') . '%')->paginate(5);
        } else {

            $kategori = Category::latest()->paginate(10);
        }
        return view('kategori.index', compact('kategori'));
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

    // Isi data category
    public function insertCategory(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('DataCategory')->with('success', 'Category berhasil ditambah');
    }

    // menampilkan data category
    public function DataCategory()
    {
        if (request('search')) {
            $data = Category::where('nama', 'LIKE', '%' . request('search') . '%')->paginate(5);
        } else {
            $data = Category::paginate(5);
        }
        return view('kategori.index', compact('data'));
    }

    // Edit Category
    public function updateCategory(Request $request, $id)
    {
        $data = Category::findOrfail($id);
        $data->update($request->all());
        return redirect()->route('DataCategory')->with('success', 'Data Category Berhasil Diubah');
    }

    //Delete Category
    public function deleteCategory(Request $request, $id)
    {
        $data = Category::findOrfail($id);
        $data->delete($request->all());
        return redirect()->route('DataCategory');
    }

    public function exportpdf()
    {
        $data = Category::all();

        view()->share('data', $data);
        $pdf = FacadePdf::loadview('kategori/datacategory-pdf');
        return $pdf->download('datacategory.pdf');
    }
}
