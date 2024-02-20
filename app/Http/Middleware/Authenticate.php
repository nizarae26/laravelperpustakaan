<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        FacadesAlert::error('Anda Belum Login / Anda Tidak Memiliki Akses', 'Silahkan Login Terlebih Dahulu');
        return $request->expectsJson() ? null : route('loginn', true);
    }
}
