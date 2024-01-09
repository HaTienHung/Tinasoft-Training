<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Repositories\RepositoryAbstract;
use App\Repositories\RepositoryInterface;
use Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('view-instructor-list', 'App\Policies\UserPolicy@viewInstructorList');

        Gate::define('view-user-list', 'App\Policies\UserPolicy@viewUserList');

        Gate::define('add-instructor-list', 'App\Policies\UserPolicy@addInstructorList');

        Gate::define('add-user-list', 'App\Policies\UserPolicy@addUserList');
        //
        // $this->registerPolicies();

        // Gate::define('admin-actions', function ($user) {
        //     return $user->hasRole('admin');
        // });

        // Gate::define('instructor-actions', function ($user) {
        //     return $user->hasRole('admin') || $user->hasRole('instructor');
        // });

        // Gate::define('user-actions', function ($user) {
        //     return $user->hasRole('admin') || $user->hasRole('instructor');
        // });
    }
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, RepositoryAbstract::class);
    }
}
