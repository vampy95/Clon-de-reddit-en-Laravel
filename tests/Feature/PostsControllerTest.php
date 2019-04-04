<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {

        $posts factory(\App\Post::class, 10)->create();

        $response = $this->get('/');

        $response->assertStatus(200);


        use DAtabaseMigrations;

        /** @test */

        public function a_guest_can_see_all_the_posts(){

            $posts factory(\App\Post::class, 10)->create();

            $response = $this->get(route('posts_path'));

            $response->assertStatus(200);

        }

    }
}
