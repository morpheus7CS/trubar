<?php

namespace Wewowweb\Trubar\Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
        $response = $this->json('POST', '/trubar/register', ['name' => 'Sally']);

        dd($response);

        $data = factory(TrubarUser::class)->make();

        $this->post(route('trubar.register', [
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password,
        ]))
        ->assertStatus(201);

        $this->assertDatabaseHas('trubar_users', ['email' => $data->email]);
    }
}
