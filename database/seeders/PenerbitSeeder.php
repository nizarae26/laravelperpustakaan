<?php

namespace Database\Seeders;

use App\Models\Penerbit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PenerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penerbit = ['gramedia', 'erlangga'];

        foreach ($penerbit as  $value) {
            Penerbit::create([
                'nama' => $value,
                'slug' => Str::slug($value),
            ]);
            # code...
        }
    }
}
