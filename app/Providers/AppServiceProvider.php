<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);

        // @asset('css/app.css') -- like asset(), but appends the file's mtime so
        // browsers and CDNs pick up a rebuilt bundle instead of serving a stale one.
        Blade::directive('asset', function ($expression) {
            return "<?php
                \$path = {$expression};
                \$file = public_path(\$path);
                echo e(asset(\$path) . (is_file(\$file) ? '?v=' . filemtime(\$file) : ''));
            ?>";
        });
    }
}
