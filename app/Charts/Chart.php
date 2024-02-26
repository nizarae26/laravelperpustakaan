<?php

namespace App\Charts;

use App\Models\Peminjaman;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class Chart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $data = Peminjaman::selectRaw('kategori.nama AS nama_kategori, 
                                   SUM(CASE WHEN peminjaman.status = 2 THEN 1 ELSE 0 END) AS jumlah_peminjaman_status_2')
            ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
            ->join('kategori', 'buku.kategori_id', '=', 'kategori.id')
            ->where('peminjaman.status', 2)
            ->groupBy('kategori.nama')
            ->orderByDesc('jumlah_peminjaman_status_2')
            ->get();

            $chartData = [];
            foreach ($data as $list) {
                $chartData[$list->nama_kategori] = $list->jumlah_peminjaman_status_2;
            }

            return $this->chart->barChart()
                ->setTitle(' Peminjaman Terbanyak per Kategori')
                ->addData('Jumlah Peminjaman', array_values($chartData))
                ->setXAxis(array_keys($chartData));
    }
}
