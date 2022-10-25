<?php

namespace Tests\Feature\Models;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_insert_data()
    {
        $data = Tag::factory()->make()->toArray();
        Tag::query()->create($data);
        $this->assertDatabaseHas('tags',$data);
    }

    public function test_tag_relationship_with_post()
    {
        $count = rand(0,10);
        $tag = Tag::factory()
            ->hasPosts($count)
            ->create();

        $this->assertCount($count,$tag->posts);
        $this->assertTrue($tag->posts->first() instanceof Post);
    }
}
