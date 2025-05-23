<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict(!app()->isProduction());

        Relation::enforceMorphMap([
            'tag' => Models\Tag::class,
            'kit' => Models\Kit::class,
            'user' => Models\User::class,
        ]);
    }
}
