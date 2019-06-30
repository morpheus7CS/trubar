<?php

namespace Wewowweb\Trubar\Tests;

use Illuminate\Contracts\Auth\Authenticatable;
use Orchestra\Testbench\TestCase;
use Wewowweb\Trubar\Tests\TestModels\TestUser;
use Wewowweb\Trubar\TrubarServiceProvider;

abstract class BaseTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [TrubarServiceProvider::class];
    }

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->withFactories(realpath(dirname(__DIR__) . '/database/factories'));

        $this->loadLaravelMigrations(['--database' => 'testing']);
        $this->artisan('migrate', ['--database' => 'testing']);
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');
    }

    protected function login(Authenticatable $user = null): Authenticatable
    {
        $user = $user ?? factory(TestUser::class)->create();
        $this->actingAs($user);

        return $user;
    }
}
