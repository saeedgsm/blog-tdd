<?php

namespace Tests\Feature\Models;

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
    public function test_example()
    {
        $data = Tag::factory()->make()->toArray();
        Tag::query()->create($data);
        $this->assertDatabaseHas('tags',$data);
    }
}
