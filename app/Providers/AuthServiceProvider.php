<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Gate;
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
        Gate::define('isAnggota', function () {
            // dd(Auth::guard('anggota')->check());
            return Auth::guard('anggota')->check();
        });

        Gate::define('isAdmin', function () {
            // dd(Auth::guard('anggota')->check());
            return Auth::guard('user')->check();
        });
    }
}
