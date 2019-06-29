<?php

namespace Wewowweb\Trubar\Tests;

use Orchestra\Testbench\TestCase;
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

        $this->withFactories(realpath(dirname(__DIR__).'/database/factories'));

        $this->loadLaravelMigrations(['--database' => 'testing']);
        $this->artisan('migrate', ['--database' => 'testing']);
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');
    }
}
