<?php 

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Untuk menggunakan Bootstrap di pagination
        Paginator::useBootstrap();

        // Menyediakan variabel $count ke semua view
        View::composer('*', function ($view) {
            $count = 0; // Nilai default $count
            
            // Periksa apakah user sedang login
            if (Auth::check()) {
                $userId = Auth::id(); // Ambil ID user yang login
                // Hitung jumlah item di keranjang untuk user yang login
                $count = Cart::where('user_id', $userId)->count();
            }

            // Bagikan variabel $count ke semua view
            $view->with('count', $count);
        });
    }
}
