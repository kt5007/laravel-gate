<?php

namespace App\Providers;

use App\Gate\UserAccess;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate;
use App\User;
use Psr\Log\LoggerInterface;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    // protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    // ];
    
    protected $policies = [
        'App\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate, LoggerInterface $logger)
    {
        $this->registerPolicies();
        
        // $gate->define('user-access', function(User $user, $id){
        //     return intval($user->getAuthIdentifier()) === intval($id);
        // });
        $gate->define('user-access', new UserAccess);
        $gate->before(function ($user, $ability) use ($logger){
            $logger->info($ability,[
                'user_id'=>$user->getAuthIdentifier()
            ]);
        });
    }
}
