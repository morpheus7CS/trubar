<?php

namespace Wewowweb\Trubar\Tests;

use Wewowweb\Trubar\Models\TrubarPost;

class TrubarPostTest extends BaseTest
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->login();
    }

    /**
     * @test
     */
    public function it_returns_a_list_of_posts()
    {
        factory(TrubarPost::class)->times(5)->create();
        $this->get(route('trubar.posts.index'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_returns_a_default_number_of_paginated_results()
    {
        factory(TrubarPost::class)->times(100)->create();
        $this->get(route('trubar.posts.index'))
            ->assertStatus(200)
            ->assertJsonCount(10, 'data');
    }

    /**
     * @test
     */
    public function it_returns_a_set_number_of_paginated_results()
    {
        $perPage = 20;
        factory(TrubarPost::class)->times(100)->create();
        $this->get(route('trubar.posts.index', ['per_page' => $perPage]))
            ->assertStatus(200)
            ->assertJsonCount($perPage, 'data');
    }

    /**
     * @test
     */
    public function it_returns_a_only_trashed_paginated_results()
    {
        $posts = factory(TrubarPost::class)->times(5)->create();

        $posts->each(function ($item) {
            $item->delete();
        });

        $this->get(route('trubar.posts.index'))
            ->assertStatus(200)
            ->assertJsonCount(0, 'data');

        $this->get(route('trubar.posts.index', ['trashed_only' => true]))
            ->assertStatus(200)
            ->assertJsonCount(5, 'data');
    }

    /**
     * @test
     */
    public function it_returns_a_single_post()
    {
        $post = factory(TrubarPost::class)->create();
        $this->get(route('trubar.posts.show', ['id' => $post->id]))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_fails_to_return_a_missing_post()
    {
        $this->get(route('trubar.posts.show', ['id' => 'undefined']))
            ->assertStatus(404);
    }

    /**
     * @test
     */
    public function it_returns_a_deleted_post()
    {
        $post = factory(TrubarPost::class)->create();
        $post->delete();

        $this->get(route('trubar.posts.show', ['id' => $post->id]))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_stores_a_new_post()
    {
        $data = factory(TrubarPost::class)->make();

        $this->post(route('trubar.posts.store', [
            'post_type' => $data->post_type,
            'post_status' => $data->post_status,
            'title' => $data->title,
            'excerpt' => $data->excerpt,
            'body' => $data->body,
        ]))
            ->assertStatus(201);

        $this->assertDatabaseHas('trubar_posts', ['title' => $data->title]);
    }
}
