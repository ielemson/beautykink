<?php

namespace App\Http\Controllers\Auth\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\UserRepository;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param \App\Repositories\Frontend\UserRepository
     * @return void
    */
    public function __construct(UserRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Store new user in storage.
     *
     * @param \App\Http\Requests\UserRequest $request
     * @return \Illuminate\Http\Response
    */
    public function register(UserRequest $request)
    {
        $this->repository->register($request);
        return redirect()->route('user.login')->withSuccess(__('Account Registered Successfully!'));
    }

    public function showForm()
    {
        return view('user.auth.register');
    }
    
    /**
     * Verify user email.
     *
     * @param string $token
     * @return \Illuminate\Http\Response
    */
    public function verify($token)
    {
        $user = User::where('email_token', $token)->first();
        if ($user) {
            Auth::login($user);
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->route('user.login');
        }
    }
}
