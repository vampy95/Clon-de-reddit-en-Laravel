<?php

namespace tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;



class PostTest extends TestCase
{

	use DatabaseMigrations;

	public function post_determines_its_author(){

		$user = factory(\App\User::class)->create();


		$post = factory(\App\Post::class)->create([
			'user_id' => $user->id,
		]);

		$postByAnotherUser = factory(\App\Post::class)->create();

		$postByAuthor = $post->wasCreatedBy($user);

		$postByAnotherAuthor = $post->wasCreatedBy($user);

		$this->assertTrue($postByAuthor);

		$this->assertFalse($postByAuthor);

	}
}
