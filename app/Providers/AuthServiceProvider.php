<?php

namespace App\Providers;

use App\Models\Link;
use App\Models\User;
use App\Policies\linkPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Link::class=>linkPolicy::class,
        User::class=>UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::before(function (User $user,$action,$params){
//            dd(func_get_args());
            if($user->isAdmin()){
                if(isset($params[0]) && $params[0] instanceof Link){
                    switch ($action){
                        case 'delete':
                        case 'update':
                        case 'changeState':
                            return true;
                    }
                }
            }
        });
        //
    }
}
