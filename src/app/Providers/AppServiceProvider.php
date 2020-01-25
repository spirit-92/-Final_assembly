<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    static $start =array();
    static $dir =array();
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
        $mainPath = database_path('migrations');
        self::scandirs($mainPath);
        $paths = array_merge([$mainPath], self::$start);
        $this->loadMigrationsFrom($paths);
    }
    static function scandirs($start){
        $scans = scandir($start);
        foreach ($scans as $scan){
            if ($scan !== '.' && $scan != '..'){
                if (is_dir($start.'/'.$scan)){
                    self::scandirs($start.'/'.$scan);
                    self::$start[] = $start.'/'.$scan;
                }
            }
        }
    }
}
