<?php

namespace Tests\Feature\Modles;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Models\ModelHelperTesting;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase, ModelHelperTesting;

    protected function model(): Model
    {
        return new Tag();
    }

    public function test_tags_relationship_with_posts()
    {
        $count = rand(1, 10);

        $tag = Tag::factory()->hasPosts($count)->create();

        $this->assertCount($count, $tag->posts);
        $this->assertTrue($tag->posts->first() instanceof Post);
    }
}