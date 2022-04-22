<?php

namespace Tests\Feature\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page()
    {

        Post::factory()->count(100)->create();
        $response = $this->get(route('home'));

        $response->assertStatus(200);

        ##باید آدرس بدهیم
        ##وجود داشتن یک ویو
        $response->assertViewIs('home');

        ##اولین عنصر کلید دومین عنصر مقدار
        ##اگر دومین عنصر را ندهیم فقط کلید را چک میکند
        $response->assertViewHas('posts', Post::latest()->paginate(15));
    }
}