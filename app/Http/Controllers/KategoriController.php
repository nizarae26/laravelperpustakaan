<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function list()
    {
        $categories = Kategori::latest()->paginate(5);
        return view('kategori.index', compact('categories'));
    }

    public function index()
    {
        $categories = Kategori::all();


        return response()->json([
           'data' => $categories
        ]);
    }

    public function show(Kategori $category)
    {
        return response() -> json([
            'data' => $category
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required' ,
        ]);

        if ($validator->fails()) {
            return response() ->json(
                $validator->errors(), 
                 422
            );
        }

        $input = $request->all();

        $category = Kategori::create($input);

        return response() ->json([
            'success' => true,
            'message' => 'succes',
            'data' => $category
        ]);
    }

    public function update(Request $request, $id){
        $categories = Kategori::findOrfail($id);

        if($request->has('gambar')) {
            $image = $request->file('gambar');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads/'), $filename);
            $categories->gambar = $request->file('gambar')->getClientOriginalName();
            $categories->update();
        } else {
            $categories->update($request->all());
        }

        return redirect()->route('kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $category)
    {

        File::delete('uploads/' .  $category->gambar);
        $category -> delete();

        return response() -> json([
            'success' => true,
            'message' => 'succes',
        ]);
    }
}
