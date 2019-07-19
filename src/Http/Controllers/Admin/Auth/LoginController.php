<?php

namespace Wewowweb\Trubar\Http\Controllers\Admin\Auth;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Wewowweb\Trubar\Http\Requests\LoginTrubarUserRequest;
use Wewowweb\Trubar\Http\Controllers\Controller;
use Wewowweb\Trubar\Http\Resources\TrubarUserResource;
use Wewowweb\Trubar\Models\TrubarUser;

class LoginController extends Controller
{
    public function login(LoginTrubarUserRequest $request)
    {
        $authenticated = $this->guard()->attempt(['email' => $request->get('email'), 'password' => $request->get('password')]);

        if ($authenticated) {
            return new TrubarUserResource($this->guard()->user());
        }

        throw ValidationException::withMessages([
            $request->get('email') => [trans('auth.failed')],
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('trubar');
    }
}
