<?php

namespace Wewowweb\Trubar\Tests;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Wewowweb\Trubar\Models\TrubarUser;

class TrubarUserTest extends BaseTest
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function a_user_can_register()
    {
        $data = factory(TrubarUser::class)->make();

        $this->json('POST', route('trubar.register', [
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password,
            'password_confirmation' => $data->password,
        ]))->assertStatus(201);

        $this->assertDatabaseHas('trubar_users', ['email' => $data->email]);
    }

    /**
     * @test
     */
    public function a_user_can_login()
    {
        $password = 'secret123';
        $user = factory(TrubarUser::class)->create(['password' => Hash::make($password)]);

        $this->json('POST', route('trubar.login', [
            'email' => $user->email,
            'password' => $password,
        ]))->assertStatus(200);
    }
}
