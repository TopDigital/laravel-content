<?php

namespace TopDigital\Content;

use Illuminate\Support\ServiceProvider;
use TopDigital\Content\Models\Post;
use TopDigital\Content\Models\Section;
use TopDigital\Content\Policies\PostPolicy;
use TopDigital\Content\Policies\SectionPolicy;

class ContentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadFactoriesFrom(__DIR__.'/../database/factories');

        \Gate::policy(Post::class, PostPolicy::class);
        \Gate::policy(Section::class, SectionPolicy::class);
    }
}
