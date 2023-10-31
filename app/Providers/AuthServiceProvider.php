<?php

namespace App\Providers;

 use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //

        $this->registerPolicies();
        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            //  dd($user->role->name);
            return $user->role_id == 1;
        });


        /* define a Super admin user role */
        Gate::define('isDirector', function($user) {
            //  dd($user->role->name);
            return $user->role_id == 3;
        });
        /* define a Super admin user role */
        Gate::define('isHOD', function($user) {
            //  dd($user->role->name);
            return $user->role_id == 4;
        });

        /* define a Super admin user role */
        Gate::define('isUnitHead', function($user) {
            //  dd($user->role->name);
            return $user->role_id == 5;
        });
        /* define a Super admin user role */
        Gate::define('isHr', function($user) {
            //dd($user->role_id);
            return $user->role_id ==7;
        });
        /* define a Super admin user role */
        Gate::define('isDepartment', function($user) {
            //  dd($user->role->name);
            return $user->role_id == 6;
        });
        /* define a Super admin user role */
        Gate::define('isSupervisor', function($user) {
            //  dd($user->role->name);
            return $user->role_id == 9;
        });
        /* define a Super admin user role */
        Gate::define('isUnit', function($user) {
            //  dd($user->role->name);
            return $user->role_id == 9;
        });  /* define a Super admin user role */
        Gate::define('isUser', function($user) {
            //  dd($user->role->name);
            return $user->role_id == 2;
        });

    }
}
