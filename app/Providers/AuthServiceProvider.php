<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Setting;
use App\Models\Customer;
use App\Models\Interaction;
use App\Models\SalesOpportunity;
use App\Models\Task;
use App\Policies\UserPolicy;
use App\Policies\SettingPolicy;
use App\Policies\CustomerPolicy;
use App\Policies\InteractionPolicy;
use App\Policies\SalesOpportunityPolicy;
use App\Policies\TaskPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Setting::class => SettingPolicy::class,
        Customer::class => CustomerPolicy::class,
        SalesOpportunity::class => SalesOpportunityPolicy::class,
        Task::class => TaskPolicy::class,
        Interaction::class => InteractionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
