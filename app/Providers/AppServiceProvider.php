<?php

namespace App\Providers;

use App\Repositories\Implementation\TeamRepositoryImplementation;
use App\Repositories\TeamRepository;
use App\Services\Implementation\TeamServiceImplementation;
use App\Services\TeamService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        // Add your services here
        $this->app->bind(TeamService::class, TeamServiceImplementation::class);

        // Add your repositories here
        $this->app->bind(TeamRepository::class, TeamRepositoryImplementation::class);

        // Disable wrapping of the outer-most resource array
        JsonResource::withoutWrapping();
    }
}
