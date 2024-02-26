<?php

namespace ForestLynx\DaData\Providers;

use ForestLynx\DaData\DaDataBank;
use Carbon\Laravel\ServiceProvider;
use ForestLynx\DaData\DaDataAddress;
use ForestLynx\DaData\DaDataCompany;

/**
 * Class DaDataServiceProvider
 * @package ForestLynx\DaData
 */
class DaDataServiceProvider extends ServiceProvider
{
    protected $namespace = "dadata";

    public function register()
    {
        $this->app->singleton('da_data_address', function () {
            return new DaDataAddress();
        });
        $this->app->singleton('da_data_company', function () {
            return new DaDataCompany();
        });
        $this->app->singleton('da_data_bank', function () {
            return new DaDataBank();
        });

        $this->app->alias('da_data_address', DaDataAddress::class);
        $this->app->alias('da_data_company', DaDataCompany::class);
        $this->app->alias('da_data_bank', DaDataCompany::class);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . "/../../config/{$this->namespace}.php" => \config_path("{$this->namespace}.php"),
        ], 'dadata-config');
    }
}
