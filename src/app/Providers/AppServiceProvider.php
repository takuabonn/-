<?php

namespace App\Providers;

use App\domains\repositories\IFContractorRepository;
use App\domains\WifiDiscountApplicable;
use App\infla\ContractorRepository;
use App\infla\InMemoryContractorRepository;
use Illuminate\Support\Facades\App;
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
        $this->app->bind(
            InMemoryContractorRepository::class,
            ContractorRepository::class,
        );

        // 契約者リポジトリ
        $this->app->bind(IFContractorRepository::class, function ($app) {
            if(App::environment('testing')) {
                return new InMemoryContractorRepository();
            }
            return new ContractorRepository();
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
