<?php
use Laravel\Passport\Passport;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');
    }

    protected function registerPolicies()
    {
        // Register any authentication / authorization policies
    }
}
