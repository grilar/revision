<?php

namespace Grilar\Revision\Providers;

use Grilar\Base\Supports\ServiceProvider;
use Grilar\Base\Traits\LoadAndPublishDataTrait;

class RevisionServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot(): void
    {
        $this->setNamespace('packages/revision')
            ->loadAndPublishViews()
            ->loadAndPublishConfigurations(['general'])
            ->loadMigrations()
            ->publishAssets();

        $this->app->booted(function () {
            $this->app->register(HookServiceProvider::class);
        });
    }
}
