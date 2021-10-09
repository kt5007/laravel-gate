<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Auth\Access\Gate;
use App\User;
class UserController extends Controller
{

    private $authManager;
    private $gate;

    public function __construct(
        
        AuthManager $authManager,
        Gate $gate
    )
    {
        $this->authManager=$authManager;
        $this->gate=$gate;
    }

    public function index(User $user)
    {
        $id=3;
        // if($this->gate->allows('user-access',$id)){
        //     return view('user.index');
        // }else{
        //     return view('user.false');
        // }
    
        // $user = $this->authManager->guard()->user();
        // $content = ::find((int)$id);
        // if($user->can('view',$content)){

        // }
        $users = User::all();
        return view('user.index',compact('users'));

    }

    public function create()
    {
        # code...
    }

    public function update(Post $post)
    {
        $this->authorize('update',$post);
        // $post->update();
        return ('update');
    }
}
