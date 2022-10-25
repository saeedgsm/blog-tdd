<?php

namespace Tests\Feature\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_insert_data()
    {
        $data = User::factory()->make()->toArray();
        $data['password']=123456;
        User::query()->create($data);
        $this->assertDatabaseHas('users',$data);
    }

    public function test_user_relationship_with_post()
    {
        $count = rand(0,10);
        $user = User::factory()
            ->hasPosts($count)
            ->create();

        $this->assertCount($count,$user->posts);
        $this->assertTrue($user->posts->first() instanceof Post);
    }
}
