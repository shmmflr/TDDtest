<?php

namespace Tests\Feature\Views;

use App\Models\User;
use Tests\TestCase;

class LayoutViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_layout_render_when_user_is_admin()
    {
        $user = User::factory()->state(['role' => 'admin'])->create();

        #یعنی درخواست از طرف همین کاربره
        $this->actingAs($user);

        $view = $this->view('layouts.layout');

        $view->assertSee('<a href="/dashboard/posts">posts</a>', false);

    }

    public function test_layout_render_when_user_is_user()
    {
        $user = User::factory()->state(['role' => 'user'])->create();

        #یعنی درخواست از طرف همین کاربره
        $this->actingAs($user);

        $view = $this->view('layouts.layout');

        $view->assertDontSee('<a href="/dashboard/posts">posts</a>', false);

    }

}