<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $downloaded = \App\Fileentry::where('downloads','>', '0')->orderBy('id', 'desc')->get();
        $expiration = \App\Fileentry::where('downloads','<', '1')->where('expiration','<',Carbon::now()->addWeek())->orderBy('id', 'desc')->get();
        //where('user_id', Auth::user()->id)->
        view()->share("notify_downloaded", $downloaded);
        view()->share("notify_expiration", $expiration);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
