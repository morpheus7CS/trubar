<?php

namespace Wewowweb\Trubar\Tests;

use Wewowweb\Trubar\Models\TrubarPost;

class TrubarPostTest extends BaseTest
{
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
    public function it_returns_a_only_trashed_pagianted_results()
    {
        $posts = factory(TrubarPost::class)->times(5)->create();

        $posts->each(function ($item){
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
}
