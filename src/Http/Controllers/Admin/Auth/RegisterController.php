<?php

namespace Wewowweb\Trubar\Http\Controllers\Admin\Auth;

use Wewowweb\Trubar\Http\Requests\RegisterTrubarUserRequest;
use Wewowweb\Trubar\Models\TrubarUser;
use Wewowweb\Trubar\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Wewowweb\Trubar\Http\Resources\TrubarUserResource;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Wewowweb\Trubar\Models\TrubarUser
     */
    protected function create(array $data)
    {
        return TrubarUser::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(RegisterTrubarUserRequest $request)
    {
        $user = $this->create($request->all());

        return new TrubarUserResource($user);
    }
}
