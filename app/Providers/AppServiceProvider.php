<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Loai_san_pham;
use App\Models\Cua_hang;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $dslsp = Loai_san_pham::where('trang_thai',1) -> get();
        $dscuahang = Cua_hang::get();
        
        View::share(['dslsp' => $dslsp,'dscuahang' => $dscuahang]);
    }
}
