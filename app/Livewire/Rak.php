<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use App\Models\Kategori;
use App\Models\Rak as ModelsRak;
use Livewire\WithPagination;

class Rak extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $create, $edit, $delete;
    public $rak, $baris, $kategori, $kategori_id, $rak_id, $search,$nama;

    protected $validationAttributes = [
        'kategori_id' => 'kategori'
    ];


    public function Create()
    {
        $this->create = true;
        $this->kategori = Category::all();
    }

    public function store()
    {
        $rak_pilihan = ModelsRak::select('baris')->where('rak', $this->rak)->get()->implode('baris', ',');
       
        $this->validate([
            'rak' => 'required|numeric|min:1',
            'baris' => 'required|numeric|min:1|not_in:' . $rak_pilihan,
            'kategori_id' => 'required|numeric|min:1',
        ]);
        
        ModelsRak::create([
            'rak' => $this->rak,
            'baris' => $this->baris,
            'kategori_id' => $this->kategori_id,
            'slug' => $this->rak .'-' .$this->baris
        ]);

        session()->flash('sukses', 'Data berhasil ditambahkan.');

        $this->format();
    }

    public function Edit(ModelsRak $rak) {
        
        $this->format();

        $this->edit = true;
        $this->rak_id = $rak->id;
        $this->rak = $rak->rak;
        $this->baris = $rak->baris;
        $this->rak = $rak->kategori_id;
        $this->kategori = Category::all();


    }

    public function update(ModelsRak $rak){
        
        $rak_pilihan = ModelsRak::select('baris')->where('rak', $this->rak)->where('baris' ,'!=',$this->baris)->get()->implode('baris', ',');
    //    dd($rak_pilihan);
        $this->validate([
            'rak' => 'required|numeric|min:1',
            'baris' => 'required|numeric|min:1|not_in:' . $rak_pilihan,
            'kategori_id' => 'required|numeric|min:1',
        ]);

        $rak->update([
            'rak' => $this->rak,
            'baris' => $this->baris,
            'kategori_id' => $this->kategori_id,
            'slug' => $this->rak .'-'.$this->baris
        ]);

        session()->flash('sukses', 'Data berhasil Diubah.');

        $this->format();
        
    }

    public function render()
    {
        return view('livewire.Rak',[
     'raks'=> ModelsRak::latest()->paginate(3)
        ]);
    }


    public function format() {

        unset($this->nama);
        unset($this->create);
        unset($this->rak_id);
        unset($this->edit);
        unset($this->rak);
        unset($this->baris);
        unset($this->kategori_id);
        unset($this->kategori);
    
        }
}
