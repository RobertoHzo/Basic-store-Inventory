<?php

namespace App\Providers;

use App\Contracts\CategoryContract;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Contracts\AttributeContract;
use App\Repositories\AttributeRepository;
use App\Contracts\BrandContract;
use App\Repositories\BrandRepository;
use App\Contracts\ProductContract;
use App\Repositories\ProductRepository;
use App\Contracts\PedidoContract;
use App\Repositories\PedidoRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        // CategoryContract::class         =>          CategoryRepository::class,
        // AttributeContract::class        =>          AttributeRepository::class,
        // BrandContract::class            =>          BrandRepository::class,
        // ProductContract::class          =>          ProductRepository::class,
        // PedidoContract::class            =>          PedidoRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    // public function register()
    // {
    //     foreach ($this->repositories as $interface => $implementation)
    //     {
    //         $this->app->bind($interface, $implementation);
    //     }
    // }
}
