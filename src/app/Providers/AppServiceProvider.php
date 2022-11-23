<?php

namespace App\Providers;

use App\domains\repositories\IFContractDetailRepository;
use App\domains\repositories\IFContractDeviceRepository;
use App\domains\repositories\IFContractLineRepository;
use App\domains\repositories\IFContractorRepository;
use App\domains\WifiDiscountApplicable;
use App\infla\ContractDetailRepository;
use App\infla\ContractDeviceRepository;
use App\infla\ContractLineRepository;
use App\infla\ContractorRepository;
use App\infla\InMemoryContractDetailRepository;
use App\infla\InMemoryContractDeviceRepository;
use App\infla\InMemoryContractLineRepository;
use App\infla\InMemoryContractorRepository;
use App\queryServices\ContractLineQueryService;
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

        $this->app->bind(
            InMemoryContractDeviceRepository::class,
            ContractDeviceRepository::class,
        );

        $this->app->bind(
            InMemoryContractDetailRepository::class,
            ContractDetailRepository::class,
        );

        $this->app->bind(
            ContractLineQueryService::class,
            function ($app) {
                return new ContractLineQueryService(
                    $app->make(IFContractorRepository::class),
                    $app->make(IFContractLineRepository::class),
                    $app->make(IFContractDeviceRepository::class),
                    $app->make(IFContractDetailRepository::class)
                );
            }
        );

        // 契約者リポジトリ
        $this->app->bind(IFContractorRepository::class, function ($app) {
            if (App::environment('testing')) {
                return new InMemoryContractorRepository();
            }
            return new ContractorRepository();
        });

        // 契約回線リポジトリ
        $this->app->bind(IFContractLineRepository::class, function ($app) {
            if (App::environment('testing')) {
                return new InMemoryContractLineRepository();
            }
            return new ContractLineRepository();
        });

        // 契約回線端末リポジトリ
        $this->app->bind(IFContractDeviceRepository::class, function ($app) {
            if (App::environment('testing')) {
                return new InMemoryContractDeviceRepository();
            }
            return new ContractDeviceRepository();
        });

        // 契約内容リポジトリ
        $this->app->bind(IFContractDetailRepository::class, function ($app) {
            if (App::environment('testing')) {
                return new InMemoryContractDetailRepository();
            }
            return new ContractDetailRepository();
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
