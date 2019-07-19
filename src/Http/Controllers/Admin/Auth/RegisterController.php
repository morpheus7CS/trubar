<?php

namespace Wewowweb\Trubar\Http\Controllers\Admin\Auth;

use Wewowweb\Trubar\Http\Requests\RegisterTrubarUserRequest;
use Wewowweb\Trubar\Models\TrubarUser;
use Wewowweb\Trubar\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Wewowweb\Trubar\Http\Resources\TrubarUserResource;

class RegisterController extends Controller
{
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
