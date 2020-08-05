<?php

namespace App\Providers;

use App\Models\ApproachFolder;
use App\Models\SaleList;
use App\Models\Template;
use App\Policies\ApproachFolderPolicy;
use App\Policies\SaleListPolicy;
use App\Policies\TemplatePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Template::class => TemplatePolicy::class,
        SaleList::class => SaleListPolicy::class,
        ApproachFolder::class => ApproachFolderPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
