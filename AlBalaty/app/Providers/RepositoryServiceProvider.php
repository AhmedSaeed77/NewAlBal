<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    private $repositories = [
        'App\Repository\Admin\VideoRepositoryInterface' => 'App\Repository\Admin\Video\VideoRepository',
        'App\Repository\Admin\PackageRepositoryInterface' => 'App\Repository\Admin\Package\PackageRepository',
    ];
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Bind repositories defined in repositories array
         */
        foreach($this->repositories as $interface => $repo){
            $this->app->bind($interface, $repo);
        }
    }
}
